<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    use HasFactory;

  protected $table    = "poliklinik";
  protected $fillable = ['no_sip', 'poli', 'dokter', 'ketersediaan', 'hari_jadwal_piket', 'jam_piket'];

  public function pasien()
  {
    return $this->hasMany(User::class, 'poliklinik', 'id');
  }
}
