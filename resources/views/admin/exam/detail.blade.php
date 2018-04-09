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

@include('plugins.datatables')
@include('plugins.sweetalert2')
@include('plugins.icheck')

@include('plugins.icheck')
@include('plugins.ckeditor')

@section('content')
  <div class="row">
    <div class="col-md-3">
      @include('admin.exam.detail.info')
    </div>
    <div class="col-md-9">
      @include('admin.exam.detail.questions')
    </div>
  </div>
@endsection
