@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">

            <form action="{{ route('announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
                {{-- {{ csrf_field() }} --}}
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-4">
                        <div class="row">

                            <div class="col-md-12 form-group mb-3">
                                <label for="image" class="gallery">

                                    @if (!empty($annnouncement->image))
                                        <img src="{{ asset($annnouncement->image) }}" alt="{{ $annnouncement->id }}"
                                            class="img-thumbnail" width="100px" height="100px">
                                    @endif

                                </label>

                                <input type="file" name="image" id="image"
                                    class="form-control form-control-sm rounded-0" multiple hidden />
                            </div>





                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row">

                            <div class="col-md-12 form-group mb-3">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title"
                                    class="form-control form-control-sm rounded-0" placeholder="Enter announcement Title"
                                    value="{{ old('title', $announcement->title) }}" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="post_id">Class <span class="text-danger">*</span></label>
                                <select name="post_id" id="post_id" class="form-control form-control-sm rounded-0"
                                    multiple>
                                    @foreach ($posts as $id => $title)
                                        {{-- Coalescing Operator --}}
                                        {{-- in_array($id,json_decode($announcement->post_id,true)) ? 'selected' : ''  --}}
                                        {{-- true ?? false  --}}
                                        {{-- json_decode($announcement->post_id,true) --}}
                                        {{-- array ?? [] --}}
                                        {{-- json_decode($announcement->post_id,true) ?? [] --}}
                                        {{-- in_array($id, json_decode($announcement->post_id, true)) ?? [] --}}
                                        {{-- <option
                                            value="{{ $id }}"{{ in_array($id, json_decode($announcement->post_id, true) ?? []) ? 'selected' : '' }}>
                                            {{ $title }}</option> --}}

                                        <option value="{{ $id }}"
                                            {{ in_array($id, is_array(old('post_id', $announcement->post_id)) ? old('post_id', $announcement->post_id) : [old('post_id', $announcement->post_id)]) ? 'selected' : '' }}>
                                            {{ $title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="col-md-12 form-group mb-3">
                                <label for="content">Content <span class="text-danger">*</span></label>
                                <textarea name="content" id="content" class="form-control form-control-sm rounded-0" rows="5"
                                    placeholder="Say Something...">{{ old('title', $announcement->content) }}</textarea>
                            </div>

                            <div class="col-md-12 d-flex justify-content-end">
                                <a href="{{ route('announcements.index') }}"
                                    class="btn btn-secondary btn-sm rounded-0">Cancel</a>
                                {{-- <button type="reset" class="btn btn-secondary btn-sm rounded-0">Cancel</button> --}}
                                <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>
                            </div>

                        </div>
                    </div>

                </div>



            </form>



        </div>

    </div>
    <!-- End Content Area  -->
@endsection

@section('css')
    <link href="{{ asset('assets/libs/select2-develop/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/libs/summernote-0.8.18-dist/summernote-lite.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" />

    <style type="text/css">
        .gallery {
            width: 100%;
            background-color: #eee;
            color: #aaa;

            text-align: center;
            padding: 10px;
        }

        .gallery.removetext span {
            display: none;

        }

        .gallery img {
            width: 100px;
            height: 100px;
            border: 2px dashed #aaa;
            border-radius: 10px;
            object-fit: cover;

            padding: 5px;
            margin: 0 5px;

        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/select2-develop/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/summernote-0.8.18-dist/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // Start Multi Profile Review
            let previewimages = function(input, output) {
                // console.log(input,output);
                if (input.files) {
                    let totalfiles = input.files.length;
                    // console.log(totalfiles);
                    if (totalfiles > 0) {
                        $(output).addClass("removetext");
                    } else {
                        $(output).removeClass("removetext");
                    }
                    for (let x = 0; x < totalfiles; x++) {
                        // connsole.log(x);

                        let filereader = new FileReader();
                        filereader.readAsDataURL(input.files[x]);
                        {
                            filereader.onload = function(e) {
                                // $(output).html("");
                                // image tag create (parseHTMl("<img>"))

                                $($.parseHTML("<img>")).attr("src", e.target.result).appendTo(output);
                            }

                        }

                    }
                }

            }
            $("#image").change(function() {
                previewimages(this, "label.gallery");

            });

            // End Multi Profile Review

            $('#tag').select2({
                placeholder: 'Choose authorize person',
            });

            $('#post_id').select2({
                placeholder: 'Choose Class',
            });


            $('#content').summernote({
                placeholder: 'Say Something...',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                ]
            });

            // $('#startdate', '#enddate').flatpickr({
            //     dateFormat: "Y-m-d",
            //     minDate: "today",
            // });

            jQuery('#startdate').flatpickr({
                dateFormat: "Y-m-d",
                minDate: "today",
                maxDate: new Date().fp_incr(30)
            });

            jQuery('#enddate').flatpickr({
                dateFormat: "Y-m-d",
                minDate: "today",
                maxDate: new Date().fp_incr(30)
            });

        });
        //Bulk Delete
    </script>
@endsection
