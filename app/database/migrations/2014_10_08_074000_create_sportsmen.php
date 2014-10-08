<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsmen extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('sportsmen', function($newtable){
      $newtable->increments('id');
      $newtable->string('first_name');
      $newtable->string('last_name');
      $newtable->integer('club_id');
      $newtable->timestamps();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::drop('sportsmen');
	}

}
