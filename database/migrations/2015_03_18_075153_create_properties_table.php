<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->string('name');
            $table->string('key');
            $table->string('label')->nullable();
            $table->string('default')->nullable();
            $table->boolean('required')->default(false);
            $table->integer('parent_id')->unsigned()->nullable();
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
