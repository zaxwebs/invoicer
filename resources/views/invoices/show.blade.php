<x-layouts.sidebar>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<div class="flex items-center gap-4">
				<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
					Invoice — <span
						class="text-sm font-normal tracking-wider text-gray-500">{{ $invoice->invoice_number }}</span>
				</h2>
				<a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
					href="{{ route('invoices.download', ['invoice' => $invoice->invoice_number]) }}">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						class="size-4">
						<path d="M12 17V3" />
						<path d="m6 11 6 6 6-6" />
						<path d="M19 21H5" />
					</svg>
					Invoice PDF
				</a>
			</div>

			<div class="flex gap-2">
				@foreach ($invoice->statuses as $status)
					<x-status-badge :status="$status" />
				@endforeach
			</div>
		</div>
	</x-slot>
	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
			<div class="grid gap-6 lg:grid-cols-6">
				<div class="lg:col-span-4">
					<div class="overflow-hidden border border-gray-200 rounded-xl">
						<x-invoice :invoice="$invoice" :settings="$settings" />
					</div>
					<!-- Buttons -->
					<!-- <div class="flex justify-end mt-6 gap-x-3">
						<a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
							href="#">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
								viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
								stroke-linecap="round" stroke-linejoin="round">
								<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
								<polyline points="7 10 12 15 17 10" />
								<line x1="12" x2="12" y1="15" y2="3" />
							</svg>
							Invoice PDF
						</a>
						<a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
							href="#">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
								viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
								stroke-linecap="round" stroke-linejoin="round">
								<polyline points="6 9 6 2 18 2 18 9" />
								<path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
								<rect width="12" height="8" x="6" y="14" />
							</svg>
							Print
						</a>
					</div> -->
					<!-- End Buttons -->
				</div>
				<div class="space-y-6 lg:col-span-2">
					<form action="{{ route('invoices.update-status', $invoice->id) }}" method="POST">
						@csrf
						@method('PATCH')
						<div class="flex gap-2">
							<x-select name="status" class="form-select" required>
								@foreach(\App\Enums\InvoiceStatus::fillableStatuses() as $status)
									<option value="{{ $status->value }}" {{ $invoice->status->value === $status->value ? 'selected' : '' }}>
										{{ $status->label() }}
									</option>
								@endforeach
							</x-select>
							<x-primary-button class="whitespace-nowrap">Update Status</x-primary-button>
						</div>
					</form>
					<x-link class="block" href="{{ route('customers.show', $invoice->customer) }}">
						<div
							class="flex items-center gap-4 p-6 bg-white border border-gray-200 dark:bg-gray-800 sm:rounded-lg">
							<x-avatar :customer="$invoice->customer" class="size-14" />
							<div>
								<div>{{ $invoice->customer->name }}</div>
								<div class="text-gray-500">{{ $invoice->customer->email }}</div>
							</div>
						</div>
					</x-link>
					<livewire:notes :invoice-id="$invoice->id"></livewire:notes>
				</div>

			</div>
		</div>

</x-layouts.sidebar>