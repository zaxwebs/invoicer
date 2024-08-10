<?php

namespace App\Models;

use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
	use HasFactory;

	protected $fillable = [
		'customer_id',
		'customer_details',
		'issuer_details',
		'invoice_number',
		'invoice_date',
		'due_date',
		'total',
		'status',
		'items',
	];

	protected $casts = [
		'status' => InvoiceStatus::class,
		'customer_details' => 'object',
		'issuer_details' => 'object',
		'items' => 'array',
	];



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
