@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12">
            <a href="{{ route('leaves.create') }}" class="btn btn-primary btn-sm rounded-0 mb-2">Create New</a>
        </div>

        <hr />

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <a href="javascript:void(0);" id="bulkdelete-btn" class="btn btn-danger btn-sm rounded-0">Bulk
                        Delete</a>
                </div>

                <div class="col-md-6">
                    <form action="{{ route('leaves.index') }}" method="GET">

                        <div class="row justify-content-end">

                            <div class="col-md-4 col-sm-8 mb-2">
                                <div class="form-group">
                                    <select name="stagefilter" id="stagefilter" class="form-select form-select-sm rounded-0">
                                        <option value="" selected disabled>Choose Stage</option>
                                        @foreach ($stages as $stage)
                                            <option value="{{ $stage->id }}" {{ request('stagefilter') == $stage->id ? 'selected' : '' }}>
                                                {{ $stage->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="col-md-4 col-sm-8 mb-2">
                                <div class="input-group">
                                    <input type="text" name="namefilter" id="namefilter"
                                        class="form-control form-control-sm rounded-0" placeholder="Search...." />
                                    <a href="{{ route('leaves.index') }}" id="btn-clear"
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
                        <input type="checkbox" name="selectalls" id="selectalls" class="form-check-input" />
                    </th>
                    <th>No</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>By</th>
                    <th>Created At</th>
                    <th>updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($leaves as $idx => $leave)
                        <tr id="delete_{{ $leave->id }}">
                            <td>
                                <input type="checkbox" name="singlechecks" class="form-check-input singlechecks"
                                    value="{{ $leave->id }}" />
                            </td>
                            {{-- <td>{{ ++$idx }}</td> --}}
                            <td>{{ $idx + $leaves->firstItem() }}</td>
                            {{-- <td>
                                <img src="{{ asset($leave->image) }}" class="rounded-circle me-2" width="20"
                                    height="20" /><a
                                    href="{{ route('leaves.show', $leave->id) }}">{{ $leave->name }}</a>
                            </td> --}}
                            <td><a href="{{ route('leaves.show', $leave->id) }}">{{ Str::limit($leave->title, 25) }}</a>
                            </td>
                            <td>
                                @php
                                    $tagids = json_decode($leave->tag, true); // ['1','2']
                                    $tagnames = collect($tagids)->map(function ($id) use ($users) {
                                        return $users[$id] ?? 'Unknown';
                                    });
                                @endphp

                                {{ $tagnames->join(',') }}
                            </td>
                            <td>{{ $leave->startdate }}</td>
                            <td>{{ $leave->enddate }}</td>
                            <td>{{ $leave->stage['name'] }}</td>
                            <td>{{ $leave['user']['name'] }}</td>
                            <td>{{ $leave->created_at->format('d M Y') }}</td>
                            <td>{{ $leave->updated_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('leaves.edit', $leave->id) }}" class="text-info"><i
                                        class="fas fa-pen"></i></a>
                                <a href="javascript:void(0);" class="text-danger ms-2 delete-btn"
                                    data-idx="{{ $idx }}"><i class="fas fa-trash-alt"></i></a>

                                <form id="formdelete-{{ $idx }}"
                                    action="{{ route('leaves.destroy', $leave->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            {{ $leaves->links('pagination::bootstrap-5') }}

        </div>


    </div>
    <!-- End Content Area  -->
@endsection

@section('css')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            //Single Delete
            $('.delete-btn').click(function() {

                const getidx = $(this).data('idx');
                //   console.log(getidx);
                if (confirm(`Are you sure ! you want to delete ${getidx}`)) {

                    $('#formdelete-' + getidx).submit();
                    return true;
                } else {
                    return false;
                }


            })

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
                    url: '{{ route("leaves.bulkdeletes") }}',
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
        //Bulk Delete
    </script>
@endsection
