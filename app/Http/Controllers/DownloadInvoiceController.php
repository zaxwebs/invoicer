<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Auth;
use function Spatie\LaravelPdf\Support\pdf;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DownloadInvoiceController extends Controller
{
	use AuthorizesRequests;
	//
	public function __invoke(Invoice $invoice)
	{
		$this->authorize('view', $invoice);
		$settings = Auth::user()->settings;

		// $image = Browsershot::url('https://example.com/')
		// 	->setNodeBinary('C:\Program Files\nodejs\node')
		// 	->screenshot();

		// return response($image)->header('Content-Type', 'image/png');

		return Browsershot::url('https://example.com')->setNodeBinary('C:\Program Files\nodejs\node')->pdf();

		// $base65Pdf = Browsershot::url('https://example.com/')
		// 	->setNodeBinary('C:\Program Files\nodejs\node')
		// 	->setNpmBinary('C:\Program Files\nodejs\npm')
		// 	->newHeadless()
		// 	->base64pdf();

		// return response($base65Pdf)->header('Content-Type', 'application/pdf');

		// return pdf()
		// 	->view('components.invoice', compact('invoice', 'settings'))
		// 	->name('invoice.pdf')->withBrowsershot(function (Browsershot $browsershot) {
		// 		$browsershot->setNodeBinary('C:\Program Files\nodejs\node.exe');
		// 	});
	}
}
