@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area -->
    <div class="container-fluid">
        <div class="col-md-12">
            <a href="#createmodal" class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal">Create</a>
        </div>

        <hr>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <a href="javascript:void(0);" id="bulkdelete-btn" class="btn btn-danger btn-sm rounded-0">Bulk
                        Delete</a>
                </div>

                <div class="col-md-6 mb-2">
                    {{-- <div class="row justify-content-end">
                        <div class="col-md-4 col-sm-8 mb-2">
                            <div class="input-group">
                                <input type="text" name="namefilter" id="namefilter"
                                    class="form-control form-control-sm rounded-0" placeholder="Search...." />
                                <a href="{{ route('contacts.index') }}" id="btn-clear"
                                    class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i></a>
                                <button type="submit" id="search-btn" class="btn btn-secondary btn-sm"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>

                    </div> --}}

                    <form action="{{ route('contacts.index') }}" method="GET">

                        <div class="row justify-content-end">

                            <div class="col-md-4 col-sm-8 mb-2">
                                <div class="form-group">
                                    <select name="genderfilter" id="genderfilter" class="form-select form-select-sm rounded-0">
                                        <option value="" selected disabled>Choose Gender</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}" {{ request('genderfilter') == $gender->id ? 'selected' : '' }}>
                                                {{ $gender->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-4 col-sm-8 mb-2">
                                <div class="input-group">
                                    <input type="text" name="namefilter" id="namefilter"
                                        class="form-control form-control-sm rounded-0" placeholder="Search...." />
                                    <a href="{{ route('contacts.index') }}" id="btn-clear"
                                        class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i></a>
                                    <button type="submit" id="search-btn" class="btn btn-secondary btn-sm"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <table id="mytable" class="table table-sm table-hover border">
                <thead>
                    <th>
                        <input type="checkbox" name="selectalls" id="selectalls" class="form-check-input selectalls" />
                    </th>

                    <th>No</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Relative</th>
                    <th>By</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach ($contacts as $idx => $contact)
                        <tr  id="delete_{{ $contact->id }}">
                            <td>
                                <input type="checkbox" name="singlechecks" class="form-check-input singlechecks"
                                    value="{{ $contact->id }}">
                            </td>
                            {{-- <td>{{ ++$idx }}</td> --}}
                            <td>{{ $idx + $contacts->firstItem() }}</td>
                            <td><a href="{{ route('contacts.show', $contact->id) }}">{{ $contact->firstname }}</a></td>
                            <td> {{ $contact->lastname }}</td>
                            <td>{{ $contact['gender']['name'] }}</td>
                            <td> {{ $contact->birthday }}</td>
                            <td>{{ $contact['relative']['name'] }}</td>
                            <td>{{ $contact->user['name'] }}</td>
                            <td>{{ $contact->created_at->format('d M Y') }}</td>
                            <td>{{ $contact->updated_at->format('d M Y') }}</td>
                            <td>
                                <a href="javascript:void(0);" class="editbtn" class="text-info" data-bs-toggle="modal"
                                    data-bs-target="#editmodal" data-id="{{ $contact->id }}"
                                    data-firstname="{{ $contact->firstname }}" data-lastname="{{ $contact->lastname }}"
                                    data-gender_id="{{ $contact->gender_id }}" data-birthday="{{ $contact->birthday }}"
                                    data-relative_id="{{ $contact->relative_id }}">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-danger ms-2 delete-btn"
                                    data-idx="{{ $idx }}"><i class="fas fa-trash-alt"></i>
                                </a>

                                <form id="formdelete-{{ $idx }}"
                                    action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{$contacts->links('pagination::bootstrap-5')}}

        </div>

    </div>

    <!-- End Content Area -->


    {{-- START MODAL AREA  --}}

    {{-- start create modal  --}}
    <div id="createmodal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">

                <div class="modal-header">
                    <h6 class="modal-title">Create Form</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-footer">
                    <form id="" action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 form-group mb-3">
                                <label for="firstname">First Name <span class="text-danger">*</span></label>
                                @error('firstname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="firstname" id="firstname"
                                    class="form-control form-control-sm rounded-0" placeholder="Enter First Name"
                                    value="{{ old('firstname') }}" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="lastname"
                                    class="form-control form-control-sm rounded-0" placeholder="Enter Last Name"
                                    value="{{ old('lastname') }}" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="gender_id">Gender</label>
                                @error('gender_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <select name="gender_id" id="gender_id" class="form-select form-select-sm rounded-0">
                                    <option value="">Select Gender</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}"
                                            {{ old('gender_id') == $gender->id ? 'selected' : '' }}>{{ $gender->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="birthday">Birthday</label>
                                @error('birthday')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="date" name="birthday" id="birthday"
                                    class="form-control form-control-sm rounded-0" value="{{ old('birthday') }}"
                                    placeholder="Enter DOB" />
                            </div>


                            <div class="col-md-6 form-group mb-3">
                                <label for="relative_id">Relative</label>
                                @error('relative_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <select name="relative_id" id="relative_id" class="form-select form-select-sm rounded-0">
                                    <option value="">Select Relative</option>
                                    @foreach ($relatives as $relative)
                                        <option value="{{ $relative->id }}"
                                            {{ old('relative_id') == $relative->id ? 'selected' : '' }}>
                                            {{ $relative->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 d-flex justify-content-end">
                                <a href="{{ route('contacts.index') }}"
                                    class="btn btn-secondary btn-sm rounded-0">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- end create modal  --}}

    {{-- start edit modal  --}}
    <div id="editmodal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">

                <div class="modal-header">
                    <h6 class="modal-title">Edit Form</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-footer">
                    <form id="editformaction" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 form-group mb-3">
                                <label for="editfirstname">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="editfirstname" id="editfirstname"
                                    class="form-control form-control-sm rounded-0" placeholder="Enter First Name"
                                    value="{{ old('firstname') }}" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="editlastname">Last Name</label>
                                <input type="text" name="editlastname" id="editlastname"
                                    class="form-control form-control-sm rounded-0" placeholder="Enter Last Name"
                                    value="{{ old('lastname') }}" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="editgender_id">Gender</label>
                                <select name="editgender_id" id="editgender_id"
                                    class="form-select form-select-sm rounded-0">
                                    <option value="">Select Gender</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}"
                                            {{ old('gender_id') == $gender->id ? 'selected' : '' }}>{{ $gender->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="editbirthday">Birthday</label>
                                <input type="date" name="editbirthday" id="editbirthday"
                                    class="form-control form-control-sm rounded-0" value="{{ old('birthday') }}"
                                    placeholder="Enter DOB" />
                            </div>


                            <div class="col-md-6 form-group mb-3">
                                <label for="editrelative_id">Relative</label>
                                <select name="editrelative_id" id="editrelative_id"
                                    class="form-select form-select-sm rounded-0">
                                    <option value="">Select Relative</option>
                                    @foreach ($relatives as $relative)
                                        <option value="{{ $relative->id }}"
                                            {{ old('relative_id') == $relative->id ? 'selected' : '' }}>
                                            {{ $relative->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 d-flex justify-content-end">
                                <a href="{{ route('contacts.index') }}"
                                    class="btn btn-secondary btn-sm rounded-0">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Update</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- end edit modal  --}}

    {{-- END MODAL AREA  --}}
@endsection



@section('styles')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            // Start Edit Form
            $(document).on('click', '.editbtn', function(e) {
                e.preventDefault();

                $('#editfirstname').val($(this).attr('data-firstname'));
                $('#editlastname').val($(this).attr('data-lastname'));
                $('#editgender_id').val($(this).attr('data-gender_id'));
                $('#editbirthday').val($(this).attr('data-birthday'));
                $('#editrelative_id').val($(this).attr('data-relative_id'));

                const getid = $(this).data('id');
                $("#editformaction").attr('action', `/contacts/${getid}`)

            });
            // End Edit Form


            //Start Single Delete
            $('.delete-btn').click(function() {

                const getidx = $(this).data('idx');
                //   console.log(getidx);
                if (confirm(`Are you sure ! you want to delete ${getidx}`)) {

                    $('#formdelete-' + getidx).submit();
                    return true;
                } else {
                    return false;
                }
            });
            // End Single Delete


           // Start Bulk Delete

           $('#bulkdelete-btn').hide();

            $('#selectalls').click(function() {
                $('.singlechecks').prop('checked', $(this).prop('checked'));
                togglebulkdeletebtn();
            });

            $(document).on('change', '.singlechecks', function() {
                togglebulkdeletebtn();
            });

            function togglebulkdeletebtn() {
                let selectedcount = $('.singlechecks:checked').length;
                if (selectedcount > 0) {
                    $('#bulkdelete-btn').show();
                } else {
                    $('#bulkdelete-btn').hide();
                }
            }


            $('#bulkdelete-btn').click(function() {

                let getselectedids = [];

                $('input:checkbox[name="singlechecks"]:checked').each(function() {
                    getselectedids.push($(this).val());
                });

                console.log(getselectedids);

                $.ajax({
                    url: '{{ route('contacts.bulkdeletes') }}',
                    type: "DELETE",
                    datatype: 'json',
                    data: {
                        selectedids: getselectedids,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        console.log(response);
                        // if (response.status == 'success') {
                        //     location.reload();
                        // }

                        if (response) {
                            // ui remove
                            $.each(getselectedids, function(key, value) {
                                $(`#delete_${value}`).remove();
                            });
                        }
                    },
                    error: function(response) {
                        console.log("Error : ", response);
                    }
                });
            });

            // End Bulk Delete

        });
    </script>
@endsection
