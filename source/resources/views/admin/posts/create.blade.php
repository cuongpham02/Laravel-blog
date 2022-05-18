@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Create Post</h4>

            <form action="{{route('admin.save-post')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label><span style="color:red;"> *</span>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title">
                </div>
                @if ($errors->has('title'))
                    <p style="color:red;">{{$errors->first('title') }}</p>
                @endif

                <div class="form-group">
                    <label for="content">Content</label><span style="color:red;"> *</span>
                    <textarea class="form-control" rows="5" name="content" value="{{ old('content') }}" placeholder="Enter content"></textarea>
                </div>
                @if ($errors->has('content'))
                    <p style="color:red;">{{$errors->first('content') }}</p>
                @endif

                <div class="form-group">
                    <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{($category->parent_id !=0) ? '------ '.$category->name : $category->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" class="form-control" name="image"/>
                </div>

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