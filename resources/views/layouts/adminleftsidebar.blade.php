<!-- Start Left Sidebar  -->
<div class="wrappers">
    <nav class="navbar navbar-expand-md navbar-light">
        <button type="button" class="navbar-toggler ms-auto mb-2" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="">
            <div class="container-fluid">
                <div class="row">

                    <!-- start left side bar -->
                    <div class="col-lg-2 col-md-3 fixed-top vh-100 overflow-auto leftsidebars">
                        <ul class="navbar-nav flex-column mt-4">

                            <li class="nav-item nav-categories">Main</li>

                            <li class="nav-item"><a href="javascript:void(0);"
                                    class="nav-link p-3 mb-2 sidebarlinks currents "><i class="fas fa-file me-3"></i>
                                    Dashboard</a></li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"
                                    data-bs-toggle="collapse" data-bs-target="#download"><i
                                        class="fas fa-download me-3"></i> Download <i
                                        class="fas fa-angle-left mores"></i></a>
                                <ul id="download" class="collapse">
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Education</a></li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Software</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"
                                    data-bs-toggle="collapse" data-bs-target="#form"><i
                                        class="fas fa-download me-3"></i> Form <i
                                        class="fas fa-angle-left mores"></i></a>
                                <ul id="form" class="collapse">
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Att Form</a></li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Leave Form</a></li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Enrolls</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"><i
                                        class="fas fa-file me-3"></i>
                                    Widgets</a></li>

                            <li class="nav-item nav-categories">UI Features</li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"
                                    data-bs-toggle="collapse" data-bs-target="#article"><i
                                        class="fas fa-newspaper me-3"></i> Articles <i
                                        class="fas fa-angle-left mores"></i></a>
                                <ul id="article" class="collapse">
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Post</a></li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Announcement</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"><i
                                        class="fas fa-file me-3"></i>
                                    Popups</a></li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"
                                    data-bs-toggle="collapse" data-bs-target="#students"><i
                                        class="fas fa-users me-3"></i> Students <i
                                        class="fas fa-angle-left mores"></i></a>
                                <ul id="students" class="collapse">
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>All Generators</a>
                                    </li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>All Students</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"
                                    data-bs-toggle="collapse" data-bs-target="#apps"><i
                                        class="fab fa-app-store-ios me-3"></i> Apps <i
                                        class="fas fa-angle-left mores"></i></a>
                                <ul id="apps" class="collapse">
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Contacts</a></li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Todo</a></li>
                                </ul>
                            </li>

                            <li class="nav-item nav-categories">Data Representation</li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"
                                    data-bs-toggle="collapse" data-bs-target="#analysis"><i
                                        class="fas fa-download me-3"></i> Fixed
                                    Analysis
                                    <i class="fas fa-angle-left mores"></i></a>
                                <ul id="analysis" class="collapse">
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Country</a></li>
                                    <li class="list-unstyled"><a href="{{ route('days.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Days</a></li>
                                    <li class="list-unstyled"><a href="{{ route('categories.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Categories</a></li>
                                    <li class="list-unstyled"><a href="{{ route('genders.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Gender</a></li>
                                    <li class="list-unstyled"><a href="{{ route('paymenttypes.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Payment Types</a></li>
                                    <li class="list-unstyled"><a href="{{ route('stages.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Stages</a></li>
                                    <li class="list-unstyled"><a href="{{ route('statuses.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Status</a></li>
                                    <li class="list-unstyled"><a href="{{ route('tags.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Tags</a></li>
                                    <li class="list-unstyled"><a href="{{ route('types.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Types</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"
                                    data-bs-toggle="collapse" data-bs-target="#addon"><i
                                        class="fas fa-download me-3"></i> Addon <i
                                        class="fas fa-angle-left mores"></i></a>
                                <ul id="addon" class="collapse">
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>City</a></li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Payment Method</a>
                                    </li>
                                    <li class="list-unstyled"><a href="{{ route('religions.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Religions</a>
                                    </li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Relative</a></li>
                                    <li class="list-unstyled"><a href="{{ route('roles.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Roles</a></li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Social App</a></li>
                                    <li class="list-unstyled"><a href="{{ route('warehouses.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Warehouse</a></li>
                                    <li class="list-unstyled"><a href="{{ route('statuses.index') }}"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Status</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 mb-2 sidebarlinks"
                                    data-bs-toggle="collapse" data-bs-target="#map"><i class="fas fa-map me-3"></i>
                                    map <i class="fas fa-angle-left mores"></i></a>
                                <ul id="map" class="collapse">
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Google Map</a></li>
                                    <li class="list-unstyled"><a href="javascript:void(0);"
                                            class="nav-link sidebarlinks"><i
                                                class="fas fa-long-arrow-alt-right me-4"></i>Vector Map</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                    <!-- end left side bar -->


                    <!-- start top side bar -->
                    @include('layouts.adminnavbar')
                    <!-- end top side bar -->

                </div>
            </div>
        </div>
    </nav>
</div>
<!-- End Left Sidebar  -->
