@include('layouts.adminheader')


{{-- Start react js or vue js  --}}
<div id="app">

    <!-- Start Site Setting  -->
    <div id="sitesettings" class="sitesettings">
        <div class="sitesettings-item">
            <a href="javascript:void(0);" id="sitetoggle" class="sitetoggle">
                <i class="fas fa-cog ani-rotates"></i>
            </a>
        </div>

    </div>
    <!-- End Site Setting  -->

    {{-- Start leftside bar  --}}
    @include('layouts.adminleftsidebar')
    {{-- End leftside bar   --}}

    {{-- Start Page Wrapper  --}}
    <section>

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-10 col-md-9 ms-auto pt-md-5 mt-md-3">

                    {{-- Start Inner Content Area  --}}
                    <div class="row">

                        {{-- @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                            </div>
                        @endif

                        @if (session('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>info!</strong> {{ session('info') }}
                            </div>
                        @endif

                        @if (@session('error'))
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

                        @endif --}}

                        {{-- Start BreadCrumb  --}}
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">
                                        Previous</a></li>
                                <li class="breadcrumb-item active">Current</li>
                            </ol>
                        </nav>
                        {{-- End BreadCrumb --}}

                        @yield('content')

                    </div>
                    {{-- End Inner Content Area  --}}

                </div>
            </div>

        </div>



    </section>
    {{-- End Page Wrapper --}}


</div>


{{-- End react js or vue js   --}}


@include('layouts.adminfooter')
