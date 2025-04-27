<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;


class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $statuses = Status::all();
        $namefilter = $request['namefilter'];
        $query = Status::query();
        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $statuses = $query->paginate(5)->appends($request->except('page'));

        return view('statuses.index',compact('statuses'));
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
        // $this->validate($request,[
        //     'name'=>'required|unique:statuses,name'
        // ]);

        // Validate using the Request instance
        $request->validate([
            'name' => 'required|unique:statuses,name'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $status = new Status();
        $status->name = $request['name'];
        $status->slug = Str::slug($request['name']);
        $status->user_id = $user_id;

        $status->save();

        $$request->session()->flash('message', 'Status created successfully!');
        return redirect(route('statuses.index'));
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

        $status = Status::findOrFail($id);

        $status->name = $request['name'];
        $status->slug = Str::slug($request['name']);
        $status->user_id = $user_id;

        $status->save();

        $request->session()->flash('success', 'Status updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        session()->flash('info', 'Status deleted successfully!');
        return redirect()->back();
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Status::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}


// php artisan make:controller StatusesController -r
