<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => 'Invoicer Inc.',
			'email' => 'billing@example.com',
			'phone' => $this->faker->phoneNumber,
			'website' => $this->faker->domainName,
			'address' => $this->faker->address,
		];
	}
}
