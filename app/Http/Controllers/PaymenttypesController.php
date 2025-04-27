<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paymenttype;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class PaymenttypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $paymenttypes = Paymenttype::all();


        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];
        $query = Paymenttype::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }
        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $paymenttypes = $query->paginate(5)->appends($request->query());


        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('paymenttypes.index',compact('paymenttypes', 'statuses'));
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
            'name' => 'required|max:50|unique:paymenttypes,name',
            'status_id' => 'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $paymenttype = new Paymenttype();
        $paymenttype->name = $request['name'];
        $paymenttype->slug = Str::slug($request['name']);
        $paymenttype->status_id = $request['status_id'];
        $paymenttype->user_id = $user_id;

        $paymenttype->save();

        $request->session()->flash('success', 'Payment type created successfully.');
        return redirect(route('paymenttypes.index'));
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

        $paymenttype = Paymenttype::findOrFail($id);
        $paymenttype->name = $request['name'];
        $paymenttype->slug = Str::slug($request['name']);
        $paymenttype->status_id = $request['status_id'];
        $paymenttype->user_id = $user_id;
        $paymenttype->save();

        $request->session()->flash('success', 'Payment type updated successfully.');
        return redirect(route('paymenttypes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paymenttype = Paymenttype::findOrFail($id);
        $paymenttype->delete();

        session()->flash('info', 'Payment type deleted successfully.');
        return redirect(route('paymenttypes.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Paymenttype::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
