@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Edit Post</h4>

            <form action="{{route('admin.update-post', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label><span style="color:red;"> *</span>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Enter title">
                </div>
                @if ($errors->has('title'))
                    <p style="color:red;">{{$errors->first('title') }}</p>
                @endif

                <div class="form-group">
                    <label for="content">Content</label><span style="color:red;"> *</span>
                    <textarea class="form-control" rows="5" name="content" placeholder="Enter content">{{ $post->content }}</textarea>
                </div>
                @if ($errors->has('content'))
                    <p style="color:red;">{{$errors->first('content') }}</p>
                @endif

                <div class="form-group">
                    <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $cate)
                                <option @if ($cate->id == $post->category->id) selected @endif value="{{$cate->id}}">{{($cate->parent_id !=0) ? '------ '.$cate->name : $cate->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <label>Image:</label><br>
                    <img src="{{ asset('storage/posts/'.$post->image) }}" id="image-post" class="image-post" width="120px" hight="120px">
                    <span class="append-image"></span>

                    <input type="file" id="upload-image" onchange="readURL(this)" name="image" class="form-control"/>
                    <!-- <input type="file" id="upload-image" style="visibility: hidden;" onchange="readURL(this)" name="image" class="form-control"/> -->
                    <!-- <button type="button" id="btn-add-image" class="btn btn-secondary">Add Images</button> -->
                </div>

                <div class="form-group">
                    <label>Status</label>
                        <select name="status" class="form-control">
                            <option @if ($post->status == '1') selected @endif value="1">Enable</option>
                            <option @if ($post->status == '0') selected @endif value="0">Disable</option>
                        </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- end col -->
@endsection