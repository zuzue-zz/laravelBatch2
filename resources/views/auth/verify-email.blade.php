@extends('layouts.auth.authheader')


    {{-- Start Page Wrapper  --}}
    <section>

        <div class="vh-100 d-flex justify-content-center align-items-center">

            <div class="row">

                <div>
                    <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                </div>

                @if (@session('status') == 'verification-link-sent')
                    <small class="text-primart text-sm mb-4">
                        A new link has been sent to your email address you provided during registration.
                    </small>
                @endif

                <form class="mt-3" method="POST" action="{{ route('verification.send') }}">
                    @csrf


                    <div class="d-grid">
                        <button type="submit" id="submitbtn" class="btn btn-info rounded-0">Resend Verification Email</button>
                    </div>

                    <div class="text-center mt-2">
                        <small>Don\'t have an account? </small>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout')}}" class="small" onclick="event.preventDefault(); this.closes('form').submit();">Sign Out</a>
                        </form>

                    </div>

                </form>

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



@extends('layouts.auth.authfooter')





<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>


    </div>
</x-guest-layout>
