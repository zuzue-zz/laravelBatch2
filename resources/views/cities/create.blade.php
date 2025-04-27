@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12">

            <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf

                <div class="row align-items-end ">

                    <div class="col-md-3 form-group mb-3">
                        <label for="name">Name <span class="text-danger">*</span> </label>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0 "
                            placeholder="Enter City name" value="" />
                    </div>

                    <div class="col-md-3 form-group mb-3">
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

                    <div class="col-md-3 form-group mb-3">
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

                    <div class="col-md-3 form-group mb-3">
                        <a href="{{ route('cities.index') }}" class="btn btn-primary btn-sm rouned-0">Cancel</a>
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
