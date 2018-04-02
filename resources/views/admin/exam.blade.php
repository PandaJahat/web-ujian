@extends('layouts.admin')

@section('title')
  Ujian
@endsection

@section('pagetitle')
  Ujian<small>Daftar Lengkap Ujian</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.exam') }}">Ujian</a></li>
  <li class="active">Daftar</li>
@endsection

@section('content')
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Ujian</h3>
      <div class="box-tools pull-right">
        <a href="{{ route('admin.exam.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Ujian</a>
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @include('admin.exam.table')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      The footer of the box
    </div>
    <!-- box-footer -->
  </div>
  <!-- /.box -->
@endsection
