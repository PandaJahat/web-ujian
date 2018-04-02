<div class="modal fade" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ujian</h4>
      </div>
      <div class="modal-body">
        <dl class="dl-horizontal">
          <dt>Nama Ujian :</dt>
          <dd>{{ $exam->name }}</dd>
          <dt>Jumlah Soal :</dt>
          <dd>{{ $total_question or '0' }} soal</dd>
          <dt>Waktu Mulai :</dt>
          <dd>{{ date('H:i:s , d M Y', strtotime($exam->start_at)) }}</dd>
          <dt>Waktu Selesai :</dt>
          <dd>{{ date('H:i:s , d M Y', strtotime($exam->stop_at)) }}</dd>
          <dt>Durasi :</dt>
          <dd>{{ round(abs(strtotime($exam->start_at) - strtotime($exam->stop_at)) / 60,2).' menit' }}</dd>
          <dt>Deskripsi :</dt>
          <dd>
            {{ $exam->detail or '-' }}
          </dd>
          <dt>Catatan :</dt>
          <dd class="text-red">
            Setelah anda memilih tombol 'Mulai Mengerjakan' anda akan langsung diarahkan ke ujian dan diharuskan mengerjakan ujian tersebut.
          </dd>
        </dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="show()" data-dismiss="modal">Mulai Mengerjakan</button>
        <script type="text/javascript">
          function show() {
            window.open("{{ route('exam.show', ['id' => $exam->id]) }}", '_blank', 'location=yes,height='+screen.height+', width='+screen.width+',scrollbars=yes,status=yes');
          }
        </script>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
