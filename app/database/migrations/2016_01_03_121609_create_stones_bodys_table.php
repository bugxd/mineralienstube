<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStonesBodysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('stones_bodies'))
		{
			Schema::drop('stones_bodies');
		}

		
		Schema::create('stones_bodies', function(Blueprint $table){
			$table->integer('stone_id')->unsigned();
			$table->integer('bodies_id')->unsigned();
			$table->foreign('stone_id')->references('id')->on('stones');
			$table->foreign('bodies_id')->references('id')->on('bodies');
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
		Schema::drop('stones_bodies');
	}

}
