<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/image/favicon.png" style="width: 70px; height: 70px;">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="" rel="stylesheet">
    <!-- Style CSS login -->
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <!-- Toastr untuk notifikasi -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <title>IdeaImaji</title>

    <!-- Asset Template Beagle2 -->
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>


</head>
<body>
    <div id="app">
            <div class="container">
                <div>

                    <!-- Sidebar halaman -->
                        @guest

                            
                            
                        @else
                                @if (Auth::user()->role == "SuperAdmin")
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
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
                                  <h1>Weitss!! Super Admin..</h1>
                                @elseif (Auth::user()->role == "Admin")
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
                                <h1>Admin mau ngapain!</h1>
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
                                    <h1>Lu Karyawan daong!, mau ngapain?</h1>
                                @endif
                               
                        @endguest
                </div>
            </div>
        <div>            
    </div>
        <!-- Content dari halaman -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Script Toastr untuk notifikasi-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
             @if (Session::has('password'))
                    var type = "{{Session::get('alert-type','info')}}";
                    toastr.options = {
                      "debug": false,
                      "positionClass":"toast-top-center",
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


</div>


</body>
</html>
