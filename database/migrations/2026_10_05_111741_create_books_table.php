<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            
            // Kolom Wajib (required)
            $table->string('title', 255);
            $table->string('author', 150);
            $table->decimal('price', 12, 2); // Atau $table->unsignedBigInteger('price');
            $table->integer('stock');
            
            // Kolom Opsional (nullable) - Harus diberi ->nullable()
            $table->string('isbn', 20)->nullable()->unique();
            $table->string('publisher', 150)->nullable();
            $table->unsignedSmallInteger('published_year')->nullable();
            $table->text('description')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
