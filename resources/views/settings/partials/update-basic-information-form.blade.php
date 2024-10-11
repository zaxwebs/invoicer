<div class="px-4 py-12 mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
	<div class="p-4 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 sm:p-8">
		<section class="grid gap-6 2xl:grid-cols-3">
			<header>
				<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
					{{ __('Invoice Information') }}
				</h2>

				<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
					{{ __("Your information and contact details.") }}
				</p>
			</header>

			<div class="col-span-2">
				<form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data">
					@csrf
					@method('patch')

					<div class="space-y-6">
						<div class="grid gap-6 md:grid-cols-2">
							<!-- Name -->
							<div>
								<x-input-label for="name" :value="__('Name')" />
								<x-text-input id="name" name="name" type="text" class="block w-full mt-1"
									:value="old('name', $settings->name)" required autofocus autocomplete="name" />
								<x-input-error class="mt-2" :messages="$errors->get('name')" />
							</div>

							<!-- Email -->
							<div>
								<x-input-label for="email" :value="__('Email')" />
								<x-text-input id="email" name="email" type="email" class="block w-full mt-1"
									:value="old('email', $settings->email)" required />
								<x-input-error class="mt-2" :messages="$errors->get('email')" />
							</div>

							<!-- Phone -->
							<div>
								<x-input-label for="phone" :value="__('Phone')" />
								<x-text-input id="phone" name="phone" type="tel" class="block w-full mt-1"
									:value="old('phone', $settings->phone)" required />
								<x-input-error class="mt-2" :messages="$errors->get('phone')" />
							</div>

							<!-- Website -->
							<div>
								<x-input-label for="website" :value="__('Website')" />
								<x-text-input id="website" name="website" type="url" class="block w-full mt-1"
									:value="old('website', $settings->website)" required />
								<x-input-error class="mt-2" :messages="$errors->get('website')" />
							</div>
						</div>


						<!-- Address -->
						<div>
							<x-input-label for="address" :value="__('Address')" />
							<x-textarea id="address" name="address" class="block w-full mt-1">
								{{ old('address', $settings->address) }}
							</x-textarea>
							<x-input-error class="mt-2" :messages="$errors->get('address')" />
						</div>



						<!-- Logo -->
						<div>
							<x-input-label for="logo" :value="__('Logo')" />
							<x-dp-input class="block w-full mt-1" name="logo"></x-dp-input>
							<x-input-error class="mt-2" :messages="$errors->get('logo')" />
						</div>

						<!-- Submit Button -->
						<div class="flex items-center gap-4">
							<x-primary-button>{{ __('Save Settings') }}</x-primary-button>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>