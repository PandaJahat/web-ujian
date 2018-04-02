<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Detail Kelas</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#modal-update">
        <i class="fa fa-pencil-square-o"></i> Ubah
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <strong>
      <i class="fa fa-sticky-note margin-r-5"></i> Keterangan</strong>

    <p class="text-muted">
      {{ $class->text }}
    </p>

    <hr>

    <strong>
      <i class="fa fa-users margin-r-5"></i> Jumlah Peserta</strong>

    <p class="text-muted">{{ $total_user }} Peserta</p>

    <hr>

    <strong>
      <i class="fa fa-book margin-r-5"></i> Jumlah Ujian</strong>

    <p class="text-muted">Jumlah</p>

    <hr>

    <strong>
      <i class="fa fa-calendar margin-r-5"></i> Dibuat Pada</strong>

    <p class="text-muted">{{ date('d M Y', strtotime($class->created_at)) }}</p>

  </div>
  <!-- /.box-body -->
</div>

  @include('admin.class.modalUpdate')

@if ($errors->classPatch->any())
  @push('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#modal-update').modal('show');
    })
  </script>
  @endpush
@endif
