<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Club;
use App\Link;
use App\Platform;
use App\Project;
use App\Rosette;
use App\Rosette_student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $clubs = Club::where('id','2')->first();


        $projects = Project::all();

        return view('admin.index',compact('clubs','projects'));
    }

    public function project_index()
    {
        $club_project = Project::where('club_id','=',$_GET['club'])->get();
        $project_club = Club::where('id','=',$_GET['club'])->get();
        return view('admin.projects.index',compact('club_project','project_club'));
    }

    public function club_rosette()
    {
        $club_rosette = Rosette::where('club_id','=',$_GET['club'])->get();
        $project_club = Club::where('id','=',$_GET['club'])->get();
        return view('admin.clubs.rosette',compact('club_rosette','project_club'));
    }

    public function club_link()
    {
        $club_link = Link::where('club_id','=',$_GET['club'])->get();
        $project_club = Club::where('id','=',$_GET['club'])->get();
        return view('admin.clubs.links',compact('club_link','project_club'));
    }

    public function club_platform()
    {
        $club_platform = Platform::where('club_id','=',$_GET['club'])->get();
        $project_club = Club::where('id','=',$_GET['club'])->get();
        return view('admin.clubs.platform',compact('club_platform','project_club'));
    }

    public function rosette_delete($id) {
        $rosette = Rosette_student::destroy($id);
        if ($rosette) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function rosette_create()
    {
        $club_id = $_GET['club'];
        return view('admin.clubs.rosette_create',compact('club_id'));
    }

    public function link_create()
    {
        $club_id = $_GET['club'];
        return view('admin.clubs.link_create',compact('club_id'));
    }

    public function platform_create()
    {
        $club_id = $_GET['club'];
        return view('admin.clubs.platform_create',compact('club_id'));
    }

    public function rosette_add()
    {
        $rosette_id = $_GET['rosette'];
        $rosette = Rosette::where('id','=',$_GET['rosette'])->first();

        return view('admin.clubs.rosette_add',compact('rosette_id','rosette'));
    }

    public function rosette_student()
    {
        $rosette_id = $_GET['rosette'];
        $rosette = Rosette::where('id','=',$_GET['rosette'])->get();
        $rosette_student = Rosette_student::where('rosette_id','=',$_GET['rosette'])->get();
        return view('admin.clubs.rosette_student',compact('rosette_id','rosette','rosette_student'));
    }

    public function rosette_store(Request $request)
    {
        $this->validate(request(), array(
            'name'=> 'required',
        ));
        $rosette = new Rosette();
        $rosette->name = request('name');
        $rosette->status = request('status');
        $rosette->club_id = request('club_id');

        if (request()->hasFile('logo')) {
            $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('logo');
            $dosya_adi = 'logo'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uploads/images';
                $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $rosette->logo = $dosya_yolu;
            }
        }
        $rosette->save();
        if ($rosette) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function link_store(Request $request)
    {
        $link = new Link();
        $link->link = request('link');
        $link->status = request('status');
        $link->authority = request('authority');
        $link->club_id = request('club_id');


        $link->save();
        if ($link) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function platform_store(Request $request)
    {

        $platform = new Platform();
        $platform->user_name = request('user_name');
        $platform->link = request('link');
        $platform->club_id = request('club_id');
        $platform->password = request('password');
        $platform->status = request('status');
        $platform->authority = request('authority');


        if (request()->hasFile('images')) {
            $this->validate(request(), array('images' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('images');
            $dosya_adi = 'images'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uploads/images';
                $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $platform->images = $dosya_yolu;
            }
        }
        $platform->save();
        if ($platform) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function rosette_add_store(Request $request)
    {
        $rosette = new Rosette_student();
        $rosette->user_id = request('user_id');
        $rosette->rosette_id = request('rosette_id');


        $user_id = $rosette->user_id;
        $rosette_id = $rosette->rosette_id;

        $rosette_empty = Rosette_student::where('user_id','=',$user_id)->where('rosette_id','=',$rosette_id)->first();

        if (empty($rosette_empty)) {
            $rosette->save();
        }else {
            return redirect()->back()->with('nosd','nosd');
        }



        if ($rosette) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function rosette_update($id) {
        $rosette = Rosette::findOrFail($id);
        $rosette->name = request('name');
        $rosette->status = request('status');

        if (request()->hasFile('logo')) {
            $this->validate(request(), array('logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('logo');
            $dosya_adi = 'logo'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uploads/images';
                $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $rosette->logo = $dosya_yolu;
            }
        }
        $rosette->save();
        if ($rosette) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function link_update($id) {
        $link = Link::findOrFail($id);

        $link->link = request('link');
        $link->status = request('status');
        $link->authority = request('authority');


        $link->save();
        if ($link) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function platform_update($id) {
        $platform = Platform::findOrFail($id);
        $platform->user_name = request('user_name');
        $platform->password = request('password');
        $platform->link = request('link');
        $platform->status = request('status');
        $platform->authority = request('authority');

        if (request()->hasFile('images')) {
            $this->validate(request(), array('images' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

            $resim = request()->file('images');
            $dosya_adi = 'images'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'uploads/images';
                $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $platform->images = $dosya_yolu;
            }
        }
        $platform->save();
        if ($platform) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function rosette_details($id) {
        $rosette = Rosette::findOrFail($id);
        return view('admin.clubs.rosette_details',compact('rosette'));
    }

    public function link_details($id) {
        $link = Link::findOrFail($id);
        return view('admin.clubs.link_details',compact('link'));
    }

    public function platform_details($id) {
        $platform = Platform::findOrFail($id);
        return view('admin.clubs.platform_details',compact('platform'));
    }

    public function all_project(Request $request)
    {
        $query = (new Project())->newQuery();

        if ($request->input('name') != '') {
            $query->where('name', 'like', "%$request->name%");
            $name= $request->input('name');
        } else {
            $name = null;
        }

       $order_field='created_at';

        if ($request->input('order_type') != '') {
            $order_type = $request->input('order_type');
        } else {
            $order_type = 'desc';
        }


        if ($request->input('club_id') != '') {
            $query->where('club_id', $request->input('club_id'));
            $club_id = $request->input('club_id');
        } else {
            $club_id = null;
        }

        $club = Club::all();

        $query->orderBy($order_field,$order_type);
        $count = $query->count();
        $request_forms = $query->paginate(50)->appends(request()->query());

        return view('admin.projects.all_project',compact('request_forms','count','name','order_type','club_id','club'));
    }

    public function project_details($id) {
        $project = Project::findOrFail($id);
        return view('admin.projects.details',compact('project'));
    }



    public function student_comment($id) {
        $project = Project::findOrFail($id);
        $project->student_comment = request('student_comment');
        $project->save();
        if ($project) {
            return redirect()->back()->with('alertsi', 'alertsi');
        }else {
            return redirect()->back()->with('nosi', 'nosi');
        }
    }

    public function project_edit(Request $request, $id) {


        $project = Project::findOrFail($id);
        $project->name = request('name');
        $project->description = request('description');


        if ($project->type == 'Fotoğraf') {

            if($request->hasfile('content')) {
                foreach ($request->file('content') as $file) {
                    $name = time() .$file->getClientOriginalName();
                    $destination_folder = 'uploads/images';
                    $file->move($destination_folder,$name);
                    $folder_path = $destination_folder.'/'.$name;
                    $imgData[] = $folder_path;
                }
                $project->content = json_encode($imgData);
                $project->save();
            }

        }else {
            $project->content = request('content');
            if (request()->hasFile('photo')) {
                $this->validate(request(), array('photo' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));

                $resim = request()->file('photo');
                $dosya_adi = 'photo'.'-'.time().'.'.$resim->extension();

                if ($resim->isValid()) {
                    $hedef_klasor = 'uploads/images';
                    $dosya_yolu = $hedef_klasor.'/'.$dosya_adi;
                    $resim->move($hedef_klasor,$dosya_adi);
                    $project->photo = $dosya_yolu;
                }
            }
        }


        $project->save();
        if ($project) {
            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }





    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function project_onayla($id) {
        $project = Project::findOrFail($id);
        $project->status = 1;
        $project->save();
        if ($project) {
            return redirect()->back()->with('durumyes', 'kullanıcı eklendi');
        }else {
            return redirect()->back()->with('durumno', 'kullanıcı eklendi');
        }
    }
    public function project_onaykaldir($id) {
        $project = Project::findOrFail($id);
        $project->status = 0;
        $project->save();
        if ($project) {
            return redirect()->back()->with('durumumyes', 'kullanıcı eklendi');
        }else {
            return redirect()->back()->with('durumumno', 'kullanıcı eklendi');
        }
    }

    public function activity_onayla($id) {
        $activity = Activity::findOrFail($id);
        $activity->status = 1;
        $activity->save();
        if ($activity) {
            return redirect()->back()->with('durumyes', 'kullanıcı eklendi');
        }else {
            return redirect()->back()->with('durumno', 'kullanıcı eklendi');
        }
    }
    public function activity_onaykaldir($id) {
        $activity = Activity::findOrFail($id);
        $activity->status = 0;
        $activity->save();
        if ($activity) {
            return redirect()->back()->with('durumumyes', 'kullanıcı eklendi');
        }else {
            return redirect()->back()->with('durumumno', 'kullanıcı eklendi');
        }
    }


    public function teacher_project() {
        $club = Club::where('teacher','=',Auth::id())->get();
        $project = Project::all();
        return view('admin.projects.teacher_project',compact('project','club'));
    }
}
