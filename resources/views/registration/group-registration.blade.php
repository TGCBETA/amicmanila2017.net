@extends('layout.main')

@section('title')
	Registration
@stop

@section('head')

@stop

@section('content')
	<?php
		$countries = DB::table('countries')->where('status', '=', 1);
	?>
	<div class="bg-white padding page-content">
		@if(Session::has('failedMsg'))
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong>Error!</strong> {{ session('failedMsg') }}
			</div>
		@endif
		<h3 class="text-center">
			Group Registration<br />
			<small>Start group registration by selecting no registrants.</small>
		</h3>
		<hr />
		<div class="">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					{!! Form::open(['route' => 'post-no-of-registrants', 'id' => 'formgroupregistration']) !!}
						<div class="form-group">
							<label class="control-label">No. of Registrants</label>
							<select class="form-control" name="no_of_registrants" id="no_of_registrants">
								<option value="">Select No of Registrants</option>
								<option value="2" {{ (session('group_reg.no_of_registrants') == 2) ? 'selected=selected' : '' }}>2</option>
								<option value="3" {{ (session('group_reg.no_of_registrants') == 3) ? 'selected=selected' : '' }}>3</option>
								<option value="4" {{ (session('group_reg.no_of_registrants') == 4) ? 'selected=selected' : ''}}>4</option>
								<option value="5" {{ (session('group_reg.no_of_registrants') == 5) ? 'selected=selected' : ''}}>5</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Country</label>
							<select class="form-control" name="country" id="country">
								<option value="">Select Country</option>
								@if($countries->count())
									@foreach($countries->get() as $country)
										<option value="{{ $country->code }}" {{ (session('group_reg.country') == $country->code) ? 'selected' : ''  }}>{{ $country->name }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<button class="btn btn-primary pull-right">Next</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@stop

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/group-registration.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			GroupRegistration.initGroupRegistration();
		});
	</script>
@stop
