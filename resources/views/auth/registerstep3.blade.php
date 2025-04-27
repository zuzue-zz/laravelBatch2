@extends('layouts.auth.authindex')
@section('caption','Contact Information')

@section('content')

<form id="stepform" class="mt-3" method="POST" action="{{ route('register.storestep3') }}">
    @csrf

    <!-- Country -->
    <div class="form-group mb-3">

        <label for="country_id">Country<span class="text-danger">*</span></label>
        <select name="country_id" id="country_id"
            class="form-select form-select-sm rounded-0">
            <option selected disabled>Choose a country</option>
            {{--
                @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{$country['name'] }}</option>
                @endforeach
            -z-}}
        </select>

    </div>

     <!-- city -->
     <div class="form-group mb-3">

        <label for="city_id">city<span class="text-danger">*</span></label>
        <select name="city_id" id="city_id"
            class="form-select form-select-sm rounded-0">
            <option selected disabled>Choose a city</option>

            {{--
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city['name'] }}</option>
                @endforeach
            --}}

        </select>

    </div>


    <div class="d-grid">
        <button type="submit" id="submitbtn" class="btn btn-info rounded-0">Next</button>
    </div>


</form>



@endsection
