@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugin/datatables.css') }}">
@endpush

<table class="table table-bordered table-hover dataTable" id="users-table">
  <thead>
      <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Dibuat</th>
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
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('admin.user.data') !!}',
          order: [[ 3, 'desc' ]],
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'username', name: 'username' },
              { data: 'created_at', name: 'created_at' },
              { data: 'edit', name: 'edit', orderable: false, searchable: false },
              { data: 'detail', name: 'detail', orderable: false, searchable: false }
          ]
      });
  });
  </script>
@endpush
