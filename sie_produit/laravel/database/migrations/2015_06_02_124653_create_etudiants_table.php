<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etudiants', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('code');
            $table->string('nom');
            $table->string('prenom');
            $table->string('groupe', 10)->nullable();
            $table->string('cin', 25)->nullable();
            $table->string('tel', 25)->nullable();
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
		Schema::drop('etudiants');
	}

}
