<?php

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('notes', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Invoice::class);
			$table->text('content');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('notes');
	}
};
