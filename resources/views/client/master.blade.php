<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IT-VL </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://media.discordapp.net/attachments/980671209094144032/989095580385017856/image0.png">

    <!-- CSS here -->
    <link rel="stylesheet" href=" {{ asset('client/assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href=" {{ asset('client/assets/css/owl.carousel.min.css') }}"> --}}
    <link rel="stylesheet" href=" {{ asset('client/assets/css/flaticon.css') }}">
    {{-- <link rel="stylesheet" href=" {{ asset('client/assets/css/price_rangs.css') }}"> --}}
    <link rel="stylesheet" href=" {{ asset('client/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href=" {{ asset('client/assets/css/animate.min.css') }}">
    {{-- <link rel="stylesheet" href=" {{ asset('client/assets/css/magnific-popup.css') }}"> --}}
    <link rel="stylesheet" href=" {{ asset('client/assets/css/fontawesome-all.min.css') }}">
    {{-- <link rel="stylesheet" href=" {{ asset('client/assets/css/themify-icons.css') }}"> --}}
    <link rel="stylesheet" href=" {{ asset('client/assets/css/slick.css') }}">
    <link rel="stylesheet" href=" {{ asset('client/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href=" {{ asset('client/assets/css/style.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-switch/css/bootstrap4/bootstrap-switch.min.css') }}">
    <style>
        .alert {
            width: 372px;
            position: absolute;
            right: 0px;
            top: 85%;
            z-index: 999;
            background-color: #1f2b7b;
            color: white;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            display: none;
        }

        .active {
            color: #fb246a !important;
        }
    </style>


