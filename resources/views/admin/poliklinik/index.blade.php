@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>POLIKLINIK</h3>
    </div>
    <div class="card-body">
      <a href="/admin/poliklinik/tambah" class="btn btn-primary mb-3">Tambah</a>
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
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
              <th scope="col">Aksi</th>
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
                <td>{{ $poliklinik->ketersediaan }}</td>
                <td>
                  <!-- <a href="/admin/poliklinik/edit/{{ $poliklinik->id }}" class="btn btn-success btn-sm">Edit</a> -->
                  <!-- Button trigger modal -->
                  <!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $poliklinik->id }}">
                    Hapus
                  </button> -->

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
                          Anda yakin akan menghapus data poliklinik dengan nama {{ $poliklinik->nama }}?
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
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection