<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichiersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fichiers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('path');
            $table->string('type');
            $table->string('name');
            $table->boolean('visible');

            $table->integer('user_id')->unsigned();
            $table->integer('ens_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ens_id')->references('id')->on('enseignants')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fichiers');
	}

}
