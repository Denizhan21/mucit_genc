<?php

namespace App\Http\Controllers;

use App\Club;
use App\Project;
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


    public function teacher_project() {
        $club = Club::where('teacher','=',Auth::id())->get();
        $project = Project::all();
        return view('admin.projects.teacher_project',compact('project','club'));
    }
}
