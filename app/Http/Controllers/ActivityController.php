<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::paginate(50);
        return view('admin.activities.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), array(
            'title'=> 'required',
            'content'=>'required',
        ));
        $activity = new Activity();
        $activity->title = request('title');
        $activity->status = request('status');
        $activity->content = request('content');
        $activity->type = request('type');
        if (request()->hasFile('photo')) {
            $this->validate(request(), array('photo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('photo');
            $dosya_adi = 'photo'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uploads/images';
                $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $activity->photo = $dosya_yolu;
            }
        }
        $activity->save();
        if ($activity) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.activities.edit',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),array(
            'title'=>'required',
            'content'=>'required'
        ));
        $activity = Activity::findOrFail($id);
        $activity->title = request('title');
        $activity->status = request('status');
        $activity->content = request('content');
        $activity->type = request('type');
        if (request()->hasFile('photo')) {
            $this->validate(request(), array('photo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('photo');
            $dosya_adi = 'photo'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uploads/images';
                $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $activity->photo = $dosya_yolu;
            }
        }

        $activity->save();
        if ($activity) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::destroy($id);
        if ($activity) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }
}
