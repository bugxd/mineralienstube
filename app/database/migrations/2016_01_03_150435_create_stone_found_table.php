<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoneFoundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stones_found', function(Blueprint $table){
			$table->integer('stone_id')->unsigned();
			$table->integer('found_id')->unsigned();
			$table->foreign('stone_id')->references('id')->on('stones');
			$table->foreign('found_id')->references('id')->on('found');
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
		//
	}

}
