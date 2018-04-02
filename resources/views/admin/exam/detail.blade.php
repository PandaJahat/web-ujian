@extends('layouts.admin')

@section('title')
  Detail Ujian
@endsection

@section('pagetitle')
  Detail: {{ $exam->name.' ('.round(abs(strtotime($exam->start_at) - strtotime($exam->stop_at)) / 60,2).' menit)' }}<small>Data Lengkap Ujian</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.exam') }}">Ujian</a></li>
  <li class="active">Detail</li>
@endsection

@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugin/datatables.css') }}">
@endpush

@push('scripts')
<script type="text/javascript" charset="utf8" src="{{ asset('js/plugin/datatables.js') }}"></script>
@endpush

@section('content')
  <div class="row">
    <div class="col-md-9">
      @include('admin.exam.detail.questions')
    </div>
    <div class="col-md-3">
      <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Detail</h3>
              <div class="box-tools pull-right">
                <a href="{{ route('admin.exam.update', ['id' => $exam->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i> Ubah</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Nama Ujian</strong>

              <p class="text-muted">
                {{ $exam->name }}
              </p>

              <hr>

              <strong><i class="fa fa-calendar margin-r-5"></i>Mulai Ujian</strong>

              <p class="text-muted">
                {{ date('H:i:s , d M Y', strtotime($exam->start_at)) }}
              </p>

              <hr>

              <strong><i class="fa fa-calendar margin-r-5"></i>Akhir Ujian</strong>

              <p class="text-muted">
                {{ date('H:i:s , d M Y', strtotime($exam->stop_at)) }}
              </p>

              <hr>

              <strong><i class="fa fa-check margin-r-5"></i>Batas Kelulusan</strong>

              <p class="text-muted">
                Dengan Nilai:
              </p>

              <hr>

              <strong><i class="fa fa-question-circle margin-r-5"></i>Jumlah Soal</strong>

              <p class="text-muted">
                {{ $total_questions }} Soal
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i>Keterangan</strong>

              <p>
                {{ $exam->detail }}
              </p>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
@endsection
