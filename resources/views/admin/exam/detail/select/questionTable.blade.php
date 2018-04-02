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
                                language:{
                                  emptyTable:'Semua soal telah dipilih'
                                },
                                ajax: '{!! route('admin.exam.question.data', ['id' => $id]) !!}',
                                order: [[ 2, 'desc' ]],
                                columns: [
                                    { data: 'id', name: 'id' },
                                    { data: 'text', name: 'text' },
                                    { data: 'created_at', name: 'created_at' },
                                    { data: 'updated_at', name: 'updated_at' },
                                    { data: 'action2', name: 'action2', orderable: false, searchable: false },
                                    { data: 'action1', name: 'action1', orderable: false, searchable: false }
                                ]
                            });
  });

  function select(exam, question) {
    $.post("{{ route('admin.exam.question.select', ['id' => $id]) }}", {
      _token: "{{ csrf_token() }}",
      id: exam,
      question_id: question
    },function() {
      questions_table.draw()
    });
  }
  </script>
@endpush
