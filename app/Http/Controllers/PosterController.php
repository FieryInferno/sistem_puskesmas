<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;

class PosterController extends Controller
{
  private $poster;

  public function __construct()
  {
    $this->poster = new Poster;
  }

  public function store(Request $request)
  {
    $file = $request->file('poster');
    $file->move('img', $file->getClientOriginalName());
    $this->poster->poster = $file->getClientOriginalName();
    $this->poster->save();

    return back();
  }
  
  public function destroy($id)
  {
      //
  }
}
