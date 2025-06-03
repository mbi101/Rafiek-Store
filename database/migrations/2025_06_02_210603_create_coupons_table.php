<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration
{

    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->enum('discount_type', array('percentage', 'price'))->default('percentage');
            $table->string('discount');
            $table->date('expire_at')->nullable();
            $table->integer('limit')->nullable();
            $table->integer('time_used');
            $table->boolean('available')->default(1);
            $table->text('note');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
}
