@extends('layouts.admin')

@section('title')
Ruang
@endsection

@section('pagetitle')
Ruang: {{ $class->name }} <small>Detail lengkap ruang</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.class') }}">Ruang</a></li>
  <li class="active">Detail</li>
@endsection

@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugin/datatables.css') }}">
@endpush

@push('scripts')
<script type="text/javascript" charset="utf8" src="{{ asset('js/plugin/datatables.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.1.3/dist/sweetalert2.all.js"></script>
@endpush

@section('content')
<div class="row">
  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Peserta Ujian</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#user-create">
            <i class="fa fa-plus margin-r-5"></i> Tambah Peserta</button>
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        @include('admin.class.detail.user.table')
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('admin.class') }}" class="btn btn-default">Kembali</a>
        <form action="{{ route('admin.class.delete.submit') }}" class="pull-right" method="POST" id="delete">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="hidden" name="id" value="{{ $class->id }}">
          <button type="button" class="btn btn-danger" onclick="deleteClass()">
            <i class="fa fa-trash"></i> Hapus Ruang
          </button>
        </form>
      </div>
      <!-- box-footer -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-md-3">
    @include('admin.class.detail.info')
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    @include('admin.class.detail.exams')
  </div>
</div>
  @include('admin.class.detail.user.modalCreate')

@endsection

@push('scripts')

<script type="text/javascript">
  function deleteClass() {
    swal({
      title: 'Apakah?',
      text: "Anda yakin ingin menghapus Ruang ini ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
        swal({
          title: 'Berhasil!',
          text: 'Ruang berhasil dihapus.',
          type: 'success',
          timer: 1500,
          onOpen: () => {
            swal.showLoading()
          }
        }).then((result) => {
          if (result.dismiss === 'timer') {
            document.forms['delete'].submit();
          }
        })
      }
    })
  }
</script>
@endpush