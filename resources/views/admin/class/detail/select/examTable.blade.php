<table class="table table-bordered table-hover dataTable" id="exam-table">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Ujian</th>
            <th>Mulai Ujian</th>
            <th>Akhir Ujian</th>
            <th>Soal</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
</table>

<div id="modal"></div>

@push('links')
  <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush 

@push('scripts')
  <script>
  $(function() {
      exam_table = $('#exam-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{!! route('admin.class.exam.data', ['id' => $id]) !!}",
          order: [[ 4, 'desc' ]],
          columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'start_at', name: 'start_at' },
            { data: 'stop_at', name: 'stop_at' },
            { data: 'questions', name: 'questions', orderable: false, searchable: false  },
            { data: 'change', name: 'change', orderable: false, searchable: false  },
            { data: 'select', name: 'select', orderable: false, searchable: false },
          ]
      });
  });

  function selectExam(id) {
    $.post( "{{ route('admin.class.exam.select', ['id' => $id]) }}",{
      id:id,
      _token: "{{ csrf_token() }}"
    }, function() {
      exam_table.draw();
    });
  }

  function changeSchedule(id) {
    $.get("{{ route('admin.class.exam.change', ['id' => $id]) }}", {
      id:id
    },function (result) {     
      showModal(result)
    });
  }

  function showModal(result) {
    $('#modal').html(result);
    $('#modal-change').modal();

    $("#start_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii'
      });
      $("#end_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii'
      });
  }
  </script>
@endpush

@if ($errors->examPatch->any())
  @if (!empty(old('id')))
    @push('scripts')
      <script>
        $.get("{{ route('admin.class.exam.change', ['id' => $id]) }}", {
          id:"{{ old('id') }}"
        },function (result) {     
          showModal(result);
            $("#alert").removeAttr("style");
          @foreach ($errors->examPatch->all() as $error)
            $("#messages").append("<li>{{ $error }}</li>");
          @endforeach          

        });
      </script>
    @endpush
  @endif
@endif