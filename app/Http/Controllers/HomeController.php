<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Club;
use App\Club_contact;
use App\Club_user;
use App\Comment;
use App\Contact;
use App\News;
use App\Project;
use App\Rating;
use App\Teacher_comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Tests\models\User;

class HomeController extends Controller
{
    public function index()
    {

        $club = Club::all();

        $news = News::where('status','=','1')->orderBy('created_at','desc')->first();

        $activities = Activity::where('status','=','1')->get();

        $projects_last = Project::where('status','=',1)->orderBy('created_at','desc')->take(3)->get();



        return view('homepage.index',compact('club','news','activities','projects_last'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function project_send()
    {
        $club = Club::where('confirmation','=',1)->get();

        $user = Auth::id();




        $clubs_club = Club::where('confirmation','=',0)->get();



        $confirmation_club = Club_user::where('user_id','=',$user)->where('status','=',1)->get();

        return view('homepage.project_send',compact('club','confirmation_club','clubs_club'));
    }


    public function project_view(Request $request)
    {
        $query = (new Project)->newQuery()->where('status','1');

        $clubs = Club::all();

        if ($request->input('name') != '') {
            $query->where('name', 'like', "%$request->name%");
            $name = $request->input('name');
        } else {
            $name = null;
        }

        if ($request->input('order_club') != '') {
            $query->where('club_id', $request->input('order_club'));
            $order_club = $request->input('order_club');
        } else {
            $order_club = null;
        }


        if ($request->input('order_field') != '') {
            $order_field = $request->input('order_field');
        } else {
            $order_field = 'id';
        }

        if ($request->input('order_type') != '') {
            $order_type = $request->input('order_type');
        } else {
            $order_type = 'desc';
        }

        if ($request->input('user_id') != '') {
            $query->where('user_id', $request->input('user_id'));
            $user_id = $request->input('user_id');
        } else {
            $user_id = null;
        }

        $project_user = \App\User::where('authority','=','student')->get();

        $count = $query->count();

        $query->orderBy($order_field,$order_type);

        $request_forms = $query->paginate(50)->appends(request()->query());




        return view('homepage.project_view',compact('request_forms','count','order_field','order_type','name','clubs','order_club','project_user','user_id'));
    }

    public function activity_details($id)
    {
        $activity = Activity::findOrFail($id);

        return view('homepage.activity_details',compact('activity'));
    }

    public function projects_details($id)
    {
        $projects = Project::findOrFail($id);

        $comment = Comment::where('project_id','=',$projects->id)->where('status','=','1')->get();

        $rating = Rating::where('rateable_id','=',$projects->id)->get();

        $reaction_1 = Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',1)->get();
        $reaction_2 = Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',2)->get();
        $reaction_3 = Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',3)->get();
        $reaction_4 = Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',4)->get();
        $reaction_5 = Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',5)->get();
        $reaction_6 = Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',6)->get();
        $reaction_7 = Rating::where('rateable_id','=',$projects->id)->where('rateable_type','=',7)->get();

        $login = Auth::id();

        $rating_login = Rating::where('rateable_id','=',$projects->id)->where('user_id','=',$login)->first();

        $teacher_comments = Teacher_comment::where('project_id','=',$projects->id)->get();


        return view('homepage.projects_details',compact('projects','comment','rating','rating_login','reaction_1','reaction_2','reaction_3','reaction_4','reaction_5','reaction_6','reaction_7','teacher_comments'));
    }

    public function club_view()
    {
        $club = Club::all();

        return view('homepage.club_view',compact('club'));
    }

    public function teacher_comment_update($id)
    {
        $teacher_comment = Teacher_comment::findOrFail($id);
        $teacher_comment->content = request('content');
        $teacher_comment->save();
        if ($teacher_comment) {
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function activity_view()
    {
        $activity = Activity::where('status','=',1)->orderBy('created_at','desc')->take(3)->get();

        return view('homepage.activity_view',compact('activity'));
    }

    public function clubs_details($id)
    {
        $clubs = Club::findOrFail($id);

        $club = Club::all();

        $clubs_users = Club_user::where('club_id','=',$id)->where('status','=',1)->get();

        $clubs_projects = Project::where('club_id','=',$id)->where('status','=',1)->get();

        return view('homepage.clubs_details',compact('clubs','clubs_users','clubs_projects','club'));
    }

    public function club_contact($id)
    {
        $clubs = Club::findOrFail($id);

        return view('homepage.club_contact',compact('clubs'));
    }

    public function contact()
    {

        return view('homepage.contact');
    }

    public function contact_store(Request $request)
    {
        $this->validate(request(), array(
            'subject'=>'required',
            'content'=>'required',
        ));

        $contact = new Contact();
        $contact->subject = request('subject');
        $contact->content = request('content');
        $contact->status = request('status');
        $contact->tel = request('tel');
        $contact->email = request('email');
        $contact->name = request('name');

        $contact->save();
        if ($contact) {

            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }

    }

    public function teacher_comment(Request $request)
    {
        $teacher_comment = new Teacher_comment();
        $teacher_comment->user_id = request('user_id');
        $teacher_comment->project_id = request('project_id');
        $teacher_comment->content = request('content');

        $teacher_comment->save();
        if ($teacher_comment) {

            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function club_contact_store(Request $request)
    {
        $this->validate(request(), array(
            'subject'=>'required',
            'content'=>'required',
        ));

        $club_contact = new Club_contact();
        $club_contact->subject = request('subject');
        $club_contact->content = request('content');
        $club_contact->status = request('status');
        $club_contact->club_id = request('club_id');
        $club_contact->user_id = request('user_id');

        $club_contact->save();
        if ($club_contact) {

            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }


    }

    public function project_store(Request $request)
    {
        $this->validate(request(), array(
            'name'=>'required',
            'description'=>'required',
            'type'=>'required',
        ));

        $project = new Project();
        $project->name = request('name');
        $project->description = request('description');
        $project->type = request('type');
        $project->user_id = request('user_id');
        $project->club_id = request('club_id');
        $project->status = request('status');



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
        }


        $project->save();
        if ($project) {

            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function comment_send() {
        $comment = new Comment();
        $comment->user_id = request('user_id');
        $comment->project_id = request('project_id');
        $comment->status = request('status');
        $comment->content = request('content');
        $comment->save();
        if ($comment) {

            return redirect()->back()->with('alert', 'alert');
        }else {
            return redirect()->back()->with('no', 'no');
        }
    }

    public function like_send() {
        $like = new Rating();
        $like->user_id = request('user_id');
        $like->rateable_id = request('rateable_id');
        $like->rateable_type = request('rateable_type');
        $like->rating = request('rating');
        $like->save();
        if ($like) {
            return redirect()->back()->with('alertsd','alertsd');
        }else{
            return redirect()->back()->with('nosd','nosd');
        }
    }

    public function like_send_update($id) {
        $like = Rating::findOrFail($id);
        $like->rateable_type = request('rateable_type');
        $like->save();
        if ($like) {
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function club_join($code) {
        $club = Club::where('code',$code)->firstOrFail();
        return view('homepage.club_join',compact('club'));
    }

    public function club_join_Store() {

        $club_user = new Club_user();
        $club_user->user_id = request('user_id');
        $club_user->club_id = request('club_id');
        $club_user->status = request('status');


        $club = Club::where('id',$club_user->club_id)->firstOrFail();

        $user = Auth::id();

        $user_club = Club_user::where('club_id',$club->id)->where('user_id',$user)->first();

        if (empty($user_club)) {
            $club_user->save();
        }else {
            return redirect()->back()->with('nosd','nosd');
        }


        if ($club_user) {
            return redirect()->back()->with('alert','alert');
        }else{
            return redirect()->back()->with('no','no');
        }

    }

}
