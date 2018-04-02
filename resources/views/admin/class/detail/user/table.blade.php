<table class="table table-bordered table-hover dataTable" id="users-table">
  <thead>
      <tr>
          <th>No.</th>
          <th>Nama Lengkap</th>
          <th>Username</th>
          <th>Terdaftar di Ujian</th>
          <th></th>
          <th></th>
      </tr>
  </thead>
</table>

@push('scripts')
  <script>
  $(function() {
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
          language:{
            emptyTable:'belum ada peserta pada kelas ini . . .'
          },
          ajax: '{!! route('admin.class.user.list', ['id' => $class->id]) !!}',
          order: [[ 3, 'desc' ]],
          columns: [
              { data: 'DT_Row_Index', name: 'id', searchable:false },
              { data: 'name', name: 'users.name' },
              { data: 'username', name: 'users.username' },
              { data: 'created_at', name: 'class_users.created_at' },
              { data: 'detail', name: 'detail', searchable:false, orderable:false },
              { data: 'remove', name: 'remove', searchable:false, orderable:false },
          ]
      });
  });
  </script>
@endpush

@push('scripts')
  <script>
      function removeUser(id) {
          swal({
              title: 'Apakah?',
              text: "Anda yakin ingin menghapus Peserta ini dari kelas ?",
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
                      text: 'Peserta berhasil dihapus.',
                      type: 'success',
                      timer: 1500,
                      onOpen: () => {
                          swal.showLoading()
                      }
                  }).then((result) => {
                      if (result.dismiss === 'timer') {
                          console.log(id);
                          console.log('Ajax delete request here');
                      }
                  })
              }
          })
      }
  </script>
@endpush

@if ($errors->userPost->any())
  @push('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#user-create').modal('show');
    })
  </script>
  @endpush
@endif
