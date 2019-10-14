<!--  Sidebar Brand Logo -->

<div  style="height:100%; overflow-y: auto;" id="scrollbar-sidebar" class="be-left-sidebar">
  <div class="brand-logo">
    <img src="/image/logo.png">
  </div> 
  <div class="left-sidebar-wrapper"> <a href="#" class="left-sidebar-toggle">MENU</a>
   <div class="left-sidebar-spacer">
    <div class="left-sidebar-scroll">
      <div class="left-sidebar-content">

        <!--  Sidebar Poto, Username, Edit Profil -->
        <div class="profil">
          <div class="circular--portrait">
            <img class="img-responsive foto-karyawan" src="/image/FotoProfil/{{Auth::user()->foto_profil}}">
            <div id="username">
              <a href="/profil/{{Auth::user()->id}}" class="simple_text"><h1 class="username">{{ Auth::user()->nama_karyawan }}</h1></a>
            </div>     
          </div>
          <div class="profil2"><a href="/profil/{{Auth::user()->id}}"><button type="button" class="btn btn-space btn-primary"> Profil </button></a></div>  
        </div>

        
        <!--  Sidebar Menu-->
        <ul class="sidebar-elements">
          @if(Auth::user()->role == "Admin" || Auth::user()->role == "SuperAdmin")
          <li class="divider">
            <span>Menu</span>
            <hr class="Menu">  
          </li>
          <li class="active"><a href="/home">
            <i class="icon fas fa-home"></i>
            <span>Beranda</span></a>
          </li>                                         
          <li class="active">
            <a class="">
              <i class="icon far fa-address-book"></i>
              <span>Data Karyawan</span>
            </a>
            <ul class="sub-menu">
              <li><a href="/datakaryawan">Tabel Karyawan</a>
              </li>
              <li><a href="/pengaturan_data_karyawan">Pengaturan</a>
              </li>
            </ul>
          </li>

          <li class="active">
            <a class=" ">
              <i class="icon fas fa-calendar-alt"></i>
              <span>Presensi</span>
            </a>
            <ul class="sub-menu">
              <li><a href="/presensi">Tabel Presensi</a>
              </li>
              <li><a href="/standar_presensi">Rekap Presensi</a>
              </li>
              <li><a href="/pengaturan_presensi">Pengaturan</a>
              </li>
            </ul>
          </li>

          <li class="active">
            <a class=" ">
              <i class="icon fas fa-money-check-alt"></i>
              <span>Penggajian</span>
            </a>
            <ul class="sub-menu">
              <li><a href="/penggajian">Tabel Penggajian</a>
              </li>
              <li><a href="/standar_penggajian">Standar Penggajian</a>
              </li>
              <li><a href="/pengaturan_penggajian">Pengaturan</a>
              </li>
            </ul>
          </li>

          <li class="active">
            <a class=" " href="/divisi">
              <i class="icon fas fa-users"></i>
              <span>Divisi</span>
            </a>
          </li>

          <li class="active">
            <a class=" " href="/persetujuan_izin">
              <i class="icon far fa-calendar-check"></i>
              <span>Persetujuan Izin</span>
            </a>
          </li>

                    <li class="divider">
            <span>Personal</span>
            <hr class="Menu">  
          </li> 

          <li class="active">
            <a class=" " href="/form_izin">
              <i class="icon fab fa-wpforms"></i>
              <span>Form Izin</span>
            </a>
          </li>

          <li class="active">
            <a class=" " href="/gaji/{{Auth::user()->id}}">
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

          @else 

          <li class="divider">
            <span>Personal</span>
            <hr class="Menu">  
          </li> 

          <li class="active">
            <a class=" " href="/form_izin">
              <i class="icon fab fa-wpforms"></i>
              <span>Form Izin</span>
            </a>
          </li>

          <li class="active">
            <a class=" " href="/gaji/{{Auth::user()->id}}">
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
        @endif                             
      </ul>
      <!-- Sidebar Menu End -->

      

    </div>                         
  </div>
</div>
</div>
</div>

