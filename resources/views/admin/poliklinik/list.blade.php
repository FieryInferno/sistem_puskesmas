@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>LIST PASIEN</h3>
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
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead class="thead">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Pasien</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($poliklinik->pasien as $pasien)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->no_telp }}</td>
                <td>{{ $pasien->status }}</td>
                <td>
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#hapus{{ $pasien->id }}">
                    Update Status
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="hapus{{ $pasien->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('admin/pasien/update/' . $pasien->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group">
                              <select name="status" class="mySelect2" required>
                                <option selected disabled></option>
                                <option value="Antrian" <?= $pasien->status == "Antrian" ? "selected" : ""; ?>>Antrian</option>
                                <option value="Tindakan" <?= $pasien->status == "Tindakan" ? "selected" : ""; ?>>Tindakan</option>
                                <option value="Selesai" <?= $pasien->status == "Selesai" ? "selected" : ""; ?>>Selesai</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit">Submit</button>
                          </div>
                        </form>
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