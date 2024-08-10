<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;

class TinkerController extends Controller
{
	public function index()
	{
		$invoice = Invoice::with('customer')->first();
		$customer = $invoice->customer;
		$settings = Setting::first();

		$items = [
			['name' => 'Product A', 'quantity' => 2, 'price' => 150.00],
			['name' => 'Service B', 'quantity' => 1, 'price' => 200.75],
		];

		$invoiceData = [
			'customer_id' => $customer->id,
			'customer_details' => [
				'name' => $customer->name,
				'email' => $customer->email,
				'phone' => $customer->phone,
				'address' => $customer->address,
			],
			'issuer_details' => [
				'name' => $settings->name,
				'email' => $settings->email,
				'phone' => $settings->phone,
				'address' => $settings->address,
				'website' => $settings->website,
			],
			'invoice_number' => rand(10000, 99999),
			'invoice_date' => '2024-08-01',
			'due_date' => '2024-08-15',
			'status' => 'Paid',
			'items' => $items,
		];

		$invoice = Invoice::create($invoiceData);
	}
}
