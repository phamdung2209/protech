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
        Schema::create('order', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity')->nullable();
            $table->string('address')->nullable();
            $table->text('bill-info')->nullable();
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered']);

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('account');

            // $table->unsignedBigInteger('id_cart')->nullable();
            // $table->foreign('id_cart')->references('id')->on('cart');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
