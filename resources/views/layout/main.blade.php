<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')AMIC 25th Annual Conference</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/override.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}?{{ time() }}" rel="stylesheet">
	 <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
	@yield('head')
</head>
<body>
	<div class="container">
		<a href="{{ url('/') }}"><img src="{{ asset('images/header_web.png') }}?{{ time() }}" class="img-responsive hidden-xs hidden-sm" /></a>
		<a href="{{ url('/') }}"><img src="{{ asset('images/header_mobile_amicbanner_event.png') }}?{{ time() }}" class="img-responsive hidden-lg hidden-md" /></a>
		<nav class="navbar navbar-inverse-blue">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="{{ url('/') }}">Home</a></li>
		        <li class="separator"><span>|</span></li>
		        <li>
		        	<a href="#" class="dropdown dropdown-submenu">Information</a>
		        	<ul class="dropdown-menu">
			            <li><a href="{{ route('get-page', ['message-from-the-chairman']) }}">Message from the BOD Chairman</a></li>
			            <li><a href="{{ route('get-page', ['board-members']) }}">AMIC Board Members</a></li>
			            <li><a href="{{ route('get-page', ['organizing-team']) }}">Organizing Team</a></li>
			            <li><a href="{{ route('get-page', ['about-amic']) }}">About AMIC</a></li>
			            <li><a href="{{ route('get-page', ['25th-annual-conference']) }}">25th Annual Conference</a></li>
			            <li><a href="{{ route('get-page', ['nomination']) }}">Nomination for 2017 AMIC Asia Communication Award</a></li>
			            <li><a href="{{ route('get-page', ['about-manila']) }}">About Manila</a></li>
			            <li><a href="{{ route('get-page', ['about-the-venue']) }}">About the Venue</a></li>
			        </ul>
		        </li>
		        <li class="separator"><span>|</span></li>
		        <li>
		        	<a href="#" class="dropdown dropdown-submenu">Program</a>
		        	<ul class="dropdown-menu">
			            <li><a href="{{ route('get-page', ['conference-program']) }}">Conference Program</a></li>
			            <li><a href="#">Invited Speakers</a></li>
			            <li><a href="{{ route('get-page', ['call-for-papers']) }}">Call for Papers</a></li>
			        </ul>
		        </li>
		        <li class="separator"><span>|</span></li>
		        <li>
		        	<a href="#" class="dropdown dropdown-submenu">Registration and Accomodation</a>
		        	<ul class="dropdown-menu">
		        		<li><a href="{{ route('get-page', ['registration-categories-and-fees']) }}">Registration Categories and Fees</a></li>
			            <li><a href="{{ route('get-registration') }}">Registration</a></li>
			            <li><a href="{{ route('get-page', ['hotel-accomodation']) }}">Hotel Accomodation</a></li>
			        </ul>
		        </li>
		        <li class="separator"><span>|</span></li>
		        <li><a href="{{ route('get-page', ['visa']) }}">Visa and Social Program</a></li>
		        <li class="separator"><span>|</span></li>
		        <li><a href="#">Sponsors and Trade Expo</a></li>
		        <li class="separator"><span>|</span></li>
		        <li><a href="{{ route('get-page', ['contactus']) }}">Contact Us</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="content">
			@yield('content')
		</div>
		<section class="footer2">
			<div class="row">
				<div class="col-md-3">
					<img src="{{ asset('images/amicpng_2.png') }}" class="img-responsive center-block">
					The Asian Media Information and Communication Centre, Inc. (AMIC) is an international non-government organization (NGO) mandated to spearhead communication media development in the Asia Pacific region.
				</div>
				<div class="col-md-3">
					<h4 class="text-white">Follow Us</h4>
					<hr />
					<a href="https://www.facebook.com/Amic-Asia-1535143990118695/" target="_blank" class=""><i class="fa fa-2x fa-facebook"></i></a>
					<a href="https://twitter.com/AMIC_Asia" target="_blank" class=""><i class="fa fa-2x fa-twitter"></i></a>
					<a href="https://www.youtube.com/channel/UCA7Vt-q7nCyy5bUBNl83Ltg" target="_blank" class=""><i class="fa fa-2x fa-youtube-square"></i></a>
				</div>
				<div class="col-md-3">
					<h4 class="text-white">Quick Links</h4>
					<hr />
					<ul class="list-group footer-quick-links">
					  <li class="list-group-item"><a href="{{ route('get-registration') }}">Register</a></li>
					  <li class="list-group-item"><a href="{{ route('get-page', ['25th-annual-conference']) }}">25th Annual Conference</a></li>
					  <li class="list-group-item"><a href="{{ route('get-page', ['about-amic']) }}">About AMIC</a></li>
					  <li class="list-group-item"><a href="{{ route('get-page', ['conference-program']) }}">Conference Program</a></li>
					</ul>
					<!--table class="table">
						<tbody>
							<tr><td>Register</td></tr>
							<tr><td>25th Annual Conference</td></tr>
							<tr><td>About AMIC</td></tr>
							<tr><td>Conference Program</td></tr>
						</tbody>
					</table-->
				</div>
				<div class="col-md-3">
					<h4 class="text-white">Contact Us</h4>
					<hr />
					AMIC Office<br />
					Philippine Women's University<br />
					1743 Taft Avenue, Manila 1004, Philippines<br /><br />
					Telephone: (632) 465-1777<br />
					Fax: (632) 526-6935<br />
					Email: conference@amic.asia<br />
					Website: <a href="http://www.amic.asia" target="_blank">http://www.amic.asia</a><br />
				</div>
			</div>
		</section>
		<footer>
			<small>&copy; {{ date('Y') }} Asian Media Information and Communication Centre</small>
		</footer>
	</div>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	@yield('script')
</body>
</html>