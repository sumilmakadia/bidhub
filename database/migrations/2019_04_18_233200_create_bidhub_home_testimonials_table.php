<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBidhubHomeTestimonialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bidhub_home_testimonials', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('testimonial_title', 65535)->nullable();
			$table->text('testimonial_description', 65535)->nullable();
			$table->string('full_name')->nullable();
			$table->bigInteger('user_id')->nullable();
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
		Schema::drop('bidhub_home_testimonials');
	}

}
