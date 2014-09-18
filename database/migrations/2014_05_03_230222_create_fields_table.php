<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fields', function(Blueprint $table) {
			$table->increments('id');
            $table->string('name')->unique(); //->primary()->unique()->index();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->default('text');
            $table->string('user_id'); // created_by
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
		Schema::drop('fields');
	}

}
