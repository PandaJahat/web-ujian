<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Menu</h3>

    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li class="{{ (Request::is('/') || Request::is('home')) ? 'active' : null }}">
        <a href="{{ route('home') }}"><i class="fa fa-inbox"></i> Beranda</a>
      </li>
      <li class="{{ (Request::is('exam') || Request::is('exam/*')) ? 'active' : null }}">
        <a href="{{ route('exam') }}"><i class="fa fa-book"></i> Ujian</a>
      </li>
      <li>
        <a href="#"><i class="fa fa-file-text-o"></i> Hasil Ujian</a>
      </li>
      <li class="{{ (Request::is('user') || Request::is('user/*')) ? 'active' : null }}">
        <a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> Profil</a>
      </li>
    </ul>
  </div>
  <!-- /.box-body -->
  </div>
