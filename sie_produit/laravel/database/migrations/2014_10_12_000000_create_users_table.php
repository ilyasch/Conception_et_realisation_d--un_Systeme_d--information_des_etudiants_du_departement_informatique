<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //Pour faire la différence entre étudiants et admin en vérifie Auth::email si admin@admin.com il est l'admin
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();
            $table->string('verification_code');
            $table->string('tel');
            $table->string('cin')->unique();
            $table->string('siga')->unique();
            $table->string('groupe');
            $table->date('ddn');
            $table->boolean('is_verified')->default(0);
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
