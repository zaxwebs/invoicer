@use('App\Enums\InvoiceStatus')

@props(['status'])

<div {{ $attributes->class(['text-blue-700 bg-blue-100' => $status === InvoiceStatus::ISSUED, 'text-green-700 bg-teal-100' => $status === InvoiceStatus::PAID, 'text-sky-700 bg-sky-100' => $status === InvoiceStatus::PARTIALLY_PAID, 'text-pink-700 bg-fuchsia-100' => $status === InvoiceStatus::OVERDUE, 'text-gray-700 bg-gray-100' => $status === InvoiceStatus::REFUNDED || $status === InvoiceStatus::CANCELLED])->merge(['class' => 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-sm font-medium whitespace-nowrap']) }}>
	@if ($status === InvoiceStatus::ISSUED)
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
			stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 size-4">
			<polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
			<polyline points="16 7 22 7 22 13" />
		</svg>
	@endif
	@if ($status === InvoiceStatus::PAID)
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
			stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 size-4">
			<path
				d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
			<path d="m9 12 2 2 4-4" />
		</svg>
	@endif
	@if ($status === InvoiceStatus::PARTIALLY_PAID)
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
			stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 size-4">
			<path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
			<path d="m9 9.5 2 2 4-4" />
		</svg>
	@endif
	@if ($status === InvoiceStatus::REFUNDED)
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
			stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 size-4">
			<path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
			<path d="M3 3v5h5" />
		</svg>
	@endif
	@if ($status === InvoiceStatus::OVERDUE)
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
			stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 size-4">
			<circle cx="12" cy="12" r="10" />
			<polyline points="12 6 12 12 16 14" />
		</svg>
	@endif
	@if ($status === InvoiceStatus::CANCELLED)
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
			stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 size-4">
			<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
			<polyline points="16 17 21 12 16 7" />
			<line x1="21" x2="9" y1="12" y2="12" />
		</svg>
	@endif

	{{ $status->label() }}
</div>