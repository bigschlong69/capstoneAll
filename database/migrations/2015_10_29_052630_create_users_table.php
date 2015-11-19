<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('user_id', true);
			$table->string('user_name', 250);
			$table->string('email', 100);
			$table->string('password', 250);
			$table->integer('user_role')->default(3);
			$table->boolean('user_active')->default(1);
			$table->timestamps();
			$table->string('remember_token', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
