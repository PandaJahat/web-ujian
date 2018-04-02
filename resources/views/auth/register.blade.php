@extends('layouts.auth')

@section('title') Registrasi @endsection

@section('type') register-page @endsection

@section('content')
  <div class="register-box">
    <div class="register-logo">
      <a href="{{ url('/') }}"><b>Ujian</b> Online</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Registrasi</p>

      <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Lengkap">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
          <input id="username" type="email" class="form-control" name="username" value="{{ old('username') }}" required placeholder="Username">
          <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
          <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Ulangi Password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Setuju dengan <a href="#">ketentuan</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">Saya telah memiliki akun</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->
@endsection
