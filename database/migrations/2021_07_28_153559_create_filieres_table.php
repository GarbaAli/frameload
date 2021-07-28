<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilieresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filieres', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cycle_id')->index('cycle');
			$table->string('code_filiere', 100);
			$table->string('libelle_filiere', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filieres');
	}

}
