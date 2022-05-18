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
                <h4 class="page-title">List Comment</h4>
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
                <div id="notify_comment"></div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th>Post</th>
                                <th>Action</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comment as $key => $comm)
                            <tr>
                                <td>
                                    @if($comm->status == 1)
                                    <input type="button" data-status="0" data-comment_id="{{$comm->id}}" id="{{$comm->post_id}}" class="btn btn-primary btn-xs comment_status_btn" value="Enable">
                                    @else
                                    <input type="button" data-status="1" data-comment_id="{{$comm->id}}" id="{{$comm->post_id}}" class="btn btn-danger btn-xs comment_status_btn" value="Disable">
                                    @endif
                                </td>
                                <td contenteditable = "true">{{ $comm->name }}</td>

                                <td>{{ $comm->desc }}
                                    <style type="text/css">
                                        ul.list_rep li {
                                            list-style-type: decimal;
                                            color: blue;
                                            margin: 5px 40px;
                                        }
                                    </style>
                                    <ul class="list_rep">
                                        @foreach($comment_rep as $key => $comm_reply)
                                        @if($comm_reply->rep_comment == $comm->id)
                                        <!-- Answer : -->
                                        <li contenteditable = "true"> {{$comm_reply->desc}}</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                    @if($comm->status == 1)
                                    <button class="reply-button btn btn-success btn-xs" data-comment-box="panel_{{$comm->id}}">Reply</button><br/><br/>
                                    <div class="reply-box-comment" id="panel_{{$comm->id}}" style="display:none">
                                        <textarea class="form-control reply_comment_{{$comm->id}}" cols="45" rows="8"></textarea><br/>
                                        <button class="btn btn-success btn-xs btn-reply-comment" data-post_id="{{$comm->post_id}}" data-comment_id="{{$comm->id}}">Answer</button>
                                        <button class="cancel-button btn btn-success btn-xs">Cancel</button>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $comm->created_at }}</td>
                                <td><a href="" target="_blank">{{ $comm->post->title }}</a></td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <div style="text-align: left;">
                                        <div class="btn-group btn-group-sm" style="float: none;">
                                            <a type="button" href="" class="btn btn-success" style="float: none;"><span class="mdi mdi-pencil"></span></a>
                                            <form action="{{route('admin.delete-comments', $comm->id)}}" method="POST">
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
                {!! $comment->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection