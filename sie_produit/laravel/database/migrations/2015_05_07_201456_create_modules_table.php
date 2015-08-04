<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('option');
            $table->string('semestre');
			$table->timestamps();
		});
        Schema::create('module_module', function(Blueprint $table)
        {

            $table->integer('moduleBase_id')->unsigned()->index();
            $table->integer('modulePrer_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('moduleBase_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('modulePrer_id')->references('id')->on('modules')->onDelete('cascade');

        });
        Schema::create('evaluations', function(Blueprint $table)
        {

            $table->integer('users_id')->unsigned()->index();
            $table->integer('modules_id')->unsigned()->index();
            $table->integer('note')->default(99);
            $table->string('semestre');
            $table->string('type');
            $table->float('coeffe');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('modules_id')->references('id')->on('modules')->onDelete('cascade');

        });
        Schema::create('inscriptions', function(Blueprint $table)
        {

            $table->integer('users_id')->unsigned()->index();
            $table->integer('modules_id')->unsigned()->index();
            $table->string('groupe');
            $table->boolean('validation')->default(0);
            $table->string('semestre');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('modules_id')->references('id')->on('modules')->onDelete('cascade');

        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modules');
        Schema::drop('module_module');
        Schema::drop('evaluations');
        Schema::drop('inscriptions');
	}

}
