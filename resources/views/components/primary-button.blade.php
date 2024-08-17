@props(['href' => null])

@php
	$classes = 'py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none';
@endphp

@if ($href)
	<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
		{{ $slot }}
	</a>
@else
	<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
		{{ $slot }}
	</button>
@endif