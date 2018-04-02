@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugin/datatables.css') }}">
@endpush

<table class="table table-bordered table-hover dataTable" id="exams-table">
  <thead>
      <tr>
          <th>Kode</th>
          <th>Nama Ujian</th>
          <th>Mulai Ujian</th>
          <th>Akhir Ujian</th>
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
      $('#exams-table').DataTable({
          processing: true,
          serverSide: true,
          language:{
            emptyTable:'belum ada ujian untuk saat ini. . .'
          },
          ajax: '{!! route('admin.exam.data') !!}',
          order: [[ 4, 'desc' ]],
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'start_at', name: 'start_at' },
              { data: 'stop_at', name: 'stop_at' },
              { data: 'created_at', name: 'created_at' },
              { data: 'updated_at', name: 'updated_at' },
              { data: 'detail', name: 'detail', orderable: false, searchable: false },
          ]
      });
  });
  </script>
@endpush
