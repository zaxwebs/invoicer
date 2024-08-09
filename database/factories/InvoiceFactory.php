<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'customer_id' => Customer::factory(),
			'invoice_number' => $this->faker->unique()->numerify('######'),
			'invoice_date' => $this->faker->date(),
			'due_date' => $this->faker->date(),
			'total' => $this->faker->randomFloat(2, 100, 1000),
			'status' => $this->faker->randomElement(InvoiceStatus::cases()),
			'items' => json_encode([
				[
					'item_name' => $this->faker->word,
					'quantity' => $this->faker->numberBetween(1, 10),
					'price' => $this->faker->randomFloat(2, 10, 100),
				]
			]),
		];
	}
}
