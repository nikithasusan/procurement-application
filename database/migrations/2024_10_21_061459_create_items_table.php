<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//return new class extends Migration
class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('inventory_location');
            $table->string('brand');
            $table->string('category');
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade'); // Active suppliers
            $table->string('stock_unit');
            $table->decimal('unit_price', 10, 2);
            $table->string('images')->nullable(); // for multiple images, store file paths
            $table->enum('status', ['Enabled', 'Disabled'])->default('Enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
