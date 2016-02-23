<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDicussionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*if (Schema::hasTable('discussions'))
		{
			Schema::drop('discussions');
		}


		Schema::create('discussions', function(Blueprint $table){
			$table->increments('id');
			$table->string('stone');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('discussions');
	}

}
