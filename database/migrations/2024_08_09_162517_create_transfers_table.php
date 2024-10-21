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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign Key referencing products table
            $table->foreignId('source_store_id')->constrained('stores')->onDelete('cascade'); // Foreign Key referencing stores table
            $table->foreignId('destination_store_id')->constrained('stores')->onDelete('cascade'); // Foreign Key referencing stores table
            $table->integer('quantity');
            $table->dateTime('transfer_date');
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
