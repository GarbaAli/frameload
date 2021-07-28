<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFilieresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('filieres', function(Blueprint $table)
		{
			$table->foreign('cycle_id', 'filieres_ibfk_1')->references('id')->on('cycles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('filieres', function(Blueprint $table)
		{
			$table->dropForeign('filieres_ibfk_1');
		});
	}

}
