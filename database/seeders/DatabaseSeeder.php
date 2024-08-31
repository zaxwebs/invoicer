<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Invoice;
use App\Models\Settings;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// User::factory(10)->create();

		$user = User::factory()->create([
			'name' => 'Test User',
			'email' => 'test@example.com',
		]);

		$settings = Settings::factory()->create(['user_id' => $user->id]);

		$customers = Customer::factory()
			->count(20)
			->create(['user_id' => $user->id]);

		Invoice::factory()
			->count(200)
			->make()
			->each(function ($invoice) use ($customers) {
				$invoice->customer_id = $customers->random()->id;
				$invoice->save();
				$numberOfNotes = rand(0, 3); // Random number between 0 and 3
				Note::factory()
					->count($numberOfNotes)
					->create(['invoice_id' => $invoice->id]); // Create notes for this invoice
			});
	}
}
