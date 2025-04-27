@extends('layouts.adminindex')
@section('content')
    <!-- Start Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm rounded-0 mb-2">Create New</a>
        </div>

        <hr />

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <a href="javascript:void(0);" id="bulkdelete-btn" class="btn btn-danger btn-sm rounded-0">Bulk
                        Delete</a>
                </div>

                <div class="col-md-6">
                    <form action="{{ route('paymenttypes.index') }}" method="GET">

                        <div class="row justify-content-end">

                            <div class="col-md-4 col-sm-8 mb-2">
                                <div class="form-group">
                                    <select name="postfilter" id="postfilter" class="form-select form-select-sm rounded-0">
                                        <option value="" selected disabled>Choose Post</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}" {{ request('postfilter') == $post->id ? 'selected' : '' }}>
                                                {{ $post->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-8 mb-2">
                                <div class="input-group">
                                    <input type="text" name="namefilter" id="namefilter"
                                        class="form-control form-control-sm rounded-0" placeholder="Search...." />
                                    <a href="{{ route('paymenttypes.index') }}" id="btn-clear"
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
                    <th>Name</th>
                    <th>Status</th>
                    <th>By</th>
                    <th>Created At</th>
                    <th>updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($posts as $idx => $post)
                        <tr id="delete_{{ $post->id }}">
                            <td>
                                <input type="checkbox" name="singlechecks" class="form-check-input singlechecks"
                                    value="{{ $post->id }}" />
                            </td>
                            {{-- <td>{{ ++$idx }}</td> --}}
                            <td>{{ $idx + $posts->firstItem() }}</td>

                            {{-- <td>
                                <img src="{{ asset($post->image) }}" class="rounded-circle me-2" width="20"
                                    height="20" /><a
                                    href="{{ route('posts.show', $post->id) }}">{{ $post->name }}</a>
                            </td> --}}
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->status['name'] }}</td>
                            {{-- <td>{{$post->user['name']}}</td> --}}
                            <td>{{ $post['user']['name'] }}</td>
                            <td>{{ $post->created_at->format('d M Y') }}</td>
                            <td>{{ $post->updated_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" class="text-info"><i
                                        class="fas fa-pen"></i></a>
                                <a href="javascript:void(0);" class="text-danger ms-2 delete-btn"
                                    data-idx="{{ $idx }}"><i class="fas fa-trash-alt"></i></a>

                                <form id="formdelete-{{ $idx }}" action="{{ route('posts.destroy', $post->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            {{ $posts->links('pagination::bootstrap-5') }}

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
                    url: '{{ route("posts.bulkdeletes") }}',
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
