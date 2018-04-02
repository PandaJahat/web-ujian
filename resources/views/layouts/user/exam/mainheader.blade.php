
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
      <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li style="display: none"><a href="#"><span id="txt"></span></a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle">
              Waktu Ujian :
            </a>
          </li>

          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle">
              <span id="countdown"></span>
            </a>
          </li>

          <li class="dropdown user user-menu">
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
              </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
