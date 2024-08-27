<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		$netInvoices = Invoice::effective()->count();
		$paidInvoices = Invoice::paid()->count();
		$currentInvoices = Invoice::current()->count();
		$overdueInvoices = Invoice::overdue()->count();
		$totalCustomers = Customer::count();
		$currentInvoicesTotal = Invoice::current()->sum('total');
		$paidInvoicesTotal = Invoice::paid()->sum('total');

		$invoices = Invoice::latest()->with('customer')->take(5)->get();

		return view('dashboard', compact(
			'netInvoices',
			'paidInvoices',
			'overdueInvoices',
			'totalCustomers',
			'currentInvoices',
			'currentInvoicesTotal',
			'paidInvoicesTotal',
			'invoices'
		));
	}
}
