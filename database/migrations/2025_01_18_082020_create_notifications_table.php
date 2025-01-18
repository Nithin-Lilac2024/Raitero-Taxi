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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notification_title');
            $table->string('notification_icon');
            $table->string('image_url');
            $table->text('notification_content');
            $table->enum('notification_visibility', ['public_notification', 'private_notification']);
            $table->enum('notification_type', ['push_notification', 'pop_notification', 'email_notification']);
            $table->timestamps();
            $table->softDeletes();
            // $table->index(['notification_title', 'notification_icon', 'notification_content', 'notification_visibility', 'notification_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
