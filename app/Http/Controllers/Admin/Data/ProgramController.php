<?php

namespace App\Http\Controllers\Admin\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

# Model
use App\Program;
use App\Faculty;

# Request
use App\Http\Requests\ProgramRequest;

class ProgramController extends Controller
{
    public function data()
    {
        return Datatables::of(Program::query())
        ->addColumn('update', function($program) {
            return '<button class="btn btn-warning btn-xs btn-block" onclick="updateForm(\''.$program->id.'\')"><i class="glyphicon glyphicon-pencil"></i> Ubah</button>';
        })
        ->addColumn('delete', function($program) {
            return '<button class="btn btn-danger btn-xs btn-block" onclick="deleteConfirm(\''.$program->id.'\')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>';
        })
        ->addColumn('faculty', function($program){
            return $program->faculty->name;
        })
        ->rawColumns(['update', 'delete'])
        ->make(true);
    }

    public function create(ProgramRequest $request)
    {
        $program = new Program($request->all());
        $program->save();

        return redirect()->route('admin.data.program');
    }

    public function updateForm(Request $request)
    {
        return view('admin.data.program.modalUpdate', [
            'program' => Program::find($request->id),
            'faculties' => $this->faculty(),
        ]);
    }

    public function update(ProgramRequest $request)
    {
        Program::find($request->id)->update($request->all());

        return redirect()->route('admin.data.program');
    }

    public function delete(ProgramRequest $request)
    {
        $program = Program::find($request->id);
        $program->delete();
        return 'ok';
    }

    public function faculty()
    {
        return Faculty::all();
    }
}
