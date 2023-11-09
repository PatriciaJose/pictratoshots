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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientID')->nullable();
            $table->unsignedBigInteger('bookingID')->nullable();
            $table->unsignedBigInteger('ratingFormID')->nullable();
            $table->unsignedBigInteger('weatherID')->nullable();
            $table->enum('notification_type', ['booking-approved', 'booking-disapproved','weather', 'rating']);
            $table->enum('status', ['read', 'unread'])->default('unread');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();


            $table->foreign('bookingID')->references('id')->on('bookings');
            $table->foreign('clientID')->references('id')->on('accounts');
            $table->foreign('ratingFormID')->references('id')->on('rating_forms');
            $table->foreign('weatherID')->references('id')->on('weather');

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
