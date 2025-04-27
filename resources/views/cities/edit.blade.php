@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12">

            <form action="{{ route('cities.update', $city->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row align-items-end ">

                    <div class="col-md-3 form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0"
                            placeholder="Enter Your City Name" value="{{ old('name', $city->name) }}" />
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="region_id">Region</label>
                        <select name="region_id" id="region_id" class="form-control form-control-sm rounded-0">
                            @foreach ($regions as $region)
                                <option value="{{ $region['id'] }}" @if ($region['id'] === $region['region_id']) selected @endif>
                                    {{ $region['name'] }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-3 form-group">
                        <label for="status_id">Status</label>
                        <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0">
                            @foreach ($statuses as $status)
                                <option value="{{ $status['id'] }}" @if ($status['id'] === $city['status_id']) selected @endif>
                                    {{ $status['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <a href="{{ route('cities.index') }}" class="btn btn-primary btn-sm rounded-0">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>
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
@endsection
