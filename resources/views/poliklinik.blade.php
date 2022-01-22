@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>POLIKLINIK</h3>
    </div>
    <div class="card-body">
      @if (auth()->user()->role == "admin")
        <a href="/admin/poliklinik/tambah" class="btn btn-primary mb-3">Tambah</a>
        @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      @endif
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead class="thead">
            <tr>
              <th scope="col">No</th>
              <th scope="col">No. SIP</th>
              <th scope="col">Poli</th>
              <th scope="col">Dokter</th>
              <th scope="col">Ketersediaan</th>
              @if (auth()->user()->role == "admin")
                <th scope="col">Aksi</th>
              @endif
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($poliklinik as $poliklinik)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $poliklinik->no_sip }}</td>
                <td>{{ $poliklinik->poli }}</td>
                <td>{{ $poliklinik->dokter }}</td>
                <td>{{ $poliklinik->ketersediaan == "tersedia" ? "Tersedia" : "Tidak Tersedia" }}</td>
                @if (auth()->user()->role == "admin")
                  <td>
                    <a href="/admin/poliklinik/edit/{{ $poliklinik->id }}" class="btn btn-success btn-sm">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $poliklinik->id }}">
                      Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapus{{ $poliklinik->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Anda yakin akan menghapus data poliklinik dengan nama {{ $poliklinik->poli }}?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="/admin/poliklinik/hapus/{{ $poliklinik->id }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-3">
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
  </div>
</div>
@endsection