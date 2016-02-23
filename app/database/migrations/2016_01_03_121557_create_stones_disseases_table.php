<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStonesDisseasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('stones_diseases'))
		{
			Schema::drop('stones_diseases');
		}

		
		Schema::create('stones_diseases', function(Blueprint $table){
			$table->integer('stone_id')->unsigned();
			$table->foreign('stone_id')->references('id')->on('stones');
			$table->integer('diseases_id')->unsigned();
			$table->foreign('diseases_id')->references('id')->on('diseases');
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
		Schema::drop('stones_diseases');
	}

}
