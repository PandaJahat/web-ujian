<table class="table table-bordered table-hover dataTable" id="programs-table">
  <thead>
      <tr>
          <th>No.</th>
          <th>Kode Jurusan</th>
          <th>Nama Jurusan</th>
          <th>Fakultas</th>
          <th>Dibuat</th>
          <th>Diubah</th>
          <th> </th>
          <th> </th>
      </tr>
  </thead>
</table>

@push('scripts')
  <script>
  $(function() {
    programs_table = $('#programs-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('admin.data.program.data') !!}',
          order: [[ 4, 'desc' ]],
          columns: [
              { data: 'id', name: 'id' },
              { data: 'code', name: 'code' },
              { data: 'name', name: 'name' },
              { data: 'faculty', name: 'faculty_id' },
              { data: 'created_at', name: 'created_at' },
              { data: 'updated_at', name: 'updated_at' },
              { data: 'update', name: 'update', orderable: false, searchable: false },
              { data: 'delete', name: 'delete', orderable: false, searchable: false }
          ]
      });
  });
  </script>
@endpush

@push('scripts')
<div id="modal"></div>

<script>
    function updateForm(id) {
        $.get('{{ route('admin.data.program.update') }}', {
                id: id                
            },
            function (result) {
                $('#modal').html(result);
                $('#modal-update').modal('show');
            })
    }
</script>

@if ($errors->update->any())
<script>
    swal(
        'Oops...',
        'Kode jurusan sudah digunakan.',
        'error'
    )
</script>
@endif

@endpush

@push('scripts')
<script>
    function deleteConfirm(id) {
        swal({
            title: 'Anda Yakin?',
            text: "Ingin menghapus data jurusan ini.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.post("{{ route('admin.data.program.delete') }}", {
                    id: id,
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                }, function (result) {
                    programs_table.draw();
                }) && swal('Behasil!', 'Data jurusan berhasil dihapus.',
                    'success')
            }
        })
    }
</script>
@endpush