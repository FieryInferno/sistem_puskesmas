@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header">
      <h3>POLIKLINIK</h3>
    </div>
    <form action="/admin/poliklinik/edit/{{ $id }}" method="post">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-username">No. SIP</label>
              <input type="text" id="input-username" class="form-control" placeholder="No. SIP" name="no_sip" required value="{{ $no_sip }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Poli</label>
              <input type="text" id="input-username" class="form-control" placeholder="Poli" name="poli" required value="{{ $poli }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Dokter</label>
              <input type="text" id="input-username" class="form-control" placeholder="Dokter" name="dokter" required value="{{ $dokter }}">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="input-username">Ketersediaan</label>
              <select name="ketersediaan" id="ketersediaan" class="mySelect2" required>
                <option selected disabled></option>
                <option value="tersedia" <?= $ketersediaan == "tersedia" ? "selected" : ""; ?>>Tersedia</option>
                <option value="tidak_tersedia" <?= $ketersediaan == "tidak_tersedia" ? "selected" : ""; ?>>Tidak Tersedia</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Hari Jadwal Piket</label>
              <select name="hari_jadwal_piket" class="mySelect2" required>
                <option selected disabled></option>
                <option value="senin" <?= $hari_jadwal_piket == "senin" ? "selected" : ""; ?>>Senin</option>
                <option value="selasa" <?= $hari_jadwal_piket == "selasa" ? "selected" : ""; ?>>Selasa</option>
                <option value="rabu" <?= $hari_jadwal_piket == "rabu" ? "selected" : ""; ?>>Rabu</option>
                <option value="kamis" <?= $hari_jadwal_piket == "kamis" ? "selected" : ""; ?>>Kamis</option>
                <option value="jumat" <?= $hari_jadwal_piket == "jumat" ? "selected" : ""; ?>>Jumat</option>
                <option value="sabtu" <?= $hari_jadwal_piket == "sabtu" ? "selected" : ""; ?>>Sabtu</option>
                <option value="minggu" <?= $hari_jadwal_piket == "minggu" ? "selected" : ""; ?>>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Jam Piket</label>
              <input
                type="time"
                class="form-control"
                name="jam_piket"
                required
                value="{{ $jam_piket }}"
              >
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