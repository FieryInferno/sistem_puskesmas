<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
  private $nilai;

  public function __construct()
  {
    $this->nilai = new Nilai;
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
}
