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
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner" style="height: 647px;margin-bottom: 0px;margin-right: 0px;max-height: none;background-color: #128612;">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)" style="padding: 0.1rem;background-color: #a7a9ad;">
          <img src="{{ asset('img') }}/logo.png" class="navbar-brand-img" alt="..." width="100%" height="100%" style="max-height: 9rem;">
        </a>
      </div>
      <div class="navbar-inner" style="margin-top: 4rem;background-color: #128612;">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">
                <span class="nav-link-text text-white">Dashboard</span>
              </a>
            </li>
            @switch(auth()->user()->role)
              @case('admin')
                <li class="nav-item">
                  <a class="nav-link" href="/admin/poliklinik">
                    <span class="nav-link-text text-white">Poliklinik</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/nilai">
                    <span class="nav-link-text text-white">Beri Nilai</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/user">
                    <span class="nav-link-text text-white">Manajemen User</span>
                  </a>
                </li>
                @break
              @case('pasien')
                <li class="nav-item">
                  <a class="nav-link" href="/pasien/poliklinik">
                    <span class="nav-link-text text-white">Poliklinik</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/pasien/nilai">
                    <span class="nav-link-text text-white">Beri Nilai</span>
                  </a>
                </li>
                @break
            @endswitch
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background-color: #a7a9ad;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="row">
            <div class="col-10">
              <div class="col-12"><h1>SISTEM INFORMASI PELAYANAN KESEHATAN</h1></div>
              <div class="col-12"><h2 style="color: #3d8446;">PUSKESMAS NAGRAK</h2></div>
              <div class="col-12"><h3 style="color: #3d8446;">Jl. Sinagar-Munjul, Nagrak Utara, Kec. Nagrak, Sukabumi Regency, Jawa Barat 43356</h3></div>
            </div>
            <div class="col-2">
              <img src="{{ asset('img/logo0.png') }}" alt="" class="fill-current text-gray-500" style="width:10rem;">
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-xl-12">
          <div class="alert alert-secondary" role="alert" style="border-color: #090b0c;">
            Selamat Datang! <b>Telepon: (0266) 532779</b>
            <div class="float-right">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#logout">Logout</button>

              <!-- Modal -->
              <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin akan logout?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @yield('konten');
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('js') }}/jquery.min.js"></script>
  <script src="{{ asset('js') }}/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js') }}/js.cookie.js"></script>
  <script src="{{ asset('js') }}/jquery.scrollbar.min.js"></script>
  <script src="{{ asset('js') }}/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <!-- <script src="{{ asset('js') }}/Chart.min.js"></script>
  <script src="{{ asset('js') }}/Chart.extension.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
  <!-- Argon JS -->
  <script src="{{ asset('js') }}/argon.js?v=1.2.0"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
      $('#institusi').DataTable();
      $('#laboratorium').DataTable();

      $('.mySelect2').select2();
      
      var rupiah  = document.getElementById('rupiah');
      var rupiah2 = document.getElementById('rupiah2');

      rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
      });

      rupiah2.addEventListener('keyup', function(e){
        rupiah2.value = formatRupiah(this.value, 'Rp. ');
      });
      
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		      = number_string.split(','),
        sisa     		      = split[0].length % 3,
        rupiah     		    = split[0].substr(0, sisa),
        ribuan     		    = split[0].substr(sisa).match(/\d{3}/gi);
        
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah    += separator + ribuan.join('.');
        }
        
        rupiah  = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    });

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    <?php
      if (isset($data_maintenance)) { ?>

        var bulan   = [];
        var jumlah  = [];
        <?php 
        foreach ($data_maintenance as $key => $value) { ?>
          bulan.push('<?= $key; ?>');
          jumlah.push('<?= $value; ?>');
        <?php } ?>

        const dataMaintenance = {
          labels: bulan,
          datasets: [{
            data: jumlah,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        };

        const configMaintenance = {
          type: 'bar',
          data: dataMaintenance,
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
            responsive: true,
            plugins: {
              legend: {
                display: false
              },
              title: {
                display: true,
                text: 'Total Maintenance'
              }
            },
          },
        };
        
        var myBarChart = new Chart(document.getElementById("myBarChartMaintenance"), configMaintenance);
      <?php }
      
      if (isset($data_pengadaan)) { ?>
        var bulan   = [];
        var jumlah  = [];
        <?php 
        foreach ($data_pengadaan as $key => $value) { ?>
          bulan.push('<?= $key; ?>');
          jumlah.push('<?= $value; ?>');
        <?php } ?>

        const dataPengadaan = {
          labels: bulan,
          datasets: [{
            data: jumlah,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        };

        const configPengadaan = {
          type: 'bar',
          data: dataPengadaan,
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
            responsive: true,
            plugins: {
              legend: {
                display: false
              },
              title: {
                display: true,
                text: 'Total Pengadaan'
              }
            },
          },
        };
        
        var myBarChartPengadaan = new Chart(document.getElementById("myBarChart"), configPengadaan);
      <?php }
    ?>


    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    <?php
      if (isset($institusi) && isset($laboratorium)) { ?>
        const data = {
          labels: ["Institusi", "Laboratorium"],
          datasets: [{
            data: [<?= $institusi; ?>, <?= $laboratorium; ?>],
            backgroundColor: [
              "#f56954",
              "#00a65a"
            ],
            hoverOffset: 4
          }]
        };

        const config = {
          type: 'pie',
          data: data,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Jumlah Barang Fakultas'
              },
            }
          },
        };

        var myChart = new Chart(
          document.getElementById('pieChart'),
          config
        );
      <?php }
      
      if (isset($biayaPengadaan)) { ?>
        const data = {
          labels: ["Institusi", "Laboratorium"],
          datasets: [{
            data: [<?= $biayaPengadaan['institusi']; ?>, <?= $biayaPengadaan['laboratorium']; ?>],
            backgroundColor: [
              "#f56954",
              "#00a65a"
            ],
            hoverOffset: 4
          }]
        };

        const config = {
          type: 'pie',
          data: data,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Total Biaya Pengadaan'
              },
            }
          },
        };

        var myChart = new Chart(
          document.getElementById('biayaPengadaan'),
          config
        );
      <?php }
      
    if (isset($biayaMaintenance)) { ?>
        const dataBiayaMaintenance = {
          labels: ["Institusi", "Laboratorium"],
          datasets: [{
            data: [<?= $biayaMaintenance['institusi']; ?>, <?= $biayaMaintenance['laboratorium']; ?>],
            backgroundColor: [
              "#f56954",
              "#00a65a"
            ],
            hoverOffset: 4
          }]
        };

        const configBiayaMaintenance = {
          type: 'pie',
          data: dataBiayaMaintenance,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Total Biaya Maintenance'
              },
            }
          },
        };

        var myChartBiayaMaintenance = new Chart(
          document.getElementById('biayaMaintenance'),
          configBiayaMaintenance
        );
      <?php }
    ?>
    

    function isiAsalBarang(data) {
      $.ajax({
        url   : '/aset/asal_barang',
        type  : 'post',
        data  : {
          _token  : "{{ csrf_token() }}",
          id_aset : data.value
        }, 
        success : function(result){
          $('#asal_barang').val(result.lokasi);
        }
      });
    }
  </script>
</body>

</html>
