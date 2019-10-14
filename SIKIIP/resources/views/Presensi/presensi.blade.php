<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Presensi</title>
  <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
  <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/lib/jqvmap/jqvmap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/assets/css/float_button.css">
  <link rel="stylesheet" href="/assets/css/presensi.css" type="text/css"/>
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

    <!-- Konten -->
    <div class="be-content">
      <div class="page-head">
        <h2 class="page-head-title">Presensi</h2>
      </div>
      <div class="main-content container-fluid">
        <div class="panel panel-default panel-table">
          <div class="panel-body">

            <div class="panel-heading">Tabel Presensi
              <div style="display: table-row" class="tools">
                <div align="center">
                  <div  style="display: table-cell" class="tools">
                    <div class="btn-group btn-hspace">
                      <button style="height: 40px;" type="button" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Unduh Laporan <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                      <ul role="menu" class="dropdown-menu">
                        <li><a href="/presensi/{{$request['dari_tanggal'].' '.$request['sampai_tanggal']}}/unduh_laporan/">Laporan Late Early</a></li>
                        <li><a href="/presensi/{{$request['dari_tanggal'].' '.$request['sampai_tanggal']}}/unduh_rekap_laporan/">Laporan Rekap Bulan</a></li>
                      </ul>
                    </div>
                  </div>
                  <div  style="display: table-cell" class="tools" >
                    <button style="height: 40px;" data-toggle="modal" data-target="#importfile" type="button" class="btn btn-space btn-warning">Import Presensi</button>
                    <!-- Modals untuk Import -->

                    <div id="importfile" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <div class="text"><h3>Import Presensi</h3></div>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <h3>Silahkan Pilih File Presensi yang Ingin Anda Upload!</h3>
                              <form id="form_submit_edit" name="submit1" action="/presensi/import_file" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label class="control-label" for=""></label>
                                    <input type="file" class="form-control" name="import_presensi" id="upload" required="">
                                  </div>
                                  <h4>Silahkan masukkan rentang tanggal!</h4>
                                  <div style="margin-right: 15%; ">
                                    <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                                      <input style=" height: 40px" name="sampai_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                                    </div>
                                    <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                                      <label style="margin-top: 12px">S.d</label>
                                    </div>
                                    <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                                      <input style=" height: 40px" name="dari_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                                    </div>
                                  </div>
                                  <div style="display: table-cell; margin-right: 180px; margin-top: 10px;" class="tools">
                                   <select style=" height: 40px; margin-left: 1%;" name="mode" class="form-control" required="">
                                    <option>-Pilih Mode Bulan-</option>
                                    <option value="Normal" >Bulan Biasa</option>
                                    <option value="Ramadhan" >Bulan Ramadhan</option>
                                  </select>
                                </div> 
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <div class="xs-mt-50">
                              <button style="margin-bottom: 0.5px;" type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                              <button type="reset"  class="btn btn-space btn-warning">Reset</button>
                              <button type="submit1" class="btn btn-space btn-primary">Import</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!--Akhir dari Modals Import -->
                </div>
                <div  style="display: table-cell" class="tools" >
                  <div class="btn-group btn-hspace">
                    <button style="height: 40px;" type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Kalkulasi Presensi <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a type="button" data-toggle="modal" data-target="#rekap_presensi">Presensi bulan lain</a></li>
                      <li><a id="sync" type="button" >Sync bulan ini</a></li>
                    </ul>
                  </div>
                  <!-- Modals untuk Import -->

                  <div id="rekap_presensi" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="text"><h3>Kalkulasi Presensi</h3></div>
                        </div>
                        <div class="modal-body">
                          <div class="text-center">
                            <form id="form_submit_edit" name="submit1" action="/presensi/rekap" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <h4>Silahkan masukkan rentang tanggal!</h4>
                                <div style="margin-right: 15%; ">
                                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                                    <input style=" height: 40px" name="sampai_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                                  </div>
                                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                                    <label style="margin-top: 12px">S.d</label>
                                  </div>
                                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                                    <input style=" height: 40px" name="dari_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                                  </div>
                                </div> 
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <div class="xs-mt-50">
                              <button style="margin-bottom: 0.5px;" type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                              <button type="reset"  class="btn btn-space btn-warning">Reset</button>
                              <button type="submit2" class="btn btn-space btn-primary">Kalkulasi</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!--Akhir dari Modals Import -->
                </div>
                <form style="float: right;" id="form_submit_tampilkan_presensi" name="submit2" action="/presensi/tampilkan_presensi" method="POST">
                  @csrf
                  <div  style="display: table-cell" class="tools">
                    <button style="height: 40px;" type="submit4" class="btn btn-space btn-success">Tampilkan Presensi</button>
                  </div>
                  @if(is_null($request))
                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                    <input style=" height: 40px" name="sampai_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                  </div>
                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                    <label style="margin-top: 12px">S.d</label>
                  </div>
                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                    <input style=" height: 40px" name="dari_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                  </div>
                  @else
                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                    <input style=" height: 40px" value="{{$request['sampai_tanggal']}}" name="sampai_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                  </div>
                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                    <label style="margin-top: 12px">S.d</label>
                  </div>
                  <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                    <input style=" height: 40px" value="{{$request['dari_tanggal']}}" name="dari_tanggal" class="form-control input-sm datetimepicker" type="date" required="">
                  </div>
                  @endif
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="panel-body">
          <div id="table" class="table-responsive noSwipe">
            <table id="table1" class="table table-striped table-hover table-fw-widget">
              <thead>
                <tr>
                  <th><br>NIK<br><br></th>
                  <th><br>ID_SJ<br><br></th>
                  <th><br>Nama<br><br></th>
                  <th><br>Divisi<br><br></th>
                  <th>Total<br>Late:<br>Early:<br></th>
                  <th>Jumlah<br>jam<br>terlambat<br></th>
                  <th>Transport<br><br><br></th>
                  <th><br>TDLL<br><br></th>
                  <th>Total<br>Transport<br><br></th>
                  <th><br>Keterangan<br><br></th>
                  <th><br>Aksi<br><br></th>
                </tr>
              </thead>
              <tbody>

                @foreach( (array) $data_presensi_blade as $data)

                @if($data['id_sidik_jari'] != 0)

                <tr class="odd gradeA">
                  <td>{{$data['nik']}}</td>
                  <td>{{$data['id_sidik_jari']}}</td>
                  <td>{{$data['nama_karyawan']}}</td>
                  <td>{{$data['divisi']}}</td>
                  <td>
                    {{$data['total_late_presensi']}}<br>
                    {{$data['total_early_presensi']}}
                  </td>
                  <td>{{$data['jumlah_keterlambatan']}}</td>
                  <td>{{$data['transport_presensi']}}</td>        
                  <td>{{$data['tambahan_presensi']}}</td>
                  <td>{{$data['transport_presensi']+$data['tambahan_presensi']}}</td>
                  @if($data['keterangan1'] == null)
                  <td></td>
                  @elseif($data['keterangan2'] == null)
                  <td>Potongan {{$data['keterangan1']}} tunjangan</td>
                  @else
                  <td>Potongan {{$data['keterangan1']}} tunjangan<br> + {{$data['keterangan2']}} Cuti/Disinsentif</td>
                  @endif
                  <td>
                    <button data-toggle="modal" data-target="#rincian-data-presensi-{{$data['id_presensi']}}" type="button" class="btn btn-space btn-success">Rincian</button>
                    <!-- The Modal Clock IN-->
                    <div class="modal fade" id="rincian-data-presensi-{{$data['id_presensi']}}">
                      <div class="modal-dialog colored-header-primary">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <table class="no-border no-strip skills">
                              <tbody class="no-border-x no-border-y">
                                <tr>
                                  <td width="150px"><h4 style="color: white; margin-top: 10px;">NIK</h4></td>
                                  <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data['nik']}}</h4></td>    
                                </tr>
                                <tr>
                                  <td width="150px"><h4 style="color: white; margin-top: 10px;">Nama Karyawan</h4></td>
                                  <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data['nama_karyawan']}}</h4></td>    
                                </tr>
                                <tr>
                                  <td width="150px"><h4 style="color: white; margin-top: 10px;">Divisi / Jabatan</h4></td>
                                  <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data['divisi']}}</h4></td>    
                                </tr>
                              </tbody>
                            </table >
                          </div>
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

                                    <!--  Row Pengalaman Bulan Start -->
                                    <tr>
                                      <td><b>Alfa<b></td>
                                        <td>{{$data['jumlah_absen']}}</td>            
                                      </tr>
                                      <!--  Row Pengalaman Bulan End -->
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
                                        <td>{{$data['sisa_cuti_tahunan']}}</td>
                                      </tr>
                                      <!--  Row Tunjangan Kinerja End -->
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End The Modal Clock IN-->

                      <a href="/presensi/{{$data['id_sidik_jari']}}/calendar"><button type="button" class="btn btn-space btn-success">Kalendar</button></a>
                      <button data-toggle="modal" data-target="#edit-data-presensi-{{$data['id_presensi']}}" type="button" class="btn btn-space btn-warning">Edit</button>
                    </td>

                    <!-- The Modal Clock IN-->
                    <div class="modal fade" id="edit-data-presensi-{{$data['id_presensi']}}">
                      <div class="modal-dialog colored-header-primary">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                            <h4 style="color: white; margin-top: 20px;" class="modal-title">Edit Presensi : {{$data['nama_karyawan']}}</h4>
                          </div>

                          <form id="form_jam_clock_in" name="submit3" action="/presensi/{{$data['id_presensi']}}/update" method="POST">
                            @csrf
                            <!-- Modal body -->
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="usr">Tambahan dll. ( Format: 0 )</label><br>
                                <input value="{{$data['tambahan_presensi']}}" type="text" class="form-control" name="tambahan_presensi" id="tambahan_presensi">
                              </div><br>
                              <div class="form-group">
                                <label for="pwd">Keterangan Potongan Tunjangan (Format : 0%)</label><br>
                                <input value="{{$data['keterangan1']}}" type="text" class="form-control" name="keterangan1">
                              </div>
                              <div class="form-group">
                                <label for="pwd">Keterangan Potongan Cuti/Disinsentif (Format : 0H)</label><br>
                                <input value="{{$data['keterangan2']}}" type="text" class="form-control" name="keterangan2">
                              </div>
                              <div class="form-group">
                                <label>Izin</label>
                                <input value="{{$data['ijin']}}" name="ijin" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Alfa</label>
                                <input value="{{$data['jumlah_absen']}}" name="jumlah_absen" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Cuti Diluar Tanggungan</label>
                                <input value="{{$data['cuti_luar_tanggungan']}}" name="cuti_luar_tanggungan" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Cuti Penting</label>
                                <input value="{{$data['cuti_penting']}}" name="cuti_penting" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Dispensasi</label>
                                <input value="{{$data['dispensasi']}}" name="dispensasi" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>SDSD (Sakit Dengan Surat Dokter)</label>
                                <input value="{{$data['sdsd']}}" name="sdsd" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>STSD (Sakit Tanpa Surat Dokter)</label>
                                <input value="{{$data['stsd']}}" name="stsd" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Cuti Tahunan</label>
                                <input value="{{$data['cuti_tahunan']}}" name="cuti_tahunan" type="text" class="form-control">
                              </div>   
                              <input value="{{$request['sampai_tanggal']}}" name="sampai_tanggal" type="hidden">
                              <input value="{{$request['dari_tanggal']}}" name="dari_tanggal" type="hidden">
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button id="submit3" type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                    <!-- End The Modal Clock IN-->


                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>

            <span id='spinner'><img class="img-responsive" src="/image/loading.gif"/></span>
            
            <div id="table_presensi" class="table-responsive noSwipe">
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!--   Content End  -->

  <!--Footer -->

  <div class="text-center">
    <div class="credits">
      <label id="bid"></label>
      <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
    </div>
  </div>

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
  <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
  <script src="/assets/js/main.js" type="text/javascript"></script>
  <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script src="/assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
  <script src="/assets/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
  <script src="/assets/lib/datatables/plugins/buttons/js/buttons.flash.js" type="text/javascript"></script>
  <script src="/assets/lib/datatables/plugins/buttons/js/buttons.print.js" type="text/javascript"></script>
  <script src="/assets/lib/datatables/plugins/buttons/js/buttons.colVis.js" type="text/javascript"></script>
  <script src="/assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js" type="text/javascript"></script>

  <script type="text/javascript">

    $(document).ready(function(){
      $('#spinner').hide();
      App.init();
      App.dataTables();
      App.dashboard();

    });
  </script>

  <script type="text/javascript">

    $('#sync').click(function (){
      $('#spinner').show();
      $.ajax({
        type: 'get',
        url: "/presensi/table_presensi",
      }).done(function(data){
        $('#spinner').hide();
        $('#table').hide();
        $('#table_presensi').html(data);
      });
    });

  </script>

  </body>
  </html>
