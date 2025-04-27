@extends('layouts.auth.authheader')


    {{-- Start Page Wrapper  --}}
    <section>

        <div class="vh-100 d-flex justify-content-center align-items-center">

            <div class="row">

                <div>
                    <p>Forgot your password? Lorem ipsum dolor sit amet consectetur adipisicing elit. At accusantium cumque in excepturi accusamus sunt tempora quas aliquam quod pariatur? Ullam fuga ab minus laboriosam voluptatem sunt minima debitis commodi?</p>
                </div>

                @if (@session('status'))
                    <small class="text-primart text-sm mb-4">
                        A new link has been sent to your email address you provided during registration.
                    </small>
                @endif

                <form class="mt-3" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- Passowrd Reset Token  --}}
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="form-group mb-3">
                        <input type="email" name="email" id="email"
                        class="form-control form-control-sm rounded-0"
                        placeholder="Enter your email" value="{{ old('email') }}" />
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Password  --}}
                    <div class="form-group mb-3">
                        <input type="password" name="password" id="password"
                        class="form-control form-control-sm rounded-0"
                        placeholder="Enter your password" value="{{ old('password') }}" />
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Confirm Password  --}}
                    <div class="form-group mb-3">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control form-control-sm rounded-0"
                        placeholder="Enter your password" />
                        @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="d-grid">
                        <button type="submit" id="submitbtn" class="btn btn-info rounded-0">Next</button>
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
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
