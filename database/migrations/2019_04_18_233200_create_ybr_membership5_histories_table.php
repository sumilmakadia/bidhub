<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYbrMembership5HistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ybr_membership5_histories', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('user_id')->nullable();
			$table->dateTime('membership_start')->nullable();
			$table->dateTime('membership_end')->nullable();
			$table->dateTime('membership_charge_date')->nullable();
			$table->decimal('membership_charge', 10);
			$table->text('membership_object', 65535)->nullable();
			$table->bigInteger('membership_product_id')->nullable();
			$table->bigInteger('membership_plan_id')->nullable();
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
		Schema::drop('ybr_membership5_histories');
	}

}
