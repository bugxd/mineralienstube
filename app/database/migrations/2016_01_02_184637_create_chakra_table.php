<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChakraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('chakras'))
		{
			Schema::drop('chakras');
		}


		Schema::create('chakras', function(Blueprint $table){
			$table->increments('id');
			$table->string('name');
			$table->string('color');
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
		Schema::drop('chakras');
	}

}
