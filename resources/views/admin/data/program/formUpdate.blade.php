{{ csrf_field() }}

{{ method_field('PATCH') }}

<input type="hidden" name="id" value="{{ $program->id }}">

<div class="form-group">
    <label for="exampleInputEmail1">Kode jurusan</label>
    <input class="form-control" type="text" name="code" value="{{ $program->code }}">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Nama jurusan</label>
    <input class="form-control" type="text" name="name" value="{{ $program->name }}">
</div>