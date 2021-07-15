<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{

    public function index()
    {
        $schools = School::paginate(50);
        return view('admin.schools.index',compact('schools'));
    }

    public function create()
    {
        return view('admin.schools.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), array(
            'name'=>'required',
        ));
        $school = new School();
        $school->name = request('name');
        $school->status = request('status');
        $school->save();
       /* if ($school) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }*/
        return response()->json(['success'=>$school]);
    }

    public function edit($id)
    {
        $school = School::findOrFail($id);
        return view('admin.schools.edit',compact('school'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), array(
            'name'=>'required',
        ));
        $school = School::findOrFail($id);
        $school->name = request('name');
        $school->status = request('status');
        $school->save();

        return response()->json(['success'=>$school]);
       /* if ($school) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }*/
    }

    public function destroy($id)
    {
        $school = School::destroy($id);
        if ($school) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }
}
