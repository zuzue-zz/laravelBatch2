@include('layouts.auth.authheader')

{{-- Start react js or vue js  --}}
<div id="app">

    {{-- Start Page Wrapper  --}}
    <section>

        <div class="vh-100 d-flex justify-content-center align-items-center">

            <div class="row">

                <div class="col-4 p-4">

                    {{-- Start Inner Content Area  --}}
                    <div class="row">

                        @if (Session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                            </div>
                        @endif

                        @if (Session('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>info!</strong> {{ session('info') }}
                            </div>
                        @endif

                        @if (Session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors)

                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> {{ $error }}
                                </div>
                            @endforeach

                        @endif

                        <h6>@yield('caption')</h6>

                        @yield('content')

                        {{-- bootstrap loader  --}}
                        <div class="d-flex justify-content-center mt-3">
                            <div id="loader" class="spinner-border spinner-border-sm d-none"></div>
                        </div>

                        {{-- social signup  --}}
                        <div class="row">
                            <small class="text-center text-muted mt-3">Sign up with</small>
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

                        {{-- data policy  --}}
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
                    {{-- End Inner Content Area  --}}

                </div>
            </div>

        </div>



    </section>
    {{-- End Page Wrapper --}}


</div>
{{-- End react js or vue js   --}}

@include('layouts.auth.authfooter')
