@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>MANAJEMEN USER</h3>
    </div>
    <form action="/admin/user/edit/{{ $id }}" method="post">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Induk</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Induk" name="no_induk" required value="{{ $no_induk }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Nama</label>
              <input type="text" id="input-username" class="form-control" placeholder="Nama" name="nama" required value="{{ $nama }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Username</label>
              <input type="text" id="input-username" class="form-control" placeholder="Username" name="username" required value="{{ $username }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Password</label>
              <input type="password" id="input-username" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Jabatan</label>
              <input type="text" id="input-username" class="form-control" placeholder="Jabatan" name="jabatan" required value="{{ $jabatan }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. Telepon</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Telepon" name="no_telp" required value="{{ $no_telp }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Role</label>
              <select name="role" id="role" class="mySelect2" required>
                <option value="admin" <?= $role == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="pasien" <?= $role == 'pasien' ? 'selected' : ''; ?>>Pasien</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary float-right mb-3" type="submit">Edit</button>
      </div>
    </form>
  </div>
</div>
@endsection