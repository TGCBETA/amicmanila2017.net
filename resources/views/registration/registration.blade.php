@extends('layout.main')

@section('title')
	Registration
@stop

@section('head')

@stop

@section('content')

	<div class="bg-white padding page-content">
		@if(Session::has('failedMsg'))
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong>Error!</strong> {{ session('failedMsg') }}
			</div>
		@endif
		<h3 class="text-center">
			Registration<br />
			<small>Please select between "Online Payment" or "Bank Deposit" to start.</small>
		</h3>
		<hr />
		<div class="text-center">
			<a href="https://www.gavagives.com/event/registration/amicmanila2017" class="btn btn-lg btn-primary">Online Payment</a>
			<a href="{{ route('get-single-registration') }}" class="btn btn-lg btn-primary">Bank Deposit</a>
		</div>
	</div>

@stop

@section('script')

@stop
