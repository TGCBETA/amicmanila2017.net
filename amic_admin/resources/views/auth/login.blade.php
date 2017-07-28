@extends('app')

@section('content')
<div class="login-box">
	<div class="login-logo">
		<img src="{{ asset('resources/img/amicpng_2.png')}}">
		<a href="{{ url('home') }}"><br><b>ADMINISTRATOR</b></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
 	<p class="login-box-msg">Sign in for management</p>
		
				<form role="form" class="form-horizontal" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="form-group has-feedback">
						<input type="email" class="form-control" placeholder="Email" name="email">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
							 <li overflow:hidden><input class="icheckbox_square-blue checked" name="remember" type="checkbox" class="margin-left:10%" value="remember"> &nbsp;&nbsp;<small>Remember Me </small></li>
							</label>
						</div>
						</div>
						<!-- /.col -->
						<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
						</div>
						<!-- /.col -->
					</div>
      
    </form>

    <div class="social-auth-links text-center">
     <div class="panel-body">
			@if (count($errors) > 0)
				<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
				</div>
			@endif
		</div>	
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
