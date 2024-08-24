<?php

namespace App\Models;

use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Support\Carbon;
use App\Services\InvoiceService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
	use HasFactory;

	protected $guarded = [];

	protected $casts = [
		'status' => InvoiceStatus::class,
		'customer_details' => 'array',
		'issuer_details' => 'array',
		'items' => 'array',
	];

	protected $activeStatuses = [InvoiceStatus::ISSUED, InvoiceStatus::PARTIALLY_PAID];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function notes()
	{
		return $this->hasMany(Note::class);
	}

	protected function statuses(): Attribute
	{
		return Attribute::make(
			get: fn() => $this->calculateStatuses(),
		);
	}

	public function scopeOverdue(Builder $query)
	{
		return $query
			->where('status', $this->activeStatuses)
			->where('due_date', '<', Carbon::now()->toDateString());
	}

	protected static function boot()
	{
		parent::boot();

		static::creating(function (self $invoice) {
			$invoice->calculateTotals();
			$invoice->invoice_number = InvoiceService::generateUniqueInvoiceNumber();
		});
	}

	private function isOverdue(): bool
	{
		return Carbon::now()->greaterThan($this->due_date);
	}

	private function isActive(): bool
	{
		return in_array($this->status, $this->activeStatuses);
	}

	private function calculateStatuses(): array
	{
		$status = $this->status;
		$isOverdue = $this->isOverdue();
		$isActive = $this->isActive();

		if ($status === InvoiceStatus::ISSUED) {
			return $isOverdue ? [InvoiceStatus::OVERDUE] : [$status];
		}

		return $isOverdue && $isActive ? [$status, InvoiceStatus::OVERDUE] : [$status];
	}

	protected function calculateTotals()
	{
		$items = collect($this->items)->map(function ($item) {
			$item['total'] = $item['rate'] * $item['quantity'];
			return $item;
		});

		$this->items = $items;
		$this->total = $items->sum('total');
	}
}
