<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
                    {
                    $table->increments('id');
                    $table->string('username', 40);
                    $table->string('password', 20);
                    $table->string('email',30);
                    $table->boolean('complete');
                    
                    // required for Laravel 4.1.26
                      $table->string('remember_token', 100)->nullable();
                    
                    
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
		Schema::drop('users');
	}

}
