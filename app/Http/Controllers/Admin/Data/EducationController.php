<?php

namespace App\Http\Controllers\Admin\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

# Model
use App\Education;

class EducationController extends Controller
{

    public function data()
    {
      $education = Education::query();
      return Datatables::of($education)
      ->addColumn('status', function ($education) {
        return $education->education_active?
        '<span class="label label-success">Aktif</span>'
        :
        '<span class="label label-danger">Nonaktif</span>';
      })
      ->addColumn('update', function ($education) {
        return '<button id="'.$education->id.'" onclick="modalUpdate(id)" class="btn btn-block btn-warning btn-xs"><i class="fa fa-pencil-square-o margin-r-5"></i>Ubah</button>';
      })
      ->addColumn('inactive', function ($education) {
        return $education->education_active?
        '<button id="'.$education->id.'" onclick="inactive(id)" class="btn btn-block btn-danger btn-xs"><i class="fa fa-times margin-r-5"></i>Nonaktifkan</button>'
        :
        '<button id="'.$education->id.'" onclick="active(id)" class="btn btn-block btn-success btn-xs"><i class="fa fa-check margin-r-5"></i>Aktifkan</button>';
      })
      ->rawColumns(['update', 'inactive', 'status'])
      ->addIndexColumn()
      ->make(true);
    }

    public function create(Request $request)
    {
      $education = new Education;
      $education->fill($request->all())->save();

      return redirect()->route('admin.data.education');
    }

    public function update(Request $request, $id)
    {
      $education = Education::find($id);
      $education->fill($request->all())->save();

      return redirect()->route('admin.data.education');
    }

    public function changeStatus(Request $request)
    {
      $education = Education::find($request->id);

      $education->education_active = $request->status;

      $education->save();
    }

    public function formUpdate(Request $request)
    {
      return view('admin.data.education.formUpdate', [
        'education' => Education::find($request->id)
      ]);
    }


}
