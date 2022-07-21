<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT-VL| Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <style>
        body {
            min-height: 522.844px;
            background: #093028;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #237A57, #093028);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #237A57, #093028);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>
</head>

<body class="login-page" style="">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('home') }}" style="font-weight: bold; color:white; "><b>Login IT-VL</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Thông Báo</h5>
                        {{ session()->get('error') }}
                    </div>
                @else
                    <p class="login-box-msg">Vui Lòng Đăng Nhập</p>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('auth.authenticate') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email"
                        @if (session()->has('email')) value="{{ session()->get('email') }}"
                        @else
                            value="{{ old('email') }}" 
                        @endif required placeholder="Nhập Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password"
                            value="{{ session()->get('password') }}" required placeholder="Nhập Mật Khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" checked id="remember" name="remember_me">
                                <label for="remember">
                                    Ghi Nhớ Đăng Nhập
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="text-align: center">
                            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Đăng Nhập Với Facebook
                    </a>
                    <a href="{{ route('auth.redirect') }}" class="btn btn-block btn-dark">
                        <i class="fab fa-github mr-2"></i>
                        Đăng Nhập Với Github
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Quên Mật Khẩu</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('auth.register') }}" class="text-center">Đăng Ký</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('auth.registerhr') }}" class="text-center">Đăng Ký Nhà Tuyển Dụng</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>

</html>
