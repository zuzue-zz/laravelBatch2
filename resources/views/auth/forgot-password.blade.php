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

                    <!-- Email Address -->
                    <div class="form-group mb-3">

                        <input type="email" name="email" id="email"
                            class="form-control form-control-sm rounded-0"
                            placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="d-grid">
                        <button type="submit" id="submitbtn" class="btn btn-info rounded-0">Next</button>
                    </div>


                </form>


            </div>

        </div>



    </section>
    {{-- End Page Wrapper --}}


</div>


{{-- End react js or vue js   --}}



@extends('layouts.auth.authfooter')

