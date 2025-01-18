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
        Schema::create('vehicle_insurance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_detail_id');
            $table->unsignedBigInteger('insurance_company_id');
            $table->string('insurance_policy_number');
            $table->date('insurance_expiry_date');
            $table->string('insurance_image')->nullable();
            $table->enum('approval_status', ['approved', 'disapproved']);
            $table->foreign('vehicle_detail_id')->references('id')->on('vehicle_details')->onDelete('cascade');
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            // $table->index(['vehicle_detail_id', 'insurance_company_id', 'insurance_policy_number', 'insurance_expiry_date']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_insurance');
    }
};
