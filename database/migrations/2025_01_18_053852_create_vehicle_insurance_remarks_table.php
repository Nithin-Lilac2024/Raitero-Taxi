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
        Schema::create('vehicle_insurance_remarks', function (Blueprint $table) {
            $table->id();
            $table->text('vehicle_insurance_remarks')->nullable();
            $table->enum('vehicle_approval_status', ['approved', 'rejected']);
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->unsignedBigInteger('vehicle_insurance_id');
            $table->foreign('vehicle_insurance_id')->references('id')->on('vehicle_insurance')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_insurance_remarks');
    }
};
