@extends('layouts.auth.authindex')
@section('caption','Access')

@section('content')

<form id="stepform" class="mt-3" method="POST" action="{{ route('register.storestep1') }}">
    @csrf

    <!-- Email Address -->
    <div class="form-group mb-3">

        <input type="email" name="email" id="email"
            class="form-control form-control-sm rounded-0"
            placeholder="Username" value="{{ old('email') }}" />

    </div>

    <!-- Email Password -->
    <div class="form-group mb-3">

        <input type="password" name="password" id="password"
            class="form-control form-control-sm rounded-0"
            placeholder="Password" value="{{ old('password') }}" autofocus />

    </div>

    <!-- Password Confirmation -->
    <div class="form-group mb-3">

        <input type="password-confirmation" name="password-confirmation" id="password-confirmation"
            class="form-control form-control-sm rounded-0"
            placeholder="Confirm Password" value="{{ old('password-confirmation') }}" />

    </div>


    <div class="d-grid">
        <button type="submit" id="submitbtn" class="btn btn-info rounded-0">Next</button>
    </div>


</form>



@endsection




















