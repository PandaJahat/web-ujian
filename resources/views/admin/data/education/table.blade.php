@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugin/datatables.css') }}">
@endpush

<table class="table table-bordered table-hover dataTable" id="exams-table">
  <thead>
      <tr>
          <th>No.</th>
          <th>Nama Pendidikan</th>
          <th>Status</th>
          <th>Dibuat</th>
          <th></th>
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
          ajax: '{!! route('admin.data.education.data') !!}',
          order: [[ 4, 'desc' ]],
          columns: [
              { data: 'DT_Row_Index', name: 'DT_Row_Index', orderable: false, searchable: false },
              { data: 'level', name: 'level' },
              { data: 'status', name: 'active' },
              { data: 'created_at', name: 'created_at' },
              { data: 'inactive', name: 'inactive', orderable: false, searchable: false },
              { data: 'update', name: 'update', orderable: false, searchable: false },
          ]
      });
  });
  </script>
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.all.min.js"></script>
  <script>
    function active(id) {
      swal({
      title: 'Anda Yakin?',
      text: "Ingin mengaktifkan data ini?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Aktifkan!',
      cancelButtonText: 'Tidak!',
    }).then((result) => {
      if (result.value) {
        swal({
          title: 'Berhasil!',
          text: 'Data berhasil diaktifkan.',
          type: 'success',
          timer: 1500,
          onOpen: () => {
            swal.showLoading()
          }
        }).then((result) => {
          if (result.dismiss === 'timer') {
            $.ajax({
              type: "POST",
              url: "{{ route('admin.data.education.status') }}",
              data:{
                '_token':'{{ csrf_token() }}',
                'id':id,
                'status':1,
              },
              success: function(data){
                window.location.href = "{{ route('admin.data.education') }}";
              }
              });
          }
        })
      }
    })
    }

    function inactive(id) {
      swal({
      title: 'Anda Yakin?',
      text: "Ingin menonaktifkan data ini?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Nonaktifkan!',
      cancelButtonText: 'Tidak!',
    }).then((result) => {
      if (result.value) {
        swal({
          title: 'Berhasil!',
          text: 'Data berhasil dinonaktifkan.',
          type: 'success',
          timer: 1500,
          onOpen: () => {
            swal.showLoading()
          }
        }).then((result) => {
          if (result.dismiss === 'timer') {
            $.ajax({
              type: "POST",
              url: "{{ route('admin.data.education.status') }}",
              data:{
                '_token':'{{ csrf_token() }}',
                'id':id,
                'status':0,
              },
              success: function(data){
                window.location.href = "{{ route('admin.data.education') }}";
              }
              });
          }
        })
      }
    })
    }
  </script>
@endpush

<div id="modal"></div>
@push('scripts')
  <script>
    function modalUpdate(id) {
      $.ajax({
        type: "POST",
        url: "{{ route('admin.data.education.update') }}",
        data:{
          _token:'{{ csrf_token() }}',
          id:id,
        },
        success: function(data){
          $('#modal').html(data);
          $('#modal-update').modal('show');
        }
        });
    }
  </script>
@endpush
