<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\User;
use App\Models\Post;
use App\Models\Status;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AnnouncementEmailNotify;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;


class AnnouncementsController extends Controller
{
    public function index(Request $request)
    {
        // $announcements = Announcement::paginate(10);

        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Announcement::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }
        if ($namefilter) {
            $query->where('title', 'like', '%' . $namefilter . '%');
        }

        // $announcements = $query->paginate(5)->appends($request->query());
        $announcements = $query->paginate(5)->appends($request->except('page'));


        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('announcements.index',compact('announcements','statuses'));
    }


    public function create()
    {
        // $posts = Post::where('attshow', 3)->orderBy('title','asc')->get()->pluck('title','id'); // or
        $posts = \DB::table('posts')->where('attshow', 3)->orderBy('title','asc')->get()->pluck('title','id');
        return view('announcements.create',compact('posts'));
    }


    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'image' => '|image|mimes:jpeg,png,jpg|max:1024',
        //     'name' => 'required|max:50|unique:roles,name',
        //     'status_id' => 'required|in:3,4'
        // ]);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
            'title' => 'required|max:100',
            'content' => 'required'
        ]);

        $user = Auth::user();
        $user_id = $user->id;


        $announcement = new Announcement();
        // $announcement->name = $request['name'];
        $announcement->title = $request['title'];
        $announcement->content = $request['content'];
        $announcement->post_id = json_encode($request['post_id']);
        $announcement->user_id = $user_id;



        // Single Image Upload

        if(file_exists($request['image'])){
            $file = $request['image'];

            // dd($file);
            $fname = $file->getClientOriginalName();
            // dd($fname);
            // $imagenewname = time().$fname;
            $imagenewname = uniqid($user_id).$user['id'].$fname;
            // dd($imagenewname);   // "16760f7af7548azz.jpg"
            $file->move(public_path('assets/img/announcements/'),$imagenewname);

            $filepath = 'assets/img/announcements/'. $imagenewname;
            $announcement->image = $filepath;

        }

        $announcement->save();


        // => Sent Email Notification to all users

        // Notification::send(User::all(), new AnnouncementEmailNotify($announcement->id, $announcement->title, $announcement->content));
        Notification::send($user, new AnnouncementEmailNotify($announcement->id, $announcement->title, $announcement->content));



        $request->session()->flash('success', 'New Announcement created successfully');
        return redirect(route('announcements.index'));
    }


    public function show(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcements.show',compact('announcement'));

    }


    public function edit(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        $posts = Post::where('attshow', 3)->orderBy('title','asc')->get()->pluck('title','id');
        // return view('announcements.edit',compact('announcement', 'statuses'));
        return view('announcements.edit')->with('announcement',$announcement)->with('posts', $posts);

    }


    public function update(Request $request, string $id)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
            'title' => 'required|max:100',
            'content' => 'required'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $announcement = new Announcement();
        $announcement = Announcement::findOrFail($id);

        $announcement->title = $request['title'];
        $announcement->content = $request['content'];
        $announcement->post_id = $request['post_id'];
        $announcement->user_id = $user_id;


        // Remove Old Single Image

        if($request->hasFile('image')){

            $path = $announcement->image;

            if(File::exists($path)){
                File::delete($path);
            }
        }


        // Single Image Upload

        if(file_exists($request['image'])){
            $file = $request['image'];
            // dd($file);

            $fname = $file->getClientOriginalName();
            // dd($fname);
            // $imagenewname = time().$fname;
            $imagenewname = uniqid($user_id).$user_id.$fname;
            // dd($imagenewname);   // "16760f7af7548azz.jpg"
            $file->move(public_path('assets/img/announcements/'),$imagenewname);

            $filepath = 'assets/img/announcements/'. $imagenewname;
            $announcement->image = $filepath;

        }

        $announcement->save();

        $request->session()->flash('success', 'Announcement updated successfully!');
        // return redirect()->back();
        return redirect(route('announcements.index'));
    }


    public function destroy(string $id)
    {
        $announcement = Announcement::findOrFail($id);

        // Remove Old Single Image
        $path = $announcement->image;

        if(File::exists($path)){
            File::delete($path);
        }

        $announcement->delete();

        session()->flash('info', 'Announcement deleted successfully!');
        return redirect(route('announcements.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Announcement::whereIn('id',$getselectedids)->delete();
            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]); // (or)
            // return response()->json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            // return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
            return response()->json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}

// php artisan make:controller AnnouncementsController -r
