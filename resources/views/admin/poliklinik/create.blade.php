@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>POLIKLINIK</h3>
    </div>
    <form action="/admin/poliklinik/tambah" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. SIP</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. SIP" name="no_sip" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Poli</label>
              <input type="text" id="input-username" class="form-control" placeholder="Poli" name="poli" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Dokter</label>
              <input type="text" id="input-username" class="form-control" placeholder="Dokter" name="dokter" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Ketersediaan</label>
              <select name="role" id="role" class="mySelect2" required>
                <option selected disabled></option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak_tersedia">Tidak Tersedia</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary float-right mb-3" type="submit">Tambah</button>
      </div>
    </form>
  </div>
</div>
@endsection