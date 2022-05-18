<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Minton - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('asset\admin\images\favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('asset\admin\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset\admin\css\icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset\admin\css\app.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h3>LOGIN</h3>
                                <a href="index.html">
                                    <span><img src="{{asset('asset\admin\images\logo-dark.png')}}" alt="" height="22"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                            </div>
                            <?php
                            $message = session('message');
                            if ($message) {
                                echo '<div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show">'
                                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                                    . '<span aria-hidden="true">&times;</span>'
                                    . '</button>'
                                    . $message
                                    . '</div>';
                                session(['message' => 'null']);
                            }
                            ?>

                            <form action="{{route('admin.login')}}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="email">Email address</label>
                                    <input class="form-control" type="email" name="email" value="{{session('users')}}" placeholder="Enter your email">
                                </div>
                                <?php session(['users' => '']);?>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                </div>

                            </form>

                            <div class="text-center">
                                <h5 class="mt-3 text-muted">Sign in with</h5>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                            <p class="text-muted">Don't have an account? <a href="{{route('admin.show-form-register')}}" class="text-primary font-weight-medium ml-1">Sign Up</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        2016 - 2019 &copy; Minton theme by <a href="" class="text-muted">Coderthemes</a>
    </footer>

    <!-- Vendor js -->
    <script src="{{asset('asset\admin\js\vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('asset\admin\js\app.min.js')}}"></script>

</body>

</html>