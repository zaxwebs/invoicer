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
				<div class="flex flex-col gap-6">

					<div class="flex items-center gap-4">
						<x-avatar :customer="$customer" />
						<div class="space-y-0.5">
							<div class="font-normal">{{ $customer->name }}</div>
							<div class="text-gray-500">Customer</div>
						</div>
					</div>

					<div class="flex gap-4">
						<x-secondary-button href="{{ 'tel:' . $customer->phone }}">Phone</x-secondary-button>
						<x-secondary-button href="{{ 'mailto:' . $customer->email }}">Email</x-secondary-button>
					</div>

					<div class="flex flex-col gap-4">
						<div class="flex flex-col flex-1 gap-2">
							<div class="text-sm text-gray-500">Email</div>
							<div>{{ $customer->email }}</div>
						</div>
						<div class="flex flex-col flex-1 gap-2">
							<div class="text-sm text-gray-500">Phone</div>
							<div>{{ $customer->phone }}</div>
						</div>
						<div class="flex flex-col flex-1 gap-2">
							<div class="text-sm text-gray-500">Address</div>
							<div class="whitespace-pre-line">{{ $customer->address }}</div>
						</div>
					</div>
				</div>
			</div>

			<div class="flex items-center justify-between">
				<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
					{{ __('Invoices') }}
				</h2>
				<x-secondary-button href="{{ route('invoices.create') }}">Create</x-secondary-button>
			</div>

			<div class="space-y-3">

				@foreach ($invoices as $invoice)
					<x-invoices.list-item :invoice="$invoice" />
				@endforeach
			</div>
		</div>
	</div>
</x-app-layout>