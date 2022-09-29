<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\NilaiPasien;
use App\Models\Masukan;

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
    $nilai  = $this->nilai->all();

    foreach ($nilai as $nilai) {
      $data["penilaian"][$nilai["id"]]["penilaian"] = $nilai["penilaian"];
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
      
      $data["penilaian"][$nilai["id"]]["nilai"] = round($totalNilaiPasien);
    }

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
    if (count($request->nilai) === count($this->nilai->all())) {
      $data = [];
      $i = 0;

      foreach ($request->nilai as $key => $value) {
        $data[$i]['pasien_id'] = auth()->user()->id;
        $data[$i]['nilai_id']  = $key;
        $data[$i]['nilai']     = $value;
        $i++;
      }

      $this->nilaiPasien->insert($data);
  
      if ($request->masukan) {
        Masukan::create([
          'pasien_id' => auth()->user()->id,
          'masukan'   => $request->masukan,
        ]);
      }

      return back()->with("status", "Berhasil input penilaian.");
    } else {
      return back()->with('error', 'Nilai harus diisi semua');
    }
  }

  public function dataNilai(Request $request)
  {
    $nilai          = $this->nilai->all();
    $data["nilai"]  = [];

    foreach ($nilai as $nilai) {
      if ($request->query('bulan') && $request->query('tahun')) {
        $nilaiPasien        = $this->nilaiPasien->where("nilai_id", $nilai["id"])->whereMonth('created_at', $request->query('bulan'))->whereYear('created_at', $request->query('tahun'))->get();
        $jumlahNilaiPasien  = $this->nilaiPasien->where("nilai_id", $nilai["id"])->whereMonth('created_at', $request->query('bulan'))->whereYear('created_at', $request->query('tahun'))->count();
      } else {
        $nilaiPasien        = $this->nilaiPasien->where("nilai_id", $nilai["id"])->get();
        $jumlahNilaiPasien  = $this->nilaiPasien->where("nilai_id", $nilai["id"])->count();
      }
      $totalNilaiPasien   = 0;

      if ($jumlahNilaiPasien > 0) {
        foreach ($nilaiPasien as $nilaiPasien) {
          $totalNilaiPasien += $nilaiPasien["nilai"];  
        }
  
        $totalNilaiPasien = $totalNilaiPasien / $jumlahNilaiPasien;
      } else {
        $totalNilaiPasien = $totalNilaiPasien / 1;
      }
      
      $data["nilai"][$nilai["penilaian"]] = $totalNilaiPasien;
    }

    $data['masukan'] = Masukan::all();

    return view("admin/dataNilai", $data);
  }
}
