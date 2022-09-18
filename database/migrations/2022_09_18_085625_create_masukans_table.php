<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasukansTable extends Migration
{
  public function up()
  {
    Schema::create('masukans', function (Blueprint $table) {
      $table->id();
      $table->foreignId('pasien_id')->constrained('users');
      $table->text('masukan');
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
        Schema::dropIfExists('masukans');
    }
}
