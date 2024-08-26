<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Setting;
use App\Models\Customer;

class InvoiceService
{
	public static function composeCustomerDetails(Customer $customer): array
	{
		return $customer->only(['name', 'email', 'phone', 'address']);
	}

	// This service will be hard to test because of all the static methods
	// Check InvoiceController, I left a note there
	public static function composeIssuerDetails(Setting $settings): array
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