<x-app-layout>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
				{{ __('Invoices') }}
			</h2>
			<x-primary-button href="{{ route('invoices.create') }}">Create</x-primary-button>
		</div>
	</x-slot>

	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

			<div class="space-y-3">
				@foreach ($invoices as $invoice)
					<a class="block" href="{{ route('invoices.show', $invoice->invoice_number) }}">
						<div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
							<div class="grid items-center gap-4 md:grid-cols-3 lg:grid-cols-5">
								<div class="flex flex-col flex-1 gap-2">
									<div class="text-sm text-gray-500">Number</div>
									<div>{{ strtoupper($invoice->invoice_number) }}</div>
								</div>
								<div class="flex flex-col flex-1 gap-2">
									<div class="text-sm text-gray-500">Billed To</div>
									<div>{{ $invoice->customer->name }}</div>
								</div>
								<div class="flex flex-col flex-1 gap-2">
									<div class="text-sm text-gray-500">Due Date</div>
									<div>{{ $invoice->due_date }}</div>
								</div>
								<div class="flex flex-col flex-1 gap-2">
									<div class="text-sm text-gray-500">Total</div>
									<div class="text-lg font-medium md:text-base">
										<x-money value="{{ $invoice->total }}" />
									</div>
								</div>
								<div class="flex flex-col flex-1 gap-2 lg:items-end">
									<div class="text-sm text-gray-500 md:hidden">Status</div>
									<div class="flex gap-2">
										@foreach ($invoice->statuses as $status)
											<x-status-badge :status="$status" />
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</a>

				@endforeach
			</div>


		</div>


	</div>


</x-app-layout>