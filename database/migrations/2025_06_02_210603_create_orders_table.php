<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('city_id')->unsigned()->nullable();
			$table->string('street')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->decimal('shipping_price', 8,2);
			$table->decimal('price', 8,2);
			$table->decimal('total_price', 8,2);
			$table->enum('status', array('pending', 'canceled', 'completed', 'processing'));
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}