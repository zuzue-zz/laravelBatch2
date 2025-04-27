<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;   //default is false = rule on pee ma open ya tay dr
        // dd($this->method()); // POST PUT
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        if($this->method == 'POST'){
            return [
                'post_id' => 'required|array',
                'post_id.*' => 'exists:posts,id',
                'startdate' => 'required|date',
                'enddate' => 'required|date|after_or_equal:startdate',
                'tag' => 'required|array',
                'tag.*' => 'exists:users,id',
                'title' => 'required|max:100',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
                'images.*' => 'nullable|file|mimes:jpg,jpeg,png|max:1024'
            ];
        }else{
            return [
                'post_id' => 'required|array',
                'post_id.*' => 'exists:posts,id',
                'startdate' => 'required|date',
                'enddate' => 'required|date|after_or_equal:startdate',
                'tag' => 'required|array',
                'tag.*' => 'exists:users,id',
                'title' => 'required|max:100',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
                'images.*' => 'nullable|file|mimes:jpg,jpeg,png|max:1024'
            ];
            // PUT
        }





    }

    public function attributes(){
        return [
            'post_id'=> 'class name',
            'tag'=> 'authorize person'
        ];


    }

    public function messages(){
        return [
            'post_id.required' => 'class name can\'t be empty',
            // 'post_id.*.exists' => 'Invalid class name selected',
            'tag.required' => 'authorize person must be choose'
            // 'tag.*.exists' => 'Invalid authorize person selected',
        ];
    }



}


// php artisan make:request LeaveRequest
