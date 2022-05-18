@extends('web.web_layout')
@section('web_content')
<div class="col-md-9 technology-left">
    <div class="business">
        <div class=" blog-grid2">
            <img src="{{ asset('storage/posts/'.$post->image) }}" class="img-responsive" alt="">
            <div class="blog-text">
                <h5>{{$post->title}}</h5>
                <p>{{$post->content}}</p>
            </div>
        </div>
        <div class="comment-top">
            <h2>Comment</h2>
            @foreach ($post->comments as $comment)
            @if ($comment->rep_comment == 0 && $comment->status == 1)
            <div class="comment">
                <div class="media-left">
                    <a href="#">
                        @php
                            $img = "";
                            if(isset(auth()->user()->image)){
                            $img = auth()->user()->image;
                        }
                        else{
                            $img = 'avatar.png' ;
                        }
                        @endphp
                        @if (auth()->user())
                        <img src="{{ asset('storage/profile/'. $img) }}" width="70px" hight="70px" id="image-post" class="image-post" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                        @else
                        <img src="{{ asset('storage/profile/avatar.png') }}" width="70px" id="image-post" class="image-post" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                        @endif
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment['name']}}</h4>
                    <p>{{$comment['desc']}}</p>

                    @foreach($comment_rep as $key => $comm_reply)
                    @if($comm_reply->rep_comment == $comment['id'])
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img src="{{ asset('storage/profile/nar.png')}}" width="70px" hight="70px" id="image-post" class="image-post" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Admin:</h4>
                            {{$comm_reply->desc}}
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <br><button class="reply-button btn btn-success btn-xs" data-comment-box="panel_{{$comment->id}}">Reply</button><br /><br />
                    <div class="reply-box-comment" id="panel_{{$comment->id}}" style="display:none">
                        <textarea class="form-control reply_comment_{{$comment->id}}" cols="45" rows="8"></textarea><br />
                        <button class="btn btn-success btn-xs btn-reply-comment" data-post_id="{{$comment->post_id}}" data-comment_id="{{$comment->id}}">Answer</button>
                        <button class="cancel-button btn btn-success btn-xs">Cancel</button>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="comment">
            <h3>Leave a Comment</h3>
            <div class=" comment-bottom">
                <form action="#">
                    @csrf
                    <input type="hidden" name="post_id" class="post_id" value="{{$post->id}}">
                    <div id="comment_show"></div>

                    @if (auth()->user() !=null )
                    <input type="text" class="name" name="name" value="{{auth()->user()->name}}">
                    @else
                    <input type="text" placeholder="Name" class="name" name="name">
                    @endif
                    @if ($errors->has('name'))
                    <p style="color:red;">{{$errors->first('name') }}</p>
                    @endif

                    <textarea placeholder="Description" class="comment_content" name="desc"></textarea>
                    @if ($errors->has('desc'))
                    <p style="color:red;">{{$errors->first('desc') }}</p>
                    @endif
                    <input type="button" value="Send" class="send-comment">
                    <div id="notify_comment"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection