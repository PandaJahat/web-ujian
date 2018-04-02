<table class="table table-bordered">
  <tr>
    <th class="text-center" style="width: 10px">#</th>
    <th>Nama Kelas</th>
    <th>Nama Ujian</th>
    <th>Mulai</th>
    <th class="text-center">Status</th>
    <th style="width: 80px"></th>
  </tr>
    @foreach ($user->class as $class)
      @foreach ($class->exams as $exam)
      <tr>
        <td>{{ $counter+=1 }}</td>
        <td>{{ $class->name }}</td>
        <td>{{ $exam->name.' ('.round(abs(strtotime($exam->start_at) - strtotime($exam->stop_at)) / 60,2).' menit)' }}</td>
        <td>{{ date('H:i:s , d M Y', strtotime($exam->start_at)) }}</td>
        <td class="text-center">
          @if (strtotime($exam->stop_at)<strtotime('now'))
            <span class="badge bg-red">SELESAI</span>
          </td>
          <td>
            <button type="button" class="btn btn-default btn-block btn-xs" disabled>Memulai</button>
          @elseif (strtotime($exam->start_at)<strtotime('now') && strtotime($exam->stop_at)>strtotime('now'))
            <span class="badge bg-green">SUDAH DIMULAI</span>
          </td>
          <td>
            <button type="button" class="btn btn-primary btn-block btn-xs" onclick="detail({{ $exam->id }})">Memulai</button>
          @else
            <span class="badge bg-yellow">BELUM DIMULAI</span>
          </td>
          <td>
            <button type="button" class="btn btn-default btn-block btn-xs" disabled>Memulai</button>
          @endif
        </td>
      </tr>
      @endforeach
    @endforeach

</table>

<div id="modal"></div>

@push('scripts')
  <script>
    function detail(id) {
      $.get( "{{ route('exam.detail') }}", {
        id:id
      },function(result) {
        $("#modal").html(result);

        if($("#modal-detail").length != 0) {
          $("#modal-detail").modal();
        }
      });
    }
  </script>
@endpush
