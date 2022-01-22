@extends('template')
@section('konten')
<div class="container-fluid mt-3">
  <div class="card">
    <div class="card-header text-center">
      <h3>DATA NILAI BERDASARKAN UNSUR SKM</h3>
    </div>
    <div class="card-body">
      <div class="chart">
        <!-- Chart wrapper -->
        <canvas id="dataNilai" class="chart-canvas"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection