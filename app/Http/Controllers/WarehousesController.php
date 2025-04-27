<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Warehouse;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $warehouses = Warehouse::all();

        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Warehouse::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }
        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        // $warehouses = $query->paginate(5)->appends($request->query());
        $warehouses = $query->paginate(5)->appends($request->except('page'));


        $statuses = Status::whereIn('id',[3,4])->get();
        return view('warehouses.index',compact('warehouses','statuses'));
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
            'name' => 'required|max:50|unique:warehouses,name',
            'status_id' => 'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $warehouse = new Warehouse();
        $warehouse->name = $request['name'];
        $warehouse->slug = Str::slug($request['name']);
        $warehouse->status_id = $request['status_id'];
        $warehouse->user_id = $user_id;

        $warehouse->save();

        $request->session()->flash('success', 'Warehouse created successfully');
        return redirect(route('warehouses.index'));
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

        $warehouse = Warehouse::findOrFail($id);

        $warehouse->name = $request['name'];
        $warehouse->slug = Str::slug($request['name']);
        $warehouse->status_id = $request['status_id'];
        $warehouse->user_id = $user_id;

        $warehouse->save();

        $request->session()->flash('success', 'Warehouse updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();

        session()->flash('info', 'Warehouse deleted successfully!');
        return redirect()->back();
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Warehouse::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
