<div
    class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-scrollbar-vertical-hidden">
    <div class="os-resize-observer-host observed">
        <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
    </div>
    <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
        <div class="os-resize-observer"></div>
    </div>
    <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 607px;"></div>
    <div class="os-padding">
        <div class="os-viewport os-viewport-native-scrollbars-invisible" style="">
            <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/avt3d.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        @if (auth()->check())
                            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                        @endif
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href=" {{ route('admin.dashboard') }} " class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p id="dashboard">
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('admin.posts')}}" class="nav-link ">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>
                                    Posts
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('admin.users')}}" class="nav-link ">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                        <li class="nav-header">LABELS</li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
    </div>
    <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
        <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
        </div>
    </div>
    <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden os-scrollbar-unusable">
        <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div>
        </div>
    </div>
    <div class="os-scrollbar-corner"></div>
</div>
@push('js')
    <script>
        let value = $('.nav-header').text();
        var reg = /.+?\:\/\/.+?(\/.+?)(?:#|\?|$)/;
        var pathname = reg.exec(window.location.href)[1];
        var temp = pathname.split("/").slice(-1)[0]; // lấy ra nav item
        // console.log(temp);
        let flag = false;
        $('.nav > .nav-item > a > p').each(function() {
            let textNav = $(this).text().trim().toLowerCase();
            if(temp === textNav) {
                $(this).parent("a").addClass("active");
                flag = true;
            }
        });
        if(flag == false) {
            $("#dashboard").parent("a").addClass("active");
        }
    </script>
@endpush
