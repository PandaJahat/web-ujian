<div class="modal fade" id="modal-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Formulir Penambahan Soal Ujian</h4>
      </div>
      <form action="{{ route('admin.question.submit') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">

            @if ($errors->questionPost->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                <ul>
                    @foreach ($errors->questionPost->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>            
            @endif

          <div class="form-group">
            <label>Pertanyaan</label>
            <textarea class="form-control" rows="3" placeholder="Tulis ..." name="text">{{ old('text') }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Gambar</label>
            <input type="file" name="picture" accept="image/*">
            <p class="help-block">Gambar pendukung (opsional).</p>
          </div>
          <div class="form-group">
            <label>Jawaban A</label>
            <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" name="true" value="1" {{ (old('true')==1)?'checked':'' }}>
              </span>
              <input type="text" class="form-control" name="answer_text[]" value="{{ old('answer_text')[0] }}">
            </div>
          </div>
          <div class="form-group">
            <label>Jawaban B</label>
            <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" name="true" value="2" {{ (old('true')==2)?'checked':'' }}>
              </span>
              <input type="text" class="form-control" name="answer_text[]" value="{{ old('answer_text')[1] }}">
            </div>
          </div>
          <div class="form-group">
            <label>Jawaban C</label>
            <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" name="true" value="3" {{ (old('true')==3)?'checked':'' }}>
              </span>
              <input type="text" class="form-control" name="answer_text[]"value="{{ old('answer_text')[2] }}">
            </div>
          </div>
          <div class="form-group">
            <label>Jawaban D</label>
            <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" name="true" value="4" old {{ (old('true')==4)?'checked':'' }}>
              </span>
              <input type="text" class="form-control" name="answer_text[]" value="{{ old('answer_text')[3] }}">
            </div>
          </div>
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
