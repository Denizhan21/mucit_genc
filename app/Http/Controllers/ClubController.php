<?php

namespace App\Http\Controllers;

use App\Club;
use App\School;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{


    public function index(Request $request)
    {
        $query = (new Club())->newQuery();

        if ($request->input('name') != '') {
            $query->where('name', 'like', "%$request->name%");
            $name= $request->input('name');
        } else {
            $name = null;
        }

        if ($request->input('teacher') != '') {
            $query->where('teacher', 'like', "%$request->teacher%");
            $teacher= $request->input('teacher');
        } else {
            $teacher = null;
        }


        $club = Club::where('permission','=','1')->get();

        $count = $query->count();



        $request_forms = $query->paginate(50)->appends(request()->query());

        return view('admin.clubs.index', compact('request_forms','club','count','name','teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = User::where('authority','=','teacher')->get();
        $school = School::where('status','=',1)->get();
        return view('admin.clubs.create',compact('teacher','school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $club = new Club();
        $club->name         = request('name');
        $club->teacher      = request('teacher');
        $club->status       = request('status');
        $club->subject      = request('subject');
        $club->description  = request('description');
        $club->code         = create_code();
        $club->school_id    = request('school_id');
        $club->confirmation = request('confirmation');
        $club->text         = request('text');
        $club->content      = request('content');
        $club->type      = request('type');
        $club->permission      = request('permission');


        if (request()->hasFile('logo')) {
            $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('logo');
            $dosya_adi = 'logo'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uploads/images';
                $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $club->logo = $dosya_yolu;
            }
        }

        $club->save();

        if ($club) {

            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('nos', 'nos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::where('authority','=','teacher')->get();
        $club = Club::findOrFail($id);
        $school = School::where('status','=',1)->get();
        return view('admin.clubs.edit',compact('club','teacher','school'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $club = Club::findOrFail($id);
        $club->name         = request('name');
        $club->teacher      = request('teacher');
        $club->status       = request('status');
        $club->subject      = request('subject');
        $club->description  = request('description');
        $club->school_id    = request('school_id');
        $club->confirmation = request('confirmation');
        $club->text         = request('text');
        $club->content      = request('content');
        $club->type      = request('type');

        if (request()->hasFile('logo')) {
            $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('logo');
            $dosya_adi = 'logo'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uploads/images';
                $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $club->logo = $dosya_yolu;
            }
        }

        $club->save();

        if ($club) {

            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('nos', 'nos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }

    public function teacher_club() {
        $club = Club::where('teacher','=',Auth::id())->get();

        return view('admin.clubs.teacher_club',compact('club'));
    }
}
