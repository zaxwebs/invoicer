<x-layouts.sidebar>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Create Invoice') }}
		</h2>
	</x-slot>



	<div class="px-4 py-12 mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
		{{-- TODO: Handle errors better --}}
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="p-4 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 sm:p-8">
			<div>
				<section>
					<header>
						<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
							{{ __('Invoice Information') }}
						</h2>

						<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
							{{ __("Fill out the details below to create a new invoice.") }}
						</p>
					</header>

					<form method="post" action="{{ route('invoices.store') }}" class="mt-6 space-y-6">
						@csrf
						<div>
							<x-input-label for="customer_id" :value="__('Customer')" />
							<x-select id="customer_id" name="customer_id" class="block w-full mt-1" autofocus>
								<option disabled selected>Select a Customer</option>
								@foreach($customers as $customer)
									<option value="{{ $customer->id }}" {{ request()->query('customer_id') == $customer->id ? 'selected' : '' }}>
										{{ $customer->name }}
									</option>
								@endforeach
							</x-select>
							<x-input-error class="mt-2" :messages="$errors->get('customer_id')" />
						</div>

						<div>
							<x-input-label for="due_date" :value="__('Due Date')" />
							<x-text-input id="due_date" name="due_date" type="date" class="block w-full mt-1"
								:value="old('due_date', $due_date)" required />
							<x-input-error class="mt-2" :messages="$errors->get('due_date')" />
						</div>

						@include('invoices.partials.invoice-items-form')

						<div class="flex items-center gap-4">
							<x-primary-button>{{ __('Create Invoice') }}</x-primary-button>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</x-layouts.sidebar>