<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('category_id')->unsigned()->nullable();
			$table->bigInteger('brand_id')->unsigned()->nullable();
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
			$table->decimal('price', 8,2);
			$table->integer('discount');
			$table->enum('discount_type', array('percentage', 'price'));
			$table->boolean('discount_date')->default(0);
			$table->date('discount_start')->nullable();
			$table->date('discount_end')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}