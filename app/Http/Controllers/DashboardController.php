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
		$paidInvoices = Invoice::paid()->count();
		$activeInvoices = Invoice::active()->count();
		$overdueInvoices = Invoice::overdue()->count();
		$totalCustomers = Customer::count();
		$activeInvoicesTotal = Invoice::active()->sum('total');
		$paidInvoicesTotal = Invoice::paid()->sum('total');



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
