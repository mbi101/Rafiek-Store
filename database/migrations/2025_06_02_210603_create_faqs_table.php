<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqsTable extends Migration {

	public function up()
	{
		Schema::create('faqs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('question');
			$table->text('answer');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('faqs');
	}
}