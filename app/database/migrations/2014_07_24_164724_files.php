<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	//php artisan migrate files --create=files
	//php artisan migrate

	public function up()
	{
		Schema::create('files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('estado');// Si se borró temporalmente o no
			$table->string('nombreCifrado');
			$table->string('nombreNormal');
			$table->string('ruta');
			$table->string('tipo');
			$table->string('tamaño');
			$table->string('clientOriginalName');
			$table->string('clientOriginalExtension');
			$table->string('mimeType');
			$table->string('realPath');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('files');
	}

}
