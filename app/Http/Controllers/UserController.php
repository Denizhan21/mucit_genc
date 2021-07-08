<?php

namespace App\Http\Controllers;

use App\School;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = (new User())->newQuery();

        if ($request->input('name') != '') {
            $query->where('name', 'like', "%$request->name%");
            $name= $request->input('name');
        } else {
            $name = null;
        }

        if ($request->input('email') != '') {
            $query->where('email', 'like', "%$request->email%");
            $email = $request->input('email');
        } else {
            $email = null;
        }

        if ($request->input('school') != '') {
            $query->where('school', $request->input('school'));
            $school = $request->input('school');
        } else {
            $school = null;
        }

        if ($request->input('class') != '') {
            $query->where('class', $request->input('class'));
            $class = $request->input('class');
        } else {
            $class = null;
        }

        if ($request->input('branch') != '') {
            $query->where('branch', $request->input('branch'));
            $branch = $request->input('branch');
        } else {
            $branch = null;
        }

        if ($request->input('gender') != '') {
            $query->where('gender', $request->input('gender'));
            $gender = $request->input('gender');
        } else {
            $gender = null;
        }

        if ($request->input('authority') != '') {
            $query->where('authority', $request->input('authority'));
            $authority = $request->input('authority');
        } else {
            $authority = null;
        }

        $schools = School::all();

        $count = $query->count();



        $request_forms = $query->paginate(50)->appends(request()->query());

        return view('admin.users.index', compact('request_forms','count', 'authority', 'school', 'schools', 'class', 'branch', 'gender', 'name', 'email'));
    }

    public function create()
    {
        $school = School::all();
        return view('admin.users.create', compact('school'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password_confirmation'=>'required',
        ));
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->authority = request('authority');
        $user->school = request('school');


        if (request('password') != request('password_confirmation')) {
            return redirect()->back()->with('pass', 'pass');
        }else {
            $user->password = Hash::make(request('password'));
        }

        if ($user->authority=='student')
        {
            $user->class = request('class');
            $user->branch = request('branch');
            $user->gender = request('gender');
        }





        $user->save();
        if ($user) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);
        $school = School::all();
        return view('admin.users.edit',compact('user', 'school'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(),array(
            'name'=>'required',
            'email'=>'required'
        ));
        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->comment_authority = request('comment_authority');
        $user->school = request('school');

        if ($user->authority=='student')
        {

            $user->class = request('class');

            $user->branch = request('branch');
            $user->gender = request('gender');

        }



        if (!empty(request('password'))) {
            if (request('password') != request('password_confirmation')) {
                return redirect()->back()->with('pass', 'pass');
            }else {
                $user->password = Hash::make(request('password'));
            }
        }

        $user->save();
        if ($user) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function destroy($id)
    {
        $user = User::destroy($id);
        if ($user) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }


    }
}
