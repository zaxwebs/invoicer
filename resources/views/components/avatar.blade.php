@props(['customer'])

<img class="inline-block object-cover border border-gray-100 rounded-xl size-20" src="{{ asset($customer->image) }}"
	alt="{{ $customer->name }}" />