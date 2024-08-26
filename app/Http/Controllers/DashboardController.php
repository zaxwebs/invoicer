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
		$totalInvoices = Invoice::count();
		$paidInvoices = Invoice::where('status', InvoiceStatus::PAID)->count();
		$activeInvoices = Invoice::whereIn('status', [InvoiceStatus::ISSUED, InvoiceStatus::PARTIALLY_PAID])->count();
		$overdueInvoices = Invoice::overdue()->count();
		$totalCustomers = Customer::count();
		$activeInvoicesTotal = Invoice::whereIn('status', [InvoiceStatus::ISSUED, InvoiceStatus::PARTIALLY_PAID])->sum('total');
		$paidInvoicesTotal = Invoice::where('status', InvoiceStatus::PAID)->sum('total');



		return view('dashboard', compact(
			'totalInvoices',
			'paidInvoices',
			'overdueInvoices',
			'totalCustomers',
			'activeInvoices',
			'activeInvoicesTotal',
			'paidInvoicesTotal'
		));
	}
}
