<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Setting;
use App\Models\Customer;
use App\Enums\InvoiceStatus;
use App\Services\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InvoiceController extends Controller
{

	public function index()
	{
		$invoices = Invoice::with('customer')->latest()->get();
		return view('invoices.index', compact('invoices'));
	}

	public function show(Invoice $invoice)
	{
		return view('invoices.show', compact('invoice'));
	}

	public function create()
	{
		$customers = Customer::all();
		$due_date = Carbon::now()->addDays(3)->format('Y-m-d');
		// due date in dd mm yyyy format

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
		$settings = Setting::first();

		// Compose customer and issuer details

		$customerDetails = InvoiceService::composeCustomerDetails($customer);
		$issuerDetails = InvoiceService::composeIssuerDetails($settings);

		$invoice = Invoice::create([
			'customer_id' => $customer->id,
			'customer_details' => $customerDetails,
			'issuer_details' => $issuerDetails,
			'invoice_date' => Carbon::now()->format('Y-m-d'),
			'due_date' => $request->input('due_date'),
			'status' => InvoiceStatus::ISSUED,
			'items' => $request->input('items'),
		]);

		return redirect()->route('invoices.show', $invoice->invoice_number)->with('alert', alertify('Invoice created successfully!'));

	}

}
