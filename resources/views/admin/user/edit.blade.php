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
              <label class="form-control-label">No. Induk</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Induk" name="no_induk" required value="{{ $no_induk }}">
            </div>
            <div class="form-group">
              <label class="form-control-label">Nama</label>
              <input type="text" id="input-username" class="form-control" placeholder="Nama" name="nama" required value="{{ $nama }}">
            </div>
            <div class="form-group">
              <label class="form-control-label">Username</label>
              <input type="text" id="input-username" class="form-control" placeholder="Username" name="username" required value="{{ $username }}">
            </div>
            <div class="form-group">
              <label class="form-control-label">Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="Password"
                name="password"
              >
            </div>
            <div class="form-group">
              <label class="form-control-label">Jabatan</label>
              <input type="text" id="input-username" class="form-control" placeholder="Jabatan" name="jabatan" required value="{{ $jabatan }}">
            </div>
            <div class="form-group">
              <label class="form-control-label">No. Telepon</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. Telepon" name="no_telp" required value="{{ $no_telp }}">
            </div>
            <div class="form-group">
              <label class="form-control-label">Role</label>
              <select
                name="role"
                onChange="changeRole(this)"
                class="mySelect2"
                required
              >
                <option value="admin" <?= $role == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="pasien" <?= $role == 'pasien' ? 'selected' : ''; ?>>Pasien</option>
              </select>
            </div>
            <div id="poliklinik">
              @if($role === 'pasien')
                <div class="form-group">
                  <label>Poliklinik</label>
                  <select name="poliklinik" class="mySelect2" required>
                    <option disabled selected></option>
                    @foreach ($poli as $poli)
                      <option value="{{ $poli->id }}" <?= $poliklinik == $poli->id ? 'selected' : ''; ?>>{{ $poli->poli }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Status</label>
                  <select name="status" class="mySelect2" required>
                    <option value="Antrian" <?= $status == 'Antrian' ? 'selected' : ''; ?>>Antrian</option>
                    <option value="Tindakan" <?= $status == 'Tindakan' ? 'selected' : ''; ?>>Tindakan</option>
                    <option value="Selesai" <?= $status == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                  </select>
                </div>
              @endif
            </div>
            <div class="form-group">
              <label class="form-control-label">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="mySelect2" required>
                <option selected disabled></option>
                <option value="l" <?= $jenis_kelamin == 'l' ? 'selected' : ''; ?>>Laki-Laki</option>
                <option value="p" <?= $jenis_kelamin == 'p' ? 'selected' : ''; ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Pendidikan</label>
              <select name="pendidikan" class="mySelect2" required>
                <option selected disabled></option>
                <option value="sd" <?= $pendidikan == 'sd' ? 'selected' : ''; ?>>SD</option>
                <option value="smp" <?= $pendidikan == 'smp' ? 'selected' : ''; ?>>SMP</option>
                <option value="sma" <?= $pendidikan == 'sma' ? 'selected' : ''; ?>>SMA</option>
                <option value="d1d3" <?= $pendidikan == 'd1d3' ? 'selected' : ''; ?>>D1 - D3</option>
                <option value="d4s1" <?= $pendidikan == 'd4s1' ? 'selected' : ''; ?>>D4 - S1</option>
                <option value="s2" <?= $pendidikan == 's2' ? 'selected' : ''; ?>>> S2</option>
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