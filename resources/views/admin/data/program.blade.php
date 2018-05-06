@extends('layouts.admin')

@section('title')
  Program Studi
@endsection

@section('pagetitle')
  Program Studi<small>Daftar Lengkap Program Studi</small>
@endsection

@section('breadcrumb')
  <li><a href="#">Data</a></li>
  <li><a href="{{ route('admin.data.program') }}">Program Studi</a></li>
  <li class="active">Daftar</li>
@endsection

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Tabel</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus margin-r-5"></i> Tambah Program Studi</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @include('admin.data.program.table')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <span class="text-muted"><b>Catatan:</b> Program Studi digunakan untuk melihat minat peserta ujian</span>
    </div>
</div>
@include('admin.data.program.modalCreate')
@endsection
