<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandsTable extends Migration {

	public function up()
	{
		Schema::create('brands', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('image')->nullable();
			$table->boolean('status')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('brands');
	}
}