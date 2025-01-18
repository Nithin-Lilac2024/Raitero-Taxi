<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip_billings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('driver_id');
            $table->enum('payment_method', ['cash', 'online_payment']);
            $table->decimal('fare', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('waiting_charge', 10, 2);
            $table->decimal('surge', 10, 2);
            $table->decimal('tip', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_billings');
    }
};
