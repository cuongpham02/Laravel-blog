@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Edit Category</h4>

            <form action="{{route('admin.update-category', $category->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name='parent_id'>
                        <option value='0'>--- Danh mục cha ---</option>
                        @foreach($categories as $cate)
                            <option @if ($cate->id == $category->parent_id) selected @endif value="{{$cate->id}}">{{($cate->parent_id !=0) ? '------ '.$cate->name : $cate->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Name</label><span style="color:red;"> *</span>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Enter name">
                </div>
                @if ($errors->has('name'))
                    <p style="color:red;">{{$errors->first('name') }}</p>
                @endif

                <div class="form-group">
                    <label for="desc">Description</label><span style="color:red;"> *</span>
                    <textarea class="form-control" rows="5" name="desc" placeholder="Enter description">{{ $category->desc }}</textarea>
                </div>
                @if ($errors->has('desc'))
                    <p style="color:red;">{{$errors->first('desc') }}</p>
                @endif

                <div class="form-group">
                    <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
    <!-- end col -->
@endsection