<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductVariationsTable extends Migration {

	public function up()
	{
		Schema::create('product_variations', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('product_id')->unsigned();
			$table->string('type');
			$table->decimal('price', 8,2);
			$table->integer('quantity');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_variations');
	}
}