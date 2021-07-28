<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLogicielsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('logiciels', function(Blueprint $table)
		{
			$table->foreign('categorie_logiciel_id', 'logiciels_ibfk_1')->references('id')->on('categorie_logiciels')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('logiciels', function(Blueprint $table)
		{
			$table->dropForeign('logiciels_ibfk_1');
		});
	}

}
