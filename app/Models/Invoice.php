<?php

namespace App\Models;

use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
	use HasFactory;

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

	public function processItems()
	{
		$total = 0;
		$items = $this->items;

		foreach ($items as $item) {
			$item['total'] = $item['quantity'] * $item['price'];
			$total += $item['total'];
		}

		$this->items = $items;
		$this->total = $total;
	}

	public static function boot()
	{
		parent::boot();

		static::saving(function ($model) {
			$model->processItems();
		});
	}
}
