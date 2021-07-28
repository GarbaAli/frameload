<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportStagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rapport_stages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('filiere_id')->index('filiere');
			$table->string('auteur_rapport', 100)->nullable();
			$table->string('theme_rapport', 200)->nullable();
			$table->string('annee_rapport', 50)->nullable();
			$table->text('description')->nullable();
			$table->integer('prix')->nullable();
			$table->string('rapport', 200)->nullable();
			$table->string('photo_rapport', 100)->nullable();
			$table->integer('telecharger_rapport')->nullable();
			$table->string('statut', 30)->nullable();
			$table->timestamp('date_insertion')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rapport_stages');
	}

}
