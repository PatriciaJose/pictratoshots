<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bookingID')->nullable();
            $table->unsignedBigInteger('feedbackID')->nullable();
            $table->enum('notification_type', ['new-bookings', 'session-today','new-feedback','canceled']);
            $table->enum('status', ['read', 'unread'])->default('unread');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();


            $table->foreign('bookingID')->references('id')->on('bookings');
            $table->foreign('feedbackID')->references('id')->on('feedback');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_notifications');
    }
};
