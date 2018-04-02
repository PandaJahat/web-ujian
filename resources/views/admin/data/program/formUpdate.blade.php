{{ csrf_field() }}

{{ method_field('PATCH') }}

<input type="hidden" name="id" value="{{ $program->id }}">

<div class="form-group">
    <label for="exampleInputEmail1">Kode jurusan</label>
    <input class="form-control" type="text" name="program_code" value="{{ $program->program_code }}">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Nama jurusan</label>
    <input class="form-control" type="text" name="program_name" value="{{ $program->program_name }}">
</div>