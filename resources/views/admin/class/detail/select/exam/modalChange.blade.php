<div class="modal fade" id="modal-change">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-book margin-r-5"></i>Data Ujian <small>( Hanya dapat mengubah jadwal )</small></h4>
        </div>
        <form action="{{ route('admin.class.exam.change.submit', ['id' => $id]) }}" method="POST">
        <div class="modal-body">      
            
          <div class="alert alert-danger alert-dismissible" style="display: none;" id="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
              <ul id="messages">
                     
              </ul>
          </div>
          
                              
          @include('admin.class.detail.select.exam.form')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan & Pilih</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->