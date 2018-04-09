
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

{{ csrf_field() }}

<span id="question-form-create">
  <div class="form-group">
    <label>Pertanyaan</label>
    <textarea id="text-editor-create" class="form-control" rows="3" placeholder="Tulis ..." name="text">{{ old('text') }}</textarea>
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
        <input type="radio" name="true" value="1" {{ (old( 'true')==1)? 'checked': '' }}>
      </span>
      <input type="text" class="form-control" name="answer_text[]" value="{{ old('answer_text')[0] }}">
    </div>
  </div>
  <div class="form-group">
    <label>Jawaban B</label>
    <div class="input-group">
      <span class="input-group-addon">
        <input type="radio" name="true" value="2" {{ (old( 'true')==2)? 'checked': '' }}>
      </span>
      <input type="text" class="form-control" name="answer_text[]" value="{{ old('answer_text')[1] }}">
    </div>
  </div>
  <div class="form-group">
    <label>Jawaban C</label>
    <div class="input-group">
      <span class="input-group-addon">
        <input type="radio" name="true" value="3" {{ (old( 'true')==3)? 'checked': '' }}>
      </span>
      <input type="text" class="form-control" name="answer_text[]" value="{{ old('answer_text')[2] }}">
    </div>
  </div>
  <div class="form-group">
    <label>Jawaban D</label>
    <div class="input-group">
      <span class="input-group-addon">
        <input type="radio" name="true" value="4" old {{ (old( 'true')==4)? 'checked': '' }}>
      </span>
      <input type="text" class="form-control" name="answer_text[]" value="{{ old('answer_text')[3] }}">
    </div>
  </div>
</span>

  @push('scripts')
    <script>
    $(function () {
      $('#question-form-create').find('input[type="radio"]').iCheck({        
        radioClass: 'iradio_flat-green'
      })

      CKEDITOR.replace('text-editor-create', {language: 'id'})

    })
    </script>
  @endpush