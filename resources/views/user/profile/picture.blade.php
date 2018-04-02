<!-- Profile Image -->
<div class="box box-primary">
  <div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle" src="{{ empty($profile->photo)?asset('img/default_profile_white.png'):asset("img/users/$profile->photo") }}" alt="User profile picture">

    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

    <p class="text-muted text-center">Peserta Ujian</p>

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- About Me Box -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tentang Saya</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

    <p class="text-muted">{{ $education->name or 'Belum diisi' }}</p>

    <hr>
    <strong><i class="fa fa-building margin-r-5"></i> Asal Sekolah</strong>

    <p class="text-muted">{{ $profile->institute or 'Belum diisi' }}</p>

    <hr>

    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

    <p class="text-muted">{{ $profile->address or 'Belum diisi' }}</p>

    <hr>

    <strong><i class="fa fa-pencil margin-r-5"></i> Minat Jurusan</strong>

    <p>
      @if (empty($program))
        <span class="label label-primary">Belum memilih</span>
      @endif
    </p>

    <hr>

    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
