<x-app-layout>
	<x-slot name="header">

		<div class="flex items-center justify-between">
			<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
				{{ $customer->name }}
			</h2>
			<x-primary-button href="{{ route('customers.edit', $customer->id) }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
					class="shrink-0 size-4">
					<path
						d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
					<path d="m15 5 4 4" />
				</svg>
				{{ __('Edit') }}
			</x-primary-button>
		</div>
	</x-slot>
	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
			<div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
				<div class="flex flex-col justify-between gap-6 lg:flex-row">

					<div class="flex flex-col justify-between gap-6">
						<div class="flex items-center gap-4">
							<x-avatar :customer="$customer" />
							<div class="space-y-0.5">
								<div class="font-normal">{{ $customer->name }}</div>
								<div class="text-gray-500">Customer</div>
							</div>
						</div>

						<div class="flex gap-4">
							<x-secondary-button href="{{ 'tel:' . $customer->phone }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="shrink-0 size-4">
									<path
										d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
								</svg>
								Call Now
							</x-secondary-button>
							<x-secondary-button href="{{ 'mailto:' . $customer->email }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="shrink-0 size-4">
									<rect width="20" height="16" x="2" y="4" rx="2" />
									<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
								</svg>
								Send Email
							</x-secondary-button>
						</div>
					</div>


					<div class="grid grid-cols-1 gap-6 gap-x-12 lg:grid-cols-2">
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
						@if ($customer->website)
							<div class="flex flex-col flex-1 gap-2">
								<div class="text-sm text-gray-500">Website</div>
								<div>{{ $customer->website }}</div>
							</div>
						@endif
					</div>
				</div>
			</div>

			<div class="flex items-center justify-between">
				<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
					{{ __('Invoices') }}
				</h2>
				<x-secondary-button href="{{ route('invoices.create', ['customer_id' => $customer->id]) }}">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						class="shrink-0 size-4">
						<path d="M5 12h14" />
						<path d="M12 5v14" />
					</svg>
					Create
				</x-secondary-button>
			</div>

			<div class="space-y-3">
				@foreach ($invoices as $invoice)
					<x-invoices.list-item :invoice="$invoice" />
				@endforeach
			</div>
		</div>
	</div>
</x-app-layout>