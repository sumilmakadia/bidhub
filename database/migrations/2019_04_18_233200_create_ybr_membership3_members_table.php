<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYbrMembership3MembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ybr_membership3_members', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('status', 100);
			$table->text('object', 65535);
			$table->string('customer_id', 100);
			$table->string('product_id', 100);
			$table->string('plan_id', 100);
			$table->decimal('plan_amount', 10);
			$table->string('plan_interval', 100);
			$table->integer('plan_interval_count');
			$table->integer('trial_period_days');
			$table->dateTime('created')->nullable();
			$table->dateTime('canceled_at')->nullable();
			$table->dateTime('current_period_start')->nullable();
			$table->dateTime('current_period_end')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ybr_membership3_members');
	}

}
