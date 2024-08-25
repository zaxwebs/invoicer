<x-app-layout>
	<x-slot name="header">

		<div class="flex items-center justify-between">
			<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
				{{ __('Customers') }}
			</h2>
			<x-primary-button href="{{ route('customers.create') }}">Create</x-primary-button>
		</div>
	</x-slot>

	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

			<div class="space-y-3">
				@foreach ($customers as $customer)
					<x-link class="block" href="{{ route('customers.edit', $customer) }}">
						<div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
							<div class="grid gap-4 md:grid-cols-3">
								<div class="flex items-center flex-1 gap-4">
									<x-avatar :customer="$customer" />
									<div class="font-medium">{{ $customer->name }}</div>
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