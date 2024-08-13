<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InvoiceController extends Controller
{

	public function index()
	{
		$invoices = Invoice::with('customer')->get();
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

		return redirect()->route('invoices.create');

	}

}
