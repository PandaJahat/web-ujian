<input type="hidden" name="id" value="{{ $question->id }}">
<div class="form-group">
    <label>Pertanyaan</label>
    <textarea id="text-editor-update" class="form-control" rows="3" placeholder="Tulis ..." name="text">{{ $question->text }}</textarea>            
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