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
		$prefix = GeneralService::generateRandomUppercaseString(2);
		$paddedNumbers = GeneralService::generatePaddedNumber(6);
		return $prefix . $paddedNumbers;
	}

	public static function generateUniqueInvoiceNumber()
	{
		do {
			$invoiceNumber = self::generateInvoiceNumber();
		} while (Invoice::where('invoice_number', $invoiceNumber)->exists());

		return $invoiceNumber;
	}
}