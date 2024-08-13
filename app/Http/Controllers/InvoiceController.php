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
		dd($request->all());
	}
}
