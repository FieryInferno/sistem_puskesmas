<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Sistem Puskesmas</title>
  <!-- Favicon -->
  <link rel="icon" href="/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('css') }}/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('@fortawesome') }}/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .checked {
      color: orange;
    }
    
    .rating {
      display: inline-block;
      position: relative;
      height: 50px;
      line-height: 50px;
      font-size: 50px;
    }

    .rating label {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      cursor: pointer;
    }

    .rating label:last-child {
      position: static;
    }

    .rating label:nth-child(1) {
      z-index: 5;
    }

    .rating label:nth-child(2) {
      z-index: 4;
    }

    .rating label:nth-child(3) {
      z-index: 3;
    }

    .rating label:nth-child(4) {
      z-index: 2;
    }

    .rating label:nth-child(5) {
      z-index: 1;
    }

    .rating label input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
    }

    .rating label .icon {
      float: left;
      color: transparent;
    }

    .rating label:last-child .icon {
      color: #000;
    }

    .rating:not(:hover) label input:checked ~ .icon,
    .rating:hover label:hover input ~ .icon {
      color: #ffb300;
    }

    .rating label input:focus:not(:checked) ~ .icon:last-child {
      color: #000;
      text-shadow: 0 0 5px #ffb300;
    }
  </style>
</head>
<body>
  <div class="modal" id="cetakAntrian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
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
            <h1>{{ $antrian->no_antrian }}</h1>
          </div>
        </div>
        <div class="modal-footer">
          Silahkan tunggu hingga nomor anda dipanggil. <a href="{{ url('antrian/cetak') }}" target="_blank">Print</a>
        </div>
      </div>
    </div>
  </div>
  <script>
    window.print();
  </script>
</body>