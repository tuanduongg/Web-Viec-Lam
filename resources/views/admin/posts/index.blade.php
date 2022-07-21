@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Posts</h3>
        </div>
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped dataTable dtr-inline" style="margin: auto;" aria-describedby="table_info"
                            id="posts-table">
                            <thead>

                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Company
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Job tittle
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">City
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Remote
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">parttime
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Salary
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Number Applicants
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Language
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Created At
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Edit
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Delete
                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Job tittle</th>
                                    <th>City</th>
                                    <th>Remote</th>
                                    <th>parttime</th>
                                    <th>Salary</th>
                                    <th>Number Applicants</th>
                                    <th>Language</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="table_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}

    <div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form-update" method="post">
                        @csrf
                        <input required type="hidden" name="id">
                        <div class="form-group">
                            <label for="job_tittle">Job Tittle</label>
                            <input required name="job_tittle" required type="text" class="form-control" />
                        </div>
                        <p>
                            <b>ID Company:</b>
                            <a href="" target="_blank" id="id-company">
                            </a>
                        </p>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input required name="city" required type="text" class="form-control" />
                        </div>
                        <div class="d-flex justify-content-md-between col-8 m-auto">
                            <div>

                                <b class="mr-4">Remote:</b>
                                <input required class="form-check-input" type="radio" id="yes" name="remote" value="1">
                                <label for="yes">Yes</label>
                                <input required type="radio" id="no" name="remote" value="0">
                                <label for="no">No</label>
                            </div>
                            <div>
                                <b class="mr-4">Part-Time:</b>
                                <input required type="radio" id="yes" name="parttime" value="1">
                                <label for="yes">Yes</label>
                                <input required type="radio" id="no" name="parttime" value="0">
                                <label for="no">No</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <select name="language" class="custom-select">
                                @foreach ($languages as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" cols="50" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input required name="salary" type="number" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="number_applicants">Number Applicants</label>
                            <input required name="number_applicants" type="number" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="" class="custom-select">
                                @foreach ($status as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
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
        $(document).ready(function() {

            $(function() {
                var exportColumns = [0, 1, 2, 3, 4, 5, 6, 7, 8,10];
                $('#posts-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    lengthChange: true,
                    dom: 'Bfrtip',
                    buttons: [
                        // "copy",
                        // "csv",
                        // "excel",
                        // "pdf",
                        // "print",
                        // "colvis",
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: exportColumns
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: exportColumns
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: exportColumns
                            }
                        },
                        {
                            extend: 'colvis',
                        },

                    ],
                    ajax: '{{ route('admin.posts.fetch') }}',
                    columns: [{
                            data: 'id',
                        },
                        {
                            data: 'user_id',
                        },
                        {
                            data: 'job_tittle',
                        },
                        {
                            data: 'city',
                        },
                        {
                            data: 'remote',
                        },
                        {
                            data: 'parttime',
                        },
                        {
                            data: 'salary',
                        },
                        {
                            data: 'number_applicants',
                        },
                        {
                            data: 'language',
                        },
                        {
                            data: 'status',
                        },
                        {
                            data: 'created_at',
                        },
                        {
                            data: 'edit',
                        },
                        {
                            data: 'delete',
                        },

                    ]
                });
            }); //datatable

            //show post
            $(document).on('click', '#btn-edit', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.' . $table . '.show', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "get",
                    url: url,
                    data: id,
                    dataType: "json",
                    success: function(response) {
                        $('input[name="job_tittle"]').val(response.job_tittle);
                        $('input[name="city"]').val(response.city);
                        $("input[name=remote][value=" + response.remote + "]").attr('checked',
                            'checked');
                        $("input[name=parttime][value=" + response.parttime + "]").attr(
                            'checked', 'checked');
                        $("select[name=language]").val(response.language);
                        $("select[name=status]").val(response.status);
                        $('input[name="salary"]').val(response.salary);
                        $('input[name="number_applicants"]').val(response.number_applicants);
                        $('input[name="status"]').val(response.status);
                        $('textarea[name="description"]').text(response.description);
                        $('input[name="id"]').val(id);
                        $('#id-company').text('#' + response.user_id);
                        $("#id-company").attr("href",
                            "http://webvieclam.test/admin/users?role=+&q=" + response
                            .user_id + "");
                        $("#id-company").attr("href", "{{ route('admin.users') }}?role=+&q=" +
                            response.user_id + "");
                        $('.modal-title').text('Edit Post #' + id);
                    }
                });
            });

            //btn delete
            $(document).on("click", '#btn-delete', function() {
                let isDelete = confirm('Are You Sure Delete?');
                if (isDelete == true) {
                    var id = $(this).data('id');
                    let url = "{{ route('admin.' . $table . '.destroy', ':id') }}";
                    url = url.replace(':id', id);
                    $.ajax({
                        type: "get",
                        url: url,
                        data: id,
                        dataType: "json",
                        success: function(response) {
                            createToast('Delete', 'Deleted Post#' + id, 'fas fa-check-circle',
                                'bg-success m-1');
                        },
                        error: function(response) {
                            createToast('Error', response, 'fas fa-exclamation-triangle','bg-danger m-1');
                        }
                    });
                    $('#posts-table').DataTable().ajax.reload();
                }
            });

            $(document).on("click", '#btn-update', function() {
                var id_update = $("input[name='id']").val();
                let url = "{{ route('admin.' . $table . '.update', ':id') }}";
                url = url.replace(':id', id_update);
                $.ajax({
                    type: "post",
                    url: url,
                    data: $("#form-update").serializeArray(),
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#modal-lg').modal('hide');
                        createToast('Update', 'Updated Post#' + id_update, 'fas fa-check-circle','bg-success m-1');
                        $('#posts-table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        console.log(response);
                        createToast('Error','Cannot update!', 'fas fa-exclamation-triangle','bg-danger m-1');
                    }
                });
            });

        }); //ready
    </script>
@endpush
