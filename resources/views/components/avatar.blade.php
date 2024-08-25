@props(['customer'])

<img class="inline-block object-cover border border-gray-100 rounded-full size-16"
	src="{{ $customer->image ? asset('storage/' . $customer->image) : asset('images/user-avatar.svg') }}"
	alt="{{ $customer->name }}" />