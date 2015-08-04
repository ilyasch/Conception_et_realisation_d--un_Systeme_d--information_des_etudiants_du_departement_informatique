<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichierTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('fichier_tag', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('fichier_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('fichier_id')->references('id')->on('fichiers')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('fichier_tag', function(Blueprint $table) {
            $table->dropForeign('fichier_tag_fichier_id_foreign');
            $table->dropForeign('fichier_tag_tag_id_foreign');
        });
        Schema::drop('fichier_tag');
	}

}
