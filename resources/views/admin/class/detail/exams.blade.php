<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Ujian</h3>
        <div class="box-tools pull-right">
            <div class="box-tools pull-right">
                <a href="{{ route('admin.class.exam', ['id' => $class->id]) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-clone margin-r-5"></i> Pilih Ujian</a>
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @include('admin.class.detail.exam.table')
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->