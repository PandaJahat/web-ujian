@extends('layouts.auth')

@section('title')
  Login
@endsection

@section('type') login-page @endsection

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}"><b>Ujian</b> Online</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Peserta perlu login terlebih dahulu</p>

      <form method="POST" action="{{ route('login') }}">

        {{ csrf_field() }}

        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Username or E-mail">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
          <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat Saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('password.request') }}">Lupa password ?</a>
      <br>
      <a href="{{ route('register') }}" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
@endsection
