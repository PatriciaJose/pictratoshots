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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('typeID'); 
            $table->string('package_name');
            $table->text('package_desc');
            $table->decimal('price', 10, 2);
            $table->text('inclusions');
            $table->timestamps();

            $table->foreign('typeID')->references('id')->on('photoshoot_types');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
