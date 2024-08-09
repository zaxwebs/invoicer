<x-app-layout>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

			<div class="space-y-3">
				@foreach ($invoices as $invoice)
					<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
						<div class="grid gap-4 md:grid-cols-5">
							<div class="flex gap-2 flex-col flex-1">
								<div class="text-sm text-gray-500">Number</div>
								<div>{{ strtoupper($invoice->invoice_number) }}</div>
							</div>
							<div class="flex gap-2 flex-col flex-1">
								<div class="text-sm text-gray-500">Billed To</div>
								<div>{{ $invoice->customer->name }}</div>
							</div>
							<div class="flex gap-2 flex-col flex-1">
								<div class="text-sm text-gray-500">Due Date</div>
								<div>{{ $invoice->due_date }}</div>
							</div>
							<div class="flex gap-2 flex-col flex-1">
								<div class="text-sm text-gray-500">Total</div>
								<div class="font-bold">$1,200</div>
							</div>
							<div class="flex gap-2 flex-col flex-1 md:items-end">
								<div class="text-sm text-gray-500">Status</div>
								<div>{{ $invoice->status }}</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>


		</div>


	</div>


</x-app-layout>