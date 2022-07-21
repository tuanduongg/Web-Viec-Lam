<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT-VL | Register For Hr</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href=" {{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset('dist/css/adminlte.min.css') }}">
    <style>
        body {
            background: #4568DC;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #B06AB3, #4568DC);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #B06AB3, #4568DC);
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1" style="color: #333"><b>VL-IT For HR</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Đăng Ký Tài Khoản Dành Cho Nhà Tuyển Dụng</p>
                @if (session()->has('message'))
                    <p class="login-box-msg" style="color: red;">{{ session()->get('message') }}</p>
                @else
                @endif
                <form action="{{ route('auth.registration') }}" method="post">

                    @csrf
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" required
                            @if (session()->has('name')) value="{{ session()->get('name') }}"
                            @else
                                value="{{ old('name') }}" @endif
                            placeholder="Nhập Tên Công Ty">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="phone"
                            @if (session()->has('phone')) value="{{ session()->get('phone') }}"
                            @else
                                value="{{ old('phone') }}" @endif
                            required placeholder="Nhập Số Điện Thoại Liên Hệ">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="address" required
                            @if (session()->has('address')) value="{{ session()->get('address') }}"
                            @else
                                value="{{ old('address') }}" @endif
                            placeholder="Nhập Địa Chỉ Công Ty">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marked"></span>
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" required
                            @if (session()->has('email')) value="{{ session()->get('email') }}"
                            @else
                                value="{{ old('email') }}" @endif
                            placeholder="Nhập Địa Chỉ Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" required
                            placeholder="Nhập Mật Khẩu Ít Nhất 4 Ký Tự">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" checked name="terms" value="agree">
                                <label for="agreeTerms">
                                    Chấp Nhận <a href="#">Điều Khoản</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    {{-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a> --}}
                    {{-- <a href="{{ route('auth.redirect') }}" class="btn btn-block btn-dark">
                        <i class="fab fa-github mr-2"></i>
                        Đăng Ký Bằng Github
                    </a> --}}

                </div>
                <p class="mb-0">
                    <a href="{{ route('auth.register') }}" class="text-center">Đăng Ký</a>
                </p>
                <a href="{{ route('auth.login') }}" class="text-center">Đăng Nhập</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>

@push('js')
    <script>
        jQuery(document).ready(function() {
            // jQuery("#forms").validate( function() {
            //     rules: {
            //         firstname: 'required',
            //         lastname: 'required',
            //         u_email: {
            //             required: true,
            //             email: true, //add an email rule that will ensure the value entered is valid email id.
            //             maxlength: 255,
            //         },
            //     }
            // });
        });
    </script>
@endpush
