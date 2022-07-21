@extends('client.master')

@section('main')
    <!-- slider Area Start-->

    <!-- slider Area End-->
    @include('client.slider')
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Danh Mục</span>
                        <h2>Top Ngôn Ngữ Tuyển Dụng</h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <a href="{{ route('client.jobs') }}?language={{ $arrLanguage[0]->language }}">
                                <span class="flaticon-tour"></span>
                            </a>
                        </div>
                        <div class="services-cap">
                            <h5>{{ $arrLanguage[0]->language }}</h5>
                            <span>({{ $arrLanguage[0]->total_id }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <a href="{{ route('client.jobs') }}?language={{ $arrLanguage[1]->language }}">
                                <span class="flaticon-cms"></span>
                            </a>
                        </div>
                        <div class="services-cap">
                            <h5>{{ $arrLanguage[1]->language }}</h5>
                            <span>({{ $arrLanguage[1]->total_id }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <a href="{{ route('client.jobs') }}?language={{ $arrLanguage[2]->language }}">
                                <span class="flaticon-report"></span>
                            </a>
                        </div>
                        <div class="services-cap">
                            <h5>{{ $arrLanguage[2]->language }}</h5>
                            <span>({{ $arrLanguage[2]->total_id }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <a href="{{ route('client.jobs') }}?language={{ $arrLanguage[3]->language }}">
                                <span class="flaticon-app"></span>
                            </a>
                        </div>
                        <div class="services-cap">
                            <h5>{{ $arrLanguage[3]->language }}</h5>
                            <span>({{ $arrLanguage[3]->total_id }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <a href="{{ route('client.jobs') }}?language={{ $arrLanguage[4]->language }}">
                                <span class="flaticon-helmet"></span>
                            </a>
                        </div>
                        <div class="services-cap">
                            <h5>{{ $arrLanguage[4]->language }}</h5>
                            <span>({{ $arrLanguage[4]->total_id }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <a href="{{ route('client.jobs') }}?language={{ $arrLanguage[5]->language }}">
                                <span class="flaticon-high-tech"></span>
                            </a>
                        </div>
                        <div class="services-cap">
                            <h5>{{ $arrLanguage[5]->language }}</h5>
                            <span>({{ $arrLanguage[5]->total_id }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <a href="{{ route('client.jobs') }}?language={{ $arrLanguage[6]->language }}">
                                <span class="flaticon-real-estate"></span>
                            </a>
                        </div>
                        <div class="services-cap">
                            <h5>{{ $arrLanguage[6]->language }}</h5>
                            <span>({{ $arrLanguage[6]->total_id }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <a href="{{ route('client.jobs') }}?language={{ $arrLanguage[7]->language }}">
                                <span class="flaticon-content"></span>
                            </a>
                        </div>
                        <div class="services-cap">
                            <h5>{{ $arrLanguage[7]->language }}</h5>
                            <span>({{ $arrLanguage[7]->total_id }})</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- More Btn -->
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="{{ route('client.jobs') }}" class="border-btn2">Xem Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->
    <!-- Online CV Area Start -->
    <div class="online-cv cv-bg section-overly pt-90 pb-120"
        data-background="{{ asset('client/assets/img/gallery/cv_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="cv-caption text-center">
                        <p class="pera2">Đăng Ký Tuyển Dụng</p>
                        <a href="{{ route('auth.registerhr') }}" class="border-btn2 border-btn4">Đăng Ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Online CV Area End-->
    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Bài Đăng</span>
                        <h2>Bài Đăng Nổi Bật</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    @foreach ($arrPost as $post)
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="{{ route('client.viewjob', $post) }}"><img src="{{ asset('client/assets/img/icon/job-list1.png') }}"alt="img"></a>
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="{{ route('client.viewjob', $post) }}">
                                        <h6>{{ $post->job_tittle }}</h6>
                                    </a>
                                    <ul>
                                        <li><i class="fas fa-building"></i>{{ $post->company }}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $post->city }}</li>
                                        <li><i class="fas fa-dollar-sign"></i>{{ $post->fomat_salary }} VNĐ</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link items-link2 f-right">
                                <a href="{{ route('client.viewjob', $post) }}">Xem Chi Tiết</a>
                                <span><i class="fas fa-clock"></i>&nbsp;{{ $post->fomat_created_at }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Featured_job_end -->
    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg pt-150 pb-150"
        data-background="{{ asset('client/assets/img/gallery/how-applybg.png') }}">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        {{-- <span>Apply process</span> --}}
                        <h2>Làm Thế Nào Để Ứng Tuyển ?</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1.Tìm kiếm công việc phù hợp</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2.Đăng ký ứng tuyển công việc đó</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3.Chờ đợi phản hồi từ nhà tuyển dụng</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How  Apply Process End-->
    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <!-- Testimonial contents -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-10">
                    <div class="h1-testimonial-active dot-style">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="{{ asset('client/assets/img/testmonial/testimonial-founder.png') }}"
                                            alt="">
                                        <span>Nguyễn Văn A</span>
                                        <p>Lập Trình Viên</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“Tôi đã tìm thấy công việc xịn xò từ website này”</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="{{ asset('client/assets/img/testmonial/testimonial-founder.png') }}"
                                            alt="">
                                        <span>Nguyễn Văn B</span>
                                        <p>Sinh Viên</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“Sinh viên như chúng em rất cần website bổ ích như này.”</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="{{ asset('client/assets/img/testmonial/testimonial-founder.png') }}"
                                            alt="">
                                        <span>Nguyễn Văn C</span>
                                        <p>Người Làm Tự Do</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“Trong lúc không có việc làm, tôi đã tìm được công việc phù hợp với bản thân
                                        trên website này
                                        .”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- Support Company Start-->

    <!-- Support Company End-->
    <!-- Blog Area Start -->
    <div class="home-blog-area blog-h-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Blog</span>
                        <h2>Tin Tức Mới Nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2022/06/nganh-it-la-gi.jpeg"
                                    alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>| News</p>
                                <h3><a href="javascript:void(0)">Ngành IT là gì? Giải đáp tất tần tật mọi thắc mắc và định hướng nghề
                                        nghiệp cho dân IT</a>
                                </h3>
                                <a href="javascript:void(0)" class="more-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2022/06/dramacongso-min.png"
                                    alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>| News</p>
                                <h3><a href="javascript:void(0)">Đừng biến drama công sở trở thành một “nét văn hóa độc hại”</a>
                                </h3>
                                <a href="javascript:void(0)" class="more-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
@endsection

@push('client.js')
    <script>
        function ProcessSeach() {
            event.preventDefault();
            $('#form-search').submit();
        }
    </script>
@endpush
