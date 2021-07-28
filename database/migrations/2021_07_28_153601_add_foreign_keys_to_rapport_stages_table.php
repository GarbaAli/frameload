<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRapportStagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rapport_stages', function(Blueprint $table)
		{
			$table->foreign('filiere_id', 'rapport_stages_ibfk_1')->references('id')->on('filieres')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rapport_stages', function(Blueprint $table)
		{
			$table->dropForeign('rapport_stages_ibfk_1');
		});
	}

}
