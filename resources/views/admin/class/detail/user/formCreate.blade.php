{{ csrf_field() }}

<div class="form-group">
  <label>Nama Lengkap</label>
  <input class="form-control" type="text" name="name" required value="{{ old('name') }}">
</div>

<div class="form-group">
  <label>E-Mail</label>
  <input class="form-control" type="email" name="email" value="{{ old('email') }}">
  <p class="help-block">Opsional.</p>
</div>

<div class="form-group" id="username">
  <label>Username</label>
  <input class="form-control" type="text" name="username" required value="{{ old('username') }}" onkeyup="checkUsername(value)">
  <span class="help-block" id="info"></span>
</div>

<div class="form-group">
  <label>Password</label>
  <input class="form-control" type="password" name="password" required>
</div>

<div class="form-group">
  <label>Password (ulangi)</label>
  <input class="form-control" type="password" name="password_confirmation" required>
</div>

@push('scripts')
  <script>
    function checkUsername(value) {
      $.ajax({
        type: "POST",
        url: "{{ route('admin.user.checkUsername') }}",
        data: {
          _token: '{{ csrf_token() }}',
          username: value,
        },
        success: function (data) {
          if (data > 0) {
            $('#username').removeClass("has-success").addClass("has-error");
            $('#info').html('Username telah digunakan, silahkan gunakan username lainnya.');
          } else {
            $('#username').removeClass("has-error").addClass("has-success");
            $('#info').html('Username dapat digunakan.');
          }
        },
      });
    }
  </script>
@endpush