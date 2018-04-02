<div class="modal fade" id="modal-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Formulir Kelas Baru</h4>
      </div>
      <form action="{{ route('admin.class.create.submit') }}" method="post">
      <div class="modal-body">
        @if ($errors->classPost->any())
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
                <ul>
                    @foreach ($errors->classPost->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
          </div>
          @push('scripts')
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#modal-create').modal('show');
                    })
                </script>
            @endpush
        @endif
        @include('admin.class.formCreate')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
