<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customer;
use App\Models\Settings;
use App\Enums\InvoiceStatus;
use Illuminate\Support\Carbon;
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

		// Generate invoice and due dates
		$invoiceDate = $this->faker->dateTimeBetween('-2 years', 'now');
		$dueDate = Carbon::instance($invoiceDate)->addDays($this->faker->numberBetween(3, 5));

		// Generate invoice items
		$itemCount = $this->faker->numberBetween(2, 4);
		$items = array_map(fn() => $this->generateInvoiceItem(), range(1, $itemCount));

		return [
			'customer_id' => Customer::factory(),
			'customer_details' => function (array $attributes) {
				return $this->generateCustomerDetails(Customer::find($attributes['customer_id']));
			},
			'issuer_details' => $this->generateIssuerDetails(Settings::first()),
			'invoice_date' => $invoiceDate,
			'due_date' => $dueDate,
			'total' => $this->faker->randomFloat(2, 100, 1000),
			'status' => $this->faker->randomElement(InvoiceStatus::fillableStatuses()),
			'items' => $items,
		];
	}

	/**
	 * Generate customer details array.
	 *
	 * @param \App\Models\Customer $customer
	 * @return array<string, mixed>
	 */
	private function generateCustomerDetails(Customer $customer): array
	{
		return [
			'name' => $customer->name,
			'email' => $customer->email,
			'phone' => $customer->phone,
			'address' => $customer->address,
		];
	}

	private function generateIssuerDetails(Settings $settings): array
	{
		return [
			'name' => $settings->name,
			'email' => $settings->email,
			'phone' => $settings->phone,
			'address' => $settings->address,
			'website' => $settings->website,
		];
	}

	/**
	 * Generate a single invoice item.
	 *
	 * @return array<string, mixed>
	 */
	private function generateInvoiceItem(): array
	{
		$tasks = [
			'UI/UX Design',
			'Frontend Development',
			'Backend Development',
			'Responsive Design',
			'Website Maintenance',
			'SEO Optimization',
			'Content Creation',
			'Database Design',
			'API Integration',
			'E-commerce Setup',
			'Performance Optimization',
			'Code Review',
			'Bug Fixing',
			'Website Testing',
			'Deployment & Hosting',
		];

		return [
			'name' => $this->faker->randomElement($tasks),
			'quantity' => $this->faker->numberBetween(1, 10),
			'rate' => $this->faker->numberBetween(100, 2000),
		];
	}
}
