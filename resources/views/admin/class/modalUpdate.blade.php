<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Formulir Perubahan Data Ruang</h4>
        </div>
        <form action="{{ route('admin.class.update.submit', ['id' => $class->id]) }}" method="post">
        <div class="modal-body">
          @if ($errors->classPatch->any())
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
                  <ul>
                      @foreach ($errors->classPatch->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
            </div>
          @endif
          {{ csrf_field() }}
          @include('admin.class.formUpdate')
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
