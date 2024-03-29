<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPasien extends Model
{
    use HasFactory;

  protected $table  = "nilai_pasien";

  public function pasien()
  {
    return $this->hasOne(User::class, 'id', 'pasien_id');
  }
}
