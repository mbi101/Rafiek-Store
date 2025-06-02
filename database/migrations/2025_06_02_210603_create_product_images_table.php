<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductImagesTable extends Migration {

	public function up()
	{
		Schema::create('product_images', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('product_id')->unsigned();
			$table->string('name');
			$table->string('type');
			$table->string('path');
			$table->decimal('size', 8,2);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_images');
	}
}