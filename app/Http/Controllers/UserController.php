<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  private $user;

  public function __construct()
  {
    $this->user = new User;
  }

  public function index()
  {
    $data["user"] = $this->user->all();
    return view("admin/user/index", $data);
  }
  
  public function create()
  {
    return view("admin/user/create");
  }
  
  public function store(Request $request)
  {
    $this->user->no_induk = $request->no_induk;
    $this->user->nama     = $request->nama;
    $this->user->username = $request->username;
    $this->user->password = Hash::make($request->password);
    $this->user->jabatan  = $request->jabatan;
    $this->user->no_telp  = $request->no_telp;
    $this->user->role     = $request->role;

    $this->user->save();

    return redirect('/admin/user')->with('status', 'Berhasil tambah user.');
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
