<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function index()
	{
		$customerIds = Auth::user()->customers()->pluck('id');

		$netInvoices = Invoice::whereIn('customer_id', $customerIds)->effective()->count();
		$paidInvoices = Invoice::whereIn('customer_id', $customerIds)->paid()->count();
		$currentInvoices = Invoice::whereIn('customer_id', $customerIds)->current()->count();
		$overdueInvoices = Invoice::whereIn('customer_id', $customerIds)->overdue()->count();
		$totalCustomers = Auth::user()->customers->count();
		$currentInvoicesTotal = Invoice::whereIn('customer_id', $customerIds)->current()->sum('total');
		$paidInvoicesTotal = Invoice::whereIn('customer_id', $customerIds)->paid()->sum('total');

		$invoices = Invoice::whereIn('customer_id', $customerIds)->latest()->with('customer')->take(5)->get();

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
