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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('from_latitude', 10, 7)->nullable();
            $table->decimal('from_longitude', 10, 7)->nullable();
            $table->decimal('drop_off_latitude', 10, 7)->nullable();
            $table->decimal('drop_off_longitude', 10, 7)->nullable();
            $table->decimal('to_latitude', 10, 7)->nullable();
            $table->decimal('to_longitude', 10, 7)->nullable();
            $table->enum('trip_type', ['on_demand', 'scheduled']);
            $table->timestamp('trip_scheduled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicle_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
