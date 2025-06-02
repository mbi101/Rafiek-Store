<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderItemsTable extends Migration {

	public function up()
	{
		Schema::create('order_items', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('product_id')->unsigned();
			$table->bigInteger('order_id')->unsigned();
			$table->integer('quantity');
			$table->decimal('price', 8,2);
			$table->json('data')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('order_items');
	}
}