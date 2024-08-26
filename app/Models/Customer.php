<?php

namespace App\Models;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * For all of the models, I would add phpdocs for better autocompletion.
 * @see https://github.com/barryvdh/laravel-ide-helper
 */
class Customer extends Model
{
	use HasFactory;

	/*
		Be careful when using guarded against mass assignment vulnerabilities.
		When I use it, I usually map the attributes I need from the model into a DTO and use it throughout.
	 */
	protected $guarded = [];

	protected function image(): Attribute
	{
		return Attribute::make(
			get: fn(?string $value) => $value ? 'storage/' . $value : 'images/user-avatar.svg',
		);
	}

	/**
	 * All the models are missing return types. Adding them will be very helpful.
	 * @return HasMany<Invoice>
	 */
	public function invoices(): HasMany
	{
		return $this->hasMany(Invoice::class);
	}
}
