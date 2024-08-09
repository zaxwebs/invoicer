<section>
	<header>
		<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
			{{ __('Invoice Contact Information') }}
		</h2>

		<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
			{{ __("Update your information and contact details.") }}
		</p>
	</header>

	<form method="post" action="{{ route('settings.update') }}" class="mt-6 space-y-6">
		@csrf
		@method('patch')

		<div>
			<x-input-label for="name" :value="__('Name')" />
			<x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $settings->name)" required autofocus autocomplete="name" />
			<x-input-error class="mt-2" :messages="$errors->get('name')" />
		</div>

		<div>
			<x-input-label for="email" :value="__('Email')" />
			<x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $settings->email)" required />
			<x-input-error class="mt-2" :messages="$errors->get('email')" />
		</div>

		<div>
			<x-input-label for="phone" :value="__('Phone')" />
			<x-text-input id="phone" name="phone" type="tel" class="block w-full mt-1" :value="old('phone', $settings->phone)" required />
			<x-input-error class="mt-2" :messages="$errors->get('phone')" />
		</div>

		<div>
			<x-input-label for="address" :value="__('Address')" />
			<x-textarea id="address" name="address"
				class="block w-full mt-1">{{ old('address', $settings->address) }}</x-textarea>
			<x-input-error class="mt-2" :messages="$errors->get('address')" />
		</div>

		<div>
			<x-input-label for="website" :value="__('Website')" />
			<x-text-input id="website" name="website" type="url" class="block w-full mt-1" :value="old('website', $settings->website)" required />
			<x-input-error class="mt-2" :messages="$errors->get('website')" />
		</div>

		<div class="flex items-center gap-4">
			<x-primary-button>{{ __('Save') }}</x-primary-button>

			@if (session('status') === 'profile-updated')
				<p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
					class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
			@endif
		</div>
	</form>
</section>