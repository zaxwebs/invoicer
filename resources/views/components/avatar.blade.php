@props(['customer'])

@php
	$classes = 'inline-block object-cover border border-gray-100 rounded-xl size-20 bg-white';
@endphp

<img {{ $attributes->merge(['class' => $classes]) }} src="{{ asset($customer->image) }}" alt="{{ $customer->name }}" />