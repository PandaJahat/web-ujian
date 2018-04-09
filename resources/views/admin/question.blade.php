@extends('layouts.admin')

@section('title')
  Soal Ujian
@endsection

@section('pagetitle')
  Soal<small>Daftar Lengkap Soal Ujian</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.question') }}">Soal</a></li>
  <li class="active">Daftar</li>
@endsection

@include('plugins.icheck')
@include('plugins.ckeditor')
@include('plugins.sweetalert2')

@section('content')
  <!-- Default box -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Soal Ujian </h3>

      <div class="box-tools pull-right">
        <button name="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah Soal</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      @include('admin.question.table')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

  <div id="modal"></div>
  @include('admin.question.modalCreate')
@endsection

@push('scripts')
<script type="text/javascript">
  @if ($errors->questionPost->any())
    $('#modal-create').modal();
  @endif
</script>
@endpush