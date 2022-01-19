<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;

class AdminController extends Controller
{
  private $poster;

  public function __construct()
  {
    $this->poster = new Poster;
  }

  public function index()
  {
    $data = $this->poster->first();
    return view("admin/index", $data);
  }
}
