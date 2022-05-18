@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Create Role</h4>

            <form action="{{route('admin.save-role')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label><span style="color:red;"> *</span>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
                </div>
                @if ($errors->has('name'))
                    <p style="color:red;">{{$errors->first('name') }}</p>
                @endif
                
                <h6>Please choose permission for this role</h6>
                @foreach($permission as $per)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="permission[]" value="{{$per->id}}">
                        <label for="exampleCheck">{{$per->name}}</label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- end col -->
@endsection