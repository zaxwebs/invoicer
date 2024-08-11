<?php

namespace App\Models;

use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
	use HasFactory;

	protected $guarded = [];

	protected $casts = [
		'status' => InvoiceStatus::class,
		'customer_details' => 'object',
		'issuer_details' => 'object',
		'items' => 'array',
	];

	private function isOverdue(): bool
	{
		$dueDate = Carbon::parse($this->due_date);
		return Carbon::now()->greaterThan($dueDate);
	}

	private function isPendingPayment(): bool
	{
		return $this->status === InvoiceStatus::ISSUED || $this->status === InvoiceStatus::PARTIALLY_PAID;
	}

	private function calculateStatuses(): array
	{
		$statuses = [$this->status];

		if ($this->isOverdue() && $this->isPendingPayment()) {
			array_unshift($statuses, InvoiceStatus::OVERDUE);
		}

		return $statuses;
	}

	protected function statuses(): Attribute
	{
		return Attribute::make(
			get: fn() => $this->calculateStatuses(),
		);
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	protected static function boot()
	{
		parent::boot();

		static::saving(function (self $invoice) {
			$invoice->calculateTotals();
		});
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
