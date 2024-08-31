<?php

use App\Models\Customer;
use App\Enums\InvoiceStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('invoices', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Customer::class)->constrained();
			$table->json('customer_details');
			$table->json('issuer_details');
			$table->string('invoice_number')->unique();
			$table->date('invoice_date');
			$table->date('due_date');
			$table->json('items');
			$table->decimal('total', 10, 2);
			$table->text('remarks')->nullable();
			$table->string('status')->default(InvoiceStatus::cases()[0]);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('invoices');
	}
};
