@props(['invoice'])

<x-link class="block" href="{{ route('invoices.show', $invoice->invoice_number) }}">
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
</x-link>