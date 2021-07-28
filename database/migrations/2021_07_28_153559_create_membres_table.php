<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('membres', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom', 100);
			$table->string('prenom', 50);
			$table->string('pseudo', 20);
			$table->string('email', 50);
			$table->string('tel', 20)->default('Numero?');
			$table->string('niveau', 20)->nullable();
			$table->string('filiere', 50);
			$table->string('mdp', 100);
			$table->timestamp('date_ins')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('avatar', 50)->default('avatar.jpg');
			$table->string('status', 50)->default('connecter');
			$table->string('grade', 50)->default('0');
			$table->string('etablissement', 50)->default('aucune');
			$table->string('bio', 500)->default('votre bio...');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('membres');
	}

}
