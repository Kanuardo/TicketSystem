<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments= Department::all();

        return view('admin.departments.index', ['departments' => $departments]);
    }

    public function create()
    {
        return view('admin.departments.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required'
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index');
    }
    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.departments.edit', ['department' => $department]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required'
        ]);
        $department = Department::find($id);
        $department->update($request->all());

        return redirect()->route('departments.index');
    }
    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->route('departments.index');
    }

}
