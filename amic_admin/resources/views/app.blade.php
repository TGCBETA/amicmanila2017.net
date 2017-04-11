<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Amic Manila 2017 - ADMIN</title>

	<!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> -->

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link href="{{ asset('/resources/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('/resources/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/resources/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('/resources/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="wrapper">
	
					@if (Auth::guest())
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle Navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="{{ url('../public') }}">AMIC Manila 2017</a>
							</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">

						<li><a href="{{ url('/password/email') }}">Forgot Your Password?</a></li>
						<!-- <li><a href="{{ url('/auth/register') }}">Register</a></li> -->
							</ul>
						</div>
					</div>
					</nav>
					@yield('content')
					@else
					
					<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
								<button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="true">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="{{ url('/home') }}" role="button" ><i class="fa fa-lock fa-5"><b> AMIC MANILA 2017 </b></i></a>
							</div>

								<ul class="nav navbar-top-links navbar-right">
									&nbsp Welcome, <b> {{ Auth::user()->name }} !  &nbsp |</b>
									<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								</ul>

							<div class="navbar-default sidebar" role="navigation">
					
						<div class="sidebar-nav navbar-collapse">
							<ul class="nav" id="side-menu">
							
								<li>
									<a href="{{ url('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
								</li>
									</li>
							</ul>
						</div>			
					</nav>

					 	<div id="page-wrapper">
							@yield('content')
						</div>	
					@endif
	
	
	</div>

	

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('/resources/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/resources/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('/resources/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('/resources/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/resources/vendor/morrisjs/morris.min.js') }}"></script>
    <!-- <script src="../data/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/resources/dist/js/sb-admin-2.js') }}"></script>
</body>
</html>
