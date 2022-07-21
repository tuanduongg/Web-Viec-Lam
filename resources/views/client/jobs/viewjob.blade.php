@extends('client.master')
@section('main')
    <!-- Hero Area Start-->

    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div style="padding-top: 0px;" class="job-post-company pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('client/assets/img/icon/job-list1.png') }}"alt="img"></a>
                            </div>
                            <div class="job-tittle">
                                <a href="javascript:void(0)">
                                    <h6>{{ $post->job_tittle }}</h6>

                                </a>
                                <ul>
                                    <li><i class="fas fa-building"></i>{{ $post->company }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $post->city }}</li>
                                    <li>{{ $post->fomat_salary }} VNĐ</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Mô Tả Chi Tiết Công Việc</h4>
                            </div>
                            <p>{!! $post->description !!} </p>
                        </div>
                        {{-- <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                           <ul>
                               <li>System Software Development</li>
                               <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                               <li>Research and code , libraries, APIs and frameworks</li>
                               <li>Strong knowledge on software development life cycle</li>
                               <li>Strong problem solving and debugging skills</li>
                           </ul>
                        </div>
                        <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Education + Experience</h4>
                            </div>
                           <ul>
                               <li>3 or more years of professional design experience</li>
                               <li>Direct response email experience</li>
                               <li>Ecommerce website design experience</li>
                               <li>Familiarity with mobile and web apps preferred</li>
                               <li>Experience using Invision a plus</li>
                           </ul>
                        </div> --}}
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Tổng Quan Công Việc</h4>
                        </div>
                        <ul>
                            <li>Thời Gian Tạo : <span>{{ $post->fomat_created_at }}</span></li>
                            <li>Địa Điểm : <span>{{ $post->city }}</span></li>
                            <li>Số Lượng : <span>{{ $post->number_applicants }}</span></li>
                            <li>Hình Thức Làm Việc :
                                <ul class="unordered-list">
                                    <li>FullTime</li>
                                    @if ($post->remote != null)
                                        <li>Remote</li>
                                    @endif
                                    @if ($post->parttime != null)
                                        <li>Parttime</li>
                                    @endif
                                </ul>
                            </li>
                            <li>Lương : <span>{{ $post->fomat_salary }} VNĐ</span></li>
                        </ul>
                            
                        {{-- @if (auth()->user()->role != 1) --}}
                            <div class="apply-btn2">
                                <a href="javascript:void(0)" data-post_id="{{ $post->id }}" id="btn-apply-now"
                                    class="btn">Ứng Tuyển Ngay</a>
                            </div>
                        {{-- @endif --}}
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Thông Tin Công Ty</h4>
                        </div>
                        <span> {{ $post->company }}</span>
                        <p>Công Ty Xịn Xò Nhất Hành Tinh</p>
                        <ul>
                            <li>Tên: <span>{{ $post->company }} </span></li>
                            <li>SĐT : <span> {{ $post->phone }}</span></li>
                            <li>Email: <span><a style="color: black;"
                                        href="mailto: {{ $post->email }}">{{ $post->email }}</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast -->

    <!-- job post company End -->

    <!--Pagination End  -->
@endsection

@push('client.js')
    <script>
        document.title = 'IT-VL | ' + "{{ $post->job_tittle ?? '' }}";
        $(document).ready(function() {
            $(document).on('click', '#btn-apply-now', function(e) {
                let post_id = $(this).data('post_id');
                let user_id = {{ auth()->user()->id ?? -1}};
                if (user_id == -1) {
                    window.location.href = "{{route('auth.login')}}";
                }
                e.preventDefault();
                let url = "/user/job/applynow/" + post_id + "";
                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        user_id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response === 'Thành Công!') {
                            showAlert('Ứng Tuyển Thành Công',
                                'Vui Lòng Chờ Đợi Phải Hồi Từ Nhà Tuyển Dụng');
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        showAlertError('Lỗi', response.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endpush
