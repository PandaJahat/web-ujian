<table class="table table-bordered table-hover dataTable" id="exams-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Ujian</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Durasi</th>
            <th>Jumlah Soal</th>
            <th></th>
        </tr>
    </thead>
  </table>

  @push('scripts')
    <script>
    $(function() {
      exams_table = $('#exams-table').DataTable({
            processing: true,
            serverSide: true,
            language:{
              emptyTable:'belum ada ujian pada kelas ini . . .'
            },
            ajax: '{!! route('admin.class.exam.list', [$class]) !!}',
            order: [[ 2, 'desc' ]],
            columns: [
                { data: 'DT_Row_Index', name: 'id', searchable:false },
                { data: 'name', name: 'users.name' },
                { data: 'start_at', name: 'start_at' },
                { data: 'stop_at', name: 'stop_at' },
                { data: 'duration', name: 'duration', searchable:false, orderable:false },
                { data: 'total_question', name: 'total_question', searchable:false, orderable:false },
                { data: 'remove', name: 'remove', searchable:false, orderable:false },
            ]
        });
    });
    </script>
  @endpush

@push('scripts')
  <script>
    function remove(class_id, exam_id) {
      $.post( "{{ route('admin.class.exam.remove', [$class]) }}", {
        _token: "{{ csrf_token() }}",
        _method: "DELETE",
        id: class_id,
        exam_id: exam_id
      },function() {
        exams_table.draw()
      });
    }
  </script>
@endpush
