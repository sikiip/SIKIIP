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
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          <h2 class="page-head-title">Data Karyawan</h2>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-body">
                  <div class="table-responsive noSwipe">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th style="width:10%;">NIK</th>
                        <th style="width:20%;">Nama</th>
                        <th style="width:15%;">Divisi</th>
                        <th style="width:15%;">Jurusan</th>
                        <th style="width:10%;">Status</th>
                        <th style="width:15%;">Aksi</th>
                       </tr>
                    </thead>
                    <tbody>
                      @foreach($data_karyawan as $data)
                      <tr class="odd gradeA">
                        <td>{{$data->nik}}</td>
                        <td>{{$data->nama_karyawan}}</td>
                        <td>{{$data->divisi}}</td>
                        <td>
                          @foreach($riwayat_pendidikan as $riwayat)

                            @if($data->nik == $riwayat->nik)

                            {{$riwayat->jurusan_pendidikan}},

                            @endif

                          @endforeach
                        </td>

                        <td class="center">{{$data->status_kerja}}</td>
                        <td >
                          <a href="/datakaryawan/{{$data->nik}}/rincian"><button type="button" class="btn btn-space btn-primary"> Rincian </button></a>
                          <a href="/datakaryawan/{{$data->nik}}/edit/data_pribadi"><button type="button" class="btn btn-space btn-warning"> Edit </button></a>
                          <button data-toggle="modal" data-target="#hapus-{{$data->id}}" type="button" class="btn btn-space btn-danger"> Hapus </button>

                           <!-- Modals untuk Hapus -->

                            <div id="hapus-{{$data->id}}" tabindex="-1" role="dialog" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="text-center">
                                      <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                      <h3>Apakah Anda yakin untuk menghapus data</h3>
                                      <p><font size="4">{{$data->nama_karyawan}} dari Data Karyawan ?</font> <br><br>
                                      (* Data yang telah dihapus tidak dapat dikembalikan)</p>
                                      <div class="xs-mt-50">
                                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                                        <a href="/datakaryawan/{{$data->id}}/delete/data_karyawan"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer"></div>
                                </div>
                              </div>
                            </div>
                            <!--Akhir dari Modals Hapus -->

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                 <div id="tambahkaryawan">
                     <button data-toggle="modal" data-target="#tambah" type="button" class="btn btn-space btn-primary">Tambah Karyawan</button>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    
 <!-- Modals untuk Tambah Karyawan -->

    <form id="form_submit_edit" name="submit1" action="/datakaryawan/tambah_karyawan" method="POST">
      {{ csrf_field()}}
       <div id="tambah" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
            <h3 class="modal-title">Tambah Data Karyawan</h3>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>NIK</label>
              <input id="nik" name="nik" type="text" class="form-control" required="">
              <span id="error_nik"></span>
            </div>
             <div class="form-group">
              <label>Nama</label>
              <input name="nama_karyawan" type="text" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input id="email" name="email" type="email" class="form-control" required="email">
              <span id="error_email"></span>
            </div>
             <div class="form-group">
              <label>Jabatan/Divisi</label>
              <input name="divisi" type="text" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Tanggal Masuk</label>
              <input name="masa_kerja" type="date" class="form-control" required="">              
            </div>
            <div class="form-group">
              <input value="ideaimaji" name="password" type="hidden" class="form-control"S>
              <input value="Aktif" name="status_kerja" type="hidden" class="form-control"S>
              <input value="ideaimaji" name="password" type="hidden" class="form-control"S>              
            </div>
            <div class="form-group">
              <label>Role</label>
             <select name="role" id="role" class="form-control" required="">
                  <option value="">-Pilih Role-</option>
                  <option value="SuperAdmin">SuperAdmin</option>
                  <option value="Admin">Admin</option>
                  <option value="Karyawan">Karyawan</option>
             </select> 
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
            <button id="btntambah" name="btntambah" type="submit"  class="btn btn-primary">Tambah</button>
          </div>
        </div>
    </div> 
  </form>
    <!--Akhir dari Modals Tambah Karyawan -->

     <div class="text-center">
      <div class="credits">
        <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
      </div>
      </div>
</div>

    <!-- JS untuk opsi resign di bagian edit data karyawan -->

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

    <script>
    $(document).ready(function(){

       $('#nik').blur(function(){
        var error_nik = '';
        var nik = $('#nik').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         $.ajax({
          url:"{{ route('nik_available.check') }}",
          method:"POST",
          data:{nik:nik, _token:_token},
          success:function(result)
          {
           if(result == 'unique')
           {
            $('#error_nik').html('<label class="text-success">NIK Available</label>');
            $('#nik').removeClass('has-error');
            $('#btntambah').removeClass('disabled', false);
           }
           else
           {
            $('#error_nik').html('<label class="text-danger">NIK not Available</label>');
            $('#nik').addClass('has-error');
            $('#btntambah').addClass('disabled', 'disabled');
           }
          }
         })
        
       });
       
      });
    </script>

    <script>
     $(document).ready(function(){

       $('#email').blur(function(){
        var error_email = '';
        var email = $('#email').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         $.ajax({
          url:"{{ route('email_available.check') }}",
          method:"POST",
          data:{email:email, _token:_token},
          success:function(result)
          {
           if(result == 'unique')
           {
            $('#error_email').html('<label class="text-success">Email Available</label>');
            $('#email').removeClass('has-error');
            $('#btntambah').removeClass('disabled', false);
           }
           else
           {
            $('#error_email').html('<label class="text-danger">Email not Available</label>');
            $('#email').addClass('has-error');
            $('#btntambah').addClass('disabled', 'disabled');
           }
          }
         })
        
       });
       
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

    </script>

</body>
</html>