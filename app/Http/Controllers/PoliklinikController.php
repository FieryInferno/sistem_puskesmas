<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poliklinik;
use App\Models\Antrian;

class PoliklinikController extends Controller
{
  private $poliklinik;

  public function __construct()
  {
    $this->poliklinik = new Poliklinik;
  }


  public function index()
  {
    return view("poliklinik", [
      'poliklinik' => $this->poliklinik->all(),
      'antrian' => Antrian::first(),
    ]);
  }
  
  public function create()
  {
    return view("admin/poliklinik/create");
  }
  
  public function store(Request $request)
  {
    $request->validate([
      'no_sip'            => 'required',
      'poli'              => 'required',
      'dokter'            => 'required',
      'ketersediaan'      => 'required',
      'hari_jadwal_piket' => 'required',
      'jam_piket'         => 'required',
    ]);
    Poliklinik::create($request->all());
    return redirect('/admin/poliklinik')->with('status', 'Berhasil tambah poliklinik.');
  }
  
  public function edit($id)
  {
    $poliklinik = $this->poliklinik->find($id);
    return view('admin/poliklinik/edit', $poliklinik);
  }

  public function update(Request $request, Poliklinik $poliklinik)
  {
    $request->validate([
      'no_sip'            => 'required',
      'poli'              => 'required',
      'dokter'            => 'required',
      'ketersediaan'      => 'required',
      'hari_jadwal_piket' => 'required',
      'jam_piket'         => 'required',
    ]);
    $poliklinik->update($request->all());
    return redirect('/admin/poliklinik')->with('status', 'Berhasil edit poliklinik.');
  }

  public function destroy($id)
  {
    $poliklinik = $this->poliklinik->find($id);

    $poliklinik->delete();
    
    return redirect('/admin/poliklinik')->with('sukses', 'Berhasil edit poliklinik.');
  }

  public function getPoliklinik()
  {
    $poliklinik = Poliklinik::all();
    return response()->json($poliklinik);
  }

  public function list(Poliklinik $poliklinik)
  {
    return view('admin.poliklinik.list', ['poliklinik' => $poliklinik]);
  }
}
