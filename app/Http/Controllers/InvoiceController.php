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
		$invoice->load(['notes' => fn($query) => $query->orderBy('created_at', 'desc')]);

		$settings = Settings::first();

		return view('invoices.show', compact('invoice', 'settings'));
	}

	public function create()
	{
		$customers = Customer::all();
		$due_date = now()->addDays(3)->format('Y-m-d');

		return view('invoices.create', compact('customers', 'due_date'));
	}

	public function store(Request $request)
	{
		$request->merge(['items' => json_decode($request->input('items'), true)]);

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

		$customerDetails = InvoiceService::composeCustomerDetails($customer);
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
