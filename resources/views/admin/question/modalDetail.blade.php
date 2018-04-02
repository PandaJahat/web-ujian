<div class="modal fade" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button onclick="deleteQuestion('{{ $question->id }}')" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash"></i> Hapus</button>
        <h4 class="modal-title">Detail Soal Ujian</h4>
      </div>
      <div class="modal-body">
        <p class="lead">{{ $question->text }}</p>
        <hr>
        @if (!empty($question->picture))
          <img src="{{ asset('img/questions/'.$question->picture) }}" alt="Gambar Pendukung" class="img-responsive">
          <hr>
        @endif
        @foreach ($answers as $answer)
          <h4 class="
          @if ($answer->true)
            text-green
          @else
            text-muted
          @endif
          ">{{ $ch[$count++].'. '.$answer->text }} @if ($answer->true) (Benar) @endif</h4>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>