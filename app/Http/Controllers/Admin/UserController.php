<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

#Model
use App\User;

class UserController extends Controller
{
    public function index()
    {
      return view('admin.user');
    }

    public function checkUsername(Request $request)
    {
      return User::where('username', $request->username)->get()->count();
    }

    public function data()
    {
      $user = User::query();
      return Datatables::of($user)
      ->addColumn('edit', function ($user) {
        return '<button id="'.$user->id.'" class="btn btn-warning btn-xs btn-block"><i class="fa fa-pencil-square margin-r-5"></i>Edit</button>';
      })
      ->addColumn('detail', function ($user) {
        return '<a href="#" class="btn btn-success btn-xs btn-block"><i class="fa fa-user margin-r-5"></i>Detail</a>';
      })
      ->rawColumns(['edit', 'detail'])
      ->make(true);
    }

    public function create()
    {
      # code...
    }

    public function delete($id)
    {
      # code...
    }
}
