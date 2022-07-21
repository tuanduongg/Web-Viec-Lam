@extends('client.master')
@section('main')
    <div class="col-10" style="margin: auto;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header " style="background-color: #1f2b7b;">
                        <h4 style="color: white;">Quản Lý Bài Đăng Của Bạn</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('posts.create') }}" target="_blank"
                            class="genric-btn primary-border radius mb-10">
                            <i class="fas fa-plus">Thêm</i>
                        </a>
                        <table class="table">
                            <thead class="thead-dark">
                                {{-- style="background-color: #1f2b7b; color: white;" --}}
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tiêu Đề</th>
                                    <th scope="col">Thời Gian Tạo</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Số Người Ứng Tuyển</th>
                                    <th scope="col" colspan="3">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($posts as $key => $post)
                                
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <th scope="row">#{{ $post->id }}</th>
                                        <td><a style="color: black;" target="_blank"
                                                href="{{ route('client.viewjob', $post) }}">{{ $post->job_tittle }}</a>
                                        </td>
                                        <td>{{ $post->fomat_created_at }}</td>

                                        <td>
                                            @if ($post->status == 2)
                                                <p><i class="fas fa-exclamation-circle"></i> Chờ Admin Duyệt</p>
                                            @else
                                                <form action="" id="form-update-status" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group" style="width: 50%;">
                                                        <select data-id="{{ $post->id }}" name="status"
                                                            class="form-select">
                                                            <option value="1"
                                                                @if ($post->status == 1) selected @endif>On
                                                            </option>
                                                            <option value="0"
                                                                @if ($post->status == 0) selected @endif>Off
                                                            </option>
                                                        </select>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            @if (array_key_exists($post->id, $numberUser))
                                                {{ $numberUser[$post->id] }}
                                                @if ($numberUser[$post->id] != 0)
                                                    <button style="line-height: 35px;" id="btn-info-post"
                                                        data-id="{{ $post->id }}"
                                                        data-tittle="{{ $post->job_tittle }}"
                                                        class="genric-btn success-border radius" data-toggle="modal"
                                                        data-target="#modal-default">Xem</i></button>
                                                @endif
                                            @else
                                                0
                                            @endif

                                        </td>

                                        <td colspan="2">
                                            <span>
                                                <a style="line-height: 35px; " target="_blank"
                                                    href="{{ route('posts.edit', $post) }}"
                                                    class="genric-btn primary-border radius"><i
                                                        class="fas fa-edit">Sửa</i></a>
                                            </span>
                                            <button style="line-height: 35px;" id="btn-delete-post"
                                                data-id="{{ $post->id }}" class="genric-btn danger-border radius"><i
                                                    class="fas fa-trash">Xoá</i></button>
                                            <form action="{{ route('posts.destroy', $post) }}" method="post"
                                                id="form-delete-post">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="pagination-area text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="single-wrap d-flex justify-content-center">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-start">
                                                    {{ $posts->onEachSide(0)->links() }}
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('client.js')
    <script>
        @if (session()->has('success'))
            showAlertError("{{ session()->get('success') }}", '');
        @endif
        $("[name='change-status']").bootstrapSwitch();
        $(document).ready(function() {

            //btn delete post
            $(document).on('click', '#btn-delete-post', function(e) {
                e.preventDefault();
                if (confirm("Bạn Chắc Chắn Muốn Xoá ?") == true) {
                    $("#form-delete-post").submit();
                    setTimeout(() => {
                        showAlert('Xoá Thành Công', '');
                    }, 5000);
                }
            });
            // let confirm = confirm('');

            // btn-show-post 
            $(document).on('click', '#btn-info-post', function(e) {
                e.preventDefault();
                let post_id = $(this).data('id');
                let tittle = $(this).data('tittle');
                $(".modal-title").text(tittle);
                $(".modal-title").css('font-size', '20px');
                $("#btn-edit").hide();
                $("#btn-update").hide();
                $(".content-profile").hide();
                $("#modal-job-items").show();
                $("#modal-job-items").html('');
                $.ajax({
                    type: "get",
                    url: "user-posts/" + post_id + "",
                    dataType: "json",
                    success: function(response) {
                        response.data.forEach(item => {
                            let strStatus =
                                `<li style="margin-right:30px;"><button data-post_id=` +
                                post_id + ` data-user_id=` + item.user_id + ` class="genric-btn primary-border" style="line-height: 20px;" id="btn-accept-user">Duyệt</button></li>
                                            <li style="margin-right:30px;"><button data-post_id=` + post_id +
                                ` data-user_id=` + item.user_id +
                                ` class="genric-btn danger-border" style="line-height: 20px;" id="btn-cancel-user">Huỷ</button></li>`;
                            if (item.status == 2) {
                                strStatus =
                                    `<li><i class="fas fa-user"></i>Đã duyệt</li>`;
                            } else if (item.status == 0) {
                                strStatus =
                                `<li><i class="fas fa-user"></i>Đã huỷ</li>`;
                            }
                            let result = `
                            <div class="single-job-items w-100" id="modal-job-items" style="border-bottom: 1px solid #333; padding: 10px 0px;">
                                <div class="job-items"  >
                                    <div class="job-tittle pt-0">
                                        <a href="#" target = blank>
                                            <h6>` + item.name + `</h6>
                                        </a>
                                        <ul>
                                            <li style="margin-right:30px;"><i class="fas fa-clock"></i>` +
                                getFormattedDate(item.created_at) + `</li>
                                            <li style="margin-right:30px;"><i class="fas fa-envelope"></i>` + item
                                .email + `</li>
                                            ` + strStatus + `
                                        </ul>
                                    </div>
                                </div>
                            </div> `;
                            $("#modal-job-items").append(result);
                        });
                    }
                });

            });

            //btn-apply-user side hr
            $(document).on('click', '#btn-accept-user', function() {
                let user_id = $(this).data('user_id');
                let post_id = $(this).data('post_id');
                let url = "user-posts/accept/" + user_id + "";
                let parent = $(this).parents('ul');
                let type = 2;

                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        post_id,
                        type
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        $('button[data-user_id=' + user_id + ']').parent().remove();
                        parent.append(`<li><i class="fas fa-user"></i>Đã duyệt</li>`);
                    },
                    error: function(response) {
                        console.log("error:" + response);
                    }
                });

            });
            //btn-cancel-user side hr
            $(document).on('click', '#btn-cancel-user', function() {
                if (confirm('Bạn Chắc Chắn Muốn Huỷ?') == true) {

                    let user_id = $(this).data('user_id');
                    let post_id = $(this).data('post_id');
                    let url = "user-posts/cancel/" + user_id + "";
                    let parent = $(this).parents('ul');
                    let type = 0;

                    $.ajax({
                        type: "get",
                        url: url,
                        data: {
                            post_id,
                            type
                        },
                        dataType: "json",
                        success: function(response) {
                            $('button[data-user_id=' + user_id + ']').parent().remove();
                            parent.append(`<li><i class="fas fa-user"></i>Đã huỷ</li>`);
                        },
                        error: function(response) {
                            console.log("error:" + response);
                        }
                    });
                }

            });

            //change status
            $(document).on('change', "select[name='status']", function() {
                let id = $(this).data('id');
                let status = $(this).val();
                let _token = $("input[name='_token']").val();
                let _method = $("input[name='_method']").val();
                let url = '{{ route('posts.update', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: "post",
                    url: url,
                    data: {
                        status,
                        _method,
                        _token
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(status + "-");
                        console.log(response);
                        showAlert('Đã Cập Nhật Trạng Thái Bài Đăng', '');
                    },
                    error: function(response) {
                        console.log("error:" + response);
                    }
                });
            });

        });
    </script>
@endpush
