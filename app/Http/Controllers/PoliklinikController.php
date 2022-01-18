<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poliklinik;

class PoliklinikController extends Controller
{
  private $poliklinik;

  public function __construct()
  {
    $this->poliklinik = new Poliklinik;
  }


  public function index()
  {
    $data["poliklinik"] = $this->poliklinik->all();
    return view("admin/poliklinik/index", $data);
  }
  
  public function create()
  {
    return view("admin/poliklinik/create");
  }
  
  public function store(Request $request)
  {
    $this->poliklinik->no_sip       = $request->no_sip;
    $this->poliklinik->poli         = $request->poli;
    $this->poliklinik->dokter       = $request->dokter;
    $this->poliklinik->ketersediaan = $request->ketersediaan;

    $this->poliklinik->save();

    return redirect('/admin/poliklinik')->with('status', 'Berhasil tambah poliklinik.');
  }
  
  public function edit($id)
  {
    $poliklinik = $this->poliklinik->find($id);
    return view('admin/poliklinik/edit', $poliklinik);
  }

  public function update(Request $request, $id)
  {
    $poliklinik_baru = $this->poliklinik->find($id);

    $poliklinik_baru->no_sip       = $request->no_sip;
    $poliklinik_baru->poli         = $request->poli;
    $poliklinik_baru->dokter       = $request->dokter;
    $poliklinik_baru->ketersediaan = $request->ketersediaan;

    $poliklinik_baru->save();

    return redirect('/admin/poliklinik')->with('status', 'Berhasil edit poliklinik.');
  }

    public function destroy($id)
    {
        //
    }
}
