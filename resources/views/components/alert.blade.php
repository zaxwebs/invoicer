@props(['id' => 'alert'])

@if($alert = session($id))
	@php
		$baseClasses = 'p-4 text-sm border rounded-lg';
		$typeClasses = match ($alert['type']) {
			'success' => 'text-teal-800 border-teal-500 bg-teal-50',
			'info' => 'text-blue-800 border-blue-500 bg-blue-50',
			'warning' => 'text-yellow-800 border-yellow-500 bg-yellow-50',
			'danger' => 'text-red-800 border-red-500 bg-red-50',
		};
	@endphp

	<div {{ $attributes->merge(['class' => "$baseClasses $typeClasses"]) }} role="alert">
		<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
			{{ $alert['message'] }}
		</div>
	</div>
@endif
