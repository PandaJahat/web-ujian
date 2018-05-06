@extends('layouts.admin')

@section('title')
  Pendidikan Terakhir
@endsection

@section('breadcrumb')
  <li><a href="#">Data</a></li>
  <li><a href="{{ route('admin.data.education') }}">Pendidikan</a></li>
  <li class="active">Daftar</li>
@endsection

@include('plugins.datatables')

@section('pagetitle')
  Pendidikan<small>Daftar Pendidikan Terakhir</small>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tabel</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @include('admin.data.education.table')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <span class="text-muted"><b>Catatan:</b> Pendidikan terakhir digunakan para peserta ujian untuk memilih pendidikan terakhir mereka.</span>
        </div>
        <!-- box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Formulir Tambah Pendidikan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <form action="{{ route('admin.data.education.create.submit') }}" method="post">
          <div class="box-body">
            @include('admin.data.education.formCreate')
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
          </div>
        </form>
        <!-- box-footer -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection
