<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Relative;
use App\Models\Gender;
use App\Models\Contact;
use App\Models\User;
use App\Models\Status;

use App\Notifications\ContactEmailNotify;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ContactsController extends Controller
{

    public function index(Request $request)
    {

        // $contacts = Contact::all();

        // $statusfilter = $request->input('statusfilter');
        $namefilter = $request['namefilter'];
        $genderfilter = $request->input('genderfilter');
        // $relativefilter = $request->input('relativefilter');
        // $birthdayfilter = $request->input('birthdayfilter');
        // $emailfilter = $request->input('emailfilter');
        // $phonefilter = $request->input('phonefilter');
        // $addressfilter = $request->input('addressfilter');

        $query = Contact::query();
        // if($statusfilter) {
        //     $query->where('status_id', $statusfilter);
        // }
        if($namefilter) {
            $query->where('firstname', 'like', '%' . $namefilter . '%');
        }
        if($genderfilter) {
            $query->where('gender_id', $genderfilter);
        }
        // if($relativefilter) {
        //     $query->where('relative_id', $relativefilter);
        // }
        // if($birthdayfilter) {
        //     $query->where('birthday', 'like', '%' . $birthdayfilter . '%');
        // }
        // if($emailfilter) {
        //     $query->where('email', 'like', '%' . $emailfilter . '%');
        // }
        // if($phonefilter) {
        //     $query->where('phone', 'like', '%' . $phonefilter . '%');
        // }
        // if($addressfilter){
        //     $query->where('address', 'like', '%' . $addressfilter . '%');
        // }

        $contacts = $query->paginate(5)->appends($request->except('page'));
        // $contacts = $query->paginate(5)->appends($request->query());


        $genders = Gender::all();
        $relatives = Relative::all();
        return view('contacts.index',compact('contacts',"genders","relatives"));
    }


    public function create()
    {
        $genders = Gender::all();
        $relatives = Relative::all();
        return view('contacts.create',compact("genders","relatives"));
    }


    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|min:3|max:50',
            'lastname' => 'nullable|string|max:50',
            'gender_id' => 'nullable|exists:genders,id',
            'birthday' => 'nullable|date|before:today',
            'relative_id' => 'nullable|exists:relatives,id'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $contact = new Contact();
        $contact->firstname = $request['firstname'];
        $contact->lastname = $request['lastname'];
        $contact->birthday = $request['birthday'];
        $contact->gender_id = $request['gender_id'];
        $contact->relative_id = $request['relative_id'];
        $contact->user_id =  $user_id ;


        $contact->save();

        // Email Notification to created user

        $contactdatas = [
            'firstname' => $contact->firstname,
            'lastname' => $contact->lastname,
            'birthday' => $contact->birthday,
            'relative' => $contact->relative['name'],
            'url' => url('/')
        ];

        Notification::send($user, new ContactEmailNotify($contactdatas));

        $request->session()->flash('success','new Roles is created');
        return redirect(route('contacts.index'));
    }


    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view("contacts.show",compact('contact'));
    }


    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        $genders = Gender::all();
        $relatives = Relative::all();
        return view('contacts.edit',compact("contact","genders","relatives"));
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'editfirstname' => 'required|string|min:3|max:50',
            'editlastname' => 'nullable|string|max:50',
            'editgender_id' => 'nullable|exists:genders,id',
            'editbirthday' => 'nullable|date|before:today',
            'editrelative_id' => 'nullable|exists:relatives,id'
        ]);

        $contact = Contact::findOrFail($id);

        $user = Auth::user();
        $user_id = $user->id;

        $contact->firstname = $request['editfirstname'];
        $contact->lastname = $request['editlastname'];
        $contact->gender_id = $request['editgender_id'];
        $contact->birthday = $request['editbirthday'];
        $contact->relative_id = $request['editrelative_id'];
        $contact->user_id =  $user_id ;

        $contact->save();

        $request->session()->flash('success','Updated successfully');
        return redirect(route('contacts.index'));
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        session()->flash('info','Deleted successfully');
        return redirect(route('contacts.index'));
    }

    public function bulkdeletes(Request $request){
        try{
            $getselectedids = $request->selectedids;
            Contact::whereIn('id',$getselectedids)->delete();
            // return Response::json(['success'=>true,'message'=>'Contacts Deleted Successfully']);
            return Response::json(["success"=>"Selected data have been deleted successfully."]);
        }catch(Exception $e){
            Log::error($e->getMessage());
            // return Response::json(['success'=>false,'message'=>'Something Went Wrong']);
            return Response::json(["status"=>"Failed. ", "message"=>$e->getMessage()]);
        }
    }
}
