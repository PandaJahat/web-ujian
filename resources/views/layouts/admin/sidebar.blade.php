<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('img/default_profile_white.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    {{-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> --}}
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>

      <li class="{{ Request::is('admin') ? 'active' : null }}">
        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
      </li>

      <li class="{{ (Request::is('admin/user/*') || Request::is('admin/user')) ? 'active' : null }}">
        <a href="{{ route('admin.user') }}"><i class="fa fa-users"></i> <span>Peserta</span></a>
      </li>

      <li class="{{ (Request::is('admin/class/*') || Request::is('admin/class')) ? 'active' : null }}">
        <a href="{{ route('admin.class') }}"><i class="fa fa-folder-open"></i> <span>Kelas</span></a>
      </li>

      <li class="{{ (Request::is('admin/exam/*') || Request::is('admin/exam')) ? 'active' : null }}">
        <a href="{{ route('admin.exam') }}"><i class="fa fa-book"></i> <span>Ujian</span></a>
      </li>

      <li class="{{ Request::is('admin/question') ? 'active' : null }}">
        <a href="{{ route('admin.question') }}"><i class="fa fa-file-text"></i> <span>Soal</span></a>
      </li>

      <li class="treeview {{ Request::is('admin/data/*') ? 'active' : null }}">
        <a href="#">
          <i class="fa fa-database"></i> <span>Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin/data/program') ? 'active' : null }}">
            <a href="{{ route('admin.data.program') }}"><i class="fa fa-circle-o"></i> Program Studi</a>
          </li>
          <li class="{{ Request::is('admin/data/education') ? 'active' : null }}">
            <a href="{{ route('admin.data.education') }}"><i class="fa fa-circle-o"></i> Pendidikan Terakhir</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-circle-o"></i> Level One</a>
          </li>
        </ul>
      </li>

      <li class="header">EXAMPLES</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
