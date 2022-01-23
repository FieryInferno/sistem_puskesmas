@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card bg-secondary col-8">
    <div class="card-header">
      <div class="row">
        <div class="col-6">
          <h3>BERI NILAI</h3>
        </div>
        <div class="col-6 text-right">
          <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">Tambah</a>

          <!-- Modal -->
          <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Penilaian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/admin/nilai/tambah" method="post">
                  @csrf
                  <div class="modal-body">
                    <input type="text" class="form-control" name="penilaian" placeholder="Masukan Penilaian">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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
      @foreach ($penilaian as $key  => $value)
        <div class="row">
          <div class="col-9">
            {{ $value["penilaian"] }}<br>
            @for ($i = 0; $i < $value["nilai"]; $i++)
              <span class="fa fa-star checked"></span>
            @endfor
            @for ($i = 0; $i < (5 - $value["nilai"]); $i++)
              <span class="fa fa-star"></span>
            @endfor
          </div>
          <div class="col-3">
            <div class="row">
              <div class="col-3">
                <a href="#" class="btn btn-success mb-3 btn-sm" data-toggle="modal" data-target="#edit{{ $key }}">Edit</a>

                <!-- Modal -->
                <div class="modal fade" id="edit{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="/admin/nilai/edit/{{ $key }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                          <input type="text" class="form-control" name="penilaian" placeholder="Masukan Penilaian" value="{{ $value["penilaian"] }}">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button class="btn btn-success" type="submit">Edit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-9 text-right">
                <a href="#" class="btn btn-danger mb-3 btn-sm" data-toggle="modal" data-target="#hapus{{ $key }}">Hapus</a>

                <!-- Modal -->
                <div class="modal fade" id="hapus{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="/admin/nilai/hapus/{{ $key }}" method="post">
                        @csrf
                        @method("DELETE")
                        <div class="modal-body text-left">
                          Apakah anda akan menghapus penilaian ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button class="btn btn-danger" type="submit">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection