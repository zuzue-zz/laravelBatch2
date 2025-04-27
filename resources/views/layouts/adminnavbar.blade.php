<!-- start top side bar -->
<div class="col-lg-10 col-md-9 fixed-top ms-auto topnavbars">

    <div class="row">
        <div class="navbar navbar-expand navbar-light bg-white shadow">
            <!-- start quick search -->
            <form class="me-auto" action="" method="">
                <div class="input-group">
                    <input type="text" name="quicksearch" id="quicksearch" class="form-control border-0 shadow-none"
                        placeholder="Search somethings" />
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#quicksearchmodal"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- end quick search -->

            <!-- start notify & useraccount  -->
            <ul class="navbar-nav pe-5 me-5">
                <!-- notify  -->
                <li class="nav-item me-3 dropdowns">
                    <a href="javascript:void(0);" class="nav-link" onclick="dropbtn(event)">
                        <!-- if we use onclick and we want to use event , we must add event in panthesis()-->
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">5</span>
                    </a>

                    <div class="dropdown-contents p-2 mydropdowns">
                        <h6>Alert Center</h6>

                        <a href="javascript:void(0);" class="">
                            <div class="me-3">
                                <i class="fas fa-file"></i>

                            </div>
                            <div class="d-flex">
                                <p class="small text-muted">21 May 2024 </p>
                                <i>A new member created.</i>
                            </div>
                        </a>

                        <a href="javascript:void(0);" class="">
                            <div class="me-3">
                                <i class="fas fa-file"></i>

                            </div>
                            <div class="d-flex">
                                <p class="small text-muted">21 May 2024 </p>
                                <i>A new member created.</i>
                            </div>
                        </a>

                        <a href="javascript:void(0);" class="">
                            <div class="me-3">
                                <i class="fas fa-file"></i>

                            </div>
                            <div class="d-flex">
                                <p class="small text-muted">21 May 2024 </p>
                                <i>A new member created.</i>
                            </div>
                        </a>
                    </div>
                </li>
                <!-- notify  -->

                <!-- message  -->
                <li class="nav-item dropdowns mx-3">
                    <a href="javascript:void(0);" class="nav-link dropbtns" onclick="dropbtn(event)">
                        <i class="fas fa-envelope"></i>
                    </a>


                    <div class="dropdown-contents mydropdowns">
                        <h6>Message Center</h6>

                        <a href="javascript:void(0);" class="d-flex">
                            <div class="me-3">
                                <img src="./assets/img/users/user1.jpg" class="rounded-circle" width="30"
                                    alt="user1" />
                            </div>
                            <div>
                                <p class="small text-muted">Lorem Ipsum is simply dummy text of
                                    the printing and typesetting industry.</p>
                                <i>Ms.July - 25m ago</i>
                            </div>
                        </a>

                        <a href="javascript:void(0);" class="d-flex">
                            <div class="me-3">
                                <img src="./assets/img/users/user2.jpg" class="rounded-circle" width="30"
                                    alt="user2" />
                            </div>
                            <div>
                                <p class="small text-muted">Lorem Ipsum is simply dummy text of
                                    the printing and typesetting industry.</p>
                                <i>Mr.Anton - 40m ago</i>
                            </div>
                        </a>


                        <a href="javascript:void(0);" class="d-flex">
                            <div class="me-3">
                                <img src="./assets/img/users/user3.jpg" class="rounded-circle" width="30"
                                    alt="user3" />
                            </div>
                            <div>
                                <p class="small text-muted">Lorem Ipsum is simply dummy text of
                                    the printing and typesetting industry.</p>
                                <i>Ms.PaPa - 55m ago</i>
                            </div>
                        </a>

                        <a href="javascript:void(0);" class="small text-muted text-center">Read
                            More Message</a>


                    </div>
                </li>
                <!-- message  -->

                <!-- user account  -->
                <li id="dropdown" class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"
                        data-bs-target="#dropdown">
                        <span class="text-muted small me-2">Admin</span>
                        <img src="./assets/img/users/user1.jpg" class="rounded-circle" width="25" />
                    </a>
                    <div class="dropdown-menu">
                        <a href="javascript:void(0);" class="dropdown-item"><i
                                class="fas fa-user text-muted me-2"></i>profile</a>
                        <a href="javascript:void(0);" class="dropdown-item"><i
                                class="fas fa-user text-muted me-2"></i>Settings</a>
                        <a href="javascript:void(0);" class="dropdown-item"><i
                                class="fas fa-user text-muted me-2"></i>Activity Log</a>
                        <div class="dropdown-divider"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="javascript:void(0);" class="dropdown-item"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                <i class="fas fa-user text-muted me-2"></i>Logout</a>
                        </form>




                    </div>

                </li>
                <!-- user account  -->
            </ul>
            <!-- end notify & useraccount  -->

            <!-- start mobile close btn  -->
            <button type="button" class="close-btns " data-bs-toggle="collapse" data-bs-target="#nav">
                <i class="fas fa-times"></i>
            </button>
            <!-- end mobile close btn  -->
        </div>
    </div>

</div>
<!-- end top side bar -->
