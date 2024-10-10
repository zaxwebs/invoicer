<x-layouts.sidebar>
	<x-slot name="header">
		<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Settings') }}
		</h2>
	</x-slot>

	<div class="px-4 py-12 mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
		<div class="p-4 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 sm:p-8">
			<div class="max-w-xl">
				@include('settings.partials.update-basic-information-form')
			</div>
		</div>
	</div>
</x-layouts.sidebar>