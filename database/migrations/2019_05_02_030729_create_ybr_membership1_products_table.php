<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYbrMembership1ProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ybr_membership1_products', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('product_title')->nullable();
			$table->text('product_description', 65535)->nullable();
			$table->string('product_status')->nullable();
			$table->text('product_object', 65535)->nullable();
			$table->text('product_images', 65535)->nullable();
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
		Schema::drop('ybr_membership1_products');
	}

}
