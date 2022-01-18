@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>MANAJEMEN USER</h3>
    </div>
    <form action="/admin/user/tambah" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Induk</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Induk" name="no_induk" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama</label>
              <input type="text" id="input-username" class="form-control" placeholder="Nama" name="nama" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Username</label>
              <input type="text" id="input-username" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Password</label>
              <input type="password" id="input-username" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Jabatan</label>
              <input type="text" id="input-username" class="form-control" placeholder="Jabatan" name="jabatan" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Telepon</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Telepon" name="no_telp" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Role</label>
              <select name="role" id="role" class="mySelect2" required>
                <option selected disabled></option>
                <option value="admin">Admin</option>
                <option value="pasien">Pasien</option>
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