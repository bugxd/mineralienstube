<?php
/**
 * create/delete users table
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 * Create users function
	 * id, username, email, password, timesamp
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('users'))
		{
			Schema::drop('users');
		}

		Schema::create('users', function(Blueprint $table){
			$table->increments('id');
			$table->string('username');
			$table->string('email');
			$table->string('password');
			$table->boolean('confirmed');
		    $table->string('activation_code',60);
			$table->timestamps();
			$table->rememberToken();
			$table->boolean('isAdmin')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 * Delete users function
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
