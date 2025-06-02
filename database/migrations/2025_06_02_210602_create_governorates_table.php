<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernoratesTable extends Migration {

	public function up()
	{
		Schema::create('governorates', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('country_id')->unsigned();
			$table->string('name');
			$table->integer('shipping_amount')->default('0');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('governorates');
	}
}