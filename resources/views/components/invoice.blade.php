@props(['invoice', 'settings'])

<!-- Card -->
<div class="flex flex-col p-4 bg-white border border-gray-200 sm:p-10 rounded-xl dark:bg-neutral-800">
	<!-- Grid -->
	<div class="flex justify-between">
		<div>
			@if ($settings->logo)
				<img class="mb-4 max-w-60 max-h-40" src="{{ asset('storage/' . $settings->logo) }}" alt="Logo">
			@endif

			<h1 class="text-lg font-semibold text-blue-700 dark:text-blue-300 md:text-xl">
				{{ $invoice->issuer_details['name'] }}
			</h1>
			<div>{{ $invoice->issuer_details['website'] }}</div>
		</div>
		<!-- Col -->

		<div class="text-end">
			<h2 class="text-2xl font-semibold text-gray-800 md:text-3xl dark:text-neutral-200">
				Invoice #
			</h2>
			<span class="block mt-1 text-gray-500 dark:text-neutral-500">{{ $invoice->invoice_number}}</span>

			<address class="mt-4 not-italic text-gray-800 whitespace-pre-line dark:text-neutral-200">
				{{ $invoice->issuer_details['address'] }}
			</address>
		</div>
		<!-- Col -->
	</div>
	<!-- End Grid -->

	<!-- Grid -->
	<div class="grid gap-3 mt-8 sm:grid-cols-2">
		<div>
			<h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Bill to:</h3>
			<h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
				{{ $invoice->customer_details['name'] }}
			</h3>
			<address class="mt-2 not-italic text-gray-500 whitespace-pre-line dark:text-neutral-500">
				{{ $invoice->customer_details['address'] }}
			</address>
		</div>
		<!-- Col -->

		<div class="space-y-2 sm:text-end">
			<!-- Grid -->
			<div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
				<dl class="grid sm:grid-cols-5 gap-x-3">
					<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
						Invoice
						date:
					</dt>
					<dd class="col-span-2 text-gray-500 dark:text-neutral-500">
						{{ $invoice->created_at->format('Y-m-d') }}
					</dd>
				</dl>
				<dl class="grid sm:grid-cols-5 gap-x-3">
					<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due
						date:</dt>
					<dd class="col-span-2 text-gray-500 dark:text-neutral-500">
						{{ $invoice->due_date }}
					</dd>
				</dl>
			</div>
			<!-- End Grid -->
		</div>
		<!-- Col -->
	</div>
	<!-- End Grid -->

	<!-- Table -->
	<div class="mt-6">
		<div class="p-4 space-y-4 border border-gray-200 rounded-lg dark:border-neutral-700">
			<div class="hidden sm:grid sm:grid-cols-5">
				<div class="text-xs font-medium text-gray-500 uppercase sm:col-span-2 dark:text-neutral-500">
					Item
				</div>
				<div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
					Rate
				</div>
				<div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
					Qty
				</div>
				<div class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">
					Amount
				</div>
			</div>

			<div class="hidden border-b border-gray-200 sm:block dark:border-neutral-700"></div>

			@foreach ($invoice->items as $item)
				<div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
					<div class="col-span-full sm:col-span-2">
						<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
							Item
						</h5>
						<p class="font-medium text-gray-800 dark:text-neutral-200">
							{{ $item['name'] }}
						</p>
					</div>
					<div>
						<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
							Rate
						</h5>
						<p class="text-gray-800 dark:text-neutral-200">{{ $item['rate'] }}</p>
					</div>
					<div>
						<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
							Qty
						</h5>
						<p class="text-gray-800 dark:text-neutral-200">{{ $item['quantity'] }}</p>
					</div>
					<div>
						<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
							Amount</h5>
						<p class="text-gray-800 sm:text-end dark:text-neutral-200">
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
	<!-- End Table -->

	<!-- Flex -->
	<div class="flex mt-8 sm:justify-end">
		<div class="w-full max-w-2xl space-y-2 sm:text-end">
			<!-- Grid -->
			<div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">

				<dl class="grid sm:grid-cols-5 gap-x-3">
					<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
						Total:
					</dt>
					<dd class="col-span-2 text-gray-500 dark:text-neutral-500">
						<x-money value="{{ $invoice->total }}" />
					</dd>
				</dl>

				<!-- <dl class="grid sm:grid-cols-5 gap-x-3">
										<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Tax:
										</dt>
										<dd class="col-span-2 text-gray-500 dark:text-neutral-500">$39.00</dd>
									</dl> -->

			</div>
			<!-- End Grid -->
		</div>
	</div>
	<!-- End Flex -->

	<div class="mt-8 sm:mt-12">
		<h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Thank you!</h4>
		<p class="text-gray-500 dark:text-neutral-500">If you have any questions concerning this
			invoice,
			use
			the following contact information:</p>
		<div class="mt-2">
			<p class="block font-medium text-gray-800 dark:text-neutral-200">
				{{ $invoice->issuer_details['email'] }}
			</p>
			<p class="block mt-1 font-medium text-gray-800 dark:text-neutral-200">
				{{ $invoice->issuer_details['phone'] }}
			</p>
		</div>
	</div>

	<p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024
		{{ $invoice->issuer_details['name'] }}
	</p>
</div>
<!-- End Card -->