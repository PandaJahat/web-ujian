<div class="modal fade" id="modal-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Formulir Peruabahan Data Pendidikan</h4>
      </div>
      <form action="{{ route('admin.data.education.update.submit', ['id' => $education->id]) }}"  method="post">
        <div class="modal-body">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="exampleInputEmail1">Nama Pendidikan</label>
            <input class="form-control" type="text" name="education_level" value="{{ $education->education_level }}">
          </div>
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
