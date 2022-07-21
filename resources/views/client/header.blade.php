<div class="header-area header-transparrent">
    <div class="headder-top header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-2">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            {{-- <span style="color: black; font-weight: bold; font-size: 30px">
                                IT-VL
                            </span>
                            <p>Việc làm IT toàn quốc</p> --}}
                            <img style="height: 30px " src="{{ asset('dist/img/logoITVL.PNG') }}" alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="menu-wrapper">
                        <!-- Main-menu -->
                        <div class="main-menu">
                            <nav class="d-none d-lg-block">
                                <ul id="navigation">
                                    <li><a  href="{{ route('home') }}">Trang Chủ</a></li>
                                    <li><a  href="{{ route('client.jobs') }}">Cơ Hội Việc Làm</a></li>
                                    <li><a  href="javascript:void(0)">Blog</a></li>
                                    <li><a  href="javascript:void(0)">Liên Hệ</a></li>
                                    @guest
                                        {{-- <li><a href="{{ route('auth.registerhr') }}">Đăng Ký Nhà Tuyển Dụng</a></li> --}}
                                        <li><a href="{{ route('auth.register') }}">Đăng Ký</a></li>
                                        <li><a href="{{ route('auth.login') }}">Đăng Nhập</a></li>
                                    @endguest
                                    @auth
                                        @if (auth()->user()->role == 1 ?? '')
                                            {{-- <li><a href="javascript:void(0)">Thêm Bài Đăng</a></li> --}}
                                            <li><a href="{{ route("client.hr") }}">Quản Lý Bài Đăng</a></li>
                                        @endif
                                        <li>
                                            <a href="javascript:void(0)"> <i class="fas fa-user"></i>
                                                <span id="span-name-user">
                                                    {{ auth()->user()->name ?? 'Tài Khoản' }}
                                                </span>
                                            </a>
                                            <ul class="submenu">
                                                <li><a href="javascript:void(0)" onclick="ShowProfile()" data-toggle="modal"
                                                        data-target="#modal-default">Thông Tin Cá Nhân</a></li>
                                                @if (auth()->user()->role == 0)
                                                    <li><a href="javascript:void(0)" data-toggle="modal" onclick="ShowJobApply()" data-target="#modal-default">Công Việc Đã Ứng Tuyển</a></li>
                                                @else
                                                @endif
                                                <li><a href="{{ route('auth.logout') }}">Đăng Xuất</a></li>
                                            </ul>
                                        </li>
                                    @endauth

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
