@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-4">
      <div class="card" id="printArea">
        <div class="card-body text-center">
          Antrian Saat Ini<br>
          <h1>{{ $antrian->no_antrian }}</h1>
          Cetak Antrian <a href="#" data-toggle="modal" data-target="#cetakAntrian">Disini</a>
          <!-- Modal -->
          <div class="modal fade" id="cetakAntrian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    PUSKESMAS NAGRAK<br> 
                    Jl. Sinagar-Munjul, Nagrak Utara, Kec. Nagrak, 
                    Sukabumi Regency, Jawa Barat 43356
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  No. antrian anda
                  <div class="text-center">
                    <h1>{{ $antrian->no_antrian }}</h1>
                  </div>
                </div>
                <div class="modal-footer">
                  Silahkan tunggu hingga nomor anda dipanggil. <a href="{{ url('antrian/cetak') }}" target="_blank">Print</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body text-center">
          Poli Tersedia<br>
          <h1>{{ $poliklinik }}</h1>
          Lihat poli <a href="<?= auth()->user()->role == "admin" ? "admin" : "pasien"; ?>/poliklinik">Disini</a>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body text-center">
          Rating<br>
          <h1>{{ round($totalRating) }}/5</h1>
          Beri rating <a href="#" data-toggle="modal" data-target="#cetakAntrian">Disini</a>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      @if (!$poster)
        <button class="btn btn-primary" data-toggle="modal" data-target="#unggahPoster">Unggah Poster</button>
      @endif
      
      <!-- Modal -->
      <div class="modal fade" id="unggahPoster" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Unggah Poster</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="admin/poster/tambah" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                @csrf
                <input type="file" class="form-control" name="poster">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Unggah Poster</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @if ($poster)
        <form action="/admin/poster/hapus/{{ $poster['id'] }}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Hapus Poster</button>
        </form>
      @endif
    </div>
    <div class="card-body text-center">
      @if ($poster)
        <img src="{{ asset('img/' . $poster['poster']) }}" class="fill-current text-gray-500" alt="" width="100%">
      @endif
    </div>
  </div>
</div>
@endsection