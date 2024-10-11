<x-layouts.sidebar>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Settings') }}
		</h2>
	</x-slot>

	@include('settings.partials.update-basic-information-form')

</x-layouts.sidebar>