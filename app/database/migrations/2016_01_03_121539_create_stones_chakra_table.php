<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStonesChakraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('stones_chakras'))
		{
			Schema::drop('stones_chakras');
		}

		
		Schema::create('stones_chakras', function(Blueprint $table){
			$table->integer('stone_id')->unsigned();
			$table->integer('chakra_id')->unsigned();
			$table->foreign('stone_id')->references('id')->on('stones');
			$table->foreign('chakra_id')->references('id')->on('chakras');
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
		Schema::drop('stones_chakras');
	}

}
