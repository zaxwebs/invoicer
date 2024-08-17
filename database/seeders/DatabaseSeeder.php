<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Invoice;
use App\Models\Setting;
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

		User::factory()->create([
			'name' => 'Test User',
			'email' => 'test@example.com',
		]);

		Setting::factory()->create();

		Customer::factory()->count(10)->create();
		Invoice::factory()->count(10)->create()->each(function ($invoice) {
			$numberOfNotes = rand(0, 3); // Random number between 0 and 3
			Note::factory()->count($numberOfNotes)->create([
				'invoice_id' => $invoice->id,
			]);
		});
	}
}
