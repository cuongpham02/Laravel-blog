@extends('admin.admin_layout')
@section('admin_content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{route('admin.profile', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                @if ($user->image)
                <img src="{{ asset('storage/profile/'.$user->image) }}" id="image-post-profile" class="image-post-profile" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                @else
                <img src="{{ asset('storage/profile/avatar.png') }}" id="image-post-profile" class="image-post-profile" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                @endif
                <span class="append-image-profile"></span>
                <h4 class="mb-0">{{auth()->user()->name}}</h4>
                <p class="text-muted">{{auth()->user()->email}}</p>

                <input type="file" id="upload-image" onchange="readURLProfile(this)" name="image" class="form-control"/>
                <!-- <button type="button" id="btn-add-image" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Add Image</button> -->
                <!-- <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button> -->

                <div class="text-left mt-3">
                    <h4 class="font-13 text-uppercase">About Me :</h4>
                    <p class="text-muted font-13 mb-3">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type.
                    </p>
                    <p class="text-muted mb-2 font-13"><strong>Name :</strong> <span class="ml-2">{{auth()->user()->name}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{auth()->user()->email}}</span></p>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card-box">
                <ul class="nav nav-pills navtab-bg">
                    <li class="nav-item">
                        <a href="#about-me" data-toggle="tab" aria-expanded="true" class="nav-link active ml-0">
                            <i class="mdi mdi-face-profile mr-1"></i>About Me
                        </a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Edit User</h4>

                            <div class="form-group">
                                <label for="name">Name</label><span style="color:red;"> *</span>
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" placeholder="Enter name">
                            </div>
                            @if ($errors->has('name'))
                            <p style="color:red;">{{$errors->first('name') }}</p>
                            @endif

                            <div class="form-group">
                                <label for="email">Name</label><span style="color:red;"> *</span>
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" placeholder="Enter email">
                            </div>
                            @if ($errors->has('email'))
                            <p style="color:red;">{{$errors->first('email') }}</p>
                            @endif

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ auth()->user()->phone }}" placeholder="Enter your phone">
                            </div>
                            @if ($errors->has('phone'))
                            <p style="color:red;">{{$errors->first('phone')}}</p>
                            @endif

                            <div class="form-group">
                                <label for="password">Password</label><span style="color:red;"> *</span>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            @if ($errors->has('password'))
                            <p style="color:red;">{{$errors->first('password') }}</p>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div> <!-- end tab-content -->
            </div> <!-- end card-box-->

        </div> <!-- end col -->
    </div>
    </form>
    <!-- end row-->

</div> <!-- container -->
@endsection