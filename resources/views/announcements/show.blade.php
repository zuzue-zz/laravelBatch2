@extends('layouts.adminindex')
@section('content')
    <!-- Start Page Content Area -->
    <div class="container-fluid">

        <div class="col-md-12">
            <a href="{{ route('announcements.index') }}" id="btn-back" class="btn btn-secondary btn-sm rounded-0">Back</a>
            <a href="{{ route('announcements.index') }}" class="btn btn-secondary btn-sm rounded-0">Close</a>
        </div>

        <hr />

        <div class="col-md-12">
            <div class="row">

                <div class="col-md-4 col-lg-3 mb-2">
                    <h6>Info</h6>
                    <div class="card border-0 rounded-0 shadow">

                        <div class="card-body">

                            <div class="d-flex flex-column align-items-center mb-3">
                                <div class="h6 mb-1">{{ $announcement->title }}</div>
                            </div>

                            <div class="mb-3">

                                <div class="row g-0 mb-2">

                                    <div class="col-auto">
                                        <i class="fas fa-user"></i>
                                    </div>

                                    <div class="col ps-3">
                                        <div class="row">
                                            <div class="col">
                                                <h6>Tag</h6>
                                            </div>
                                            <div class="col-auto">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-8 col-lg-9">

                    <h6>Compose</h6>
                    <div class="card border-0 rounded-0 shadow mb-4">
                        <div class="card-body">
                            <div class="accordion">

                                <h1 class="acctitle">Email</h1>
                                <div class="acccontent">
                                    <div class="col-md-12 py-3">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 form-group mb-3">
                                                    <input type="email" name="cmpemail" id="cmpemail"
                                                        class="form-control form-control-sm border-0 rounded-0"
                                                        placeholder="To:" value="" readonly />
                                                </div>
                                                <div class="col-md-6 form-group mb-3">
                                                    <input type="text" name="cmpsubject" id="cmpsubject"
                                                        class="form-control form-control-sm border-0 rounded-0"
                                                        placeholder="Subject:" />
                                                </div>
                                                <div class="col-md-6 form-group mb-3">
                                                    <textarea name="cmpcontent" id="cmpsubject" class="form-control form-control-sm border-0 rounded-0" rows="3"
                                                        placeholder="Your Message Here"></textarea>
                                                </div>
                                                <div class="col d-flex justify-content-end align-items-end">
                                                    <button type="submit"
                                                        class="btn btn-secondary btn-sm rounded-0">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <h6>Class</h6>
                    <div class="card border-0 rounded-0 shadow mb-4">
                        <div class="card-body d-flex flex-wrap gap-3">

                        </div>
                    </div>


                    <h6>Additional Info</h6>
                    <div class="card border-0 rounded-0 shadow mb-4">
                        <ul class="nav">
                            <li class="nav-item">
                                <button type="button" id="autoclick" class="tablinks active"
                                    onclick="gettab(event, 'contenttab')">Content</button>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div id="contenttab" class="tab-pannel" style="display: block;">
                                {{-- translation the html codes in database becase we save data with sting  --}}
                                <p>{!! $announcement->content !!}</p>



                                @if (!empty($announcement->image))
                                    <a href="{{ asset($announcement->image) }}" data-lightbox="image"
                                        data-title="{{ $announcement->title }}">
                                        <img src="{{ asset($announcement->image) }}" alt="{{ $announcement->id }}"
                                            class="img-thumbnail" width="100" height="100" />
                                    </a>
                                @else
                                    <span>NO Files</span>
                                @endif
                            </div>



                            <div id="profile" class="tab-pannel" style="display: none;">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, vero fugit aliquid
                                    accusantium, impedit sunt debitis assumenda odit saepe atque aut minus, asperiores
                                    voluptatem ducimus accusamus consequuntur possimus non itaque.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-md-12">

        </div>

    </div>
    <!-- End Page Content Area -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/lightbox2-dev/dist/css/lightbox.min.css') }}" type="text/css" />

    <style type="text/css">
        /* Stat accordian  */
        .accordion {
            width: 100%;
        }

        .accordion .acctitle {
            background-color: #777;
            color: #fff;
            font-size: 14px;

            padding: 15px;
            margin: 0;

            cursor: pointer;

            user-select: none;

            transition: background-color .2s ease-in;

            position: relative;
        }

        .accordion .acctitle:hover {
            background-color: steelblue;
        }

        .accordion .acctitle.active {
            background-color: steelblue;
        }

        .accordion .acctitle::after {

            content: "\f067";
            font-family: "Font Awesome 5 Free";

            float: right;
        }


        .accordion .acctitle.active::after {
            content: "\f068";
        }


        .accordion .acccontent {
            height: 0;
            background-size: #f4f4f4;
            text-indent: 50px;
            text-align: justify;
            font-size: 14px;

            padding: 0 20px;

            overflow: hidden;
        }

        /* end accordian  */

        /* Stat tab  */
        .nav {
            background-color: #f1f1f1;
            display: flex;
            padding: 0;
            margin: 0;
        }

        .nav .nav-item {
            list-style-type: none;
        }

        .nav .tablinks {
            font-size: 17px;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: background-color 0.3s;
        }

        .nav .tablinks:hover {
            background-color: #f3f3f3;
        }

        .nav .tablinks.active {
            color: blue;
        }

        .tab-pannel {
            border: 1px solid #bbb;
            border-top: none;
            padding: 6px 12px;
        }

        /* end tab  */
    </style>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/libs/lightbox2-dev/dist/js/lightbox.min.js') }}"></script>

    <script type="text/javascript">
        // Start Accordion

        const getacctitles = document.getElementsByClassName('acctitle');
        const getactivecontents = document.querySelectorAll('.acccontent');


        for (var x = 0; x < getacctitles.length; x++) {
            // console.log(x); //0 to 3
            // console.log(getacctitles[x]);
            getacctitles[x].addEventListener('click', function(e) {

                //console.log('hay');
                // console.log(x); //4
                // console.log(getacctitles[x]); //undefined

                // console.log(e);
                // console.log(e.target); //current h1
                // console.log(this);

                // e.target.classList.toggle('active');
                this.classList.toggle('active'); //တိုက်ရိုက် element ပဲခေါ်ရ

                //  acctitle  acccontent
                const getcontent = this.nextElementSibling;
                // console.log(getcontent);
                // console.log(getcontent.scrollHeight+"px");
                // original height
                // getcontent.style.height = getcontent.scrollHeight+"px";

                // toggle style ရေး
                if (getcontent.style.height) {
                    //remove (0 ပေးလို့မရ 0 ပေးရင် ့ height ရှိတယ်လို့သတ်မှတ်ထားလို့)
                    getcontent.style.height = null; //beware can't set 0
                } else {
                    //add                                   array ပဲထွက်လာ/သူ့ height အတိုင်းရအောင်လို့ scrollheight သုံး px နဲ့ထွက်အောင်လို့  px သုံး
                    getcontent.style.height = getcontent.scrollHeight + "px";
                }

            });

            // active ပါတဲ့ဟာပဲအလုပ်လုပ်
            if (getacctitles[x].classList.contains('active')) {
                getactivecontents[x].style.height = getactivecontents[x].scrollHeight + "px";
            }
        }

        // End Accordion


        // Start Tab

        // Get UI elements
        let gettablinks = document.getElementsByClassName('tablinks');
        let gettabpanels = document.getElementsByClassName('tab-pannel');

        // Function to handle tab click
        function gettab(evn, link) {
            // Remove active class from all tab links
            Array.from(gettablinks).forEach(tablink => {
                tablink.classList.remove('active');
            });

            // Hide all tab panels
            Array.from(gettabpanels).forEach(tabpanel => {
                tabpanel.style.display = 'none';
            });

            // Add active class to the clicked tab link
            evn.currentTarget.classList.add('active');

            // Show the corresponding tab panel
            document.getElementById(link).style.display = 'block';
        }

        // Automatically click the first tab on page load
        document.getElementById('autoclick').click();

        // end tab

        lightbox.option({
            'resizeDuration': 100,
            'wrapAround': true
        })
    </script>
@endsection


{{--
mailtrap
mailgun
mailtrap.io
--}}
