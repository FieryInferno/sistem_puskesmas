<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masukan extends Model
{
  use HasFactory;
  protected $fillable = ['pasien_id', 'masukan'];

  public function pasien()
  {
    return $this->hasOne(User::class, 'id', 'pasien_id');
  }
}
