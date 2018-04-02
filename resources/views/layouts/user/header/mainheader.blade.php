<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="{{ url('/') }}" class="navbar-brand"><b>Ujian</b> Online</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
        @guest
          <li class="{{ Request::is( '/') ? 'active' : null }}"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="{{ Request::is( '/panduan') ? 'active' : null }}"><a href="{{ url('/panduan') }}">Panduan</a></li>
          <li class="dropdown {{ Request::is('tentang/*') ? 'active' : null  }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tentang <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="{{ Request::is('/tentang/kami') ? 'active' : null }}"><a href="{{ url('/tentang/kami') }}">Tentang Kami</a></li>
              <li class="{{ Request::is('/tentang/tujuan') ? 'active' : null }}"><a href="{{ url('/tentang/tujuan') }}">Tujuan & Alasan</a></li>
              <li class="divider"></li>
              <li><a href="#">Hubungi Kami</a></li>
            </ul>
          </li>
        @else
          <li class="{{ Request::is('home') ? 'active' : null }}"><a href="#">Beranda</a></li>
          <li class="{{ Request::is( '/panduan') ? 'active' : null }}"><a href="#">Panduan</a></li>
        @endguest
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          @auth
            @include('layouts.user.header.notif')
          @endauth
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            @guest
              <a href="{{ route('login') }}" class="dropdown-toggle"> Login</a>
            @else

              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ asset('img/default_profile_white.png') }}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{ asset('img/default_profile_white.png') }}" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->name }}
                    <small>Peserta Ujian</small>
                  </p>
                </li>
                <!-- Menu Body -->
                {{-- <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Gedung</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Ruangan</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Barang</a>
                    </div>
                  </div>
                </li> --}}
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ route('user.profile') }}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ route('user.logout') }}" class="btn btn-default btn-flat">
                    Logout</a>
                  </div>
                </li>
              </ul>
            @endguest
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
