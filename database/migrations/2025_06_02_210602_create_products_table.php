<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnUpdate()->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnUpdate()->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->string('sku')->nullable();
            $table->date('available_for')->nullable();
            $table->integer('views');
            $table->boolean('status')->default(1);
            $table->boolean('manage_stock')->default(0);
            $table->integer('quantity');
            $table->boolean('available_in_stock')->default(1);
            $table->decimal('price', 8, 2);
            $table->integer('discount');
            $table->enum('discount_type', array('percentage', 'price'))->default('percentage');
            $table->boolean('discount_date')->default(0);
            $table->date('discount_start')->nullable();
            $table->date('discount_end')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}