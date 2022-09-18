@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header text-center">
      <h3>DATA NILAI BERDASARKAN UNSUR SKM</h3>
    </div>
    <div class="card-body">
      <div class="chart">
        <form>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Bulan</label>
                <select name="bulan" class="mySelect2" required>
                  <option selected disabled></option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Mei</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label">Tahun</label>
                <select name="tahun" class="mySelect2" required>
                  <option selected disabled></option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                </select>
              </div>
              <button class="btn btn-primary mb-3" type="submit">Submit</button>
            </div>
          </div>
        </form>
        <canvas id="dataNilai" class="chart-canvas"></canvas>
        <h1><b>Masukan dan Saran</b></h1>
        @foreach ($masukan as $m)
          <div><b>{{ $m->pasien->nama }}</b></div>
          <div class="mb-2">{{ $m->masukan }}</div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection