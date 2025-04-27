<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\LeaveRequest;

use App\Models\Lead;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Stage;
use App\Model\Country;
use App\Model\City;
use App\Model\Region;
use App\Model\Gender;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;


class LeadsController extends Controller
{
    public function index(Request $request)
    {
        $leads = Lead::all();

        return view('leads.index', compact('leads'));

        // $stagefilter = $request->input('stagefilter');
        // $stagefilter = $request['stagefilter'];
        // $namefilter = $request['namefilter'];

        // $query = Lead::query();

        // if ($stagefilter) {
        //     $query->where('stage_id', $stagefilter);
        // }
        // if ($namefilter) {
        //     $query->where('title', 'like', '%' . $namefilter . '%');
        // }

        // $leads = $query->paginate(5)->appends($request->query());

        // $stages = Stage::all();

        // $statuses = Status::whereIn('id', [3, 4])->get();
        // $users = User::pluck('name', 'id');
        // dd($users);
        // return view('leads.index',compact('leads','users','stages'));
    }


    public function create()
    {
        // $posts = Post::where('attshow', 3)->orderBy('title','asc')->get();
        // $tags = Tag::orderBy('name','asc')->get();
        // return view('leads.create',compact('posts', 'tags'));

        // $data['posts'] = Post::where('attshow', 3)->orderBy('title','asc')->get();
        // dd($data['posts']);


        $data['genders'] = Post::where('status_id', 3)->orderBy('name','asc')->get()->pluck('name', 'id');
        $data['countries'] = Country::where('status_id',3)->orderby('name', asc)->get();
        return view('leads.create', $data);

    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'firsttname'=>'required| string| max:100',
            'lastname'=>'string| max:100',
            'gender_id'=>'required| exists:genders,id',
            'age'=>'required| integer| min:13| max|45',
            'email'=>'required|string| email| max:100| unique:leads,email',
            'country_id'=>'required| exists:countries,id',
            'city_id'=>'required| exists:cities,id',
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $lead = new Lead();
        $lead->firsttname = $request['firsttname'];
        $lead->lastname = $request['lastname'];
        $lead->gender_id = $request['gender_id'];
        $lead->age = $request['age'];
        $lead->email = $request['email'];
        $lead->country_id = $request['country_id'];
        $lead->city_id = $request['city_id'];
        $lead->user_id = $user_id;

        $lead->save();

        session()->flash('success', 'New Lead has been created successfully!');
        return redirect(route('leads.index'));
    }


    public function show(string $id)
    {
        $lead = Lead::findOrFail($id);
        return view('leads.show', compact('lead'));

    }


    public function edit(string $id)
    {
        $data['lead'] = Lead::findOrFail($id);

        $data['genders'] = gender::where('status_id', 3)->orderBy('name','asc')->get()->pluck('name', 'id');
        $data['countries'] = Country::where('status_id',3)->orderby('name', asc)->get();
        $data['cities'] = City::where('status_id',3)->orderby('name', asc)->get();

        return view('leads.edit', $data);
    }


    public function update(LeaveRequest $request, string $id)
    {

        $this->validate($request,[
            'firsttname'=>'required| string| max:100',
            'lastname'=>'string| max:100',
            'gender_id'=>'required| exists:genders,id',
            'age'=>'required| integer| min:13| max|45',
            'email'=>'required|string| email| max:100| unique:leads,email,'.$id,
            'country_id'=>'required| exists:countries,id',
            'city_id'=>'required| exists:cities,id',
        ]);


        $user = Auth::user();
        $user_id = $user->id;

        $lead = Lead::findOrFail($id);

        $lead->firsttname = $request['firsttname'];
        $lead->lastname = $request['lastname'];
        $lead->gender_id = $request['gender_id'];
        $lead->age = $request['age'];
        $lead->email = $request['email'];
        $lead->country_id = $request['country_id'];
        $lead->city_id = $request['city_id'];
        $lead->user_id = $user_id;

        // converted ဖြစ်ဖြစ် စစ်ချင်ရင် default false  = 0 ထားထားတာ
        // 0  ဆိုရင် save လုပ်ခွင့်ပြုမယ် ၁ ဆိုရင် edit လုပ်ခွင့်မပြုဘူး
        // convert ပြောင်းမပြောင်းသိချင်ရင် ၁ ဆိုရင် ပြောင်းထားပီးသား


        if($lead->converted()){
            // return redirect()->back()->with('error', 'This Lead form has already been converted! to an authorized stage! Editing is not allowed!');
            return redirect()->back()->with('error', ' Editing is disabled!!');
        }

        $leave->save();

        session()->flash('success', 'Lead has been updated successfully!');
        // return redirect()->back();
        return redirect(route('leads.index'));
        //  တစ်ခုခု admin က စာလေးဖြစ်ဖြစ်ဝင်ပြင်လိုက်ရင် user_id ပြောင်းသွားမဆိုးလို့ user_id ကို update မှာမထည့်ပေးတော့ဘူး

    }


    public function updatestage(Request $request, string $id){
        // $request->validate([
        //     'stage_id' => 'required|integer',
        // ]);

        $lead = Lead::findOrFail($id);
        // $lead->stage_id = $request['stage_id'];
        $lead->stage_id = $request->stage_id;
        $lead->save();

        session()->flash('info', 'Change Stage has been updated successfully!');
        return redirect()->back();
    }

    public function converttostudent($id){
        $lead = Lead::findOrFail($id);

        $student = Student::create([
            // 'firstname' => $lead->firsttname,
            // 'lastname' => $lead->lastname,
            // 'gender_id' => $lead->gender_id,
            // 'age' => $lead->age,
            // 'email' => $lead->email,
            // 'country_id' => $lead->country_id,
            // 'city_id' => $lead->city_id,
            // 'user_id' => $lead->user_id,
            // 'stage_id' => 1,
        ]);

        $lead->save();

        session()->flash('success', 'Pipe Successfully !. Lead has been converted to Student successfully!');
        return redirect()->back();
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Lead::whereIn('id',$getselectedids)->delete();

            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            // Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
