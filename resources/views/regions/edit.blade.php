@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12">

            <form action="{{ route('regions.update', $region->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row align-items-end ">

                    <div class="col-md-3 form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0"
                            placeholder="Enter Your Region Name" value="{{ old('name', $region->name) }}" />
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="country_id">Country</label>
                        <select name="country_id" id="country_id" class="form-control form-control-sm rounded-0">
                            @foreach ($countries as $country)
                                <option value="{{ $country['id'] }}" @if ($country['id'] === $region['country_id']) selected @endif>
                                    {{ $country['name'] }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-3 form-group">
                        <label for="status_id">Status</label>
                        <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0">
                            @foreach ($statuses as $status)
                                <option value="{{ $status['id'] }}" @if ($status['id'] === $region['status_id']) selected @endif>
                                    {{ $status['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <a href="{{ route('regions.index') }}" class="btn btn-primary btn-sm rounded-0">Cancel</a>
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
