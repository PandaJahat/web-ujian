<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
# Model
use App\User;
use App\Userprofile;

class UserController extends Controller
{
    public function profile()
    {
      return view('user.profile',[
        'profile' => Userprofile::find(Auth::user()->id),
      ]);
    }
}
