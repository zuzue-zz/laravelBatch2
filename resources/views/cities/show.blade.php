@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12">
            <a href="{{ route('cities.index') }}" class="btn btn-secondary btn-sm rouned-0">Close</a>
        </div>
        <hr />


        <div class="col-md-12">
            <div class="row">

                <div class="col-md-4">

                    <div class="card rounded-0">

                        <div class="card-body">
                            <h6 class="card-title">{{ $city->name }} | <span
                                    class="text-muted">{{ $city->status['name'] }}</span></h6>

                            <div class="row">
                                <div class="col-sm-6 text-muted" style="font-size: 12px;">
                                    <i class="fas fa-user fa-sm"></i> {{ $city->user['name'] }}
                                </div>
                                <div class="col-sm-6 text-muted" style="font-size:12px;">
                                    <i class="fas fa-calendar-alt fa-sm"></i>
                                    {{ date('d M Y h:i:s A', strtotime($city->created_at)) }}
                                    <br />
                                    <i class="fas fa-edit fa-sm"></i>
                                    {{ date('d M Y h:i:s A', strtotime($city->updated_at)) }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>



    </div>
    <!-- End Content Area  -->
@endsection

@section('css')
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection
