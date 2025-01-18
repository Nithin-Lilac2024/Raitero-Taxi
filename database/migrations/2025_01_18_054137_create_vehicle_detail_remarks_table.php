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
        Schema::create('vehicle_detail_remarks', function (Blueprint $table) {
            $table->id();
            $table->text('vehicle_detail_remark')->nullable();
            $table->enum('vehicle_approval_status', ['approved', 'rejected']);
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->unsignedBigInteger('vehicle_detail_id');
            $table->foreign('vehicle_detail_id')->references('id')->on('vehicle_details')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_detail_remarks');
    }
};
