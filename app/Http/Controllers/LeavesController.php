<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveFile;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LeaveTagPersonNotification;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Stage;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;



class LeavesController extends Controller
{
    public function index(Request $request)
    {
        // $leaves = Leave::all();

        // $stagefilter = $request->input('stagefilter');
        $stagefilter = $request['stagefilter'];
        $namefilter = $request['namefilter'];

        $query = Leave::query();

        if ($stagefilter) {
            $query->where('stage_id', $stagefilter);
        }
        if ($namefilter) {
            $query->where('title', 'like', '%' . $namefilter . '%');
        }

        $leaves = $query->paginate(5)->appends($request->query());

        $stages = Stage::all();

        // $statuses = Status::whereIn('id', [3, 4])->get();
        $users = User::pluck('name', 'id');
        // dd($users);
        return view('leaves.index',compact('leaves','users','stages'));
    }


    public function create()
    {
        // $posts = Post::where('attshow', 3)->orderBy('title','asc')->get();
        // $tags = Tag::orderBy('name','asc')->get();
        // return view('leaves.create',compact('posts', 'tags'));

        // $data['posts'] = Post::where('attshow', 3)->orderBy('title','asc')->get();
        // dd($data['posts']);
        $data['posts'] = Post::where('attshow', 3)->orderBy('title','asc')->get()->pluck('title', 'id');
        $data['tags'] = User::orderBy('name','asc')->get();
        $data['gettoday'] = Carbon::today()->format('Y-m-d');
        // dd($data['gettoday']);
        return view('leaves.create', $data);
    }


    public function store(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $leave = new Leave();

        $leave->post_id = json_encode($request['post_id']);
        $leave->startdate = $request['startdate'];
        $leave->enddate = $request['enddate'];
        $leave->tag = json_encode($request['tag']);
        $leave->title = $request['title'];
        $leave->content = $request['content'];
        $leave->user_id = $user_id;

        $leave->save();
        // dd($request);


        // Multi Image Upload
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){

                $leavefile = new Leavefile();
                $leavefile->leave_id = $leave->id;
                // $leavefile->image = $image;

                $file = $image;

                $fname = $file->getClientOriginalName();
                $imagenewname = uniqid($user_id).$leave['id'].$fname;
                $file->move(public_path('assets/img/leaves/'),$imagenewname);

                $filepath = 'assets/img/leaves/'. $imagenewname;
                $leavefile->image = $filepath;

                $leavefile->save();

            }
        }

        // => Database Notification to multi tag users
        $tags = $request['tag'];
        $tagpersons = User::whereIn('id', $tags)->get();    // fetch all users at once
        Notification::send($tagpersons, new LeaveTagPersonNotification($leave->id, $leave->title, $leave->user_id));


        session()->flash('success', 'New Leave has been created successfully!');
        return redirect(route('leaves.index'));
    }


    public function show(string $id)
    {
        $leave = Leave::findOrFail($id);
        $leavefiles = Leavefile::where('leave_id', $id)->get();
        // dd($leavefiles);
        $users = User::pluck('name', 'id');
        $stages = Stage::whereIn('id', [1,2,3])->where('status_id',3)->get();
        $allleaves = Leave::where('user_id', $leave->user_id)->orderBy('created_at','desc')->get();

        return view('leaves.show', ['leave' => $leave, 'leavefiles' => $leavefiles, 'users' => $users, 'stages' => $stages, 'allleaves' => $allleaves]);

    }


    public function edit(string $id)
    {
        $data['leave'] = Leave::findOrFail($id);
        $data['leavefiles'] = Leavefile::where('leave_id', $id)->get(); // load all associated images
        $data['posts'] = Post::where('attshow', 3)->orderBy('title','asc')->get()->pluck('title', 'id');
        $data['tags'] = User::orderBy('name','asc')->get()->pluck('name', 'id');
        return view('leaves.edit', $data);
    }


    public function update(LeaveRequest $request, string $id)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $leave = leave::findOrFail($id);

        $leave->post_id = json_encode($request['post_id']);
        $leave->startdate = $request['startdate'];
        $leave->enddate = $request['enddate'];
        $leave->tag = json_encode($request['tag']);
        $leave->title = $request['title'];
        $leave->content = $request['content'];

        if($leave->isconverted()){
            return redirect()->back()->with('error', 'This leave form has already been converted! to an authorized stage! Editing is not allowed!');
        }

        $leave->save();


        if($request->hasFile('images')){

            $leavefiles = Leavefile::where('leave_id', $leave->id)->get();

            // Remove Old Multi Image

            foreach($leavefiles as $leavefile){

                $path = $leavefile->image;


                if(File::exists($path)){
                    File::delete($path);
                }
            }

            // Delete associated records from the database
            Leavefile::where('leave_id', $leave->id)->delete();

            // Multi Image Upload
            foreach($request->file('images') as $image){

                $leavefile = new Leavefile();
                $leavefile->leave_id = $leave->id;

                $file = $image;
                $fname = $file->getClientOriginalName();
                $imagenewname = uniqid($user_id).$leave['id'].$fname;
                $file->move(public_path('assets/img/leaves/'),$imagenewname);

                $filepath = 'assets/img/leaves/'. $imagenewname;
                $leavefile->image = $filepath;

                $leavefile->save();

            }
        }

        session()->flash('success', 'Leave has been updated successfully!');
        // return redirect()->back();
        return redirect(route('leaves.index'));
        //  တစ်ခုခု admin က စာလေးဖြစ်ဖြစ်ဝင်ပြင်လိုက်ရင် user_id ပြောင်းသွားမဆိုးလို့ user_id ကို update မှာမထည့်ပေးတော့ဘူး

    }


    public function destroy(string $id)
    {
        $leave = Leave::findOrFail($id);

        $leavefiles = Leavefile::where('leave_id', $id)->get();

        if($leave->isconverted()){
            return redirect()->back()->with('error', 'You cannot delete a converted leave.');
        }

        // Remove Old Multi Image
        foreach($leavefiles as $leavefile){

            $path = $leavefile->image;


            if(File::exists($path)){
                File::delete($path);
            }
        }
        // Delete associated records from the database
        Leavefile::where('leave_id', $leave->id)->delete();

        // Delete Leave record
        $leave->delete();

        session()->flash('error', 'Leave has been deleted successfully!');
        return redirect()->back();
    }

    public function updatestage(Request $request, string $id){
        // $request->validate([
        //     'stage_id' => 'required|integer',
        // ]);

        $leave = Leave::findOrFail($id);
        // $leave->stage_id = $request['stage_id'];
        $leave->stage_id = $request->stage_id;
        $leave->save();

        session()->flash('info', 'Change Stage has been updated successfully!');
        return redirect()->back();
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Leave::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
