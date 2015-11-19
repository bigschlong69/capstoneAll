<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('class_sections', function(Blueprint $table)
		{
			$table->integer('class_section_id', true);
			$table->string('class_section_name');
			$table->string('class_section_days', 10)->default('SMTWTFS');
			$table->time('class_section_start_time');
			$table->time('class_section_end_time');
			$table->timestamp('class_section_timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('class_sections');
	}

}
