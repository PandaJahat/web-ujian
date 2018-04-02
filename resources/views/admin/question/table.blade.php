@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugin/datatables.css') }}">
@endpush

<table class="table table-bordered table-hover dataTable" id="questions-table">
  <thead>
      <tr>
          <th>Kode</th>
          <th>Soal</th>
          <th>Dibuat</th>
          <th>Diubah</th>
          <th> </th>
          <th> </th>
      </tr>
  </thead>
</table>

@push('scripts')
<script type="text/javascript" charset="utf8" src="{{ asset('js/plugin/datatables.js') }}"></script>
@endpush

@push('scripts')
  <script>
    
  $(function() {
    questions_table = $('#questions-table').DataTable({
          processing: true,
          serverSide: true,          
          ajax: '{!! route('admin.question.data') !!}',
          order: [[ 2, 'desc' ]],
          columns: [
              { data: 'id', name: 'id' },
              { data: 'text', name: 'text' },
              { data: 'created_at', name: 'created_at' },
              { data: 'updated_at', name: 'updated_at' },
              { data: 'action1', name: 'action1', orderable: false, searchable: false },
              { data: 'action2', name: 'action2', orderable: false, searchable: false }
          ]
      });
  });

  function refreshTable() {
    questions_table.draw();
  }
  </script>
@endpush

@push('scripts')
  <script type="text/javascript">
    function update(id) {
      $.ajax({
        type: "POST",
        url: '{{ route('admin.question.update') }}',
        data: {id:id, _token:'{{ csrf_token() }}'},
        success: function(data) {
          $("#modal").html(data);
          $('#modal-update').modal('show');
        },

      });
    }
  </script>
@endpush

@push('scripts')
  <script type="text/javascript">
    function detail(id) {
      $.ajax({
        type: "POST",
        url: '{{ route('admin.question.detail') }}',
        data: {id:id, _token:'{{ csrf_token() }}'},
        success: function(data) {
          $("#modal").html(data);
          $('#modal-detail').modal('show');
        },

      });
    }
  </script>
@endpush

@push('scripts')
<script src="https://unpkg.com/sweetalert2@7.1.3/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
  function deleteQuestion(id) {
    swal({
      title: 'Apakah?',
      text: "Anda yakin ingin menghapus soal ujian ini ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
        $('#modal-detail').modal('hide') &&
          $.post("{{ route('admin.question.delete') }}", {
            id: id,
            _token: '{{ csrf_token() }}',
            _method: 'DELETE'
          }, function () {
            refreshTable();
          }) &&
          swal({
            title: 'Berhasil!',
            text: 'Soal ujian berhasil dihapus.',
            type: 'success',
            timer: 1500,
            onOpen: () => {
              swal.showLoading()
            }
          })
      }
    })
  }
</script>
@endpush