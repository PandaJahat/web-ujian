@extends('layouts.admin')

@section('title')
Ujian
@endsection

@section('pagetitle')
Ujian<small>Daftar Ujian Tersedia</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.class') }}">Kelas</a></li>
  <li><a href="{{ route('admin.class.detail', ['id' => $id]) }}">Detail</a></li>
  <li class="active">Pilih Ujian</li>
@endsection

@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugin/datatables.css') }}">
@endpush

@push('scripts')
<script type="text/javascript" charset="utf8" src="{{ asset('js/plugin/datatables.js') }}"></script>
@endpush

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tabel</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @include('admin.class.detail.select.examTable')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ route('admin.class.detail', ['id' => $id]) }}" class="btn btn-default">Kembali</a>
    </div>
    <!-- box-footer -->
</div>
<!-- /.box -->
@endsection