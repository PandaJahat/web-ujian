<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Detail</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('admin.exam.update', ['id' => $exam->id]) }}" class="btn btn-warning btn-sm">
                <i class="fa fa-pencil-square-o"></i> Ubah</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <strong>
            <i class="fa fa-book margin-r-5"></i>Nama Ujian</strong>

        <p class="text-muted">
            {{ $exam->name }}
        </p>

        <hr>

        <strong>
            <i class="fa fa-calendar margin-r-5"></i>Mulai Ujian</strong>

        <p class="text-muted">
            {{ date('H:i:s , d M Y', strtotime($exam->start_at)) }}
        </p>

        <hr>

        <strong>
            <i class="fa fa-calendar margin-r-5"></i>Akhir Ujian</strong>

        <p class="text-muted">
            {{ date('H:i:s , d M Y', strtotime($exam->stop_at)) }}
        </p>

        <hr>

        <strong>
            <i class="fa fa-check margin-r-5"></i>Batas Kelulusan</strong>

        <p class="text-muted">
            Dengan Nilai: {{ $exam->base_score }}
        </p>

        <hr>

        <strong>
            <i class="fa fa-question-circle margin-r-5"></i>Jumlah Soal</strong>

        <p class="text-muted">
            {{ $total_questions }} Soal
        </p>

        <hr>

        <strong>
            <i class="fa fa-file-text-o margin-r-5"></i>Keterangan</strong>

        <p>
            {{ $exam->detail }}
        </p>
    </div>
    <!-- /.box-body -->
</div>
