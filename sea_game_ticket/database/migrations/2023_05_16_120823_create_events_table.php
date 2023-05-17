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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->unsignedBigInteger('venue_id');
            $table->unsignedBigInteger('category_id'); 
            //
            $table->foreign('venue_id')
                ->references('id')
                ->on('venues')
                ->onDelete('cascade');
            //
            $table->foreign('category_id')
                ->references('id')
                ->on('sports')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
