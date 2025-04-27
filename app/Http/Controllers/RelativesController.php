<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relative;
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


class RelativesController extends Controller
{
    public function index(Request $request)
    {
        // $relatives = Relative::all();

        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Relative::query();
        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }
        if ($namefilter){
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $relatives = $query->paginate(5)->appends($request->except('page'));

        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('relatives.index',compact('relatives', 'statuses'));
    }


    public function create()
    {


        $statuses = Status::whereIn('id', [3, 4])->get();
        $gettoday = Carbon::today()->format('Y-m-d');
        // dd($gettoday);
        return view('relatives.create',compact("statuses",'gettoday'));
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

        $relative = new Relative();

        $relative->name = $request->name;
        $relative->slug = Str::slug($request['name']);
        $relative->status_id = $request->status_id;
        $relative->user_id = $user_id;

        $relative->save();

        $request->session()->flash('success', 'Relative created successfully!');
        return redirect(route('relatives.index'));
    }


    public function show(string $id)
    {
        $relative = Relative::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('relatives.show',compact('relative', 'statuses'));
    }


    public function edit(string $id)
    {
        $data['relative'] = Relative::findOrFail($id);
        $data['posts'] = Post::where('attshow', 3)->orderBy('title','asc')->get();
        $data['leaves'] = Leave::all();
        $data['relatives'] = User::orderBy('name','asc')->get();
        $data['statuses'] = Status::whereIn('id', [3, 4])->get();
        return view('relatives.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $relative = Relative::findOrFail($id);

        $relative->name = $request->name;
        $relative->slug = Str::slug($request->name);
        $relative->status_id = $request->status_id;
        // $relative->user_id = $user_id;

        $relative->save();

        $request->session()->flash('success', 'Relative updated successfully!');
        // return redirect()->back();
        return redirect(route('relatives.index'));
    }


    public function destroy(string $id)
    {
        $relative = Relative::findOrFail($id);

        $relative->delete();

        session()->flash('info', 'Relative deleted successfully!');
        return redirect()->back();
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Relative::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
