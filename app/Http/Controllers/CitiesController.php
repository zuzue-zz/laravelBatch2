<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Status;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


class CitiesController extends Controller
{
    public function index(Request $request)
    {
        // $cities = City::all();
        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = City::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }

        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $cities = $query->paginate(5)->appends($request->except('page'));


        $statuses = Status::whereIn('id', [3, 4])->get();
        $regions = Region::all();
        return view('cities.index', compact('cities', 'statuses', 'regions'));

    }

    public function create()
    {
        $statuses = Status::whereIn('id', [3, 4])->get();
        $regions = Region::all();
        return view('cities.create', compact('statuses', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:cities,name',
            'region_id' => 'required|exists:regions,id',
            'status_id' => 'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $city = new City();
        $city->name = $request['name'];
        $city->region_id = $request['region_id'];
        $city->slug = Str::slug($request['name']);
        $city->status_id = $request['status_id'];
        $city->user_id = $user_id;

        $city->save();

        $request->session()->flash('success', 'City created successfully');
        return redirect(route('cities.index'));
    }


    public function show(string $id)
    {
        $city = City::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        $regions = Region::all();
        return view('cities.show',compact('city', 'statuses', 'regions'));
    }


    public function edit(string $id)
    {
        $city = City::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        $regions = Region::all();
        return view('cities.edit',compact('city', 'statuses', 'regions'));
    }



    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $city = City::findOrFail($id);
        $city->name = $request['name'];
        $city->slug = Str::slug($request['name']);
        $city->status_id = $request['status_id'];
        $city->region_id = $request['region_id'];
        $city->user_id = $user_id;

        $city->save();

        $request->session()->flash('success', 'City updated successfully');
        return redirect(route('cities.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        session()->flash('info', 'City deleted successfully');
        return redirect(route('cities.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            City::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
