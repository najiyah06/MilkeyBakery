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
        Schema::create('orders', function ($table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('order_code')->unique();
        $table->string('name');
        $table->string('email');
        $table->string('phone');
        $table->text('address');
        $table->string('city');
        $table->string('postal_code');
        $table->integer('subtotal');
        $table->integer('tax');
        $table->integer('delivery_fee');
        $table->integer('total');
        $table->string('status')->default('pending'); // pending | paid | failed
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
