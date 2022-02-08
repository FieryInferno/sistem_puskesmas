<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntriansTable extends Migration
{
  public function up()
  {
    Schema::create('antrian', function (Blueprint $table) {
      $table->id();
      $table->integer("no_antrian");
      $table->timestamps();
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('antrian');
  }
}
