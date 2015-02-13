<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('user_id');
			$table->string('username');
			$table->string('user_email');
			$table->string('user_firstname');
			$table->string('user_lastname');
			$table->string('user_password');
			$table->string('user_city');
			$table->string('user_state');
			$table->string('user_country');
			$table->string('user_postal_code');
			$table->string('user_phone');
			$table->string('user_adress1');
			$table->string('user_adress2');
			$table->string('user_role');
			$table->string('user_active');
			$table->string('user_confirmed');
			$table->string('user_confirmation_code');
			$table->string('user_ip');
			$table->timestamps('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
