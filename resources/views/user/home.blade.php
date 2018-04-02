@extends('layouts.user')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
@endsection

@empty ($profile)
  @push('scripts')
    <script src="https://unpkg.com/sweetalert2@7.1.3/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() {
      swal({
        title: 'Perhatian!',
        text: "Anda belum melengkapi biodata anda, lengkapi sekarang?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, sekarang',
        cancelButtonText: 'Tidak, nanti',
        }).then((result) => {
        if (result.value) {
          swal({
            title: 'Silahkan Tunggu',
            text: 'Anda akan diarahkan ke formulir biodata.',
            timer: 1500,
            onOpen: () => {
              swal.showLoading()
            }
          }).then((result) => {
            if (result.dismiss === 'timer') {
              console.log('Redirect disini bro')
            }
          })
        }
        })
      });
    </script>
  @endpush
@endempty
