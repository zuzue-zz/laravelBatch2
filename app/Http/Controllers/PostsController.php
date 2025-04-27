<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Status;
use App\Models\Day;
use App\Models\Tag;
use App\Models\Type;
use App\Models\User;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;




class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $posts = Post::all();

        $postfilter = $request->input('postfilter');
        $namefilter = $request['namefilter'];

        $query = Post::query();

        if ($postfilter) {
            $query->where('status_id', $postfilter);
        }
        if ($namefilter) {
            $query->where('title', 'like', '%' . $namefilter . '%');
        }

        $posts = $query->paginate(5)->appends($request->except('page'));


        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attshows = Status::whereIn('id', [ 3,4])->get();
        $days = Day::where('status_id', 3)->get();
        $statuses = Status::whereIn('id', [ 7,10,11])->get();
        $tags = Tag::where('status_id', 3)->get();
        $types = Type::where('id', [1,2])->get();
        $gettoday = now()->format('Y-m-d');
        $posts = Post::all();
        return view('posts.create', compact('attshows', 'days', 'statuses', 'tags', 'types', 'gettoday', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'title' => 'required|max:300|unique:posts,title',
            'content' => 'required',
            'feed' => 'required',
            'startdate' => 'required|date',
            'starttime' => 'required|time',
            'enddate' => 'required|date',
            'endtime' => 'required|time',
            'type_id' => 'required|in:1,2',
            'tag_id' => 'required',
            'attshow' => 'required|in:3,4',
            'status_id' => 'required|in:7,10,11'
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request['title']);
        $post->content = $request->content;
        $post->attshow = $request->attshow;
        $post->status_id = $request->status_id;

        $post->save();

        $request->session()->flash('success', 'Post created successfully!');
        redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['leave'] = Leave::findOrFail($id);
        $data['posts'] = Post::where('attshow', 3)->orderBy('title','asc')->get();
        $data['tags'] = User::orderBy('name','asc')->get();
        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->name);
        $post->content = $request->content;
        $post->fee = $request->fee;
        $post->startdate = $request->startdate;
        $post->enddate = $request->enddate;
        $post->starttime = $request->starttime;
        $post->endtime = $request->endtime;
        $post->type_id = $request->type_id;
        $post->tag_id = $request->tag_id;
        $post->status_id = $request->status_id;
        $post->user_id = $user_id;

        // Remove Old Image
        if($request->hasFile('image')){
            $path = $post->image;
            if(File::exists($path)){
                File::delete($path);
            }

            // Single Delete Update
            if($request->hasFile('image')){
                $file = $request->file('image');
                $fname = $file->getClientOriginalName();
                $imagenewname = uniqid($user_id).$post['id'].$fname;
                $file->move(public_path('assets/img/posts/'), $imagenewname);

                $filepath = 'assets/img/posts/'.$imagenewname;
                $post->image = $filepath;

            }

            $post->save();

            $request->session()->flash('success', 'Post updated successfully!');
            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // Remove Old Image
        $path = $post->image;
        if(File::exists($path)){
            File::delete($path);
        }

        $post->delete();

        session()->flash('info', 'Post deleted successfully!');
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Post::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
