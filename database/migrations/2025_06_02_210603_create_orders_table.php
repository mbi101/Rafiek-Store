<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->nullOnUpdate()->nullOnDelete();
            $table->string('street')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('shipping_price');
            $table->decimal('price');
            $table->decimal('total_price');
            $table->enum('status', array('pending', 'canceled', 'completed', 'delivered'))->default('pending');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
