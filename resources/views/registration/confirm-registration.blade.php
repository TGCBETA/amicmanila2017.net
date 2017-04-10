@extends('layout.main')

@section('title')
	Confirm Registration
@stop

@section('head')
	<script src='https://www.google.com/recaptcha/api.js'></script>
@stop

@section('content')
<?php 
	$current = date('Ymd');
	$reg_category = call_user_func_array($getRate, [session('single_reg.reg_info')['reg_category']]);
	$country = call_user_func_array($getCountry, [session('single_reg.reg_info')['country']]);
?>
	
	<div class="bg-white padding page-content">
		@if(Session::has('failedMsg'))
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong>Error!</strong> {{ session('failedMsg') }}
			</div>
		@endif
		<h3 class="text-center">Registration Confirmation</h3>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<p>
					Please confirm the information below then click "Proceed" button.
				</p>
				<h4 class="text-center">
					Delegate Information
					<hr />
				</h4>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td style="width: 50%;"><strong>Firstname</strong></td>
							<td>{{ session('single_reg.reg_info')['firstname'] }}</td>
						</tr>
						<tr>
							<td><strong>Lastname</strong></td>
							<td>{{ session('single_reg.reg_info')['lastname'] }}</td>
						</tr>
						<tr>
							<td><strong>Company/Organization/School</strong></td>
							<td>{{ session('single_reg.reg_info')['organization'] }}</td>
						</tr>
						<tr>
							<td><strong>Nationality</strong></td>
							<td>{{ session('single_reg.reg_info')['nationality'] }}</td>
						</tr>
						<tr>
							<td><strong>Profession</strong></td>
							<td>{{ session('single_reg.reg_info')['profession'] }}</td>
						</tr>
						<tr>
							<td><strong>Gender</strong></td>
							<td>{{ (session('single_reg.reg_info')['gender'] == 'male') ? 'Male' : 'Female' }}</td>
						</tr>
						<tr>
							<td><strong>Phone</strong></td>
							<td>{{ session('single_reg.reg_info')['phone'] }}</td>
						</tr>
						<tr>
							<td><strong>Email</strong></td>
							<td>{{ session('single_reg.reg_info')['email'] }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-12">
				<h4 class="text-center">
					Mailing Address
					<hr />
				</h4>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td style="width: 50%;"><strong>Address1</strong></td>
							<td>{{ session('single_reg.reg_info')['address1'] }}</td>
						</tr>
						<tr>
							<td><strong>City</strong></td>
							<td>{{ session('single_reg.reg_info')['city'] }}</td>
						</tr>
						<tr>
							<td><strong>State/Province</strong></td>
							<td>{{ session('single_reg.reg_info')['province'] }}</td>
						</tr>
						<tr>
							<td><strong>Country</strong></td>
							<td>
								@if($country != '')
									{{ $country->name }}
								@else
									{{ session('single_reg.reg_info')['country'] }}
								@endif
							</td>
						</tr>
						<tr>
							<td><strong>Zipcode</strong></td>
							<td>{{ session('single_reg.reg_info')['zipcode'] }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--div class="col-md-6">
				<div class="form-group">
					<label>Firstname</label>
					<span class="form-control">{{ session('reg_info')['firstname'] }}</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Lastname</label>
					<span class="form-control">{{ session('reg_info')['lastname'] }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Company/Organization/School</label>
					<span class="form-control">{{ session('reg_info')['organization'] }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Nationality</label>
					<span class="form-control">{{ session('reg_info')['nationality'] }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Profession</label>
					<span class="form-control">{{ session('reg_info')['profession'] }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Gender</label>
					<span class="form-control">{{ (session('reg_info')['gender'] == 'male') ? 'Male' : 'Female' }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Phone</label>
					<span class="form-control">{{ session('reg_info')['phone'] }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Email</label>
					<span class="form-control">{{ session('reg_info')['email'] }}</span>
				</div>
			</div-->
			<!--div class="col-md-12">
				<h4 class="text-center">
					Mailing Address
					<hr />
				</h4>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Address1</label>
					<span class="form-control">{{ session('reg_info')['address1'] }}</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>City</label>
					<span class="form-control">{{ session('reg_info')['city'] }}</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>State/Province</label>
					<span class="form-control">{{ session('reg_info')['province'] }}</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Country</label>
					<span class="form-control">{{ session('reg_info')['country'] }}</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Zipcode</label>
					<span class="form-control">{{ session('reg_info')['zipcode'] }}</span>
				</div>
			</div-->
			@if(session('single_reg.reg_info')['country'] != 'PH')
				<div class="col-md-12">
					<div class="form-group">
						<label>
							Are you joining the Conference organized city tour?
						</label>
						{{ (session('single_reg.reg_info')['f_city_tour'] == 1) ? 'Yes' : 'No' }}
					</div>
				</div>
			@endif
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr class="active">
							<th>Breakdown of Fees</th>
							<th></th>
						</tr>
						<tr>
							@if(session('single_reg.reg_info')['country'] == 'PH')
								<th colspan="2">Local Delegate</th>
							@else
								<th colspan="2">Foreign Delegate</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@if($reg_category != '')
							<tr>
								<td>{{ $reg_category->desc }}</td>
								<td align="right">{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format(session('single_reg.reg_info')['reg_rate'],2,".",",") }}</td>
							</tr>
						@endif
						@if(session('single_reg.reg_info')['l_city_tour'] == 1)
							<tr>
								<td>Conference Organized City Tour</td>
								<td align="right">{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format(session('single_reg.reg_info')['l_city_tour_rate'],2,".",",") }}</td>
							</tr>						
						@endif
					</tbody>
					<tfoot>
						@if(session('single_reg.reg_info')['country'] == 'PH')
							<tr>
								<td><strong>Number of Days attending</strong></td>
								<td align="right">
									<strong>{{ (session('single_reg.reg_info')['l_conference_day'] < 2) ? 1 : 2 }} day(s)</strong>
								</td>
							</tr>
							<tr>
								<td><strong>Total</strong></td>
								<td align="right">
								<?php
									$days = 2;
									if(session('single_reg.reg_info')['l_conference_day'] < 2)
										$days = 1;
								?>
									<strong>{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format(session('single_reg.reg_info')['reg_rate'] * $days + session('single_reg.reg_info')['l_city_tour_rate'],2,".",",") }}</strong>
								</td>
							</tr>
						@else
							<tr>
								<td><strong>Total</strong></td>
								<td align="right"><strong>
									{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format(session('single_reg.reg_info')['reg_rate'],2,".",",") }}</strong>
								</td>
							</tr>
						@endif
					</tfoot>
				</table>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>
						Payment Option:
					</label>
					{{ (session('single_reg.reg_info')['payment_opt'] == 'bank') ? 'Bank Deposit' : 'Credit Card' }}
				</div>
			</div>
			{!! Form::open(['route' => 'save', 'id' => 'formconfirm']) !!}
			<div class="col-md-12">
				<span class="pull-right">
					Please make sure that you are not a robot.<br /><br />
					<div class="g-recaptcha" data-sitekey="6Lff_v0SAAAAAHQtR6QGeX4XRpDfdj5C0x59RSpl"></div>
				</span>
				<div class="clearfix"></div>
				<br />
			</div>
			<div class="col-md-12">
				<span class="pull-right">
					<button type="submit" class="btn btn-default cancel" value="back" name="back" id="back">Back</button>
					<button type="submit" class="btn btn-primary" id="btnProceed">Proceed</button>
				</span>

			</div>
			{!! Form::close() !!}
		</div>
	</div>

@stop

@section('script')
	<script type="text/javascript">
		$('#formconfirm').submit(function(){
			$('#btnProceed').attr('disabled', 'disabled'); 
		    //$('#back').attr('disabled', 'disabled');
		});
	</script>
@stop
