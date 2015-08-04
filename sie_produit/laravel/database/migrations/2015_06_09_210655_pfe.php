<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pfe extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pfe', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('nom1');
            $table->string('code1');
            $table->string('email1')->nullable();

            $table->string('nom2');
            $table->string('code2');
            $table->string('email2')->nullable();

            $table->string('ens')->default('no');
            $table->timestamp('created_at')
                ->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pfe');
	}

}
