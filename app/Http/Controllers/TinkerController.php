<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;

class TinkerController extends Controller
{
	public function index()
	{
		// Paid
		$invoiceP = Invoice::where('invoice_number', '250890')->first();

		// Issued 
		$invoiceIO = Invoice::where('invoice_number', '786103')->first();
		// Partially Paid
		$invoicePPO = Invoice::where('invoice_number', '845785')->first();
		dd($invoiceP->statuses, $invoiceIO->statuses, $invoicePPO->statuses);
	}
}