</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="https://media.discordapp.net/attachments/980671209094144032/989095580385017856/image0.png"
                        alt="img">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        @include('client.header')
        @include('client.modal')
        <!-- Header End -->
    </header>
    <main>
        @yield('main')
    </main>
    <div class="alert alert-dismissible" style="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h6 style="color: white;"><i class="icon fas fa-check" id="tittle-alert"></i> </h6>
        <span style="font-size: 15px; font-weight: bold;" id="content-alert"></span>
    </div>

    @include('client.footer')

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src=" {{ asset('client/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src=" {{ asset('client/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    {{-- <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src=" {{ asset('client/assets/js/popper.min.js') }}"></script> --}}
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Jquery Mobile Menu -->
    <script src=" {{ asset('client/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    {{-- <script src=" {{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src=" {{ asset('client/assets/js/price_rangs.js') }}"></script> --}}
    <script src=" {{ asset('client/assets/js/slick.min.js') }}"></script>

    <!-- One Page, Animated-HeadLin -->
    {{-- <script src=" {{ asset('client/assets/js/wow.min.js') }}"></script>
    <script src=" {{ asset('client/assets/js/animated.headline.js') }}"></script>
    <script src=" {{ asset('client/assets/js/jquery.magnific-popup.js') }}"></script> --}}

    <!-- Scrollup, nice-select, sticky -->
    <script src=" {{ asset('client/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src=" {{ asset('client/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src=" {{ asset('client/assets/js/jquery.sticky.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src=" {{ asset('client/assets/js/jquery.ajaxchimp.min.js') }}"></script>


    <!-- Jquery Plugins, main Jquery -->
    <script src=" {{ asset('client/assets/js/plugins.js') }}"></script>
    <script src=" {{ asset('client/assets/js/main.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        function showAlert(tittle, content) {
            $("#tittle-alert").text(" " + tittle);
            $("#content-alert").text(content);
            $(".alert").show();
            setTimeout(() => {
                $(".alert").hide();
            }, 3000);
        }

        function showAlertError(tittle, content) {
            // $(".alert").removeClass('alert-success');
            $('.alert').css('background-color', '#fb246a');
            $("#tittle-alert").text(" " + tittle);
            $("#content-alert").text(content);
            $(".alert").show();
            setTimeout(() => {
                $(".alert").hide();
            }, 3000);
        }
        // add class active page
        function activePanigation() {
            let currentURL = window.location.href;
            document.querySelectorAll("#navigation > li > a").forEach(p => {
                if (currentURL.indexOf(p.getAttribute("href")) !== -1) {
                    $("#navigation > li > a").removeClass('active');
                    p.classList.add("active");
                }
            })
        }
        activePanigation();
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Nhập Gì Đó !',
                tabsize: 2,
                height: 220,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear', 'fontfamily']],
                    // ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['help']]
                ]
            });
            // $('#summernote').summernote();
            $(".note-btn").addClass("genric-btn primary-border");
            $(".note-btn").removeClass("btn-default");
            $(".note-btn").removeClass("btn");


            $("input[name=salary]").on({
                keyup: function() {
                    let input_val = $(this).val();
                    input_val = numberToCurrency(input_val);
                    $(this).val(input_val);
                },
                blur: function() {
                    let input_val = $(this).val();
                    input_val = numberToCurrency(input_val, true, true);
                    $(this).val(input_val);
                }
            });

            var numberToCurrency = function(input_val, fixed = false, blur = false) {
                // don't validate empty input
                if (!input_val) {
                    return "";
                }

                if (blur) {
                    if (input_val === "" || input_val == 0) {
                        return 0;
                    }
                }

                if (input_val.length == 1) {
                    return parseInt(input_val);
                }

                input_val = '' + input_val;

                let negative = '';
                if (input_val.substr(0, 1) == '-') {
                    negative = '-';
                }
                // check for decimal
                if (input_val.indexOf(".") >= 0) {
                    // get position of first decimal
                    // this prevents multiple decimals from
                    // being entered
                    var decimal_pos = input_val.indexOf(".");

                    // split number by decimal point
                    var left_side = input_val.substring(0, decimal_pos);
                    var right_side = input_val.substring(decimal_pos);

                    // add commas to left side of number
                    left_side = left_side.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                    if (fixed && right_side.length > 3) {
                        right_side = parseFloat(0 + right_side).toFixed(2);
                        right_side = right_side.substr(1, right_side.length);
                    }

                    // validate right side
                    right_side = right_side.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                    // Limit decimal to only 2 digits
                    if (right_side.length > 2) {
                        right_side = right_side.substring(0, 2);
                    }

                    if (blur && parseInt(right_side) == 0) {
                        right_side = '';
                    }

                    // join number by .
                    // input_val = left_side + "." + right_side;

                    if (blur && right_side.length < 1) {
                        input_val = left_side;
                    } else {
                        input_val = left_side + "." + right_side;
                    }
                } else {
                    // no decimal entered
                    // add commas to number
                    // remove all non-digits
                    input_val = input_val.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }

                if (input_val.length > 1 && input_val.substr(0, 1) == '0' && input_val.substr(0, 2) != '0.') {
                    input_val = input_val.substr(1, input_val.length);
                } else if (input_val.substr(0, 2) == '0,') {
                    input_val = input_val.substr(2, input_val.length);
                }

                return negative + input_val;
            };
            //add option thành phố


        });

        //helper
        function getFormattedDate(date) {
            const D = new Date(date); // {object Date}
            return D.getHours() + ":" + D.getMinutes() + " " + D.getDate() + "/" + (D.getMonth() + 1) + "/" + D
                .getFullYear();
        }

        function formatTittlePost(str) {
            if (str.length > 40) {
                arr = str.split(" ");
                arr = arr.splice(0, 5);
                str = "";
                arr.forEach((item) => {
                    item += " ";
                    str += item;
                });
                str += "...";
            }
            return str.trim();
        }

        function ShowProfile() {

            $("#modal-job-items").hide();
            $(".slicknav_btn ").click();
            $(".content-profile").show();
            $(".modal-title").text("Thông Tin Tài Khoản");

            let id = {{ auth()->user()->id ?? -1 }};
            $(document).ready(function() {
                $('#btn-edit').show();
                $("#span-name").show();
                $("#span-phone").show();
                $("#span-address").show();
                $("#span-email").show();
                $("#span-created").show();

                $('#btn-update').hide();
                $("input[name=name]").hide();
                $("input[name=phone]").hide();
                $("input[name=address]").hide();

                let url = "{{ route('client.user.show', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "get",
                    url: url,
                    data: id,
                    dataType: "json",
                    success: function(response) {
                        let object = response.user;

                        if (object.phone == null) {
                            $("#span-phone").text('Chưa Cập Nhật');
                            $("input[name=phone]").val('');
                        } else {
                            $("#span-phone").text(object.phone);
                            $("input[name=phone]").val(object.phone);
                        }

                        if (object.address == null) {
                            $("#span-address").text('Chưa Cập Nhật');
                            $("input[name=address]").val('');
                        } else {
                            $("#span-address").text(object.address);
                            $("input[name=address]").val(object.address);
                        }
                        // console.log(object.phone);
                        $("#span-name").text(object.name);
                        $("#span-email").text(object.email);
                        $("#span-created").text(getFormattedDate(object.created_at));
                        $("#span-name-user").text(object.name);
                        $("input[name=name]").val(object.name);
                        $("input[name=email]").val(object.email);
                    }
                });
            });
        }
        $(document).ready(function() {
            // $().();
            $('#form-update').submit(function(e) {
                e.preventDefault();
            });

            $('#btn-edit').click(function(e) {
                e.preventDefault();


                $('#btn-edit').hide();

                $("#span-name").hide();
                $("#span-phone").hide();
                $("#span-address").hide();
                // $("#span-email").hide();

                $('#btn-update').show();
                $("input[name=name]").show();
                $("input[name=phone]").show();
                $("input[name=address]").show();
                // $("input[name=email]").show();
            });

            $(document).on('click', '#btn-update', function() {
                let id = {{ auth()->user()->id ?? -1 }};
                let url = "{{ route('client.user.update', ':id') }}";
                url = url.replace(':id', id);
                let data = $("#form-update").serialize();
                $.ajax({
                    type: "post",
                    url: url,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        ShowProfile();
                    },
                    error: function(response) {
                        alert('Lỗi Nhập Thông Tin Không Chính Xác!');
                    }
                });
            });

        });

        function ShowJobApply() {
            $("#modal-job-items").show();
            $("#modal-job-items").html('');

            $(document).ready(function() {
                $(".slicknav_btn ").click();
                $("#btn-edit").hide();
                $("#btn-update").hide();
                $(".content-profile").hide();
                $(".modal-title").text("Công Việc Bạn Đã Ứng Tuyển");
                let id = {{ auth()->user()->id ?? -1 }};
                let url = "/user/job/show/" + id + "";
                $.ajax({
                    type: "get",
                    url: url,
                    data: id,
                    dataType: "json",
                    success: function(response) {
                        let arr = response.data;
                        if (arr.length > 0) {
                            arr.forEach((item) => {
                                let strStatus = '';

                                switch (item.status) {
                                    case 0:
                                        statusText =
                                            `<li><i class="fas fa-exclamation-circle"></i>Đã bị huỷ</li>`;
                                        break;
                                    case 1:
                                        statusText = `<li><i class="fas fa-exclamation-circle"></i>Chờ duyệt</li>
                                                        <li><button data-post_id=` + item.post_id +
                                            ` class="genric-btn primary-border" style="line-height: 20px;" id="btn-cancel-job">Huỷ</button></li>`;
                                        break;
                                    case 2:
                                        statusText =
                                            `<li><i class="fas fa-exclamation-circle"></i>Đã được duyệt</li>`
                                        break;

                                    default:
                                        strStatus = 'null';
                                        break;
                                }
                                let result = `
                                        <div class="single-job-items w-100" id="modal-job-items" style="border-bottom: 1px solid #333; padding: 10px 0px;">
                                            <div class="job-items"  >
                                                <div class="job-tittle pt-0">
                                                    <a href="{{ route('client.viewjob', ':item.post_id') }}" target = blank>
                                                        <h6>` + formatTittlePost(item.job_tittle) + `</h6>
                                                    </a>
                                                    <ul>
                                                        <li><i class="fas fa-clock"></i>` + getFormattedDate(item
                                    .created_at) + `</li>
                                                        ` + statusText + `
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> 
                                        `;
                                result = result.replace(':item.post_id', item.post_id);
                                $("#modal-job-items").append(result);
                            });
                        } else {
                            let text = `<h6>Bạn chưa ứng tuyển công việc nào</h6>`;
                            $("#modal-job-items").append(text);
                        } //end - if

                    },
                    error: function(response) {
                        console.log("error" + response);
                    }
                });

            });
        }

        $(document).on('click', '#btn-cancel-job', function(e) {
            // let confirm = confirm('');
            e.preventDefault();
            if (confirm("Bạn Chắc Chắn Muốn Huỷ ?") == true) {

                let post_id = $(this).data('post_id');
                let user_id = {{ auth()->user()->id ?? -1 }};
                $.ajax({
                    type: "get",
                    url: "/user/job/cancel/" + post_id + "",
                    data: {
                        user_id
                    },
                    dataType: "json",
                    success: function(response) {
                        showAlert('Huỷ Thành Công', '');
                        ShowJobApply();
                    },
                    error: function(response) {
                        console.log("error" + response);
                    }
                });
            }
        });
    </script>

</body>
@stack('client.js')

</html>
