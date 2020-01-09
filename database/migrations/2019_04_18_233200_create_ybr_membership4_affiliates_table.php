<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYbrMembership4AffiliatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ybr_membership4_affiliates', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('affiliate_user_id')->nullable();
			$table->string('affiliate_username', 100);
			$table->bigInteger('affiliate_total_referrals')->nullable();
			$table->text('affiliate_url', 65535)->nullable();
			$table->string('affiliate_status', 100);
			$table->string('affiliate_email', 100);
			$table->string('affiliate_phone', 100);
			$table->integer('affiliate_country');
			$table->integer('affiliate_state');
			$table->integer('affiliate_city');
			$table->integer('affiliate_address');
			$table->integer('affiliate_address2');
			$table->integer('affiliate_zip');
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
		Schema::drop('ybr_membership4_affiliates');
	}

}
