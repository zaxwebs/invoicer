<x-layouts.sidebar>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Edit Customer') }}
		</h2>
	</x-slot>

	<div class="px-4 py-12 mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
		<div class="p-4 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 sm:p-8">
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

					<form method="post" action="{{ route('customers.update', $customer) }}" class="mt-6 space-y-6"
						enctype="multipart/form-data">
						@csrf
						@method('put')

						<!-- Name -->
						<div>
							<x-input-label for="name" :value="__('Name')" />
							<x-text-input id="name" name="name" type="text" class="block w-full mt-1"
								:value="old('name', $customer->name)" required autofocus autocomplete="name" />
							<x-input-error class="mt-2" :messages="$errors->get('name')" />
						</div>

						<!-- Email -->
						<div>
							<x-input-label for="email" :value="__('Email')" />
							<x-text-input id="email" name="email" type="email" class="block w-full mt-1"
								:value="old('email', $customer->email)" required />
							<x-input-error class="mt-2" :messages="$errors->get('email')" />
						</div>

						<!-- Phone -->
						<div>
							<x-input-label for="phone" :value="__('Phone')" />
							<x-text-input id="phone" name="phone" type="tel" class="block w-full mt-1"
								:value="old('phone', $customer->phone)" />
							<x-input-error class="mt-2" :messages="$errors->get('phone')" />
						</div>

						<!-- Address -->
						<div>
							<x-input-label for="address" :value="__('Address')" />
							<x-textarea id="address" name="address" class="block w-full mt-1">
								{{ old('address', $customer->address) }}
							</x-textarea>
							<x-input-error class="mt-2" :messages="$errors->get('address')" />
						</div>

						<!-- Image -->
						<div>
							<x-input-label for="image" :value="__('Image')" />
							<x-dp-input class="block w-full mt-1" name="image"></x-dp-input>
							<x-input-error class="mt-2" :messages="$errors->get('image')" />
						</div>

						<!-- Submit Button -->
						<div class="flex items-center gap-4">
							<x-primary-button>{{ __('Update Customer') }}</x-primary-button>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</x-layouts.sidebar>