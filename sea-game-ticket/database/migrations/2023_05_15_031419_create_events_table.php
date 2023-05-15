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
            $table->integer('available_ticket');
            $table->unsignedBigInteger('stadium_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('match_id');
            //
            $table->foreign('stadium_id')
                ->references('id')
                ->on('stadiums')
                ->onDelete('cascade');
            //
            $table->foreign('category_id')
                ->references('id')
                ->on('sports')
                ->onDelete('cascade');
            //
            $table->foreign('match_id')
                ->references('id')
                ->on('matches')
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
