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
    return view("admin/nilai/index", $data);
  }
  
  public function store(Request $request)
  {
    $this->nilai->penilaian = $request->penilaian;
    $this->nilai->save();
    return back()->with('status', 'Berhasil tambah penilaian.');
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
