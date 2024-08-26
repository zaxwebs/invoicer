<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$websiteValues = ['https://' . $this->faker->domainName, NULL];
		return [
			'name' => $this->faker->name,
			'email' => $this->faker->unique()->safeEmail,
			'phone' => $this->faker->phoneNumber,
			'address' => $this->faker->address,
			'website' => $this->faker->randomElement($websiteValues),
			'created_at' => now(),
			'updated_at' => now(),
		];
	}
}
