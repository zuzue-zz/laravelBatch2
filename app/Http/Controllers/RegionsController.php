<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Country;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


class RegionsController extends Controller
{
    public function index(Request $request)
    {
        // $regions = Region::all();
        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Region::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }

        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $regions = $query->paginate(5)->appends($request->except('page'));


        $statuses = Status::whereIn('id', [3, 4])->get();
        $countries = Country::all();
        return view('regions.index', compact('regions', 'statuses', 'countries'));

    }

    public function create()
    {
        $statuses = Status::whereIn('id', [3, 4])->get();
        $countries = Country::all();
        return view('regions.create', compact('statuses', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:regions,name',
            'country_id' => 'required|exists:countries,id',
            'status_id' => 'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $region = new Region();
        $region->name = $request['name'];
        $region->country_id = $request['country_id'];
        $region->slug = Str::slug($request['name']);
        $region->status_id = $request['status_id'];
        $region->user_id = $user_id;

        $region->save();

        $request->session()->flash('success', 'Region created successfully');
        return redirect(route('regions.index'));
    }


    public function show(string $id)
    {
        $region = Region::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        $countries = Country::all();
        return view('regions.show',compact('region', 'statuses', 'countries'));
    }


    public function edit(string $id)
    {
        $region = Region::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        $countries = Country::all();
        return view('regions.edit',compact('region', 'statuses', 'countries'));
    }



    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $region = Region::findOrFail($id);
        $region->name = $request['name'];
        $region->slug = Str::slug($request['name']);
        $region->status_id = $request['status_id'];
        $region->country_id = $request['country_id'];
        $region->user_id = $user_id;

        $region->save();

        $request->session()->flash('success', 'Region updated successfully');
        return redirect(route('regions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        session()->flash('info', 'Region deleted successfully');
        return redirect(route('regions.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Region::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
