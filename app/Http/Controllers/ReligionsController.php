<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Religion;
use App\Models\Status;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;


class ReligionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $religions = Religion::all();

        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Religion::query();
        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }
        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $religions = $query->paginate(5)->appends($request->except('page'));


        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('religions.index',compact('religions', 'statuses'));
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
            'name' => 'required|max:50|unique:religions,name',
            'status_id' => 'required|in:3,4'
        ]);
        $user = Auth::user();
        $user_id = $user->id;

        $religion = new Religion();
        $religion->name = $request['name'];
        $religion->slug = Str::slug($request['name']);
        $religion->status_id = $request['status_id'];
        $religion->user_id = $user_id;

        $religion->save();

        $request->session()->flash('success', 'Religion created successfully.');
        return redirect()->route('religions.index')->with('success', 'Religion created successfully.');
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
        $user = Auth::user();
        $user_id = $user->id;

        $religion = Religion::findOrFail($id);
        $religion->name = $request['name'];
        $religion->slug = Str::slug($request['name']);
        $religion->status_id = $request['status_id'];
        $religion->user_id = $user_id;

        $religion->save();

        $request->session()->flash('success', 'Religion updated successfully.');
        return redirect()->route('religions.index')->with('success', 'Religion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $religion = Religion::findOrFail($id);
        $religion->delete();

        session()->flash('info', 'Religion deleted successfully.');
        return redirect()->route('religions.index')->with('success', 'Religion deleted successfully.');
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Religion::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
