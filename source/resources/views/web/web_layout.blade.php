<!DOCTYPE HTML>
<html>

<head>
	<title>Business_Blog a Blogging Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Business_Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="{{asset('asset/web/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="{{asset('asset/web/css/style.css')}}" rel='stylesheet' type='text/css' />
	<script src="{{asset('asset/web/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('asset/web/js/bootstrap.min.js')}}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style type="text/css">
		.read-more-show {
			cursor: pointer;
			color: #ed8323;
		}

		.read-more-hide {
			cursor: pointer;
			color: #ed8323;
		}

		.hide_content {
			display: none;
		}
	</style>
</head>

<body>
	<!--start-main-->
	<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="logo">
					<a href="index.html">
						<h1>BLOG</h1>
					</a>
				</div>
				<div class="search">
					<form>
						<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
						<input type="submit" value="">
					</form>
				</div>
				<div class="social">
					<!-- Profile -->
					<a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
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
						<img src="{{ asset('storage/profile/'.$img) }}" width="50px" class="rounded-circle img-fluid" alt="profile-image">
						@else
						<img src="{{ asset('storage/profile/avatar.png') }}" width="50px" class="rounded-circle img-fluid" alt="profile-image">
						@endif
						<span class="pro-user-name ml-1">
							@if (auth()->user() !=null )
							{{auth()->user()->name}}<i class="mdi mdi-chevron-down"></i>
							@endif
						</span>
					</a>
					<!-- item-->
					<!-- <a href="{{route('admin.show-profile')}}" class="dropdown-item notify-item">
                                <i class="remixicon-account-circle-line"></i>
                                <span>Account</span>
                            </a> -->

					<!-- item-->
					@if (auth()->user() !=null )
					<form action="{{route('logout')}}" method="post" class="dropdown-item notify-item">
						@csrf
						<i class="remixicon-logout-box-line"></i>
						<button type="submit" class="btn btn-default">Logout</button>
					</form>
					@else
					<a href="{{route('login')}}" class="dropdown-item notify-item">
						<i class="remixicon-logout-box-line"></i>
						<span>Login</span>
					</a>
					<a href="{{route('register')}}" class="dropdown-item notify-item">
						<i class="remixicon-logout-box-line"></i>
						<span>Register</span>
					</a>
					@endif
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<!--head-bottom-->
		<div class="head-bottom">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.html">Home</a></li>
						<li><a href="videos.html">About</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Developer <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="tech.html">PHP</a></li>
								<li><a href="tech.html">Java</a></li>
								<li><a href="tech.html">Python</a></li>
							</ul>
						</li>
						<li><a href="design.html">Technology tricks</a></li>
						<li><a href="business.html">Recruitment</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			</nav>
		</div>
		<!--head-bottom-->
	</div>
	<!-- banner -->
	<div class="banner">
		<div class="container">
			<h2>Contrary to popular belief, Lorem Ipsum simply</h2>
			<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
			<a href="#">READ ARTICLE</a>
		</div>
	</div>
	<!-- technology -->
	<div class="technology">
		<div class="container">

			<!-- technology-top -->
			@yield('web_content')
			<!-- technology-top -->


			<!-- technology-right -->
			<div class="col-md-3 technology-right">
				<div class="blo-top">
					<div class="tech-btm">
						<img src="{{asset('asset/web/images/banner1.jpg')}}" class="img-responsive" alt="" />
					</div>
				</div>
				<div class="blo-top">
					<div class="tech-btm">
						<h4>Sign up to our newsletter</h4>
						<p>Pellentesque dui, non felis. Maecenas male</p>
						<div class="name">
							<form>
								<input type="text" placeholder="Email" required="">
							</form>
						</div>
						<div class="button">
							<form>
								<input type="submit" value="Subscribe">
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="blo-top1">
					<div class="tech-btm">
						<h4>Top stories of the week </h4>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href="singlepage.html"><img src="{{asset('asset/web/images/6.jpg')}}" class="img-responsive" alt="" /></a>
							</div>
							<div class="blog-grid-right">

								<h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href="singlepage.html"><img src="{{asset('asset/web/images/7.jpg')}}" class="img-responsive" alt="" /></a>
							</div>
							<div class="blog-grid-right">

								<h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href="singlepage.html"><img src="{{asset('asset/web/images/11.jpg')}}" class="img-responsive" alt="" /></a>
							</div>
							<div class="blog-grid-right">

								<h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href="singlepage.html"><img src="{{asset('asset/web/images/9.jpg')}}" class="img-responsive" alt="" /></a>
							</div>
							<div class="blog-grid-right">

								<h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="blog-grids">
							<div class="blog-grid-left">
								<a href="singlepage.html"><img src="{{asset('asset/web/images/10.jpg')}}" class="img-responsive" alt="" /></a>
							</div>
							<div class="blog-grid-right">

								<h5><a href="singlepage.html">Pellentesque dui, non felis. Maecenas male</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>

			</div>
			<div class="clearfix"></div>
			<!-- technology-right -->
		</div>
	</div>
	<!-- technology -->
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-left">
				<h6>THIS LOOKS GREAT</h6>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt consectetur adipisicing elit,</p>
			</div>
			<div class="col-md-4 footer-middle">
				<h4>Twitter Feed</h4>
				<div class="mid-btm">
					<p>Consectetur adipisicing</p>
					<p>Sed do eiusmod tempor</p>
					<a href="https://w3layouts.com/">https://w3layouts.com/</a>
				</div>

				<p>Consectetur adipisicing</p>
				<p>Sed do eiusmod tempor</p>
				<a href="https://w3layouts.com/">https://w3layouts.com/</a>

			</div>
			<div class="col-md-4 footer-right">
				<h4>Quick Links</h4>
				<li><a href="#">Eiusmod tempor</a></li>
				<li><a href="#">Consectetur </a></li>
				<li><a href="#">Adipisicing elit</a></li>
				<li><a href="#">Eiusmod tempor</a></li>
				<li><a href="#">Consectetur </a></li>
				<li><a href="#">Adipisicing elit</a></li>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- footer -->
	<!-- footer-bottom -->
	<div class="foot-nav">
		<div class="container">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="videos.html">Videos</a></li>
				<li><a href="reviews.html">Reviews</a></li>
				<li><a href="tech.html">Tech</a></li>
				<li><a href="singlepage.html">Culture</a></li>
				<li><a href="singlepage.html">Science</a></li>
				<li><a href="design.html">Design</a></li>
				<li><a href="business.html">Business</a></li>
				<li><a href="world.html">World</a></li>
				<li><a href="forum.html">Forum</a></li>
				<li><a href="contact.html">Contact</a></li>
				<div class="clearfix"></div>
			</ul>
		</div>
	</div>
	<!-- footer-bottom -->
	<div class="copyright">
		<div class="container">
			<p>© 2016 Business_Blog. All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.send-comment').click(function() {
				var post_id = $('.post_id').val();
				var name = $('.name').val();
				var created_at = new Date();
				var desc = $('.comment_content').val();
				var _token = $('input[name="_token"]').val();
				console.log(_token, desc, created_at, post_id, name);
				$.ajax({
					url: "{{url('/send-comment')}}",
					method: "POST",
					data: {
						post_id: post_id,
						name: name,
						desc: desc,
						created_at: created_at,
						_token: _token
					},
					success: function(data) {

						$('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
						load_comment();
						$('#notify_comment').fadeOut(9000);
						$('.comment_content').val('');
					}
				});
			});

			$('.btn-reply-comment').click(function() {
				var id = $(this).data('comment_id');
				var desc = $('.reply_comment_' + id).val();
				var post_id = $(this).data('post_id');
				$.ajax({
					url: "{{url('/admin/reply-comment')}}",
					method: "POST",

					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						desc: desc,
						id: id,
						post_id: post_id
					},
					success: function(data) {
						location.reload();
					}
				});
			});
		});

		$('.read-more-content').addClass('hide_content')
		$('.read-more-show, .read-more-hide').removeClass('hide_content')

		// Set up the toggle effect:
		$('.read-more-show').on('click', function(e) {
			$(this).next('.read-more-content').removeClass('hide_content');
			$(this).addClass('hide_content');
			e.preventDefault();
		});

		// Changes contributed by @diego-rzg
		$('.read-more-hide').on('click', function(e) {
			var p = $(this).parent('.read-more-content');
			p.addClass('hide_content');
			p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
			e.preventDefault();
		});
	</script>
	<script src="{{asset('asset/admin/js/comments.js')}}"></script>
</body>

</html>