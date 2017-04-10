@extends('layout.main')

@section('title')
	Registration
@stop

@section('head')

@stop

@section('content')
	<?php 
		$current = date('Ymd');
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
			Delegate Information<br />
			<small>Please complete the form form below then click "Next" button.</small>
		</h3>
		<hr />
		@if(isset($info))
			{!! Form::model($info, ['route' => ['post-add-registrant', $idx], 'method' => 'PUT', 'id' => 'frmprofile', 'novalidate' => 'novalidate']) !!}
		@else
			{!! Form::open(['route' => ['post-add-registrant', $idx], 'method' => 'put', 'id' => 'frmprofile', 'novalidate' => 'novalidate']) !!}
		@endif

		<div class="row">
			<div class="col-md-12">
				<h3>Registrant # {{ $idx }}</h3>
				<p>
					<span class="text-danger">* - required fields</span>
				</p>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('firstname', 'First name',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('firstname', old('firstname'), ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('lastname', 'Last name',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('lastname', old('lastname'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('organization', 'Company/Organization/School',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('organization', old('organization'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('nationality', 'Nationality',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('nationality', old('nationality'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('profession', 'Profession',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('profession', old('profession'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('gender', 'Gender',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					<select name="gender" id="gender" class="form-control">
						<option value="">Select gender</option>
						<option value="male" {{ (session('group_reg.profile' . $idx)['gender'] == "male") ? 'selected=selected' : ''  }}>Male</option>
						<option value="female" {{ (session('group_reg.profile' . $idx)['gender'] == "female") ? 'selected=selected' : ''  }}>Female</option>
					</select>
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('phone', 'Phone',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('email', 'Email',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-12">
				<h4 class="text-center">
					Mailing Address
					<hr />
				</h4>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('address1', 'Address1',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('address1', old('address1'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('city', 'City',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('province', 'State/Province',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					{!! Form::text('province', old('province'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('country', 'Country',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
					<select class="form-control" name="country" id="country">
						@if($countries->count())
							@foreach($countries->get() as $country)
								@if($country->code == session('group_reg.country'))
									<option value="{{ $country->code }}" {{ (old('country') == $country->code) ? 'selected' : ''  }}>{{ $country->name }}</option>
								@endif
							@endforeach
						@endif
					</select>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('zipcode', 'Zipcode',  ['class' => 'control-label']) !!}
					{!! Form::text('zipcode', old('zipcode'), ['class' => 'form-control']) !!}
				</div>	
			</div>
			<div class="col-md-12">
				<span class="pull-right">
					<div style="display:none;"><button type="submit" class="btn btn-primary" id="btnsubmit">Submit</button></div>
					<button type="submit" class="btn btn-default cancel" value="back" name="back">Back</button>
					@if($idx == 6)
						<button type="submit" class="btn btn-danger cancel" value="skip" name="skip">Skip</button>
					@endif
					<button type="submit" class="btn btn-primary" id="btnsubmit">Submit</button>
				</span>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@stop

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/group-registration.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			GroupRegistration.initProfile();
		});
	</script>
@stop
