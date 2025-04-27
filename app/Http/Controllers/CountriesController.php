<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;


class CountriesController extends Controller
{
    public function index(Request $request)
    {
        // $countries = Country::all();
        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Country::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }

        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $countries = $query->paginate(5)->appends($request->except('page'));


        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('countries.index', compact('countries', 'statuses'));

    }

    public function create()
    {
        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('countries.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:countries,name',
            'status_id' => 'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $country = new Country();
        $country->name = $request['name'];
        $country->slug = Str::slug($request['name']);
        $country->status_id = $request['status_id'];
        $country->user_id = $user_id;

        $country->save();

        $request->session()->flash('success', 'Country created successfully');
        return redirect(route('countries.index'));
    }


    public function show(string $id)
    {
        $country = Country::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('countries.show',compact('country', 'statuses'));
    }


    public function edit(string $id)
    {
        $country = Country::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('countries.edit',compact('country', 'statuses'));
    }



    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $country = Country::findOrFail($id);
        $country->name = $request['name'];
        $country->slug = Str::slug($request['name']);
        $country->status_id = $request['status_id'];
        $country->user_id = $user_id;

        $country->save();

        $request->session()->flash('success', 'Country updated successfully');
        return redirect(route('countries.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        session()->flash('info', 'Country deleted successfully');
        return redirect(route('countries.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Country::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
