<x-app-layout>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
				{{ __('Invoices') }}
			</h2>
			<x-primary-button href="{{ route('invoices.create') }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
					class="shrink-0 size-4">
					<path d="M5 12h14" />
					<path d="M12 5v14" />
				</svg>
				Create</x-primary-button>
		</div>
	</x-slot>

	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

			<div class="flex justify-end">
				<form class="flex max-w-sm gap-6" action="{{ route('invoices.index') }}" method="GET" x-data
					x-on:change="$el.submit()">
					<div class="flex items-center gap-3">
						<x-input-label for="status">Sort</x-input-label>
						<x-select name="sort" class="form-select" required>
							<option value="created_at" {{ request()->query('sort') == 'created_at' ? 'selected' : '' }}>
								Latest
							</option>
							<option value="due_date" {{ request()->query('sort') == 'due_date' ? 'selected' : '' }}>
								Due Date
							</option>
							<option value="total" {{ request()->query('sort') == 'total' ? 'selected' : '' }}>
								Total
							</option>
						</x-select>
					</div>
					<div class="flex items-center gap-3">
						<x-input-label for="status">Status</x-input-label>
						<x-select name="status" class="form-select" required>
							<option value="all" {{ request()->query('status') == 'all' ? 'selected' : '' }}>
								All
							</option>
							@foreach(\App\Enums\InvoiceStatus::cases() as $status)
								<option value="{{ $status->value }}" {{ request()->query('status') == $status->value ? 'selected' : '' }}>
									{{ $status->label() }}
								</option>
							@endforeach
						</x-select>
					</div>
				</form>
			</div>

			<div class="space-y-3">
				@foreach ($invoices as $invoice)
					<x-invoices.list-item :invoice="$invoice" />
				@endforeach
			</div>

			{{ $invoices->links() }}

		</div>


	</div>


</x-app-layout>