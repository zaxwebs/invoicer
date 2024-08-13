<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Edit Customer') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
			<div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
				<div class="max-w-xl">
					<section>
						<header>
							<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
								{{ __('Customer Information') }}
							</h2>

							<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
								{{ __("Update the customer's details below.") }}
							</p>
						</header>

						<form method="post" action="{{ route('customers.update', $customer) }}" class="mt-6 space-y-6">
							@csrf
							@method('put')
							<div>
								<x-input-label for="name" :value="__('Name')" />
								<x-text-input id="name" name="name" type="text" class="block w-full mt-1"
									:value="old('name', $customer->name)" required autofocus autocomplete="name" />
								<x-input-error class="mt-2" :messages="$errors->get('name')" />
							</div>

							<div>
								<x-input-label for="email" :value="__('Email')" />
								<x-text-input id="email" name="email" type="email" class="block w-full mt-1"
									:value="old('email', $customer->email)" required />
								<x-input-error class="mt-2" :messages="$errors->get('email')" />
							</div>

							<div>
								<x-input-label for="phone" :value="__('Phone')" />
								<x-text-input id="phone" name="phone" type="tel" class="block w-full mt-1"
									:value="old('phone', $customer->phone)" />
								<x-input-error class="mt-2" :messages="$errors->get('phone')" />
							</div>

							<div>
								<x-input-label for="address" :value="__('Address')" />
								<x-textarea id="address" name="address"
									class="block w-full mt-1">{{ old('address', $customer->address) }}</x-textarea>
								<x-input-error class="mt-2" :messages="$errors->get('address')" />
							</div>

							<div class="flex items-center gap-4">
								<x-primary-button>{{ __('Save') }}</x-primary-button>

								@if (session('status') === 'customer-updated')
									<p x-data="{ show: true }" x-show="show" x-transition
										x-init="setTimeout(() => show = false, 2000)"
										class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
								@endif
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>