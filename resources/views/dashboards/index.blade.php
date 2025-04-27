@extends('layouts.adminindex')


@section('content')
    <!-- Start Content Area -->
    <Section>

        {{-- <div class="container-fluid">

            <div class="row">

                <div class="col-lg-10 col-md-9 ms-auto">

                    <!-- Start Shortcut Area  -->

                    <div class="row pt-md-5 mt-md-3">

                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="card shadow py-2 border-left-primarys">
                                <div class="card-body">
                                    <div class="row aligns-item-center">
                                        <div class="col">
                                            <h6 class="text-primary text-xs fw-bold text-uppercase mb-1">sales(Monthly)
                                            </h6>
                                            <p class="h5 text-muted ">$ 50,000</p>
                                        </div>
                                        <div class="col-auto"> <!-- col-auto perfoum as text-align right-->
                                            <i class="fas fa-calendar fa-2x text-secondary"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="card shadow py-2 border-left-successes">
                                <div class="card-body">
                                    <div class="row aligns-item-center">
                                        <div class="col">
                                            <h6 class="text-primary text-xs fw-bold text-uppercase mb-1">Rental
                                                Fee(Annual)</h6>
                                            <p class="h5 text-muted ">$ 50,000</p>
                                        </div>
                                        <div class="col-auto"> <!-- col-auto perfoum as text-align right-->
                                            <i class="fas fa-dollar-sign fa-2x text-secondary"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="card shadow py-2 border-left-infos">
                                <div class="card-body">
                                    <div class="row aligns-item-center">
                                        <div class="col">
                                            <h6 class="text-primary text-xs fw-bold text-uppercase mb-1">Debit Collect
                                            </h6>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <p class="h5 text-muted ">60%</p>
                                                </div>
                                                <div class="col">
                                                    <div class="progress" style="height:13px;">
                                                        <div class="progress-bar bg-info" style="width: 60%;"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"> <!-- col-auto perfoum as text-align right-->
                                            <i class="fas fa-clipboard-list fa-2x text-secondary"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="card shadow py-2 border-left-warnings">
                                <div class="card-body">
                                    <div class="row aligns-item-center">
                                        <div class="col">
                                            <h6 class="text-primary text-xs fw-bold text-uppercase mb-1">Request
                                                Message</h6>
                                            <p class="h5 text-muted ">25</p>
                                        </div>
                                        <div class="col-auto"> <!-- col-auto perfoum as text-align right-->
                                            <i class="fas fa-comments fa-2x text-secondary"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>

                    <!-- End Shortcut Area  -->

                    <!-- Start Carousel Area  -->
                    <div class="row">

                        <div class="col-md-3 col-sm-6 mb-2">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Sales</h6>

                                    <div id="sales" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner p-3">

                                            <div class="carousel-item active">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <div class="carousel-item">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <div class="carousel-item">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <button type="button" class="carousel-control-prev" data-bs-target="#sales"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </button>

                                            <button type="button" class="carousel-control-next" data-bs-target="#sales"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-2">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Purcheses</h6>

                                    <div id="purcheses" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner p-3">

                                            <div class="carousel-item active">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <div class="carousel-item ">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <div class="carousel-item ">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <button type="button" class="carousel-control-prev"
                                                data-bs-target="#purcheses" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </button>

                                            <button type="button" class="carousel-control-next"
                                                data-bs-target="#purcheses" data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-2">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Returns</h6>

                                    <div id="returns" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner p-3">

                                            <div class="carousel-item active">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <div class="carousel-item">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <div class="carousel-item">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <button type="button" class="carousel-control-prev"
                                                data-bs-target="#returns" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </button>

                                            <button type="button" class="carousel-control-next"
                                                data-bs-target="#returns" data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-2">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Marketing</h6>

                                    <div id="marketing" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner p-3">

                                            <div class="carousel-item active">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <div class="carousel-item">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <div class="carousel-item">

                                                <div class="d-flex">
                                                    <h3 class="me-3">$ 58,664</h3>
                                                    <h3 class="text-danger">+3.2%</h3>
                                                </div>

                                                <div class="">
                                                    <p class="fw-bold text-small">Revenue<span class="text-muted">($1572M
                                                            last month)</span></p>
                                                </div>

                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    <i class="fas fa-calendar-alt me-1"></i> Jan
                                                </button>

                                            </div>

                                            <button type="button" class="carousel-control-prev"
                                                data-bs-target="#marketing" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </button>

                                            <button type="button" class="carousel-control-next"
                                                data-bs-target="#marketing" data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Carousel Area  -->

                    <!-- Start Gauge Area  -->

                    <div class="row">

                        <div class="col-lg-3 col-md-6 mb-2">

                            <div class="card shadow py-2 border-left-primarys">

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col">
                                            <h6 class="text-xs fw-bold text-primary text-uppercase mb-1">Users</h6>
                                        </div>

                                        <div class="col-auto">
                                            <p class="h6 text-muted">Report</p>
                                        </div>

                                    </div>

                                    <div>

                                        <div id="guageusers"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 mb-2">

                            <div class="card shadow py-2 border-left-successes">

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col">
                                            <h6 class="text-xs fw-bold text-primary text-uppercase mb-1">Customers</h6>
                                        </div>

                                        <div class="col-auto">
                                            <p class="h6 text-muted">Report</p>
                                        </div>

                                    </div>

                                    <div>

                                        <div id="guagecustomers"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 mb-2">

                            <div class="card shadow py-2 border-left-infos">

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col">
                                            <h6 class="text-xs fw-bold text-primary text-uppercase mb-1">Employes</h6>
                                        </div>

                                        <div class="col-auto">
                                            <p class="h6 text-muted">Report</p>
                                        </div>

                                    </div>

                                    <div>

                                        <div id="guageemployes"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 mb-2">

                            <div class="card shadow py-2 border-left-warnings">

                                <div class="card-body">

                                    <div class="row">
                                        <div class="row">

                                            <div class="col">
                                                <h6 class="text-xs fw-bold text-primary text-uppercase mb-1">Investers
                                                </h6>

                                            </div>


                                            <div class="col-auto">
                                                <p class="h6 text-muted">Report</p>
                                            </div>


                                        </div>

                                        <div>

                                            <div id="guageinvesters"></div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- End Gauge Area  -->

                    <!-- Start Expenses Area  -->

                    <div class="row">

                        <div class="col-md-7 mb-3">

                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="text-primary">Expenses</h6>
                                </div>
                                <div class="card-body">

                                    <h6 class="small">Other Expenses 20%</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" style="width: 20%;" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="small">Sales Tracking 40%</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-warning" style="width: 40%;" aria-valuenow="40"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="small">Retal Fee 60%</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-primary" style="width: 60%;" aria-valuenow="60"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="small">Salary 80%</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-info" style="width: 80%;" aria-valuenow="80"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h6 class="small">Fixture 100%</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-success" style="width: 100%;" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">

                            <div class="card shadow">

                                <div class="card-header">
                                    <h6 class="text-primary">Revnue Sources</h6>
                                </div>

                                <div class="card-body">

                                    <div
                                        style="height: 250px; display: flex; justify-content: center; align-items: center;">
                                        <canvas id="myChart"></canvas>
                                    </div>

                                    <div class="small text-center mt-2">
                                        <span><i class="fas fa-circle text-warning"></i> Return item</span>
                                        <span class="mx-2"><i class="fas fa-circle text-primary"></i> Direct
                                            Sales</span>
                                        <span><i class="fas fa-circle text-danger"></i> Online Sales</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- End Expenses Area  -->

                    <!-- Start Earning Area  -->

                    <div class="row">

                        <div class="col-md-8 mb-3">

                            <div class="card">

                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="card-title">Earnings Overview</h6>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu shadow">
                                            <div class="dropdown-header">Quick Action</div>
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item">View Report</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="curve_chart" style="width: 100%;"></div>
                                </div>

                            </div>


                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card ">
                                <div class="card-body">
                                    <h6 class="card-title">Regional Team</h6>

                                    <div class="d-flex align-items-center border-bottom py-2">
                                        <img src="./assets/img/users/user1.jpg" class="rounded-circle" width="40"
                                            alt="user1" />

                                        <div class="ms-3">
                                            <h6 class="mb-1">Ms.July</h6>
                                            <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>
                                                Mandalay City, Myanmar.</small>
                                        </div>
                                        <div class="badge bg-success p-1 ms-auto">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center border-bottom py-2">
                                        <img src="./assets/img/users/user2.jpg" class="rounded-circle" width="40"
                                            alt="user2" />

                                        <div class="ms-3">
                                            <h6 class="mb-1">Mr.Anton</h6>
                                            <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>
                                                Mandalay City, Myanmar.</small>
                                        </div>
                                        <div class="badge bg-success p-1 ms-auto">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center py-2">
                                        <img src="./assets/img/users/user3.jpg" class="rounded-circle" width="40"
                                            alt="user3" />

                                        <div class="ms-3">
                                            <h6 class="mb-1">Ms.Yoon</h6>
                                            <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>
                                                Mandalay City, Myanmar.</small>
                                        </div>
                                        <div class="badge bg-success p-1 ms-auto">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end Earning Area  -->

                    <!-- start Result Area  -->
                    <div class="row">

                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="d-flex justify-content-center align-items-center">

                                                <i class="fas fa-users fa-2x text-primary me-4"></i>

                                                <div class="text-center">
                                                    <p class="mb-0">Users</p>
                                                    <h5 class="fw-bold">56,320</h5>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="d-flex justify-content-center align-items-center">

                                                <i class="fas fa-check-circle fa-2x text-primary me-4"></i>

                                                <div class="text-center">
                                                    <p class="mb-0">Feedbacks</p>
                                                    <h5 class="fw-bold">3,200</h5>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="d-flex justify-content-center align-items-center">

                                                <i class="fas fa-trophy fa-2x text-primary me-4"></i>

                                                <div class="text-center">
                                                    <p class="mb-0">Employes</p>
                                                    <h5 class="fw-bold">1,600</h5>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="d-flex justify-content-center align-items-center">

                                                <i class="fas fa-star fa-2x text-primary me-4"></i>

                                                <div class="text-center">
                                                    <p class="mb-0">Sales</p>
                                                    <h5 class="fw-bold">12,860</h5>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end Result Area  -->

                    <!-- start Analysis Area  -->
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="card shadow ">
                                <div class="card-body">
                                    <h6>Sale Analysis Trend</h6>

                                    <div class="mt-2">
                                        <div class="d-flex justify-content-between">
                                            <small>Order Value</small>
                                            <small>120.8%</small>
                                        </div>

                                        <div class="progress">
                                            <div class="progress-bar bg-secondary" style="width: 80%;" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <div class="d-flex justify-content-between">
                                            <small>Total Products</small>
                                            <small>325.6%</small>
                                        </div>

                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width: 50%;" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <div class="d-flex justify-content-between">
                                            <small>Quantity</small>
                                            <small>25.60%</small>
                                        </div>

                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 70%;" aria-valuenow="70"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h6>Project Status</h6>

                                    <div>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="./assets/img/clients/client1.png" class="me-3"
                                                            width="100" alt="client1" />
                                                        <div>
                                                            <small>Company</smal>
                                                                <p class="fw-bold small mt-1">Sony Electronic</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    Sales
                                                    <p class="fw-bold mt-1">$3250</p>
                                                </td>
                                                <td>
                                                    Status
                                                    <p class="fw-bold text-success mt-1">88%</p>
                                                </td>
                                                <td>
                                                    DaadLine
                                                    <p class="fw-bold mt-1">10 June 2023</p>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-secondary rounded-0"><i
                                                            class="fas fa-pen"></i> edit</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="./assets/img/clients/client2.png" class="me-3"
                                                            width="100" alt="client2" />
                                                        <div>
                                                            <small>Company</small>
                                                            <p class="fw-bold small mt-1">Mi Electronic</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    Sales
                                                    <p class="fw-bold mt-1">$3250</p>
                                                </td>
                                                <td>
                                                    Status
                                                    <p class="fw-bold text-success mt-1">88%</p>
                                                </td>
                                                <td>
                                                    DaadLine
                                                    <p class="fw-bold mt-1">10 June 2023</p>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-secondary rounded-0"><i
                                                            class="fas fa-pen"></i> edit</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="./assets/img/clients/client3.png" class="me-3"
                                                            width="100" alt="client3" />
                                                        <div>
                                                            <small>Company</small>
                                                            <p class="fw-bold small mt-1">Vivo Electronic</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    Sales
                                                    <p class="fw-bold mt-1">$3250</p>
                                                </td>
                                                <td>
                                                    Status
                                                    <p class="fw-bold text-success mt-1">88%</p>
                                                </td>
                                                <td>
                                                    DaadLine
                                                    <p class="fw-bold mt-1">10 June 2023</p>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-secondary rounded-0"><i
                                                            class="fas fa-pen"></i> edit</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="./assets/img/clients/client4.png" class="me-3"
                                                            width="100" alt="client4" />
                                                        <div>
                                                            <small>Company</small>
                                                            <p class="fw-bold small mt-1">Oppo Electronic</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    Sales
                                                    <p class="fw-bold mt-1">$3250</p>
                                                </td>
                                                <td>
                                                    Status
                                                    <p class="fw-bold text-success mt-1">88%</p>
                                                </td>
                                                <td>
                                                    DaadLine
                                                    <p class="fw-bold mt-1">10 June 2023</p>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-secondary rounded-0"><i
                                                            class="fas fa-pen"></i> edit</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end Analysis Area  -->

                    <!-- start Todo list  -->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">


                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title">Todo list</h6>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>

                                            <div class="dropdown-menu shadow">
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                                <a href="javascript:void(0);" class="dropdown-item">Something else
                                                    here</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mt-3">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Add list here...." />
                                        <button type="btn" class="btn btn-primary btn-sm form-group-text">Add to
                                            list</button>
                                    </div>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between">
                                            <label>
                                                <input type="checkbox" class="checkbox" /><span
                                                    class="text-muted ms-2">when an unknown printer took a gallery of
                                                    type</span>
                                            </label>
                                            <i class="fas fa-trash-alt"></i>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <label>
                                                <input type="checkbox" class="checkbox" /><span
                                                    class="text-muted ms-2">when an unknown printer took a gallery of
                                                    type</span>
                                            </label>
                                            <i class="fas fa-trash-alt"></i>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <label>
                                                <input type="checkbox" class="checkbox" /><span
                                                    class="text-muted ms-2">when an unknown printer took a gallery of
                                                    type</span>
                                            </label>
                                            <i class="fas fa-trash-alt"></i>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <label>
                                                <input type="checkbox" class="checkbox" /><span
                                                    class="text-muted ms-2">when an unknown printer took a gallery of
                                                    type</span>
                                            </label>
                                            <i class="fas fa-trash-alt"></i>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <label>
                                                <input type="checkbox" class="checkbox" /><span
                                                    class="text-muted ms-2">when an unknown printer took a gallery of
                                                    type</span>
                                            </label>
                                            <i class="fas fa-trash-alt"></i>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <label>
                                                <input type="checkbox" class="checkbox" /><span
                                                    class="text-muted ms-2">when an unknown printer took a gallery of
                                                    type</span>
                                            </label>
                                            <i class="fas fa-trash-alt"></i>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <label>
                                                <input type="checkbox" class="checkbox" /><span
                                                    class="text-muted ms-2">when an unknown printer took a gallery of
                                                    type</span>
                                            </label>
                                            <i class="fas fa-trash-alt"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="card-title text-primary m-0">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="./assets/img/etc/studentgroup.jpg" class="" width="150"
                                            alt="studentgroup" />
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                    </p>
                                    <a href="javascript:void(0);">Browse Illustrations on more</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end Todo list  -->



                </div>
            </div>

        </div> --}}


    </Section>
    <!-- End Content Area  -->
@endsection


@section('extra_css')
@endsection


@section('extra_js')
@endsection
