@extends('layouts.auth')

@section('title')
Admin
@endsection

@section('type') login-page @endsection

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}"><b>Admin</b> Ujian Online</a>
    </div>
    
    <div class="login-box-body">
      <p class="login-box-msg">Anda perlu login terlebih dahulu</p>

      <form method="POST" action="{{ route('admin.login.submit') }}">

        {{ csrf_field() }}

        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="E-Mail">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
          <input type="password" class="form-control" name="password" required placeholder="Password">
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

          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>

        </div>
      </form>
    </div>

  </div>

@endsection
