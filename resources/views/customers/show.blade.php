<x-app-layout>
	<x-slot name="header">

		<div class="flex items-center justify-between">
			<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
				{{ $customer->name }}
			</h2>
			<x-primary-button href="{{ route('customers.edit', $customer->id) }}">{{ __('Edit') }}</x-primary-button>
		</div>
	</x-slot>
	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
			<div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
				<div class="flex items-center flex-1 gap-4">
					<x-avatar :customer="$customer" />
					<div class="space-y-0.5">
						<div class="font-normal">{{ $customer->name }}</div>
						<div class="text-gray-500">Customer</div>
					</div>
				</div>
			</div>


			<div class="space-y-3">
				@foreach ($invoices as $invoice)
					<x-invoices.list-item :invoice="$invoice" />
				@endforeach
			</div>
		</div>
	</div>
</x-app-layout>