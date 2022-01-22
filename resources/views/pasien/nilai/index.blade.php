@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card bg-secondary col-8">
    <div class="card-header">
      <div class="row">
        <h3>BERI NILAI</h3>
      </div>
    </div>
    <form action="/pasien/nilai/tambah" method="post">
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @foreach ($nilai as $nilai)
          {{ $nilai->penilaian }}<br>
          <div class="rating">
            <label>
              <input type="radio" name="stars" value="1"/>
              <span class="icon">★</span>
            </label>
            <label>
              <input type="radio" name="stars" value="2"/>
              <span class="icon">★</span>
              <span class="icon">★</span>
            </label>
            <label>
              <input type="radio" name="stars" value="3"/>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>   
            </label>
            <label>
              <input type="radio" name="stars" value="4"/>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
            </label>
            <label>
              <input type="radio" name="stars" value="5"/>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
            </label>
          </div>
        @endforeach
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection