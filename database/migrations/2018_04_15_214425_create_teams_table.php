<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('pokemon1');
          $table->string('pokemon2');
          $table->string('pokemon3');
          $table->string('pokemon4');
          $table->string('pokemon5');
          $table->string('pokemon6');
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
        Schema::dropIfExists('teams');
    }
}
