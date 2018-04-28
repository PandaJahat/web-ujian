@if ($errors->create->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>
            <i class="icon fa fa-warning"></i> Perhatian!</h4>
        @foreach ($errors->create->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
    @push('scripts')
        <script>
            $('#modal-create').modal('show');
        </script>
    @endpush
@endif

{{ csrf_field() }}

<div class="form-group">
    <label for="exampleInputEmail1">Kode jurusan</label>
    <input class="form-control" type="text" name="code" value="{{ old('code') }}">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Nama jurusan</label>
    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
</div>

<div class="form-group">
    <label>Fakultas</label>
    <select class="form-control" name="faculty_id">
        
    </select>
</div>

@push('scripts')
    <script>
        $.get("{{ route('admin.data.program.faculty') }}", function (result) {            
            $.each(result, function (indexInArray, valueOfElement) { 
                $("#modal-create").find('select[name=faculty_id]').append('<option value="'+valueOfElement.id+'">'+valueOfElement.name+'</option>');                 
            });
        });
    </script>
@endpush