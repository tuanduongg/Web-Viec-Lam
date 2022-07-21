<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT-VL | Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <style>
        body {
            background: #614385;
            background: -webkit-linear-gradient(to right, #516395, #614385);
            background: linear-gradient(to right, #516395, #614385);
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1" style="color: #333"><b>VL-IT</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Đăng Ký Tài Khoản</p>
                @if (session()->has('message'))
                    <p class="login-box-msg" style="color: red;">{{ session()->get('message') }}</p>
                @else
                @endif
                <form action=" {{ route('auth.registration') }} " method="post">
                    @csrf
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" required
                            @if (session()->has('name')) value="{{ session()->get('name') }}"
                            @else
                                value="{{ old('name') }}" @endif
                            placeholder="Nhập Họ Và Tên">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
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
                    <a href="{{ route('auth.redirect') }}" class="btn btn-block btn-dark">
                        <i class="fab fa-github mr-2"></i>
                        Đăng Ký Bằng Github
                    </a>
                </div>

                <a href="{{ route('auth.login') }}" class="text-center">Đăng Nhập</a>
                <p class="mb-0">
                    <a href="{{ route('auth.registerhr') }}" class="text-center">Đăng Ký Nhà Tuyển Dụng</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
