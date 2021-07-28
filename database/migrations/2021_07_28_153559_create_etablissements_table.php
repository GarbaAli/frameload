<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etablissements', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('code_ets', 20);
			$table->string('libelle_ets', 100);
			$table->string('image', 100)->nullable();
			$table->text('description')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('etablissements');
	}

}
