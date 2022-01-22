<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;
use App\Models\Poliklinik;

class PasienController extends Controller
{
  private $poster;
  private $poliklinik;

  public function __construct()
  {
    $this->poster     = new Poster;
    $this->poliklinik = new Poliklinik;
  }

  public function index()
  {
    $data["poster"]     = $this->poster->first();
    $data["poliklinik"] = $this->poliklinik->where("ketersediaan", "tersedia")->count();
    return view("pasien/index", $data);
  }
}
