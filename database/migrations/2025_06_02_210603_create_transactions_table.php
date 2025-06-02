<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

	public function up()
	{
		Schema::create('transactions', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('order_id')->unsigned();
			$table->string('payment_method')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('transactions');
	}
}