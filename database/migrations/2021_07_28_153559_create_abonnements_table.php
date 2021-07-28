<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abonnements', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('membre');
			$table->string('nom', 50);
			$table->string('numero', 30);
			$table->dateTime('date_abonnement');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('abonnements');
	}

}
