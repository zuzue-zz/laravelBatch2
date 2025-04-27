@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12">

            <form action="{{ route('townships.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf

                <div class="row align-items-end ">

                    <div class="col-md-4 form-group mb-3">
                        <label for="name">Township Name <span class="text-danger">*</span> </label>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0 "
                            placeholder="Enter Township name" value="" />
                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <label for="country_id">Country <span class="text-danger">*</span></label>
                        @error('country_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <select name="country_id" id="country_id" class="form-control form-control-sm rounded-0">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <label for="region_id">Region <span class="text-danger">*</span></label>
                        @error('region_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <select name="region_id" id="region_id" class="form-control form-control-sm rounded-0">
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <label for="city_id">City <span class="text-danger">*</span></label>
                        @error('city_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <select name="city_id" id="city_id" class="form-control form-control-sm rounded-0">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <label for="status_id">Status <span class="text-danger">*</span></label>
                        @error('status_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <a href="{{ route('townships.index') }}" class="btn btn-primary btn-sm rouned-0">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3 ">Submit</button>
                    </div>

                </div>
            </form>


        </div>

    </div>
    <!-- End Content Area  -->
@endsection

@section('css')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {




        });
    </script>
@endsection
