@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  @if (auth()->user()->status === 'Selesai')
    <form action="{{ url('/pasien/nilai/tambah') }}" method="post">
      @csrf
      <div class="row">
        <div class="card bg-secondary col-6">
          <div class="card-header">
            <div class="row">
              <h3>BERI NILAI</h3>
            </div>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @if (session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
            @endif
            @foreach ($penilaian as $key => $value)
              {{ $value["penilaian"] }}<br/>
              <div class="rating">
                <label>
                  <input type="radio" name="nilai[{{ $key }}]" value="1"/>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="nilai[{{ $key }}]" value="2"/>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="nilai[{{ $key }}]" value="3"/>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>   
                </label>
                <label>
                  <input type="radio" name="nilai[{{ $key }}]" value="4"/>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="nilai[{{ $key }}]" value="5"/>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
              </div><br/>
            @endforeach
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <div class="card bg-secondary col-6">
          <div class="card-header">
            <div class="row">
              <h3>Masukan dan Saran</h3>
            </div>
          </div>
          <div class="card-body">
            <textarea
              name="masukan"
              cols="30"
              rows="3"
              class="form-control"
            ></textarea>
          </div>
        </div>
      </div>
    </form>
  @endif
</div>
@endsection