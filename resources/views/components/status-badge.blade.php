@use('App\Enums\InvoiceStatus')

@props(['status'])

<div {{ $attributes->class(['text-blue-800 bg-blue-100' => $status === InvoiceStatus::ISSUED, 'text-green-800 bg-teal-100' => $status === InvoiceStatus::PAID, 'text-sky-800 bg-sky-100' => $status === InvoiceStatus::PARTIALLY_PAID, 'text-red-800 bg-fuchsia-100' => $status === InvoiceStatus::OVERDUE, 'text-gray-800 bg-gray-100' => $status === InvoiceStatus::REFUNDED || $status === InvoiceStatus::CANCELLED])->merge(['class' => 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-sm font-medium whitespace-nowrap']) }}>
	{{ $status->label() }}
</div>