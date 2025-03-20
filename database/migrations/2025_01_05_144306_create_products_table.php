<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->enum('availability', ['in stock', 'out of stock']);
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->integer('minimum')->default(1);
            $table->boolean('is_hidden')->default(false);
            $table->timestamps();
            $table->softDeletes();
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
