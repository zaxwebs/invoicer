<x-layouts.sidebar>
	<x-slot name="header">

		<div class="flex items-center justify-between">
			<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
				{{ __('Customers') }}
			</h2>
			<x-primary-button href="{{ route('customers.create') }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
					class="shrink-0 size-4">
					<path d="M5 12h14" />
					<path d="M12 5v14" />
				</svg>
				Create
			</x-primary-button>
		</div>
	</x-slot>

	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

			<div class="space-y-4">
				<div class="grid gap-4 lg:grid-cols-2 2xl:grid-cols-3">
					@foreach ($customers as $customer)
						<x-link class="block" href="{{ route('customers.show', $customer) }}">
							<div class="p-4 bg-white border border-gray-200 sm:p-8 dark:bg-gray-800 sm:rounded-2xl">
								<div class="grid items-center gap-4">
									<div class="flex items-center flex-1 gap-4">
										<x-avatar :customer="$customer" />
										<div class="space-y-0.5">
											<div class="font-normal">{{ $customer->name }}</div>
											<div class="text-gray-500">{{ $customer->email }}</div>
										</div>
									</div>
								</div>
							</div>
						</x-link>
					@endforeach
				</div>
				@if($customers->isEmpty())
					<x-tile>
						<div class="text-sm text-gray-500">
							{{ __('No customers found.') }}
						</div>
					</x-tile>
				@endif
				{{ $customers->links() }}
			</div>


		</div>


		</x-app-layout>