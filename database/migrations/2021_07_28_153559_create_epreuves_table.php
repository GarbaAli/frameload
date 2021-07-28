<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpreuvesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('epreuves', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('etablissement_id')->index('id_ets');
			$table->integer('filiere_id')->index('id_filiere');
			$table->string('libelle_epreuve', 100);
			$table->string('type', 50);
			$table->string('annee_epreuve', 50);
			$table->string('photo_epreuve', 100);
			$table->string('pdf_epreuve');
			$table->timestamp('date_ajout')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('epreuves');
	}

}
