<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEpreuvesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('epreuves', function(Blueprint $table)
		{
			$table->foreign('etablissement_id', 'epreuves_ibfk_4')->references('id')->on('etablissements')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('epreuves', function(Blueprint $table)
		{
			$table->dropForeign('epreuves_ibfk_4');
		});
	}

}
