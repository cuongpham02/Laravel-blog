<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Minton - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('asset/admin/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('asset/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset/admin/css/app.min.css')}}" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <!-- Search -->
                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

                <!-- Profile -->
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        @if (auth()->user()->image)
                        <img src="{{ asset('storage/profile/'.auth()->user()->image) }}" class="rounded-circle img-fluid" alt="profile-image">
                        @else
                        <img src="{{ asset('storage/profile/avatar.png') }}" class="rounded-circle img-fluid" alt="profile-image">
                        @endif
                        <span class="pro-user-name ml-1">
                            @if (auth()->user() !=null )
                            {{auth()->user()->name}}<i class="mdi mdi-chevron-down"></i>
                            @endif
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="{{route('admin.show-profile')}}" class="dropdown-item notify-item">
                            <i class="remixicon-account-circle-line"></i>
                            <span>My Account</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                            <i class="remixicon-logout-box-line"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{asset('asset/admin/images/logo-light.png')}}" alt="" height="20">
                        <!-- <span class="logo-lg-text-light">Xeria</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="{{asset('asset/admin/images/logo-sm.png')}}" alt="" height="24">
                    </span>
                </a>
            </div>

            <!-- FE Menu -->
            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="remixicon-dashboard-line"></i>
                                <span class="badge badge-success badge-pill float-right">2</span>
                                <span> Dashboards </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="remixicon-apps-2-line"></i>
                                <span> Category </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{route('admin.show-category')}}">List Category</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.create-category')}}">Create Category</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="remixicon-file-copy-2-line"></i>
                                <span> Posts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{route('admin.show-post')}}">List Post</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.create-post')}}">Create Post</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="remixicon-question-answer-fill"></i>
                                <span> Comments </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{route('admin.show-list-comments')}}">List Comment</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="fe-users"></i>
                                <span> Users </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{route('admin.show-user')}}">List User</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.show-role')}}">List Role</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @yield('admin_content')
            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            2016 - 2019 &copy; Minton theme by <a href="">Coderthemes</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="fe-x noti-icon"></i>
            </a>
            <h4 class="m-0 text-white">Settings</h4>
        </div>
        <div class="slimscroll-menu">
            <!-- User box -->
            <div class="user-box">
                <div class="user-img">
                    <!-- <img src="{{asset('asset/admin/images/users/avatar-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid"> -->
                    @if (auth()->user()->image)
                    <img src="{{ asset('storage/profile/'.auth()->user()->image) }}" class="rounded-circle img-fluid" alt="profile-image">
                    @else
                    <img src="{{ asset('storage/profile/avatar.png') }}" class="rounded-circle img-fluid" alt="profile-image">
                    @endif
                    <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                </div>

                <h5><a href="javascript: void(0);">TuanDepTrai</a> </h5>
                <p class="text-muted mb-0"><small>Admin Head</small></p>
            </div>

            <ul class="nav nav-pills bg-light nav-justified">
                <li class="nav-item">
                    <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        General
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                        Chat
                    </a>
                </li>
            </ul>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{asset('asset/admin/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('asset/admin/js/app.min.js')}}"></script>

    <!-- duyệt và trả lời Comment -->
    <script type="text/javascript">
        $('.comment_status_btn').click(function() {
            var status = $(this).data('status');

            var id = $(this).data('comment_id');
            var post_id = $(this).attr('id');

            $.ajax({
                url: "{{url('/admin/allow-comments')}}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    status: status,
                    id: id,
                    post_id: post_id
                },
                success: function(data) {
                    location.reload();
                }
            });
        });

        $('.btn-reply-comment').click(function() {
            var id = $(this).data('comment_id');
            var desc = $('.reply_comment_' + id).val();
            var post_id = $(this).data('post_id');
            $.ajax({
                url: "{{url('/admin/reply-comment')}}",
                method: "POST",

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    desc: desc,
                    id: id,
                    post_id: post_id
                },
                success: function(data) {
                    location.reload();
                }
            });
        });
    </script>

    <script src="{{asset('asset/admin/js/handle-image.js')}}"></script>
    <script src="{{asset('asset/admin/js/handle-image-profile.js')}}"></script>
    <script src="{{asset('asset/admin/js/comments.js')}}"></script>
</body>

</html>