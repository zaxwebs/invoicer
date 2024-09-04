<div class="bg-white shadow dark:bg-gray-800 sm:rounded-lg">
	<div class="p-6 py-2 border-b">
		<div class="flex items-center justify-between">
			<h3 class="text-base font-medium text-gray-900 dark:text-gray-100">Notes</h3>
			<div>
				<x-secondary-button class="!py-2" x-data=""
					x-on:click.prevent="$dispatch('open-modal', 'create-note')">Add Note</x-secondary-button>
				<x-modal name="create-note" max-width="xl">
					<div class="p-6">
						<header>
							<h3 class="font-bold text-gray-800 dark:text-white">
								Add a Note
							</h3>
							<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
								{{ __("Save and track additional information about this invoice. Notes are private and only visible to you.") }}
							</p>
						</header>

						<form wire:submit.prevent="create" class="mt-6 space-y-6">
							<div>
								<x-textarea name="content" wire:model.defer="content" class="block w-full mt-1"
									autofocus>{{ old('content') }}</x-textarea>
								<x-input-error class="mt-2" :messages="$errors->get('content')" />
							</div>
							<div class="flex gap-3">
								<x-primary-button>{{ __('Save') }}</x-primary-button>
								<x-secondary-button wire:click="cancelCreate">{{ __('Cancel') }}</x-secondary-button>
							</div>
						</form>
					</div>
				</x-modal>
			</div>
		</div>
	</div>
	<div class="p-6 space-y-4">
		@forelse ($notes as $note)
			<div class="flex gap-3" wire:key="{{ $note->id }}">
				<div class="flex-1">
					<div>{{ $note->content }}</div>
					<div class="mt-1 text-sm tracking-wider text-gray-500">
						<span x-data="{ date: '{{ $note->created_at->toISOString() }}' }" x-timeago="date"></span>
					</div>
				</div>
				<button wire:click="delete({{ $note->id }})" type="button"
					class="flex items-center justify-center text-sm font-semibold text-gray-400 bg-white border border-gray-200 rounded-lg shadow-sm hs-dropdown-toggle size-9 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
					aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						class="shrink-0 size-4">
						<path d="m7 21-4.3-4.3c-1-1-1-2.5 0-3.4l9.6-9.6c1-1 2.5-1 3.4 0l5.6 5.6c1 1 1 2.5 0 3.4L13 21" />
						<path d="M22 21H7" />
						<path d="m5 11 9 9" />
					</svg>
				</button>
			</div>
		@empty
			<p class="text-sm text-gray-500 dark:text-gray-400">
				{{ __('No notes found.') }}
			</p>
		@endforelse
	</div>
</div>