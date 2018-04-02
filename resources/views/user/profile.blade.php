@extends('layouts.user')

@section('title')
  Profil Peserta
@endsection

@section('content')
 <div class="row">
   <div class="col-md-8">
     @include('user.profile.history')
   </div>
   <div class="col-md-4">
     @include('user.profile.picture')
   </div>
 </div>
@endsection
