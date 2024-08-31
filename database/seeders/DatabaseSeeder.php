<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
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
		$user = User::factory()->create([
			'name' => 'Test User',
			'email' => 'test@example.com',
		]);

		Settings::factory()->create(['user_id' => $user->id]);

		// Create customers
		$customers = Customer::factory()
			->count(20)
			->create(['user_id' => $user->id]);

		// Create invoices
		$invoices = Invoice::factory()
			->count(400)
			->make(['customer_id' => $customers->random()->id]);

		// Assign invoices to customers randomly
		foreach ($invoices as $invoice) {
			$customer = $customers->random();
			$invoice->customer_id = $customer->id;
			$invoice->save();

			// Create notes for each invoice
			$numberOfNotes = rand(0, 3);
			Note::factory()
				->count($numberOfNotes)
				->create(['invoice_id' => $invoice->id]);
		}
	}
}