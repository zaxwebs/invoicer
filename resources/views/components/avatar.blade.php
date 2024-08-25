@props(['customer'])

@php
	$imageUrl = $customer->image
		? asset('storage/' . $customer->image)
		: asset('images/user-avatar.svg');
@endphp

<img class="inline-block object-cover border border-gray-100 rounded-xl size-20" src="{{ $imageUrl }}"
	alt="{{ $customer->name }}" />