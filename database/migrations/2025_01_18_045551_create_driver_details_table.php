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
        Schema::create('driver_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('total_trips');
            $table->integer('total_earnings');
            $table->integer('total_completed');
            $table->integer('total_cancelled');
            $table->integer('total_ratings');
            $table->string('driver_image_path')->nullable();
            $table->string('license_number');
            $table->date('license_issue_date');
            $table->string('license_picture_front')->nullable();
            $table->string('license_picture_back')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            // $table->index(['user_id', 'license_number', 'license_issue_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_details');
    }
};
