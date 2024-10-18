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
        Schema::disableForeignKeyConstraints();

        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('room_id');
            $table->integer('hotel_id');
            $table->foreign('hotel_id')->references('hotel_id')->on('hotels');
            $table->double('price');
            $table->integer('discount_percent');
            $table->integer('capacity');
            $table->text('description');
            $table->timestamp('created_at');
            $table->foreign('created_at')->references('room_id')->on('booking');
            $table->timestamp('updated_at');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
