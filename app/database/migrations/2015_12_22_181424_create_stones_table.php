<?php

/**
 * create/delete stones table
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStonesTable extends Migration {

	/**
	 * Run the migrations.
	 * Create 
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('stones'))
		{
			Schema::drop('stones');
		}

		Schema::create('stones', function(Blueprint $table){
			$table->increments('id');
			$table->string('name');
			$table->string('description', 5000);
			$table->string('color');
			$table->string('found');
			$table->string('img');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 * Delete
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stones');
	}

}