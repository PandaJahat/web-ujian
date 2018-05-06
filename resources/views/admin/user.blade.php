@extends('layouts.admin')

@section('title')
  Peserta Ujian
@endsection

@section('pagetitle')
  Peserta Ujian<small>Daftar Lengkap Peserta Ujian</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.user') }}">Peserta</a></li>
  <li class="active">Daftar</li>
@endsection

@include('plugins.datatables')

@section('content')
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Daftar Seluruh Peserta</h3>
    <div class="box-tools pull-right">
      {{-- <button class="btn btn-success btn-sm"><i class="fa fa-file-excel-o margin-r-5"></i>Import Excel</button>
      <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus margin-r-5"></i>Tambah Peserta</a> --}}
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    @include('admin.user.table')
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    The footer of the box
  </div>
  <!-- box-footer -->
</div>
<!-- /.box -->

@endsection
