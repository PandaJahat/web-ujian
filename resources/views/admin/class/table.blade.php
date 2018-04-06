@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugin/datatables.css') }}">
@endpush

<table class="table table-bordered table-hover dataTable" id="classes-table">
  <thead>
      <tr>
          <th>No</th>
          <th>Kode Ruang</th>
          <th>Nama Ruang</th>
          <th>Keterangan</th>
          <th>Dibuat</th>
          <th>Diubah</th>
          <th></th>
      </tr>
  </thead>
</table>

@push('scripts')
<script type="text/javascript" charset="utf8" src="{{ asset('js/plugin/datatables.js') }}"></script>
@endpush

@push('scripts')
  <script>
  $(function() {
      $('#classes-table').DataTable({
          processing: true,
          serverSide: true,
          language:{
            emptyTable:'belum ada ruang untuk saat ini . . .'
          },
          ajax: '{!! route('admin.class.data') !!}',
          order: [[ 4, 'desc' ]],
          columns: [
              { data: 'DT_Row_Index', name: 'DT_Row_Index', orderable: false, searchable: false },
              { data: 'code', name: 'code' },
              { data: 'name', name: 'name' },
              { data: 'text', name: 'text' },
              { data: 'created_at', name: 'created_at' },
              { data: 'updated_at', name: 'updated_at' },
              { data: 'detail', name: 'detail', orderable: false, searchable: false },
          ]
      });
  });
  </script>
@endpush
