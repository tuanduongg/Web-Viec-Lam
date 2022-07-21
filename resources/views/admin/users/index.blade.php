@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-6">
            <form id="form-filter">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label>Select Role</label>
                            <select class="custom-select" name="role">
                                <option value=" " selected>All</option>
                                @foreach ($arrRole as $key => $role)
                                    <option value="{{ $key }}" @if ((string) $selectedRole === (string) $key) selected @endif>
                                        {{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Search</label>
                            <input id="search-focus" name="q" value="{{ $search }}" type="search"
                                id="form1" class="form-control" placeholder="Search" />
                        </div>
                    </div>

                </div>
            </form>
            <div class="col-2">
                <a href="{{ route("admin.$table") }}" style="margin: 10px 0px ;  "
                    class="btn btn-block btn-outline-primary">Clear</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <div class="card-body table-responsive p-0">
                <table id="table-users" class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name_role }}</td>
                                <td>
                                    <button class="btn btn-success" type="button" id="btn-edit" data-toggle="modal"
                                        data-id="{{ $item->id }}" data-target="#modal-lg">Edit</button>
                                </td>
                                <td>
                                    <form action="{{ route("admin.$table.destroy", $item) }}" id="form-delete"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button id="btn-delete" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        {{ $users->links() }}
                    </ul>
                </nav>
            </div>
        </div>


    </div>
    {{-- modal --}}
    {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
        Open Modal
    </button> --}}
    <div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form-update" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" required type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" readonly required type="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input name="phone" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="address" type="text" class="form-control" />
                        </div>
                        <button type="button" id="btn-update" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- end-modal --}}
@endsection

@push('js')
    <script>
        //filter

        $(document).ready(function() {
            $('.custom-select').change(function() {
                $('#form-filter').submit();
            });

            //show user using ajax
            $(document).on("click", '#btn-edit', function() {
                let id = $(this).data('id');
                // let _token = $('#form-btn-edit > input[name="_token"]').val();
                let url = "{{ route('admin.' . $table . '.edit', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        id: id,
                        // _token: _token,
                    },
                    dataType: "json",
                    success: function(response) {
                        $('input[name="phone"]').show();
                        $('input[name="address"]').show();
                        $('label[for="phone"]').show();
                        $('label[for="address"]').show();
                        $('input[name="name"]').val(response.name);
                        $('input[name="email"]').val(response.email);
                        $('input[name="phone"]').val(response.phone);
                        $('input[name="address"]').val(response.address);
                        $('input[name="id"]').val(id);
                        $('.modal-title').text('Edit User #' + id);
                    }
                });
            });
            $(document).on("click", '#btn-update', function() {
                var id_update = $("input[name='id']").val();
                // let _token = $('#form-update > input[name="_token"]').val();
                // console.log(id_update);

                let url = "{{ route('admin.' . $table . '.update', ':id') }}";
                url = url.replace(':id', id_update);
                $.ajax({
                    type: "post",
                    url: url,
                    data: $("#form-update").serializeArray(),
                    dataType: "json",
                    success: function(response) {
                        if (response == 1) {

                            $('#modal-lg').modal('hide');
                            location.reload();
                            createToast('Update', 'Updated #' + id_update,
                                'fas fa-check-circle', 'bg-success m-1');

                        }
                    },
                    error: function(response) {
                        createToast('Error', response, 'fas fa-exclamation-triangle',
                            'bg-danger m-1');
                    }
                });
            });
            // function 

        }); //ready
    </script>
@endpush
