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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id');
            $table->foreignId('train_id');
            $table->string('layout');
            $table->date('checkin');
            $table->integer('lama');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->date('checkout');
            $table->bigInteger('harga');
            $table->string('special')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
