<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToYbrMembership2PlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ybr_membership2_plans', function(Blueprint $table)
		{
			$table->foreign('product_id', 'ybr_membership2_plans_ibfk_1')->references('id')->on('ybr_membership1_products')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ybr_membership2_plans', function(Blueprint $table)
		{
			$table->dropForeign('ybr_membership2_plans_ibfk_1');
		});
	}

}
