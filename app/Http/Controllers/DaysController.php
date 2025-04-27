<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Day;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    //    $days = Day::all();

        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];
        $query = Day::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }
        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $days = $query->paginate(5)->appends($request->except('page'));


       $statuses = Status::whereIn('id', [3, 4])->get();
       return view('days.index',compact('days', 'statuses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:days,name',
            'status_id' => 'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $day = new Day();
        $day->name = $request['name'];
        $day->slug = Str::slug($request['name']);
        $day->status_id = $request['status_id'];
        $day->user_id = $user_id;

        $day->save();

        $request->session()->flash('success', 'Day created successfully!');
        return redirect(route('days.index'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required|max:50|unique:days,name,'.$id],
            'status_id' => ['required|in:3,4']
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $day = Day::findOrFail($id);
        $day->name = $request['name'];
        $day->slug = Str::slug($request['name']);
        $day->status_id = $request['status_id'];
        $day->user_id = $user_id;
        $day->save();

        $request->session()->flash('success', 'Day updated successfully!');
        return redirect(route('days.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $day = Day::findOrFail($id);
        $day->delete();

        session()->flash('info', 'Day deleted successfully!');
        return redirect(route('days.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Day::whereIn('id',$getselectedids)->delete();
            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
