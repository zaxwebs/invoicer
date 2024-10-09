@props(['invoice', 'settings'])

<!-- Card -->
<div class="flex flex-col p-4 bg-white sm:p-10 dark:bg-neutral-800">
	<!-- Header Section -->
	<div class="flex items-start justify-between mb-4">
		<div>
			@if ($settings->logo)
				<img class="mb-4 max-w-60 max-h-40" src="{{ asset('storage/' . $settings->logo) }}" alt="Company Logo">
			@endif

			<h1 class="text-lg font-semibold text-blue-700 dark:text-blue-300 md:text-xl">
				{{ $invoice->issuer_details['name'] }}
			</h1>
			<p class="text-sm text-gray-600 dark:text-neutral-500">{{ $invoice->issuer_details['website'] }}</p>
		</div>
		<!-- Invoice Number-->
		<div class="text-end">
			<h2 class="text-2xl font-semibold text-gray-800 md:text-3xl dark:text-neutral-200">Invoice</h2>
			<span class="block mt-1 text-gray-500 dark:text-neutral-500">#{{ $invoice->invoice_number }}</span>
		</div>
	</div>
	<!-- End Header Section -->

	<!-- Invoice Dates -->
	<div class="">
		<div class="space-y-2 sm:text-end">
			<dl class="">
				<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Invoice Date</dt>
				<dd class="col-span-2 text-gray-500 dark:text-neutral-500">{{ $invoice->created_at->format('Y-m-d') }}
				</dd>
			</dl>
			<dl class="">
				<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due Date</dt>
				<dd class="col-span-2 text-gray-500 dark:text-neutral-500">{{ $invoice->due_date }}</dd>
			</dl>
		</div>
	</div>
	<!-- End Invoice Dates -->

	<!-- Bill From and Bill To Section (side by side) -->
	<div class="grid gap-6 mt-8 sm:grid-cols-2">
		<!-- Bill From (Issuer Details) -->
		<div class="p-4 border rounded-lg">
			<h3 class="font-semibold text-gray-800 dark:text-neutral-200">Bill From</h3>
			<div class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
				{{ $invoice->issuer_details['name'] }}
			</div>
			<address class="not-italic text-gray-500 dark:text-neutral-500">
				<span class="whitespace-pre-line">{{ $invoice->issuer_details['address'] }}</span>
			</address>
		</div>

		<!-- Bill To (Customer Details) -->
		<div class="p-4 border rounded-lg">
			<h3 class="font-semibold text-gray-800 dark:text-neutral-200">Bill To</h3>
			<div class="text-lg font-semibold text-gray-800 dark:text-neutral-200">

				{{ $invoice->customer_details['name'] }}
			</div>
			<address class="not-italic text-gray-500 dark:text-neutral-500">
				<span class="whitespace-pre-line">{{ $invoice->customer_details['address'] }}</span>
			</address>
		</div>
	</div>
	<!-- End Bill From and Bill To Section -->



	<!-- Invoice Items Table -->
	<div class="mt-8">
		<div class="p-4 space-y-4 border border-gray-200 rounded-lg dark:border-neutral-700">
			<!-- Table Header -->
			<div
				class="hidden text-xs font-medium text-gray-500 uppercase sm:grid sm:grid-cols-5 dark:text-neutral-500">
				<div class="sm:col-span-2">Item</div>
				<div class="text-start">Rate</div>
				<div class="text-start">Qty</div>
				<div class="text-end">Amount</div>
			</div>
			<div class="hidden border-b border-gray-200 sm:block dark:border-neutral-700"></div>

			<!-- Table Rows -->
			@foreach ($invoice->items as $item)
				<div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
					<div class="col-span-full sm:col-span-2">
						<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Item</h5>
						<p class="font-medium text-gray-800 dark:text-neutral-200">{{ $item['name'] }}</p>
					</div>
					<div>
						<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Rate</h5>
						<p class="text-gray-800 dark:text-neutral-200">{{ $item['rate'] }}</p>
					</div>
					<div>
						<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Qty</h5>
						<p class="text-gray-800 dark:text-neutral-200">{{ $item['quantity'] }}</p>
					</div>
					<div class="text-end">
						<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">Amount</h5>
						<p class="text-gray-800 dark:text-neutral-200">
							<x-money :value="$item['total']" />
						</p>
					</div>
				</div>
				@if (!$loop->last)
					<div class="border-b border-gray-200 sm:hidden dark:border-neutral-700"></div>
				@endif
			@endforeach
		</div>
	</div>
	<!-- End Invoice Items Table -->

	<!-- Summary and Total -->
	<div class="flex justify-end mt-8">
		<dl class="flex gap-4">
			<dt class="col-span-3 font-semibold text-gray-800">Total</dt>
			<dd class="col-span-2 ">
				<x-money value="{{ $invoice->total }}" />
			</dd>
		</dl>
	</div>

	<!-- End Summary -->

	<!-- Footer Section -->
	<div class="mt-8 sm:mt-12">
		<h4 class="text-gray-800 dark:text-neutral-200">Thank you for your business!</h4>
		<p class="text-gray-500 dark:text-neutral-500">
			If you have any questions concerning this invoice, use the following contact information:
		</p>
		<div class="mt-2">
			<p class="block text-gray-800 dark:text-neutral-200">{{ $invoice->issuer_details['email'] }}</p>
			<p class="block mt-1 text-gray-800 dark:text-neutral-200">
				{{ $invoice->issuer_details['phone'] }}
			</p>
		</div>
	</div>

	<p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 {{ $invoice->issuer_details['name'] }}</p>
</div>
<!-- End Card -->