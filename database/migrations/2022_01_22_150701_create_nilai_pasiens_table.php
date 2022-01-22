<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('nilai_pasien', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pasien_id');
        $table->unsignedBigInteger('nilai_id');
        $table->integer("nilai");
        $table->timestamps();
        $table->foreign('pasien_id')->references('id')->on('users');
        $table->foreign('nilai_id')->references('id')->on('nilai');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('nilai_pasien');
    }
}
