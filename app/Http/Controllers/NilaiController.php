<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\NilaiPasien;

class NilaiController extends Controller
{
  private $nilai;
  private $nilaiPasien;

  public function __construct()
  {
    $this->nilai        = new Nilai;
    $this->nilaiPasien  = new NilaiPasien;
  }

  public function index()
  {
    $data["nilai"] = $this->nilai->all();

    switch (auth()->user()->role) {
      case 'admin':
        return view("admin/nilai/index", $data);
        break;
      case 'pasien':
        return view("pasien/nilai/index", $data);
        break;
      
      default:
        # code...
        break;
    }
  }
  
  public function store(Request $request)
  {
    $this->nilai->penilaian = $request->penilaian;
    $this->nilai->save();
    return back()->with('status', 'Berhasil tambah penilaian.');
  }
  
  public function update(Request $request, $id)
  {
    $penilaian_baru             = $this->nilai->find($id);
    $penilaian_baru->penilaian  = $request->penilaian;
    $penilaian_baru->save();

    return back()->with('status', 'Berhasil edit penilaian.');
  }
  
  public function destroy($id)
  {
    $nilai = $this->nilai->find($id);
    $nilai->delete();
    
    return back()->with('status', 'Berhasil hapus penilaian.');
  }

  public function storeRatingPasien(Request $request)
  {
    foreach ($request->nilai as $key => $value) {
      $this->nilaiPasien->pasien_id = auth()->user()->id;
      $this->nilaiPasien->nilai_id  = $key;
      $this->nilaiPasien->nilai     = $value;
      $this->nilaiPasien->save();
    }

    return back()->with("status", "Berhasil input penilaian.");
  }

  public function dataNilai()
  {
    $nilai          = $this->nilai->all();
    $data["nilai"]  = [];

    foreach ($nilai as $nilai) {
      $nilaiPasien        = $this->nilaiPasien->where("nilai_id", $nilai["id"])->get();
      $jumlahNilaiPasien  = $this->nilaiPasien->where("nilai_id", $nilai["id"])->count();
      $totalNilaiPasien   = 0;

      foreach ($nilaiPasien as $nilaiPasien) {
        $totalNilaiPasien += $nilaiPasien["nilai"];  
      }

      $totalNilaiPasien = $totalNilaiPasien / $jumlahNilaiPasien;
      $data["nilai"][$nilai["penilaian"]] = $totalNilaiPasien;
    }

    return view("admin/dataNilai", $data);
  }
}
