@component('components.modal')
    @slot('id')
      question-modal-update
    @endslot

    @slot('title')
        Ubah Pertanyaan
    @endslot

    <form action="{{ route('admin.question.update.submit') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <span></span>
    </form>

    @slot('button')
    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
    <button type="button" class="btn btn-primary btn-sm pull-right">Simpan</button>
    @endslot
@endcomponent

@push('scripts')
  <script type="text/javascript">
    function updateQuestion(id) {
      $.ajax({
        type: "GET",
        url: '{{ route('admin.question.update') }}',
        data: {id:id},
        success: function(data) {
          $("#question-modal-update form span").html(data);
          $('#question-modal-update').modal('show');

          $('#question-modal-update').find('input[type="radio"]').iCheck({        
            radioClass: 'iradio_flat-green'
          });
          
          CKEDITOR.replace('text-editor-update', {language: 'id'});

          $("#question-modal-update .btn-danger").click(function () {
            deleteQuestion(id)
          });

          $("#question-modal-update .btn-primary").click(function () {
            $(this).parent().parent().find('form').submit();            
          });          
        },

      });
    }
  </script>
@endpush

@push('scripts')  
  <script type="text/javascript">
    function deleteQuestion(id) {
      swal({
        title: 'Apakah?',
        text: "Anda yakin ingin menghapus soal ujian ini ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.value) {
          $('#question-modal-update').modal('hide') &&
            $.post("{{ route('admin.question.delete') }}", {
              id: id,
              _token: '{{ csrf_token() }}',
              _method: 'DELETE'
            }, function () {
              refreshTable();
            }) &&
            swal({
              title: 'Berhasil!',
              text: 'Soal ujian berhasil dihapus.',
              type: 'success',
              timer: 1500,
              onOpen: () => {
                swal.showLoading()
              }
            })
        }
      })
    }
  </script>
@endpush