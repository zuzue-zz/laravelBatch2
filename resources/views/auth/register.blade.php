@include('layouts.auth.authheader')

<div id="app">

    {{-- Start Page Wrapper  --}}
    <section class="vh-200 d-flex justify-content-center align-items-center">

        <div class="bg-white p-4 col-4">

            <h6 class="mb-3">Register</h6>

            <form method="POST" action="{{ route('register') }}">
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
                        --}}
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
                    <button type="submit" class="btn btn-info rounded-0">Sign Up</button>
                </div>


            </form>


            {{-- bootstrap loader  --}}
            <div></div>

            {{-- social login  --}}
            <div class="row">
                <small class="text-center text-muted mt-3">Sign in with</small>
                <div class="col-12 text-center mt-2">
                    <a href="javascript:void(0);" class="btn" title="Login with Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn" title="Login with Google">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn" title="Login with Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn" title="Login with Github">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            {{-- login link  --}}
            <div class="row">
                <div class="col-12 text-center mt-2">
                    <small>Already have an account?
                        <a href="{{ route('login') }}" class="text-primary ms-1">Sign In</a>
                    </small>

                </div>
            </div>

            {{-- policy  --}}
            <div class="row">
                <div class="col-12 text-muted text-center mt-2">
                    <small>By clicking sign up, you agree to our
                        <a href="javascript:void(0);" class="fw-bold ms-1">Terms</a>,
                        <a href="javascript:void(0);" class="fw-bold ms-1">Data Policy</a>,
                        <a href="javascript:void(0);" class="fw-bold ms-1">Cookie Policy</a>.
                        You may recieve SMS notification from us.
                    </small>

                </div>
            </div>

        </div>

    </section>
    {{-- End Page Wrapper --}}


</div>


@include('layouts.auth.authfooter')




















