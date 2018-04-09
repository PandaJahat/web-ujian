<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Soal Ujian</h3>
    <div class="box-tools pull-right">      
      @include('admin.exam.detail.question.create')
      <a href="{{ route('admin.exam.question', ['id' => $exam->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Pilih Soal</a>
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-hover dataTable" id="questions-table">
      <thead>
          <tr>
              <th>No.</th>
              <th>Soal</th>
              <th>Ditambahkan</th>
              <th></th>
              <th></th>
              <th></th>
          </tr>
      </thead>
    </table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{ route('admin.exam') }}" class="btn btn-default">Kembali</a>
    <button onclick="deleteExam('{{ $exam->id }}')" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus Ujian</button>
  </div>
  <!-- box-footer -->
</div>
<!-- /.box -->
<div id="modal"></div>
@push('scripts')
  <script>
  $(function() {
      questions_table = $('#questions-table').DataTable({
          processing: true,
          serverSide: true,
          language:{
            emptyTable:'belum ada soal pada ujian ini . . .'
          },
          ajax: '{!! route('admin.exam.question.list', ['id' => $id]) !!}',
          order: [[ 2, 'desc' ]],
          columnDefs: [
            {
              searchable: false,
              orderable: false,
              targets: [3, 4, 5, 0]
            },
            {
              width: '5%',
              targets: [0]
            },
            {
              width: '10%',
              targets: [3,4,5]
            }
          ],
          columns: [
              { data: 'DT_Row_Index', name: 'id', searchable:false },
              { data: 'text', name: 'questions.text' },
              { data: 'created_at', name: 'questions.created_at' },
              { data: 'remove', name: 'remove' },
              { data: 'detail', name: 'detail' },
              { data: 'update', name: 'update' }
          ]
      });
  });

  function remove(exam, question) {
    $.post("{{ route('admin.exam.question.remove', ['id' => $id]) }}", {
      _token: "{{ csrf_token() }}",
      _method: "DELETE",
      id: exam,
      question_id: question
    },function(result) {
      questions_table.draw()
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
  <script type="text/javascript">
    function deleteExam(value) {
      swal({
        title: 'Apakah?',
        text: "Anda yakin ingin menghapus ujian ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.value) {
          swal({
          title: 'Berhasil!',
          text: 'Ujian berhasil dihanpus.',
          type: 'success',
          timer: 1500,
          onOpen: () => {
            swal.showLoading()
          }
          }).then((result) => {
          if (result.dismiss === 'timer') {
            $.post( "{{ route('admin.exam.delete.submit') }}", {
              id:value,
              _token: "{{ csrf_token() }}",
              _method:"DELETE"
            },function(data) {
                $(location).attr('href',data)
            });
          }
        })
        }
      })
    }
  </script>
@endpush

@push('scripts')
    <script>
    function refreshTable() {
      questions_table.draw();
    }
    </script>
@endpush

@include('admin.question.modalUpdate')