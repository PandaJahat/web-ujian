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

@include('admin.question.modalUpdate')

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