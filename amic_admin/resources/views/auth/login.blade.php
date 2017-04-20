@extends('app')

@section('content')
<div class="login-box">
	<div class="login-logo">
		<a href="{{ url('home') }}"><b>AMIC</b><br>ADMINISTRATOR</a>
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
							 <li overflow:hidden><input name="remember" type="checkbox" value="Remember Me" class="margin-left:10%"> Remember Me </li>
							</label>
						</div>
						</div>
						<!-- /.col -->
						<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
						</div>
						<!-- /.col -->
					</div>


						<!-- <div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div> -->

						<!-- <div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div> -->

						<!-- <div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div> -->

						<!-- <div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>
						</div> -->

						<!-- <fieldset>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">@</span><input class="form-control" placeholder="Email" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
								<button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                       </fieldset> -->

      
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
