@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-body text-center">
          Antrian Saat Ini<br>
          <h1>10</h1>
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
                    <h1>10</h1>
                  </div>
                </div>
                <div class="modal-footer">
                  Silahkan tunggu hingga nomor anda dipanggil. <a href="">Print</a>
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
          <h1>10</h1>
          Lihat poli <a href="<?= auth()->user()->role == "admin" ? "admin" : "pasien"; ?>/poliklinik">Disini</a>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body text-center">
          Rating<br>
          <h1>4/5</h1>
          Beri rating <a href="#" data-toggle="modal" data-target="#cetakAntrian">Disini</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection