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
			Group Contact Information<br />
			<small>Please enter your group contact information.</small>
		</h3>
		<hr />
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				{!! Form::open(['route' => 'post-group-contact', 'id' => 'frmgroupcontact']) !!}
				<div class="form-group">
					<label class="control-label">Contact No</label>
					{!! Form::text('group_contact_no', session('group_reg.group_contact_no'), ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<label class="control-label">Email</label>
					{!! Form::text('group_email', session('group_reg.group_email'), ['class' => 'form-control', 'id' => 'group_email']) !!}
				</div>
				<div class="form-group">
					<label class="control-label">Confirm Email</label>
					{!! Form::text('group_confirm_email', session('group_reg.group_confirm_email'), ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<span class="pull-right">
						<button type="submit" class="btn btn-default cancel" value="back" name="back">Back</button>
						<button class="btn btn-primary" id="btnsubmit">Submit</button>
					</span>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@stop

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/group-registration.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			GroupRegistration.initGroupContact();
		});
	</script>
@stop