<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterventionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interventions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('nombreHeure');
            $table->string('type');

            $table->integer('ens_id')->unsigned();
            $table->integer('modules_id')->unsigned();
            $table->foreign('ens_id')->references('id')->on('enseignants')->onDelete('cascade');
            $table->foreign('modules_id')->references('id')->on('modules')->onDelete('cascade');
		});
        Schema::create('absences', function(Blueprint $table)
        {
            $table->integer('users_id')->unsigned()->index();
            $table->integer('interventions_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('interventions_id')->references('id')->on('interventions')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('interventions');
        Schema::drop('absences');
    }

}
