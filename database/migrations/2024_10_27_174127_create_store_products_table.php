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
        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->onDelete('cascade'); // Foreign key to stores
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key to products
            $table->integer('quantity')->default(0); // Quantity of product in store
            $table->boolean('visible')->default(true); // Visibility for e-commerce
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_products');
    }
};
