<x-layouts.sidebar>
	<section class="py-20 bg-indigo-500">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

			<div class="grid grid-cols-2 gap-4 lg:grid-cols-4">

				<!-- Net Invoices -->
				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex flex-col gap-4 p-4 lg:items-center md:p-6 lg:flex-row">
						<div
							class="flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-lg shrink-0 dark:bg-neutral-800">
							<svg xmlns="http://www.w3.org/2000/svg"
								class="w-6 h-6 text-indigo-800 dark:text-neutral-400" fill="none" stroke="currentColor"
								stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path
									d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
								<path d="m3.3 7 8.7 5 8.7-5" />
								<path d="M12 22V12" />
							</svg>
						</div>
						<div class="grow">
							<div class="flex items-center gap-x-2">
								<p class="text-xs tracking-wide text-gray-600 uppercase dark:text-neutral-500">Net
									Invoices</p>
								<div class="hs-tooltip">
									<div class="hs-tooltip-toggle">
										<svg class="text-gray-500 shrink-0 size-4 dark:text-neutral-500"
											xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											stroke-linecap="round" stroke-linejoin="round">
											<circle cx="12" cy="12" r="10"></circle>
											<path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
											<path d="M12 17h.01"></path>
										</svg>
										<span
											class="absolute z-10 invisible hidden inline-block px-2 py-1 text-xs font-medium text-white transition-opacity bg-gray-900 rounded shadow-sm opacity-0 hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible dark:bg-neutral-700"
											role="tooltip" data-popper-placement="top"
											style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(132px, -138px);">
											Excluding terminated invoices.
										</span>
									</div>
								</div>
							</div>
							<h3
								class="mt-2 text-xl font-medium text-gray-700 sm:text-2xl lg:text-3xl dark:text-neutral-200">
								{{ $netInvoices }}
							</h3>
						</div>
					</div>
				</div>

				<!-- Paid Invoices -->
				<x-link :href="route('invoices.index', ['status' => 'paid'])"
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex flex-col gap-4 p-4 lg:items-center md:p-6 lg:flex-row">
						<div
							class="flex items-center justify-center w-12 h-12 bg-teal-100 rounded-lg shrink-0 dark:bg-neutral-800">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-800" fill="none"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path
									d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
								<path d="m9 12 2 2 4-4" />
							</svg>
						</div>
						<div class="grow">
							<p class="text-xs tracking-wide text-gray-600 uppercase dark:text-neutral-500">Paid Invoices
							</p>
							<h3
								class="mt-2 text-xl font-medium text-gray-700 sm:text-2xl lg:text-3xl dark:text-neutral-200">
								{{ $paidInvoices }}
							</h3>
						</div>
					</div>
				</x-link>

				<!-- Current Invoices -->
				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex flex-col gap-4 p-4 lg:items-center md:p-6 lg:flex-row">
						<div
							class="flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-lg shrink-0 dark:bg-neutral-800">
							<svg xmlns="http://www.w3.org/2000/svg"
								class="w-6 h-6 text-indigo-800 dark:text-neutral-400" fill="none" stroke="currentColor"
								stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
								<path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
							</svg>
						</div>
						<div class="grow">
							<p class="text-xs tracking-wide text-gray-600 uppercase dark:text-neutral-500">Current
								Invoices</p>
							<h3
								class="mt-2 text-xl font-medium text-gray-700 sm:text-2xl lg:text-3xl dark:text-neutral-200">
								{{ $currentInvoices }}
							</h3>
						</div>
					</div>
				</div>

				<!-- Overdue Invoices -->
				<x-link :href="route('invoices.index', ['status' => 'overdue'])"
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex flex-col gap-4 p-4 lg:items-center md:p-6 lg:flex-row">
						<div
							class="flex items-center justify-center w-12 h-12 rounded-lg shrink-0 bg-fuchsia-100 dark:bg-neutral-800">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-800 dark:text-neutral-400"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<circle cx="12" cy="12" r="10" />
								<polyline points="12 6 12 12 16 14" />
							</svg>
						</div>
						<div class="grow">
							<p class="text-xs tracking-wide text-gray-600 uppercase dark:text-neutral-500">Overdue
								Invoices</p>
							<h3
								class="mt-2 text-xl font-medium text-gray-700 sm:text-2xl lg:text-3xl dark:text-neutral-200">
								{{ $overdueInvoices }}
							</h3>
						</div>
					</div>
				</x-link>

				<!-- Total Customers -->
				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex flex-col gap-4 p-4 lg:items-center md:p-6 lg:flex-row">
						<div
							class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg shrink-0 dark:bg-neutral-800">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 dark:text-neutral-400"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
						</div>
						<div class="grow">
							<p class="text-xs tracking-wide text-gray-600 uppercase dark:text-neutral-500">Total
								Customers</p>
							<h3
								class="mt-2 text-xl font-medium text-gray-700 sm:text-2xl lg:text-3xl dark:text-neutral-200">
								{{ $totalCustomers }}
							</h3>
						</div>
					</div>
				</div>

				<!-- Paid Invoices Total -->
				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex flex-col gap-4 p-4 lg:items-center md:p-6 lg:flex-row">
						<div
							class="flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-lg shrink-0 dark:bg-neutral-800">
							<svg xmlns="http://www.w3.org/2000/svg"
								class="w-6 h-6 text-indigo-800 dark:text-neutral-400" fill="none" stroke="currentColor"
								stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<line x1="12" x2="12" y1="2" y2="22" />
								<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
							</svg>
						</div>
						<div class="grow">
							<p class="text-xs tracking-wide text-gray-600 uppercase dark:text-neutral-500">
								Paid Invoices Total
							</p>
							<h3
								class="mt-2 text-xl font-medium text-gray-700 sm:text-2xl lg:text-3xl dark:text-neutral-200">
								{{ Illuminate\Support\Number::abbreviate($paidInvoicesTotal) }}
							</h3>
						</div>
					</div>
				</div>

				<!-- Current Invoices Total -->
				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex flex-col gap-4 p-4 lg:items-center md:p-6 lg:flex-row">
						<div
							class="flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-lg shrink-0 dark:bg-neutral-800">
							<svg xmlns="http://www.w3.org/2000/svg"
								class="w-6 h-6 text-indigo-800 dark:text-neutral-400" fill="none" stroke="currentColor"
								stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<line x1="12" x2="12" y1="2" y2="22" />
								<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
							</svg>
						</div>
						<div class="grow">
							<p class="text-xs tracking-wide text-gray-600 uppercase dark:text-neutral-500">
								Current Invoices Total
							</p>
							<h3
								class="mt-2 text-xl font-medium text-gray-700 sm:text-2xl lg:text-3xl dark:text-neutral-200">
								{{ Illuminate\Support\Number::abbreviate($currentInvoicesTotal) }}
							</h3>
						</div>
					</div>
				</div>


			</div>


		</div>
	</section>

	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
			<div class="flex items-center justify-between">
				<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
					{{ __('Invoices') }}
				</h2>
				<x-secondary-button href="{{ route('invoices.index') }}">
					View All
				</x-secondary-button>
			</div>

			<div class="space-y-3">
				@forelse ($invoices as $invoice)
					<x-invoices.list-item :invoice="$invoice" />
				@empty
					<x-invoices.empty />
				@endforelse
			</div>

		</div>
	</div>
</x-layouts.sidebar>