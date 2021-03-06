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
                                <h3>REGISTER</h3>
                                <a href="index.html">
                                    <span><img src="{{asset('asset\admin\images\logo-dark.png')}}" alt="" height="22"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Don't have an account? Create your own account, it takes less than a minute</p>
                            </div>

                            <form action="{{route('admin.register')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter your name">
                                </div>
                                @if ($errors->has('name'))
                                <p style="color:red;">{{$errors->first('name')}}</p>
                                @endif

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Enter your email">
                                </div>
                                @if ($errors->has('email'))
                                <p style="color:red;">{{$errors->first('email')}}</p>
                                @endif

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input class="form-control" type="text" name="phone" value="{{old('phone')}}" placeholder="Enter your phone">
                                </div>
                                @if ($errors->has('phone'))
                                <p style="color:red;">{{$errors->first('phone')}}</p>
                                @endif

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" value="{{old('password')}}" placeholder="Enter your password">
                                </div>
                                @if ($errors->has('password'))
                                <p style="color:red;">{{$errors->first('password')}}</p>
                                @endif

                                <div class="form-group">
                                    <label for="password">Re-Password</label>
                                    <input class="form-control" type="password" name="repassword" value="{{old('repassword')}}" placeholder="Enter your re-password">
                                </div>
                                @if ($errors->has('repassword'))
                                <p style="color:red;">{{$errors->first('repassword')}}</p>
                                @endif

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                        <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
                                </div>

                            </form>

                            <div class="text-center">
                                <h5 class="mt-3 text-muted">Sign up using</h5>
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
                            <p class="text-muted">Already have account? <a href="{{route('admin.show-form-login')}}" class="text-primary font-weight-medium ml-1">Sign In</a></p>
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