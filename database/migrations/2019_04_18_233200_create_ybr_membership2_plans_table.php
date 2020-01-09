<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYbrMembership2PlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ybr_membership2_plans', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('product_id', 100)->nullable();
			$table->string('plan_name')->nullable();
			$table->text('plan_description', 65535)->nullable();
			$table->decimal('plan_amount', 10)->nullable();
			$table->text('plan_object', 65535)->nullable();
			$table->string('plan_billing_scheme', 100)->nullable();
			$table->string('plan_currency', 100)->nullable();
			$table->string('plan_interval', 100)->nullable();
			$table->string('plan_interval_count', 100)->nullable();
			$table->string('plan_livemode', 100)->nullable();
			$table->integer('trial_period_days')->nullable();
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
		Schema::drop('ybr_membership2_plans');
	}

}
