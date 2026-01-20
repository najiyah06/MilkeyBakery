<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->string('name');                 // nama menu
            $table->string('category');             // bread | cakes | pastry | coffee
            $table->text('description')->nullable();
            $table->integer('price');               // harga
            $table->string('image')->nullable();    // nama file gambar

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
