<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use function Spatie\LaravelPdf\Support\pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DownloadInvoiceController extends Controller
{
	use AuthorizesRequests;

	public function __invoke(Invoice $invoice)
	{
		// Authorize the user to view the invoice
		$this->authorize('view', $invoice);

		// Get user settings
		$settings = Auth::user()->settings;

		// Generate PDF using spatie/laravel-pdf
		return pdf()
			->view('invoices.pdf', compact('invoice', 'settings'))
			->withBrowsershot(function (Browsershot $browsershot) {
				$browsershot->setNodeBinary('C:\Program Files\nodejs\node');
				$browsershot->setNpmBinary('C:\Users\username\AppData\Roaming\npm\npm');
				$browsershot->setChromePath('C:\Program Files\Google\Chrome\Application\chrome.exe');
				$browsershot->setOption('args', ['--no-sandbox', '--disable-setuid-sandbox']);
				$browsershot->setDebug(true);
			})
			->name('invoice.pdf');
	}
}
