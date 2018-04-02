@extends('layouts.user')

@section('content')
  <div class="box box-default color-palette-box">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-book margin-r-5"></i>Daftar Ujian</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-default btn-sm" onClick="window.location.reload()">
          <i class="fa fa-refresh margin-r-5"></i>Refresh
        </button>
      </div>
    </div>
    <div class="box-body">
      @include('user.exam.list')
    </div>
    <!-- /.box-body -->
  </div>
    <!-- /.box -->
@endsection
