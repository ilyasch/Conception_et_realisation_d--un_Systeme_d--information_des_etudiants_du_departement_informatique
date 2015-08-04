<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enseignants', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->string('name');
            $table->string('tel');
            $table->string('cin');
            $table->date('ddn');
            $table->string('grade');
            $table->string('matiere_de_specialite');
            $table->integer('is_verified');
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
		Schema::drop('enseignants');
	}

}
