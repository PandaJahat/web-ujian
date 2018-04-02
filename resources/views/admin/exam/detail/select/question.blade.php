@extends('layouts.admin')

@section('title')
  Ujian
@endsection

@section('pagetitle')
  Pilih Soal<small>Daftar Lengkap Soal Ujian</small>
@endsection

@section('breadcrumb')
  <li><a href="{{ route('admin.exam') }}">Ujian</a></li>
  <li><a href="{{ route('admin.exam') }}">Daftar</a></li>
  <li><a href="{{ route('admin.exam.detail', ['id' => $id]) }}">Detail</a></li>
  <li class="active">Pilih Soal</li>
@endsection

@section('content')
  <!-- Default box -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Soal Ujian </h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      @include('admin.exam.detail.select.questionTable')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ route('admin.exam.detail', ['id' => $id]) }}" class="btn btn-default">Kembali</a>
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

  <div id="modal"></div>
@endsection

@push('scripts')
  <script type="text/javascript">
    function detail(id) {
      $.ajax({
        type: "POST",
        url: '{{ route('admin.question.detail') }}',
        data: {id:id, _token:'{{ csrf_token() }}'},
        success: function(data) {
          $("#modal").html(data);
          $('#modal-detail').modal('show');
        },

      });
    }
  </script>
@endpush
