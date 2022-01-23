<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;
use App\Models\Poliklinik;
use App\Models\Nilai;
use App\Models\NilaiPasien;

class AdminController extends Controller
{
  private $poster;
  private $poliklinik;
  private $nilai;
  private $nilaiPasien;

  public function __construct()
  {
    $this->poster       = new Poster;
    $this->poliklinik   = new Poliklinik;
    $this->nilai        = new Nilai;
    $this->nilaiPasien  = new NilaiPasien;
  }

  public function index()
  {
    $data["poster"]     = $this->poster->first();
    $data["poliklinik"] = $this->poliklinik->where("ketersediaan", "tersedia")->count();
    $nilai              = $this->nilai->all();
    $jumlahNilai        = $this->nilai->count();
    $totalNilai         = 0;

    if ($jumlahNilai > 0) {
      foreach ($nilai as $nilai) {
        $nilaiPasien        = $this->nilaiPasien->where("nilai_id", $nilai["id"])->get();
        $jumlahNilaiPasien  = $this->nilaiPasien->where("nilai_id", $nilai["id"])->count();
        $totalNilaiPasien   = 0;

        if ($jumlahNilaiPasien > 0) {
          foreach ($nilaiPasien as $nilaiPasien) {
            $totalNilaiPasien += $nilaiPasien["nilai"];  
          }
    
          $totalNilaiPasien = $totalNilaiPasien / $jumlahNilaiPasien;
        } else {
          $totalNilaiPasien = $totalNilaiPasien / 1;
        }
        $totalNilai       += $totalNilaiPasien;
      }
  
      $data["totalRating"]  = $totalNilai / $jumlahNilai;
    } else {
      $data["totalRating"]  = $totalNilai / 1;
    }
    return view("admin/index", $data);
  }
}
