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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedBigInteger('category_id')->default(1);
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('condition_rating')->default('9/10 Mulus');
            $table->decimal('price', 15, 2);
            $table->integer('stock')->default(1);
            $table->string('status')->default('available');
            $table->string('cod_location')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
