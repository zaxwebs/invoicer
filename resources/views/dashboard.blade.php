<x-app-layout>
	<x-slot name="header">
		<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Dashboard') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

			<div class="grid gap-4 lg:grid-cols-4">
				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex p-4 md:p-5 gap-x-4">
						<div
							class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
							<svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400"
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
						</div>

						<div class="grow">
							<p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
								Total Invoices
							</p>
							<div class="mt-1">
								<h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
									{{ $totalInvoices }}
								</h3>
							</div>
						</div>
					</div>
				</div>

				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex p-4 md:p-5 gap-x-4">
						<div
							class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
							<svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400"
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
						</div>

						<div class="grow">
							<p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
								Paid Invoices
							</p>
							<div class="mt-1">
								<h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
									{{ $paidInvoices }}
								</h3>
							</div>
						</div>
					</div>
				</div>

				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex p-4 md:p-5 gap-x-4">
						<div
							class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
							<svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400"
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
						</div>

						<div class="grow">
							<p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
								Active Invoices
							</p>
							<div class="mt-1">
								<h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
									{{ $activeInvoices }}
								</h3>
							</div>
						</div>
					</div>
				</div>

				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex p-4 md:p-5 gap-x-4">
						<div
							class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
							<svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400"
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
						</div>

						<div class="grow">
							<p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
								Overdue Invoices
							</p>
							<div class="mt-1">
								<h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
									{{ $overdueInvoices }}
								</h3>
							</div>
						</div>
					</div>
				</div>



				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex p-4 md:p-5 gap-x-4">
						<div
							class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
							<svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400"
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
						</div>

						<div class="grow">
							<p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
								Total Customers
							</p>
							<div class="mt-1">
								<h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
									{{ $totalCustomers }}
								</h3>
							</div>
						</div>
					</div>
				</div>

				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex p-4 md:p-5 gap-x-4">
						<div
							class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
							<svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400"
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
						</div>

						<div class="grow">
							<p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
								Active Invoices Total
							</p>
							<div class="mt-1">
								<h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
									{{ Illuminate\Support\Number::abbreviate($activeInvoicesTotal) }}
								</h3>
							</div>
						</div>
					</div>
				</div>

				<div
					class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
					<div class="flex p-4 md:p-5 gap-x-4">
						<div
							class="shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-neutral-800">
							<svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400"
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
								<circle cx="9" cy="7" r="4"></circle>
								<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
							</svg>
						</div>

						<div class="grow">
							<p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
								Paid Invoices Total
							</p>
							<div class="mt-1">
								<h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
									{{ Illuminate\Support\Number::abbreviate($paidInvoicesTotal) }}
								</h3>
							</div>
						</div>
					</div>
				</div>

			</div>


		</div>
	</div>
</x-app-layout>