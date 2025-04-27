<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Status;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;



class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $roles = Role::all();

        $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];

        $query = Role::query();

        if ($statusfilter) {
            $query->where('status_id', $statusfilter);
        }
        if ($namefilter) {
            $query->where('name', 'like', '%' . $namefilter . '%');
        }

        $roles = $query->paginate(5)->appends($request->except('page'));



        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('roles.index',compact('roles', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('roles.create',compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'image' => '|image|mimes:jpeg,png,jpg|max:1024',
        //     'name' => 'required|max:50|unique:roles,name',
        //     'status_id' => 'required|in:3,4'
        // ]);

        $request->validate([
            'image' => '|image|mimes:jpeg,png,jpg|max:1024',
            'name' => 'required|max:50|unique:roles,name',
            'status_id' => 'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $role = new Role();

        $role->name = $request['name'];
        $role->slug = Str::slug($request['name']);
        $role->status_id = $request['status_id'];
        $role->user_id = $user_id;

        // Single Image Upload
        if(file_exists($request['image'])){
            $file = $request['image'];

            // dd($file);
            $fname = $file->getClientOriginalName();
            // dd($fname);
            // $imagenewname = time().$fname;
            $imagenewname = uniqid($user_id).$user['id'].$fname;
            // dd($imagenewname);   // "16760f7af7548azz.jpg"
            $file->move(public_path('assets/img/roles/'),$imagenewname);

            $filepath = 'assets/img/roles/'. $imagenewname;
            $role->image = $filepath;

        }

        $role->save();

        $request->session()->flash('success', 'Role created successfully');
        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        return view('roles.show',compact('role', 'statuses'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $statuses = Status::whereIn('id', [3, 4])->get();
        // return view('roles.edit',compact('role', 'statuses'));
        return view('roles.edit')->with('role',$role)->with('statuses', $statuses);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $role = new Role();
        $role = Role::findOrFail($id);

        // $role->image = $request['image'];
        $role->name = $request['name'];
        $role->slug = Str::slug($request['name']);
        $role->status_id = $request['status_id'];
        $role->user_id = $user_id;


        // Remove Old Single Image

        if($request->hasFile('image')){

            $path = $role->image;

            if(File::exists($path)){
                File::delete($path);
            }
        }


        // Single Image Upload

        if(file_exists($request['image'])){
            $file = $request['image'];
            // dd($file);

            $fname = $file->getClientOriginalName();
            // dd($fname);
            // $imagenewname = time().$fname;
            $imagenewname = uniqid($user_id).$user_id.$fname;
            // dd($imagenewname);   // "16760f7af7548azz.jpg"
            $file->move(public_path('assets/img/roles/'),$imagenewname);

            $filepath = 'assets/img/roles/'. $imagenewname;
            $role->image = $filepath;

        }

        $role->save();

        $request->session()->flash('success', 'Role updated successfully!');
        // return redirect()->back();
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        // Remove Old Single Image
        $path = $role->image;

        if(File::exists($path)){
            File::delete($path);
        }

        $role->delete();

        session()->flash('info', 'Role deleted successfully!');
        return redirect(route('roles.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Role::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}


// ALTER TABLE roles
// ADD CONSTRAINT unique_name UNIQUE (name);

// SHOW INDEX FROM roles;
