<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCheckinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checkin', function(Blueprint $table)
		{
			$table->integer('checkin_id', true);
			$table->integer('checkin_user_id');
			$table->integer('checkin_class_id');
			$table->dateTime('checkin_timestamp')->default('0000-00-00 00:00:00');
			$table->boolean('checkin_active')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('checkin');
	}

}
