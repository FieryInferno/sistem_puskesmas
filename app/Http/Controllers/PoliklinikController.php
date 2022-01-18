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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
