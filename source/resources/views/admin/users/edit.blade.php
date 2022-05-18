@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Edit User</h4>

            <form action="{{route('admin.update-user', $user->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label><span style="color:red;"> *</span>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter name">
                </div>
                @if ($errors->has('name'))
                    <p style="color:red;">{{$errors->first('name') }}</p>
                @endif

                <div class="form-group">
                    <label for="email">Name</label><span style="color:red;"> *</span>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter email">
                </div>
                @if ($errors->has('email'))
                    <p style="color:red;">{{$errors->first('email') }}</p>
                @endif

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control" type="text" name="phone" value="{{ $user->phone }}" placeholder="Enter your phone">
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
            </form>
        </div>
    </div>
</div>
    <!-- end col -->
@endsection