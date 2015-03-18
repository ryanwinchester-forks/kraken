<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_type_id')->unsigned()->index();

            $table->string('key');
            $table->string('name');
            $table->string('default')->nullable();
            $table->boolean('required')->nullable();

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
		Schema::drop('properties');
	}

}
