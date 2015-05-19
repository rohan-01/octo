<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registration', function($table)
                    {
                    $table->increments('id');
                    $table->string('username', 40);
                    $table->string('password', 20);
                    $table->string('email',30);
                    $table->boolean('complete');
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
		Schema::drop('registration');
	}

}
