<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Status;
use App\Models\Post;
use App\Models\User;
use App\Models\Leave;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;


class TagsController extends Controller
{

    public function index(Request $request)
    {
        // $tags = Tag::all();

        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Tag::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }
        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        // $tags = $query->paginate(5)->appends($request->query());
        $tags = $query->paginate(5)->appends($request->except('page'));

        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('tags.index',compact('tags', 'statuses'));
    }


    public function create()
    {


        $statuses = Status::whereIn('id', [3, 4])->get();
        $gettoday = Carbon::today()->format('Y-m-d');
        // dd($gettoday);
        return view('tags.create',compact("statuses",'gettoday'));
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'startdate' => 'required|date',
        //     'enddate' => 'required|date',
        //     'slug' => 'required|max:255',
        //     'name' => 'required|max:100',
        //     'status_id' => 'required|in:3,4',
        //     'content' => 'required'
        // ]);

        $request->validate([
            'name' => 'required|max:100',
            'status_id' => 'required|in:3,4',
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $tag = new Tag();

        $tag->name = $request->name;
        $tag->slug = Str::slug($request['name']);
        $tag->status_id = $request->status_id;
        $tag->user_id = $user_id;

        $tag->save();

        $request->session()->flash('success', 'Tag created successfully!');
        return redirect(route('tags.index'));
    }


    public function show(string $id)
    {
        $tag = Tag::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('tags.show',compact('tag', 'statuses'));
    }


    public function edit(string $id)
    {
        $data['tag'] = Tag::findOrFail($id);
        $data['posts'] = Post::where('attshow', 3)->orderBy('title','asc')->get();
        $data['leaves'] = Leave::all();
        $data['tags'] = User::orderBy('name','asc')->get();
        $data['statuses'] = Status::whereIn('id', [3, 4])->get();
        return view('tags.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $tag = Tag::findOrFail($id);

        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->status_id = $request->status_id;
        // $tag->user_id = $user_id;

        $tag->save();

        $request->session()->flash('success', 'Tag updated successfully!');
        // return redirect()->back();
        return redirect(route('tags.index'));
    }


    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        session()->flash('info', 'Tag deleted successfully!');
        return redirect()->back();
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Tag::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
