@extends('app')

@section('content')


	
		<br>
	<form role="form" class="form-horizontal" method="POST" action="{{ url('/home') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-lg-12">	
					<div class="panel panel-default">
						<div class="panel-heading">Database Summary</div>
					</div>

			<div class="row">
					<div class="panel-body">
						
						<div class="col-lg-6 col-md-6">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-database fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge">{{ $cnt_single }} </div>
											<div>Single <br> Registration!</div>
										</div>
									</div>
								</div>
								<a href="#">
									<div class="panel-footer">
										<span class="pull-left">View all</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</div>

						<div class="col-lg-6 col-md-6">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-database fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												<div class="huge">{{ $cnt_multiple }} </div>
												<div>Multiple <br> Registration!</div>
											</div>
										</div>
									</div>
									<a href="#">
										<div class="panel-footer">
											<span class="pull-left">View all</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div>
						
						</div>


					
				</div>

				









			</div>
		</div>
	</form>

@endsection
