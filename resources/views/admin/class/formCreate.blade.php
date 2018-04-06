{{ csrf_field() }}
<div class="form-group">
  <label>Kode Ruang</label>
  <input class="form-control" type="text" name="code" required value="{{ old('code') }}">
</div>

<div class="form-group">
  <label>Nama Ruang</label>
  <input class="form-control" type="text" name="name" required value="{{ old('name') }}">
</div>

<div class="form-group">
  <label>Keterangan</label>
  <textarea class="form-control" rows="3" name="text">{{ old('text') }}</textarea>
</div>
