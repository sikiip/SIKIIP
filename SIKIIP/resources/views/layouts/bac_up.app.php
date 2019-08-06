<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/logo_idea.png" style="width: 70px; height: 70px;">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <!-- Toastr untuk notifikasi -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <title>Beranda</title>

  <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
    <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- full calendar css-->
    <link href="{{ asset('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
  <!-- easy pie chart-->
    <link href="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link href="{{ asset('css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
  <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}">
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet">
 <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/xcharts.min.css') }}" rel=" stylesheet">
    <link href="{{ asset('css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
  <!-- Link fontawesome--> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
   <link rel="stylesheet" type="text/css" href="css/beranda.css">

</head>
<body>
    <div id="app">
            <div class="container">
                <div>
                        @guest
                            
                            @if (Route::has('register'))
                                    <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                            @endif
                        @else

                                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               

                                 <!-- Sidebar -->
                                      <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                                        <ul class="nav sidebar-nav">

                                            <!-- Header Sidebar -->
                                              
                                          <li class="sidebar-brand">
                                          
                                            <div class="logo">
                                              <a href="dashboard.html" class="logo">
                                                <img src="img/logo_idea.png">
                                              </a>
                                              <hr color="#fff" width="100%" size="5px">
                                            </div>
                                          </li>

                                              <!-- Photo, Username, Edit Profil -->

                                          <div class="profil">
                                            <div class="circular--portrait">

                                              <img class="img-responsive" src="img/avatar1_small.jpg">
                                              <div id="username">
                                                <a href="editprofil.html" class="simple_text">Username </a>
                                              </div>
                                               <button  type="button" class="btn">Edit Profil</button>
                                            </div>
                                                <!--<hr color="#fff" width="100%" size="5px">
                                            </div> -->

                                          <!-- Sidebar Menu -->

                                          <li class="non-active">
                                            <a class="" href="beranda.html">
                                               <i class="fas fa-home"></i>
                                                <span>Beranda</span>
                                               <hr color="#000" size="12px" width="100%">
                                            </a>
                                          </li>

                                          <li class="active">
                                            <a class="" href="datakaryawan.html">
                                              <i class="far fa-address-book"></i>
                                                <span>Data Karyawan</span>
                                            </a>
                                          </li>

                                          <li class="active">
                                            <a class=" " href="presensi.html">
                                              <i class="fas fa-calendar-alt"></i>
                                              <span>Presensi</span>
                                          </a>
                                          </li>

                                          <li class="active">
                                            <a class=" " href="widgets.html">
                                               <i class="fas fa-money-check-alt"></i>
                                                <span>Penggajian</span>
                                            </a>
                                          </li>

                                          <li class="active">
                                            <a class=" " href="chart-chartjs.html">
                                               <i class="far fa-calendar-check"></i>
                                                <span>Persetujuan Izin</span>
                                            </a>
                                          </li>

                                          <li class="non-active">
                                            <a class="" href="index.html">
                                              <i class="far fa-user"></i>
                                              <span>Personal</span>
                                              <hr color="#000" size="12px" width="100%">
                                            </a>
                                          </li>

                                        <li class="active">
                                          <a class=" " href="widgets.html">
                                            <i class="fas fa-user"></i>
                                            <span>Profil</span>
                                          </a>
                                         </li>

                                          <li class="active">
                                            <a class=" " href="widgets.html">
                                              <i class="far fa-money-bill-alt"></i>
                                              <span>Gaji</span>
                                            </a>
                                          </li>

                                          <li class="active">
                                            <a class=" " href="widgets.html">
                                                <i class="far fa-id-card"></i>
                                                <span>Kontak Karyawan</span>
                                            </a>
                                          </li>

                                          <li class="active">
                                            <a class=" " href="chart-chartjs.html">
                                              <i class="fab fa-wpforms"></i>
                                              <span>Form Izin</span>
                                            </a>
                                          </li>

                                          <li class="non-active">
                                            <a class="logout"   id="logout" href="logout.php" >
                                             <i class="fas fa-sign-out-alt"></i>
                                                <span><b>Logout</b></span>
                                            </a>
                                          </li>

                                          <!-- Sidebar Menu End -->

                                       <!--   <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                              <li class="dropdown-header">Dropdown heading</li>
                                              <li><a href="#">Action</a></li>
                                              <li><a href="#">Another action</a></li>
                                              <li><a href="#">Something else here</a></li>
                                              <li><a href="#">Separated link</a></li>
                                              <li><a href="#">One more separated link</a></li>
                                            </ul>
                                          </li> -->

                                        </ul>
                                      </nav>
                                      <!-- /#sidebar-wrapper -->
                                  </div>

                                </aside>
                        @endguest
                        
                
                </div>
            </div>

            <div>
                
            </div>

        <main class="py-4">
            @guest
            @else
              <!-- Page Content -->
              <div id="page-content-wrapper">
                <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                  <span class="hamb-top"></span>
                  <span class="hamb-middle"></span>
                  <span class="hamb-bottom"></span>
                </button>
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">

                      <div class="welcome">
                        <h1>Selamat Datang</h1>
                          <a href="#">Username</a>            
                      </div>
                      
                      
                  </div>
                </div>
              </div>
              <!-- /#page-content-wrapper -->
            </div>
            <!-- /#wrapper -->

            <!-- Footer -->
            <div class="text-center">
              <div class="credits">
                <p>Sistem Informasi Karyawan<b> Idea Imaji Persada</b></p>
              </div>
            </div>
            @endguest
            @yield('content')
        </main>
    </div>
    <!-- javascripts -->
      <script src="/js/jquery.js"></script>
      <script src="/js/jquery-ui-1.10.4.min.js"></script>
      <script src="/js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
      <!-- bootstrap -->
      <script src="/js/bootstrap.min.js"></script>
      <!-- nice scroll -->
      <script src="/js/jquery.scrollTo.min.js"></script>
      <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
      <!-- charts scripts -->
      <script src="/assets/jquery-knob/js/jquery.knob.js"></script>
      <script src="/js/jquery.sparkline.js" type="text/javascript"></script>
      <script src="/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
      <script src="/js/owl.carousel.js"></script>
      <!-- jQuery full calendar -->
      <<script src="/js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="/js/calendar-custom.js"></script>
    <script src="/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="/js/jquery.customSelect.min.js"></script>
    <script src="/assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="/js/sparkline-chart.js"></script>
    <script src="/js/easy-pie-chart.js"></script>
    <script src="/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/js/xcharts.min.js"></script>
    <script src="/js/jquery.autosize.min.js"></script>
    <script src="/js/jquery.placeholder.min.js"></script>
    <script src="/js/gdp-data.js"></script>
    <script src="/js/morris.min.js"></script>
    <script src="/js/sparklines.js"></script>
    <script src="/js/charts.js"></script>
    <script src="/js/jquery.slimscroll.min.js"></script>

    <script>
      //knob
      $(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});

       $(function(){
          $('a#logout').click(function(){
              if(confirm('Apakah anda yakin ingin keluar ?')) {
                  return true;
              }

              return false;
          });
      });


    </script>


</body>
</html>
