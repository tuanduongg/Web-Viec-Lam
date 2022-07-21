@extends('client.master')
@section('main')
    <!-- Job List Area Start -->
    <div class="job-listing-area pb-120">
        <div class="container">
            <div class="row">
                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                            d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z">
                                        </path>
                                    </svg>
                                </div>
                                <h4>Bộ Lọc</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Job Category Listing start -->
                    <div class="job-category-listing mb-50">
                        <form action="" id="form-filter" method="get">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Ngôn Ngữ Lập Trình</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="l">
                                        <option value="">Tất Cả</option>
                                        @foreach ($arrLanguage as $item)
                                            <option value="{{ $item->language }}"
                                                @if ($selectedLanguage == $item->language) selected @endif>{{ $item->language }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Hình Thức Làm Việc</h4>
                                    </div>
                                    {{-- <label class="container">Full Time
                                        <input type="checkbox" name="fulltime" checked>
                                        <span class="checkmark"></span>
                                    </label> --}}
                                    <label class="container">Remote
                                        <input type="checkbox" name="remote" @if (!empty($remote)) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Part Time
                                        <input type="checkbox" name="parttime" @if (!empty($parttime)) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing ">
                                <div class="small-section-tittle2">
                                    <h4>Địa Điểm</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2 ">
                                    <select name="c" class=" mb-20">
                                        <option value="" selected>Mọi Nơi</option>
                                        @foreach ($arrCity as $item)
                                            <option value="{{ $item->city }}"
                                                @if ($selectedCity == $item->city) selected @endif>{{ $item->city }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Mức Lương</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="s">
                                        <option value="" selected>Lương</option>
                                        @foreach ($arrSalary as $key => $value)
                                            <option value="{{ $key }}" @if ($selectedSalary == $key) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="single-listing">
                                <a href="{{ route('client.jobs') }}"
                                    class="genric-btn primary-border circle  mt-20">Reset</a>
                            </div>
                        </form>
                    </div>
                    <!-- Job Category Listing End -->
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>{{ $posts->count() }} Kết quả tìm thấy</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            <!-- single-job-content -->
                            @foreach ($posts as $post)
                                <!-- single-job-content -->
                                <div class="single-job-items" style="padding: 10px;">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="{{ route('client.viewjob', $post) }}"><img style="margin-right: 10px"
                                                    src="{{ asset('client/assets/img/icon/job-list3.png') }}"
                                                    alt="img"></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('client.viewjob', $post) }}">
                                                <p>{{ $post->job_tittle }}</p>
                                            </a>
                                            <ul>

                                                <li><i class="fas fa-code"></i>{{ $post->language }}</li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{ $post->city }}</li>
                                                <li>{{ $post->fomat_salary }} VNĐ</li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <ul>
                                            <li><i class="fas fa-check"></i> FullTime</li>
                                            @if ($post->parttime != null)
                                                <li><i class="fas fa-check"></i> Part Time</li>
                                            @endif
                                            @if ($post->remote != null)
                                                <li><i class="fas fa-check"></i> Remote</li>
                                            @endif
                                        </ul>
                                        {{-- <a href="{{ route('client.viewjob', $post) }}">Ứng Tuyển</a> --}}
                                        <span><i class="fas fa-clock"></i>&nbsp;{{ $post->fomat_created_at }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
    <!--Pagination Start  -->
    <div class="pagination-area pb-115 text-center">
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
    <!--Pagination End  -->
@endsection
@push('client.js')
    <script>
        $(document).ready(function() {

            $("select[name=l],select[name=c],select[name=s],input[name=remote],input[name=parttime]").change(function() {
                $("#form-filter").submit();
            });
        
        });
    </script>
@endpush
