@if ($errors->examPost->any())
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
        <ul>
            @foreach ($errors->examPost->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
  </div>
@endif

{{ csrf_field() }}

<div class="form-group">
  <label class="col-sm-2 control-label">Nama Ujian</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" placeholder="Tuliskan nama ujian. . ." required  name="name" value="{{ old('name') }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Detail Ujian</label>
  <div class="col-sm-10">
    <textarea class="form-control" rows="3" placeholder="Tuliskan detail dari ujian. . ." name="detail">{{ old('detail') }}</textarea>
    <p class="help-block">Opsional.</p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Nilai Kelulusan</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" placeholder="Nilai batas untuk lulus ujian. . ." required  name="base_score" value="{{ old('base_score') }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Waktu Mulai Ujian</label>
  <div class="col-sm-10">
    <div class="input-group">
      <input class="form-control" type="text" value="{{ old('start_at') }}" readonly id="start_datetime" required name="start_at">
      <div class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Waktu Akhir Ujian</label>
  <div class="col-sm-10">
    <div class="input-group">
      <input class="form-control" type="text" value="{{ old('stop_at') }}" readonly id="end_datetime" required name="stop_at">
      <div class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript">
    $("#start_datetime").datetimepicker({
      format: 'yyyy-mm-dd hh:ii',
      startDate: new Date(),
      autoclose: true
      })
    
    $("#end_datetime").datetimepicker({
      format: 'yyyy-mm-dd hh:ii',
      startDate: new Date(),
      autoclose: true
      })

    $("#start_datetime").change(function () {
      $("#end_datetime").datetimepicker('setStartDate', this.value)      
    })
</script>
@endpush

@push('scripts')
    <script>
      $(function () {
        $('input[name=base_score]').bind('keypress', function (e) {
          return !(e.which != 8 && e.which != 0 &&
            (e.which < 48 || e.which > 57) && e.which != 46);
        })
      })
    </script>
@endpush
