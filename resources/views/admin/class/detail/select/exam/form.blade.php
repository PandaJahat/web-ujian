{{ csrf_field() }}
{{ method_field('PATCH') }}

<input type="hidden" name="id" value="{{ $exam->id }}">

<div class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-3 control-label">Nama Ujian</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="Tuliskan nama ujian. . ." required  name="name" value="{{ old('name', $exam->name) }}" readonly>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label">Detail Ujian</label>
        <div class="col-sm-9">
          <textarea class="form-control" rows="3" placeholder="Tuliskan detail dari ujian. . ." name="detail" readonly>{{ old('detail', $exam->detail) }}</textarea>          
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label">Waktu Mulai Ujian</label>
        <div class="col-sm-9">
          <div class="input-group">
            <input class="form-control" type="text" value="{{ old('start_at', $exam->start_at) }}" readonly id="start_datetime" required name="start_at">
            <div class="input-group-addon">
              <i class="fa fa-clock-o"></i>
            </div>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label">Waktu Akhir Ujian</label>
        <div class="col-sm-9">
          <div class="input-group">
            <input class="form-control" type="text" value="{{ old('stop_at', $exam->stop_at) }}" readonly id="end_datetime" required name="stop_at">
            <div class="input-group-addon">
              <i class="fa fa-clock-o"></i>
            </div>
          </div>
        </div>
      </div>
</div>