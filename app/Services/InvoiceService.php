<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Setting;
use App\Models\Customer;
use Illuminate\Support\Str;

class InvoiceService
{

	public function __construct()
	{

	}

	public static function composeCustomerDetails(Customer $customer)
	{
		return [
			'name' => $customer->name,
			'email' => $customer->email,
			'phone' => $customer->phone,
			'address' => $customer->address,
		];
	}

	public static function composeIssuerDetails(Setting $settings)
	{
		return [
			'name' => $settings->name,
			'email' => $settings->email,
			'phone' => $settings->phone,
			'address' => $settings->address,
			'website' => $settings->website,
		];
	}

	protected static function generateInvoiceNumber()
	{
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';

		for ($i = 0; $i < 2; $i++) {
			$randomIndex = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$randomIndex];
		}

		$numbers = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
		return $randomString . $numbers;
	}

	public static function generateUniqueInvoiceNumber()
	{
		do {
			$invoiceNumber = self::generateInvoiceNumber();
		} while (Invoice::where('invoice_number', $invoiceNumber)->exists());

		return $invoiceNumber;
	}
}