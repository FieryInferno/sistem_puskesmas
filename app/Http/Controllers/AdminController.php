<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;
use App\Models\Poliklinik;
use App\Models\Nilai;
use App\Models\NilaiPasien;
use App\Models\Antrian;

class AdminController extends Controller
{
  private $poster;
  private $poliklinik;
  private $nilai;
  private $nilaiPasien;
  private $antrian;

  public function __construct()
  {
    $this->poster       = new Poster;
    $this->poliklinik   = new Poliklinik;
    $this->nilai        = new Nilai;
    $this->nilaiPasien  = new NilaiPasien;
    $this->antrian      = new Antrian;
  }

  public function index()
  {
    $data["poster"]     = $this->poster->first();
    $data["poliklinik"] = $this->poliklinik->where("ketersediaan", "tersedia")->count();
    $nilai              = $this->nilai->all();
    $jumlahNilai        = $this->nilai->count();
    $data['responden']  = $this->nilaiPasien->groupBy('pasien_id')->get();
    $data['laki'] = $data['responden']->filter(function ($value, $key) {
      return $value->pasien->jenis_kelamin === 'l';
    })->count();
    $data['perempuan'] = count($data['responden']) - $data['laki'];
    $totalNilai         = 0;
    $data['sd'] = $data['responden']->filter(function ($value, $key) {
      return $value->pasien->pendidikan === 'sd';
    })->count();
    $data['smp'] = $data['responden']->filter(function ($value, $key) {
      return $value->pasien->pendidikan === 'smp';
    })->count();
    $data['sma'] = $data['responden']->filter(function ($value, $key) {
      return $value->pasien->pendidikan === 'sma';
    })->count();
    $data['d1d3'] = $data['responden']->filter(function ($value, $key) {
      return $value->pasien->pendidikan === 'd1d3';
    })->count();
    $data['d4s1'] = $data['responden']->filter(function ($value, $key) {
      return $value->pasien->pendidikan === 'd4s1';
    })->count();
    $data['s2'] = $data['responden']->filter(function ($value, $key) {
      return $value->pasien->pendidikan === 's2';
    })->count();

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

    $data["antrian"]  = $this->antrian->first();
    return view("admin/index", $data);
  }

  public function print()
  {
    $antrian = $this->antrian->first();
    $no = $this->antrian->first();
    $antrian->no_antrian += 1;
    $antrian->save();
    return view('admin.cetakAntrian', ['antrian' => $no]);
  }
}
