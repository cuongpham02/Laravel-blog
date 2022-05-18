@extends('admin.admin_layout')
@section('admin_content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <!-- <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">List user</li>
                    </ol> -->
                </div>
                <h4 class="page-title">List Post</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <?php
                $message = session('message');
                if ($message) {
                    echo '<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span>'
                        . '</button>'
                        . $message
                        . '</div>';
                    session(['message' => 'null']);
                }
                ?>
                <!-- <h4 class="header-title">List User</h4> -->

                <div class="col-12 text-sm-center form-inline">
                    <div class="form-group">
                    <form method="GET" action="{{route('admin.show-post')}}">
                        <input type="text" placeholder="Search" class="form-control" name="search" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary"> Search</button>
                    </form>
                    </div>
                </div><br>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><img src="{{ asset('storage/posts/'.$post->image) }}" width="120px" hight="120px" alt=""></td>
                                <td>{{$post->title}}</td>
                                <td>
                                    @if ($post->status == 1)
                                    <p class="badge badge-primary">Enable</p>
                                    @else
                                    <p class="badge badge-danger">Disable</p>
                                    @endif
                                </td>
                                <td>{{($post->category->parent_id != 0) ? '------ '.$post->category->name : $post->category->name}}</td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <div style="text-align: left;">
                                        <div class="btn-group btn-group-sm" style="float: none;">
                                            <a type="button" href="{{route('admin.edit-post',$post->id)}}" class="btn btn-success" style="float: none;"><span class="mdi mdi-pencil"></span></a>
                                            <form action="{{route('admin.delete-post', $post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" style="float: none;"><span class="mdi mdi-trash-can"></span></a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

            </div> <!-- end card-box -->
        </div> <!-- end col -->

        <div class="row">
            <div class="col-sm-5 text-center">
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection