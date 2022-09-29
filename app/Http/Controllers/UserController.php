<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Poliklinik;
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
    $request->validate([
      'no_induk'  => 'required',
      'nama'      => 'required',
      'username'  => 'required',
      'jabatan'   => 'required',
      'no_telp'   => 'required',
      'role'      => 'required',
      'jenis_kelamin' => 'required',
      'pendidikan' => 'required',
    ]);

    $this->user->no_induk = $request->no_induk;
    $this->user->nama     = $request->nama;
    $this->user->username = $request->username;
    $this->user->password = Hash::make($request->password);
    $this->user->jabatan  = $request->jabatan;
    $this->user->no_telp  = $request->no_telp;
    $this->user->role     = $request->role;
    if ($request->poliklinik) {
      $this->user->poliklinik = $request->poliklinik;
      $this->user->status = $request->status;
    }
    $this->user->jenis_kelamin = $request->jenis_kelamin;
    $this->user->pendidikan = $request->pendidikan;

    $this->user->save();

    return redirect('/admin/user')->with('status', 'Berhasil tambah user.');
  }
  
  public function edit(User $user)
  {
    $user['poli'] = Poliklinik::all();
    return view('admin/user/edit', $user);
  }

  public function update(Request $request, User $user)
  {
    $request->validate([
      'no_induk'  => 'required',
      'nama'      => 'required',
      'username'  => 'required',
      'jabatan'   => 'required',
      'no_telp'   => 'required',
      'role'      => 'required',
      'jenis_kelamin' => 'required',
      'pendidikan' => 'required',
    ]);

    $user->no_induk = $request->no_induk;
    $user->nama     = $request->nama;
    $user->username = $request->username;
    if ($request->password) {
      $user->password = Hash::make($request->password);
    }
    $user->jabatan  = $request->jabatan;
    $user->no_telp  = $request->no_telp;
    $user->role     = $request->role;
    if ($request->poliklinik) {
      $user->poliklinik = $request->poliklinik;
      $user->status = $request->status;
    }
    $user->jenis_kelamin = $request->jenis_kelamin;
    $user->pendidikan = $request->pendidikan;

    $user->save();

    return redirect('/admin/user')->with('status', 'Berhasil edit user.');
  }
  
  public function destroy($id)
  {
    $user = $this->user->find($id);

    $user->delete();
    
    return redirect('/admin/user')->with('status', 'Berhasil hapus user.');
  }

  public function updateStatus(Request $request, User $user)
  {
    // dd($user);
    $user->update($request->all());
    return redirect()->back();
  }
}
