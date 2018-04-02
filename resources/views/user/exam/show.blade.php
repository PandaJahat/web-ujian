@extends('layouts.user.exam')

@section('content')
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-book margin-r-5"></i>{{ $exam->name }}</h3>
      <div class="box-tools pull-right">

      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @foreach ($exam->questions as $question)        
        <div class="row">
            <div class="col-md-12">         
                <p class="lead"><b>{{ $counter+=1 }}.</b> {{ $question->text }}</p>
                @foreach ($question->answers as $answer)          
                <div class="form-group">             
                    <label>
                    <input type="radio" name="{{ $question->id }}" value="{{ $answer->id }}" class="icheck">
                      {{ $answer->text }}
                    </label>
                </div>
                @endforeach
            </div>
              <hr>
        </div>
      @endforeach
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="button" class="btn btn-primary pull-right">Selesai</button>
    </div>
    <!-- /.footer -->
  </div>
    <!-- /.box -->
@endsection

@push('scripts')
  <script>
    var countDownDate = new Date("{{ $exam->stop_at }}").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="countdown"
    document.getElementById("countdown").innerHTML = hours + " jam, "
    + minutes + " menit, " + seconds+" detik.";

    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "SELESAI";
        window.close();
    }
  }, 1000);
  </script>
@endpush

@push('scripts')
    <script>      
        $('.icheck').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',          
        });      

        $('.icheck').on('ifClicked', function() {
          console.log("Pertanyaan : "+this.name);
          console.log("Jawaban : "+this.value);          
        });
    </script>
@endpush