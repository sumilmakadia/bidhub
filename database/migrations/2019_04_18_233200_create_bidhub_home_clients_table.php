<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBidhubHomeClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bidhub_home_clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('client_name')->nullable();
			$table->text('client_description', 65535)->nullable();
			$table->string('client_website')->nullable();
			$table->text('client_logo', 65535)->nullable();
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
		Schema::drop('bidhub_home_clients');
	}

}
