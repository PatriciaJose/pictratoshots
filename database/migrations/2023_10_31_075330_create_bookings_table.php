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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packageID');
            $table->unsignedBigInteger('clientID');
            $table->date('session_date');
            $table->string('location');
            $table->time('session_time');
            $table->enum('status', ['Approved', 'Pending', 'Disapproved', 'Finish','Canceled'])->default('Pending');
            $table->text('disapproval_reason')->nullable(); 
            $table->timestamps();
            $table->foreign('packageID')->references('id')->on('packages');
            $table->foreign('clientID')->references('id')->on('accounts');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
