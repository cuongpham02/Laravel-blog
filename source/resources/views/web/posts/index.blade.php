@extends('web.web_layout')
@section('web_content')
<div class="col-md-9 technology-left">
	<div class="tech-no">
		<div class="soci">
			<ul>
				<li><a href="#" class="facebook-1"> </a></li>
				<li><a href="#" class="facebook-1 twitter"> </a></li>
				<li><a href="#" class="facebook-1 chrome"> </a></li>
				<li><a href="#"><i class="glyphicon glyphicon-envelope"> </i></a></li>
				<li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
				<li><a href="#"><i class="glyphicon glyphicon-plus"> </i></a></li>
			</ul>
		</div>
		<div class="tc-ch">
			@foreach ($posts as $post)
			<div class="tch-img">
				<a href="{{route('web.detail-post', $post->id)}}"><img src="{{ asset('storage/posts/'.$post->image) }}" class="img-responsive" alt="" /></a>
			</div>
			<a class="blog blue" href="singlepage.html">Technology</a>
			<h3><a href="{{route('web.detail-post', $post->id)}}">{{$post->title}}</a></h3>
            @if(strlen($post->content) > 500)
            {{substr($post->content,0,500)}}
            <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
            <span class="read-more-content"> {{substr($post->content,100,strlen($post->content))}} 
            <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
            @else
            {{$post->content}}
            @endif

			<div class="blog-poast-info">
				<ul>
					<li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> Admin </a></li>
					<li><i class="glyphicon glyphicon-calendar"> </i>{{$post->created_at}}</li>
					<li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">{{$post->comments->count()}} Comments </a></li>
					<li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
					<li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
				</ul>
			</div>
			@endforeach
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@endsection