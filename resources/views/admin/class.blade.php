@extends('layouts.admin')

@section('title')
Ruang
@endsection

@section('pagetitle')
Ruang<small>Daftar lengkap ruang</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.class') }}">Ruang</a></li>
  <li class="active">Daftar</li>
@endsection

@include('plugins.datatables')

@section('content')
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tabel</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah Ruang</button>
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    @include('admin.class.table')
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    The footer of the box
  </div>
  <!-- box-footer -->
</div>
<!-- /.box -->
@include('admin.class.modalCreate')
@endsection

@push('scripts')
<script type="text/javascript">
  @if ($errors->classPost->any())
    $('#modal-create').modal();
  @endif
</script>
@endpush
