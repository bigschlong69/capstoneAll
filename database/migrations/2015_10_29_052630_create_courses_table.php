<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->integer('course_id', true);
			$table->string('course_name');
			$table->integer('course_instructor');
			$table->integer('course_section_id')->index('course_section_id');
			$table->integer('course_semester_id')->index('course_semester_id');
			$table->string('course_location')->nullable();
			$table->boolean('course_active')->default(1);
			$table->timestamp('course_timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
