<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Settings;
use App\Models\Customer;

class InvoiceService
{

	public static function composeCustomerDetails(Customer $customer): array
	{
		return $customer->only(['name', 'email', 'phone', 'address']);
	}

	public static function composeIssuerDetails(Settings $settings): array
	{
		return $settings->only(['name', 'email', 'phone', 'address', 'website']);
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