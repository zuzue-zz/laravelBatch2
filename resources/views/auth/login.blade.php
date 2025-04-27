@include('layouts.auth.authheader')

<div id="app">

    {{-- Start Page Wrapper  --}}
    <section class="vh-100 d-flex justify-content-center align-items-center">

        <div class="bg-white p-4 col-4">

            <h6 class="mb-3">Sign in</h6>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group mb-3">

                    <input type="email" name="email" id="email"
                        class="form-control form-control-sm rounded-0 @error('email') is-invalid @enderror"
                        placeholder="Email" value="{{ old('email') }}" autofocus />
                    {{-- @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>

                <!-- Email Address -->
                <div class="form-group mb-3">

                    <input type="password" name="password" id="password"
                        class="form-control form-control-sm rounded-0 @error('password') is-invalid @enderror"
                        placeholder="Password" value="{{ old('password') }}" autofocus />
                    {{-- @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>

                <!-- Email Address -->
                <div class="form-group mb-3">
                    <div class="d-flex">

                        <div class="form-check">
                            <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input"
                                value="0" value="{{ old('remember') ? 'checked' : '' }}" />
                            <label for="remember_me">Remember Me </label>
                        </div>

                        <div class="ms-auto">
                            <a href="{{ route('password.request') }}"><i class="fas fa-lock me-1"></i> Forgot Password ?
                            </a>
                        </div>

                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-info rounded-0">Login In </button>
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
                    <small>Don't have an account?
                        <a href="{{ route('register') }}" class="text-primary ms-1">Signup</a>
                    </small>

                </div>
            </div>

            {{-- policy  --}}
            <div class="row">
                <div class="col-12 text-muted text-center mt-2">
                    <small>By clicking sign up, you agree to our
                        <a href="javascript:void(0);" class="fw-bold">Terms</a>.
                    </small>

                </div>
            </div>

        </div>

    </section>
    {{-- End Page Wrapper --}}


</div>


@include('layouts.auth.authfooter')
