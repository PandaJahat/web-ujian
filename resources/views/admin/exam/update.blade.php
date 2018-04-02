@extends('layouts.admin')

@section('title')
Perubahan Ujian
@endsection

@section('pagetitle')
  Formulir<small>Perubahan Data Ujian</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.exam') }}">Ujian</a></li>
  <li><a href="{{ route('admin.exam.detail', ['id' => $exam->id])  }}">Detail</a></li>
  <li class="active">Ubah</li>
@endsection

@section('content')
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Formulir</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" action="{{ route('admin.exam.update.submit', ['id' => $exam->id]) }}" method="POST">
      <div class="box-body">
        @include('admin.exam.formUpdate')
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('admin.exam.detail', ['id' => $exam->id]) }}" class="btn btn-default">Kembali</a>
        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
      </div>
      <!-- box-footer -->
    </form>
  </div>
  <!-- /.box -->
@endsection
