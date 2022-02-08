<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AntrianSeeder extends Seeder
{
  public function run()
  {
    DB::table("antrian")->insert([
      "no_antrian"  => 1
    ]);
  }
}
