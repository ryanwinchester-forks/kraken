<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormPropertyPivotTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_property', function (Blueprint $table) {
            $table->integer('form_id')->unsigned()->index();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->integer('property_id')->unsigned()->index();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');

            $table->string('label')->nullable();     // Overrides property default
            $table->string('default')->nullable();   // Overrides property default
            $table->boolean('required')->nullable(); // Overrides property default

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
        Schema::drop('form_property');
    }
}
