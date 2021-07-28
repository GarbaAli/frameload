<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogicielsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logiciels', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('categorie_logiciel_id')->index('id_cat');
			$table->string('libelle_log', 100);
			$table->text('description_log');
			$table->string('se', 20);
			$table->string('taille_log', 20);
			$table->string('type_log', 100);
			$table->integer('telecharger_logiciel');
			$table->timestamp('date_ajout')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('photo_log', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logiciels');
	}

}
