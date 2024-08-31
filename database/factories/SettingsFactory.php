<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingsFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'user_id' => User::factory(),
			'name' => 'Invoicer Inc.',
			'email' => 'billing@example.com',
			'phone' => $this->faker->phoneNumber,
			'website' => 'https://' . $this->faker->domainName,
			'address' => $this->faker->address,
		];
	}
}
