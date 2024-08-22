<div class="bg-white shadow dark:bg-gray-800 sm:rounded-lg">
	<div class="p-6 py-3 border-b">
		<div class="flex items-center justify-between">
			<h3 class="text-base font-medium text-gray-900 dark:text-gray-100">Notes</h3>
			@include('invoices.partials.create-note-modal')
		</div>
	</div>
	<div class="p-6 space-y-4">
		@if ($invoice->notes->isEmpty())
			<div class="text-center text-gray-500 dark:text-gray-400">
				<p>Add a note to track additional information.</p>
			</div>
		@else
			@foreach ($invoice->notes as $note)
				<div>
					<div class="flex w-full gap-3">
						<div class="flex flex-col flex-1 gap-1">
							<div class="flex-1">{{ $note->content }}</div>
							<div class="text-sm tracking-wider text-gray-500">
								<span x-data="{ date: '{{ $note->created_at->toISOString() }}' }" x-timeago="date"></span>
							</div>
						</div>
						<div>
							<form action="{{ route('notes.destroy', $note->id) }}" method="POST"
								onsubmit="return confirm('Are you sure you want to delete this note?');">
								@csrf
								@method('DELETE')
								<x-secondary-button type="submit">
									<svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
										viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
										<path d="M3 6h18" />
										<path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
										<path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
									</svg>
								</x-secondary-button>
							</form>
						</div>
					</div>
				</div>
			@endforeach
		@endif
	</div>
</div>