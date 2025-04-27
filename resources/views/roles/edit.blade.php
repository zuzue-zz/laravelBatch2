@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">

            <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                {{-- {{ csrf_field() }} --}}
                @csrf
                @method('PUT')


                <div class="row align-items-end">

                    <div class="col-md-3 form-group">


                        <label for="image" class="gallery">
                            @if ($role->image)
                                <img src="{{ asset($role->image) }}" alt="{{ $role->slug }}" class="img-thumbnail"
                                    width="100px" height="100px">
                            @else
                                <span>Choose Images</span>
                            @endif
                        </label>

                        <input type="file" name="image" id="image" class="form-control form-control-sm rounded-0"
                            hidden />
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0"
                            placeholder="Enter Role Name" value="{{ old('name', $role->name) }}" />
                    </div>
                    {{-- value="{{ $role->name }}" or  --}}

                    <div class="col-md-3 form-group">
                        <label for="status_id">Status <span class="text-danger">*</span></label>
                        <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if ($status['id'] === $role['status_id']) selected @endif>
                                    {{ $status['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm rounded-0">Cancel</a>
                        {{-- <button type="reset" class="btn btn-secondary btn-sm rounded-0">Cancel</button> --}}
                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>

                    </div>

                </div>
            </form>



        </div>

    </div>
    <!-- End Content Area  -->
@endsection

@section('css')
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
    <script type="text/javascript">
        $(document).ready(function() {

            // Start Single Profile Review
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
                                $(output).html("");
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

            // End Single Profile Review

        });
        //Bulk Delete
    </script>
@endsection
