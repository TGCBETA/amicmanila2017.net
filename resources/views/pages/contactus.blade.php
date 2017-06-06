@extends('layout.main')

@section('title')
	Contact Us | 
@stop

@section('head')

@stop

@section('content')
	<div class="bg-white padding page-content">
		<h3 class="text-center">
		@if(Session::has('success_msg'))
    		<div class="alert alert-success"><em> {!! session('success_msg') !!}</em></div>
		@endif
			Contact Us<br />
			<small>We will get back to you shortly.</small>
		</h3>
		<hr />
		<div class="row">
			<div class="col-md-6">
				<h4>Contact Details</h4>

				<H4>Mr. Ramon Tuazon</H4>
				Secretary-General of  AMIC President<br />
				Asian Institute of Journalism and Communication (AIJC) Manila<br /><br />

				<strong>Secretariat/Mailing Address:</strong><br />
				Philippine Women's University<br />
				1743 Taft Avenue, Manila 1004, Philippines<br /><br />
				 
				<strong><i class="fa fa-phone text-primary"></i></strong> (632) 465-1777<br />
				<strong><i class="fa fa-fax text-primary"></i></strong> (632) 526-6935<br />
				<strong><i class="fa fa-envelope text-primary"></i></strong> r.tuazon@amic.asia<br />
				<strong><i class="fa fa-globe text-primary"></i></strong> http://www.amic.asia<br />
				<strong><i class="fa fa-facebook text-primary"></i></strong> <a href="https://www.facebook.com/Amic-Asia-1535143990118695" target="_blank">AMIC ASIA Facebook Page</a><br /><br />

				<hr />
				<strong>AMIC at AIJC:</strong><br />
				NOW Planet Bldg., 2244 España Blvd., Sampaloc, Manila<br />
				 
				<strong><i class="fa fa-phone text-primary"></i></strong> (632) 743-4321, (632) 740-0396<br /><br />
			</div>
			<div class="col-md-5">
			@if(count($errors))
			<div class="alert alert-danger">
				@foreach($errors->all() as $error)
					<em> {{ $error }} </em> <br />
				@endforeach
			</div>
			@endif

			{!! Form::open(array('route' => 'send_store', 'class' => 'form')) !!}

				<div class="form-group">
					{!! Form::label('Full Name') !!}
					{!! Form::text('name', old('name'), 
						array('class'=>'form-control')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Email Address') !!}
					{!! Form::text('email', null, 
						array('class'=>'form-control')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Contact Number') !!}
					{!! Form::text('contact', null, 
						array('class'=>'form-control')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Message') !!}
					{!! Form::textarea('message', null, 
						array('class'=>'form-control', 
							'placeholder'=>'Your message')) !!}
				</div>
				<div class="g-recaptcha" data-sitekey="6Lff_v0SAAAAAHQtR6QGeX4XRpDfdj5C0x59RSpl"></div>
				<br />
				<div class="form-group">
					{!! Form::submit('Contact Us!', 
					array('class'=>'btn btn-primary')) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
		<hr />
		<h4>MAP: Philippine Women's University</h4>
		<hr />
		<div class="exrow">
			<div class="col-md-15">			
				<div class="embed-responsive embed-responsive-16by9">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.711082272365!2d120.98830512786046!3d14.57500395114654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9873d0752fb%3A0xae3a5e3e91cc2356!2sPhilippine+Women&#39;s+University+(Manila+Campus)+-+School+of+Nursing!5e0!3m2!1sen!2sph!4v1486622250390" allowfullscreen></iframe>
				</div>
			</div>
		</div>	
		

	</div>

@stop

@section('script')
	
@stop