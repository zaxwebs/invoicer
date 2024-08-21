<form id="create-customer-form" wire:submit="submit" class="space-y-6">
	<div>
		<x-input-label for="name" :value="__('Name')" />
		<x-text-input id="name" wire:model="name" type="text" class="block w-full mt-1" required autofocus
			autocomplete="name" />
		@error('name') <span class="text-red-600">{{ $message }}</span> @enderror
	</div>

	<div>
		<x-input-label for="email" :value="__('Email')" />
		<x-text-input id="email" wire:model="email" type="email" class="block w-full mt-1" required />
		@error('email') <span class="text-red-600">{{ $message }}</span> @enderror
	</div>

	<div>
		<x-input-label for="phone" :value="__('Phone')" />
		<x-text-input id="phone" wire:model="phone" type="tel" class="block w-full mt-1" />
		@error('phone') <span class="text-red-600">{{ $message }}</span> @enderror
	</div>

	<div>
		<x-input-label for="address" :value="__('Address')" />
		<x-textarea id="address" wire:model="address" class="block w-full mt-1"></x-textarea>
		@error('address') <span class="text-red-600">{{ $message }}</span> @enderror
	</div>

	<div class="empty:hidden" id="create-customer-form-actions"></div>

	<template x-teleport="{{ $modal ? '#modal-actions' : '#create-customer-form-actions' }}">
		<div class="flex items-center gap-x-2">
			<x-primary-button form="create-customer-form">{{ __('Create') }}</x-primary-button>
		</div>
	</template>

</form>