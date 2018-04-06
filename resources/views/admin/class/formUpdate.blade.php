{{ csrf_field() }}
{{ method_field('PATCH') }}

<div class="form-group">
    <label>Kode Ruang</label>
    <input class="form-control" type="text" name="code" required value="{{ $class->code }}">
</div>

<div class="form-group">
    <label>Nama Ruang</label>
    <input class="form-control" type="text" name="name" required value="{{ $class->name }}">
</div>

<div class="form-group">
    <label>Keterangan</label>
    <textarea class="form-control" rows="3" name="text">{{ $class->text }}</textarea>
</div>