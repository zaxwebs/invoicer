<div class="bg-white border border-gray-200 dark:bg-gray-800 sm:rounded-lg">
	<div class="p-6 py-2 border-b">
		<div class="flex items-center justify-between">
			<h3 class="text-base font-medium text-gray-900 dark:text-gray-100">Notes</h3>
			<div>
				<x-secondary-button class="!py-2" x-data=""
					x-on:click.prevent="$dispatch('open-modal', 'create-note')">Add Note</x-secondary-button>
				<x-modal name="create-note" max-width="xl">
					<header>
						<h3 class="font-bold text-gray-800 dark:text-white">
							{{ !$noteId ? 'Add a Note' : 'Edit Note' }}
						</h3>
						<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
							{{ __("Save and track additional information about this invoice. Notes are private and only visible to you.") }}
						</p>
					</header>

					<div class="mt-6 space-y-6">
						<div>
							<x-textarea name="content" wire:model.defer="content" class="block w-full mt-1"
								autofocus>{{ old('content') }}</x-textarea>
							<x-input-error class="mt-2" :messages="$errors->get('content')" />
						</div>
						<div class="flex gap-3">
							@if (!$noteId)
								<x-primary-button wire:click="create">{{ __('Create') }}</x-primary-button>
							@else
								<x-primary-button wire:click="update">{{ __('Update') }}</x-primary-button>
								<x-secondary-button wire:click="delete">{{ __('Delete') }}</x-secondary-button>
							@endif
							<x-secondary-button wire:click="cancelCreate">{{ __('Cancel') }}</x-secondary-button>
						</div>
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
					<div class="mt-1 text-sm tracking-wider text-gray-700">
						<span x-data="{ date: '{{ $note->created_at->toISOString() }}' }" x-timeago="date"></span>
					</div>
				</div>
				<button wire:click="edit({{ $note->id }})" type="button"
					class="flex items-center justify-center text-sm font-semibold text-gray-500 bg-white border border-gray-200 rounded-lg size-8 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						class="shrink-0 size-4">
						<circle cx="12" cy="12" r="1" />
						<circle cx="12" cy="5" r="1" />
						<circle cx="12" cy="19" r="1" />
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