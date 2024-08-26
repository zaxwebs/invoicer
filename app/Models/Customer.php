<?php

namespace App\Models;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
	use HasFactory;

	protected $guarded = [];

	protected function image(): Attribute
	{
		return Attribute::make(
			get: fn(?string $value) => $value ? 'storage/' . $value : 'images/user-avatar.svg',
		);
	}

	public function invoices(): HasMany
	{
		return $this->hasMany(Invoice::class);
	}
}
