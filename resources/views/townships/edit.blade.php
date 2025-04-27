@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12">

            <form action="{{ route('townships.update', $township->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row align-items-end ">

                    <div class="col-md-3 form-group">
                        <label for="name">Township Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0"
                            placeholder="Enter Your Township Name" value="{{ old('name', $township->name) }}" />
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="country_id">Country</label>
                        <select name="country_id" id="country_id" class="form-control form-control-sm rounded-0">
                            @foreach ($countries as $country)
                                <option value="{{ $country['id'] }}" @if ($country['id'] === $township['country_id']) selected @endif>
                                    {{ $country['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="region_id">Region</label>
                        <select name="region_id" id="region_id" class="form-control form-control-sm rounded-0">
                            @foreach ($regions as $region)
                                <option value="{{ $region['id'] }}" @if ($region['id'] === $township['region_id']) selected @endif>
                                    {{ $region['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="city_id">City</label>
                        <select name="city_id" id="city_id" class="form-control form-control-sm rounded-0">
                            @foreach ($cities as $city)
                                <option value="{{ $city['id'] }}" @if ($city['id'] === $township['city_id']) selected @endif>
                                    {{ $city['name'] }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-3 form-group">
                        <label for="status_id">Status</label>
                        <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0">
                            @foreach ($statuses as $status)
                                <option value="{{ $status['id'] }}" @if ($status['id'] === $township['status_id']) selected @endif>
                                    {{ $status['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <a href="{{ route('townships.index') }}" class="btn btn-primary btn-sm rounded-0">Cancel</a>
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
