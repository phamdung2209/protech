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
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(0);
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('email');
            $table->string('address')->nullable();
            $table->integer('phone_number')->nullable();
            $table->boolean('ban')->default(0);
            $table->date('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('id_giftcode')->nullable();
            $table->foreign('id_giftcode')->references('id')->on('giftcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
