<?php

namespace App\Models;

use App\Enums\InvoiceStatus;
use App\Services\InvoiceService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

	/**
	 * @var array<InvoiceStatus>
	 */
	protected $activeStatuses = [
		InvoiceStatus::ISSUED,
		InvoiceStatus::PARTIALLY_PAID,
	];

	/**
	 * @var array<InvoiceStatus>
	 */
	protected $inactiveStatuses = [
		InvoiceStatus::REFUNDED,
		InvoiceStatus::CANCELLED
	];

	public function customer(): BelongsTo
	{
		return $this->belongsTo(Customer::class);
	}

	public function notes(): HasMany
	{
		return $this->hasMany(Note::class);
	}

	protected function statuses(): Attribute
	{
		return Attribute::make(
			get: fn() => $this->resolveStatusList(),
		);
	}

	public function scopeOverdue(Builder $query): Builder
	{
		return $query
			->whereIn('status', $this->activeStatuses)
			->where('due_date', '<', now()->toDateString());
	}

	public function scopeStatus(Builder $query, string $status = 'all'): Builder
	{
		$validStatuses = array_column(InvoiceStatus::cases(), 'value');
		if (!in_array($status, $validStatuses)) {
			$status = 'all';
		}


		if ($status === 'all') {
			return $query;
		}

		if ($status === InvoiceStatus::OVERDUE->value) {
			return $this->scopeOverdue($query);
		}

		return $query->where('status', $status);
	}

	public function scopeSortBy(Builder $query, $field = 'name', $direction = 'desc'): Builder
	{
		$validSortFields = ['created_at', 'due_date', 'total'];
		$validDirections = ['asc', 'desc'];

		// Apply default sorting if the field is invalid
		if (!in_array($field, $validSortFields)) {
			$field = 'created_at';
		}

		// Apply default direction if invalid
		if (!in_array($direction, $validDirections)) {
			$direction = 'desc';
		}

		// Apply sorting
		return $query->orderBy($field, $direction);
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
		return $this->isActive() && now()->greaterThan($this->due_date);
	}

	private function isActive(): bool
	{
		return in_array($this->status, $this->activeStatuses);
	}

	private function resolveStatusList(): array
	{
		$isOverdue = $this->isOverdue();
		$status = $this->status;

		if ($status === InvoiceStatus::ISSUED) {
			return $isOverdue ? [InvoiceStatus::OVERDUE] : [$status];
		}

		return $isOverdue ? [$status, InvoiceStatus::OVERDUE] : [$status];
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
