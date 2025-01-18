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
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vehicle_brand_id');
            $table->unsignedBigInteger('vehicle_model_id');
            $table->unsignedBigInteger('vehicle_body_type_id');
            $table->year('vehicle_model_year');
            $table->string('registration_plate');
            $table->string('vehicle_front_picture')->nullable();
            $table->enum('approval_status', ['approved', 'disapproved']);
            $table->enum('vehicle_ownership_type', ['self_owned', 'rental']);
            $table->text('vehicle_description')->nullable(); //this defines the vehicle description like "comfy, economical"
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_brand_id')->references('id')->on('vehicle_brands')->onDelete('cascade');
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models')->onDelete('cascade');
            $table->foreign('vehicle_body_type_id')->references('id')->on('vehicle_body_types')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            // $table->index([
            //     'user_id',
            //     'vehicle_brand_id',
            //     'vehicle_model_id',
            //     'vehicle_body_type_id',
            //     'vehicle_model_year',
            //     'vehicle_description',
            //     'registration_plate'
            // ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_details');
    }
};



/**
 * convertible
 * coupe
 * crossover
 * full size van
 * hatchback
 * minivan
 * sedan
 * suv
 * truck
 */