<div class="modal fade" id="modal-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Peruabahan Data Soal Ujian</h4>
      </div>
      <form action="{{ route('admin.question.update.submit', ['id' => $question->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="modal-body">
          <div class="form-group">
            <label>Pertanyaan</label>
            <textarea class="form-control" rows="3" placeholder="Tulis ..." name="text" required>{{ $question->text }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Gambar</label>
            <input type="file" name="picture" accept="image/*">
            <p class="help-block">Pilih gambar apabila ingin mengubah gambar.</p>
          </div>

          @foreach ($answers as $answer)
            <div class="form-group">
              <label>Jawaban {{ $ch[$count++] }}</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="radio" name="true" value="{{ $count }}"
                  @if ($answer->true)
                    checked
                  @endif>
                </span>
                <input type="text" class="form-control" name="answer_text[]" required value="{{ $answer->text }}">
                <input type="hidden" name="answer_id[]" value="{{ $answer->id }}">
              </div>
            </div>
          @endforeach

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
