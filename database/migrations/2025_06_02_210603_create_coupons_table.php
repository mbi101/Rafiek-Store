<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	public function up()
	{
		Schema::create('coupons', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code');
			$table->enum('descount_type', array('percentage', 'price'));
			$table->string('descount');
			$table->date('expire_at')->nullable();
			$table->integer('limit')->nullable();
			$table->integer('time_used');
			$table->boolean('available')->default(1);
			$table->text('note');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('coupons');
	}
}