<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Settings;
use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\InvoiceService;

class InvoiceController extends Controller
{
	public function index(Request $request)
	{
		// For filters I like to create a DTO, and on the form request define a filters() method
		// that returns the DTO. This allows you to do $filters = $request->filters()
		// then you can do $filters->status, etc.. and benefit from autocompletion
		// adding them is much easier as well.
		$filterStatus = $request->query('status', 'all');
		$sortBy = $request->query('sort', 'created_at');

		$invoices = Invoice::status($filterStatus)
			->sortBy($sortBy)
			->with('customer')
			->latest()
			->simplePaginate(10)
			->withQueryString();

		return view('invoices.index', compact('invoices'));
	}

	public function show(Invoice $invoice)
	{
		$invoice->load(['notes' => fn ($query) => $query->orderBy('created_at', 'desc')]);

		$settings = Settings::first();

		return view('invoices.show', compact('invoice', 'settings'));
	}

	public function create()
	{
		$customers = Customer::all();
		$due_date = now()->addDays(3)->format('Y-m-d');
		// due date in dd mm yyyy format

		return view('invoices.create', compact('customers', 'due_date'));
	}

	public function store(Request $request)
	{
		// $request->input('items') defaults to null, json_decode() expects a string, this will error out in some cases
		$request->merge(['items' => json_decode($request->input('items'), true)]);

		// same feedback, move it to a separate form request
		$validated = $request->validate([
			'customer_id' => 'required|exists:customers,id',
			'due_date' => 'required|date|after:today',
			'items' => 'required|array|min:1',
			'items.*.name' => 'required|string|max:255',
			'items.*.quantity' => 'required|integer|min:1',
			'items.*.rate' => 'required|numeric|min:0',
		]);

		// Fetch customer and settings

		$customer = Customer::findOrFail($validated['customer_id']);
		$settings = Settings::first();

		// Compose customer and issuer details

		// Once this logic is refactored into an action, or you are calling composeCustomerDetails
		// from a different service, it will make testing the action or service much harder.
		// You can't mock composeCustomerDetails(), so you can't control its output.
		// Either inject the InvoiceService and make it explicit that the controller needs it as a dependency,
		// or if you prefer the clean static call, use real-time facades. This way, you can have the best of both worlds
		// (testable code + clean calls).
		$customerDetails = InvoiceService::composeCustomerDetails($customer);
		// $settings can be nullable, your composeIssuerDetails() expects a non nullable settings to be able to work
		$issuerDetails = InvoiceService::composeIssuerDetails($settings);

		$invoice = Invoice::create([
			'customer_id' => $customer->id,
			'customer_details' => $customerDetails,
			'issuer_details' => $issuerDetails,
			'invoice_date' => now()->format('Y-m-d'),
			'due_date' => $request->input('due_date'),
			'status' => InvoiceStatus::ISSUED,
			'items' => $request->input('items'),
		]);

		return redirect()
			->route('invoices.show', $invoice->invoice_number)
			->with('alert', alertify('Invoice created successfully!'));

	}

	public function updateStatus(Request $request, Invoice $invoice)
	{
		// Validate the requested status, excluding the 'overdue' status
		$validated = $request->validate([
			'status' => [
				'required',
				Rule::enum(InvoiceStatus::class)->except([InvoiceStatus::OVERDUE]),
			],
		]);

		// Update the invoice status
		$invoice->update(['status' => $validated['status']]);

		return redirect()
			->route('invoices.show', $invoice->invoice_number)
			->with('alert', alertify('Invoice status updated successfully!'));
	}

}
