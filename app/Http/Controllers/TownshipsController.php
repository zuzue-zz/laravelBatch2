<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Township;
use App\Models\Status;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TownshipsController extends Controller
{
    public function index(Request $request)
    {
        // $townships = Township::all();
        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Township::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }

        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $townships = $query->paginate(5)->appends($request->except('page'));


        $statuses = Status::whereIn('id', [3, 4])->get();
        $countries = Country::all();
        $regions = Region::all();
        $cities = City::all();
        return view('townships.index', compact('townships', 'statuses', 'countries', 'regions', 'cities'));

    }

    public function create()
    {
        $statuses = Status::whereIn('id', [3, 4])->get();
        $countries = Country::all();
        $regions = Region::all();
        $cities = City::all();
        return view('townships.create', compact('statuses', 'countries', 'regions', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:townships,name',
            'country_id' => 'required|exists:countries,id',
            'region_id' => 'required|exists:regions,id',
            'city_id' => 'required|exists:cities,id',
            'status_id' => 'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $township = new Township();
        $township->name = $request['name'];
        $township->country_id = $request['country_id'];
        $township->region_id = $request['region_id'];
        $township->city_id = $request['city_id'];
        $township->slug = Str::slug($request['name']);
        $township->status_id = $request['status_id'];
        $township->user_id = $user_id;

        $township->save();

        $request->session()->flash('success', 'Township created successfully');
        return redirect(route('townships.index'));
    }


    public function show(string $id)
    {
        $township = Township::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        $countries = Country::all();
        $regions = Region::all();
        $cities = City::all();
        return view('townships.show',compact('township', 'statuses', 'countries', 'regions', 'cities'));
    }


    public function edit(string $id)
    {
        $township = Township::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        $countries = Country::all();
        $regions = Region::all();
        $cities = City::all();
        return view('townships.edit',compact('township', 'statuses', 'countries', 'regions', 'cities'));
    }



    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $township = Township::findOrFail($id);
        $township->name = $request['name'];
        $township->slug = Str::slug($request['name']);
        $township->status_id = $request['status_id'];
        $township->country_id = $request['country_id'];
        $township->region_id = $request['region_id'];
        $township->city_id = $request['city_id'];
        $township->user_id = $user_id;

        $township->save();

        $request->session()->flash('success', 'Township updated successfully');
        return redirect(route('townships.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $township = Township::findOrFail($id);
        $township->delete();

        session()->flash('info', 'Township deleted successfully');
        return redirect(route('townships.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Township::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
