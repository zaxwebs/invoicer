<x-app-layout>
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

			<div class="space-y-3">
				@foreach ($customers as $customer)
					<x-link class="block" href="{{ route('customers.show', $customer) }}">
						<div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
							<div class="grid items-center gap-4 md:grid-cols-3">
								<div class="flex items-center flex-1 gap-4">
									<x-avatar :customer="$customer" />
									<div class="space-y-0.5">
										<div class="font-normal">{{ $customer->name }}</div>
										<div class="text-gray-500">Customer</div>
									</div>
								</div>
								<div class="flex flex-col flex-1 gap-2">
									<div class="text-sm text-gray-500">Email</div>
									<div>{{ $customer->email }}</div>
								</div>
								<div class="flex flex-col flex-1 gap-2">
									<div class="text-sm text-gray-500">Phone</div>
									<div>{{ $customer->phone }}</div>
								</div>
							</div>
						</div>
					</x-link>

				@endforeach
			</div>

			{{ $customers->links() }}
		</div>


	</div>


</x-app-layout>