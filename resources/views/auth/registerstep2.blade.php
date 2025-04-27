@extends('layouts.auth.authindex')
@section('caption','Personal Information')

@section('content')

<form id="stepform" class="mt-3" method="POST" action="{{ route('register.storestep2') }}">
    @csrf



    <!-- First Name -->
    <div class="form-group mb-3">

        <input type="firstname" name="firstname" id="firstname"
            class="form-control form-control-sm rounded-0"
            placeholder="First Name" value="{{ old('firstname') }}" autofocus />

    </div>

    <!-- Last Name -->
    <div class="form-group mb-3">

        <input type="lastname" name="lastname" id="lastname"
            class="form-control form-control-sm rounded-0"
            placeholder="Last Name" value="{{ old('lastname') }}" />

    </div>

     <!-- Gender -->

     <div class="form-group mb-3">

        <label for="gender_id">Gender<span class="text-danger">*</span></label>
        <select name="gender_id" id="gender_id"
            class="form-select form-select-sm rounded-0">
            <option selected disabled>Choose a gender</option>
            {{--
                @foreach ($genders as $gender)
                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                @endforeach
            --}}
        </select>

    </div>

    <!-- Age -->
    <div class="form-group mb-3">
        <label for="age">Age<span class="text-danger">*</span></label>
        <input type="number" name="age" id="age"
            class="form-control form-control-sm rounded-0"
            placeholder="Enter Your Age" value="{{ old('age') }}" />

    </div>


    <div class="d-grid">
        <button type="submit" id="submitbtn" class="btn btn-info rounded-0">Next</button>
    </div>


</form>


@endsection




















