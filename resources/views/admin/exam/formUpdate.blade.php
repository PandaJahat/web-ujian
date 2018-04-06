@push('links')
  <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
@endpush

@if ($errors->examPatch->any())
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
        <ul>
            @foreach ($errors->examPatch->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
  </div>
@endif

{{ csrf_field() }}
{{ method_field('PATCH') }}

<div class="form-group">
  <label class="col-sm-2 control-label">Nama Ujian</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" placeholder="Tuliskan nama ujian. . ." required  name="name" value="{{ old('name', $exam->name) }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Detail Ujian</label>
  <div class="col-sm-10">
    <textarea class="form-control" rows="3" placeholder="Tuliskan detail dari ujian. . ." name="detail">{{ old('detail', $exam->detail) }}</textarea>
    <p class="help-block">Opsional.</p>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Nilai Kelulusan</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" placeholder="Nilai batas untuk lulus ujian. . ." required name="base_score" value="{{ old('name', $exam->base_score) }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Waktu Mulai Ujian</label>
  <div class="col-sm-10">
    <div class="input-group">
      <input class="form-control" type="text" value="{{ old('start_at', $exam->start_at) }}" readonly id="start_datetime" required name="start_at">
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
      <input class="form-control" type="text" value="{{ old('stop_at', $exam->stop_at) }}" readonly id="end_datetime" required name="stop_at">
      <div class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush

@push('scripts')
<script type="text/javascript">
    $("#start_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
    $("#end_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script>
@endpush
