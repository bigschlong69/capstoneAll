<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRostersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rosters', function(Blueprint $table)
		{
			$table->integer('roster_id', true);
			$table->integer('roster_class_id');
			$table->integer('roster_user_id')->index('roster_user_id');
			$table->boolean('roster_active')->default(1);
			$table->timestamp('roster_timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rosters');
	}

}
