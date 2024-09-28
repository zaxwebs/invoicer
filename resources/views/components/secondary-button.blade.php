@props(['href' => null])

@php
	$classes = 'py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700';
@endphp

@if ($href)
	<x-link href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
		{{ $slot }}
	</x-link>
@else
	<button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}>
		{{ $slot }}
	</button>
@endif