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
	$reg_category = call_user_func_array($getRate, [session('group_reg.reg_category')]);
	$country = call_user_func_array($getCountry, [session('group_reg.country')]);
?>
	
	<div class="bg-white padding page-content">
		@if(Session::has('failedMsg'))
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  			<strong>Error!</strong> {{ session('failedMsg') }}
			</div>
		@endif
		<h3 class="text-center">
			Group Registration Confirmation<br />
			<small>Please confirm your registration below then hit "Proceed" button.</small>
		</h3>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr class="active">
							<th>Delegate Name</th>
							<th>Profession</th>
							<th>Gender</th>
							<th>Phone</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 1; $i <= session('group_reg.no_of_registrants'); $i++)
						    <tr>
						    	<td>{{ session('group_reg.profile' . $i)['firstname'] }} {{ session('group_reg.profile' . $i)['lastname'] }}</td>
						    	<td>{{ session('group_reg.profile' . $i)['profession'] }}</td>
						    	<td>{{ (session('group_reg.profile' . $i)['gender'] == 'male') ? 'Male' : 'Female' }}</td>
						    	<td>{{ session('group_reg.profile' . $i)['phone'] }}</td>
						    	<td>{{ session('group_reg.profile' . $i)['email'] }}</td>
						    </tr>
						@endfor
					</tbody>
				</table>
			</div>
			@if(session('group_reg.country') != 'PH')
				<div class="col-md-12">
					<div class="form-group">
						<label>
							Are you joining the Conference organized city tour?
						</label>
						{{ (session('group_reg.f_city_tour') == 1) ? 'Yes' : 'No' }}
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
							@if(session('group_reg.country') == 'PH')
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
								<td align="right">{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format(session('group_reg.reg_rate'),2,".",",") }}</td>
							</tr>
						@endif
						@if(session('group_reg.l_city_tour') == 1)
							<tr>
								<td>Conference Organized City Tour</td>
								<td align="right">{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format(session('group_reg.l_city_tour_rate'),2,".",",") }}</td>
							</tr>						
						@endif
					</tbody>
					<tfoot>
						@if(session('group_reg.country') == 'PH')
							<tr>
								<td><strong>Number of Days attending</strong></td>
								<td align="right">
									<strong>{{ (session('group_reg.l_conference_day') < 2) ? 1 : 2 }} day(s)</strong>
								</td>
							</tr>
							<tr>
								<td><strong>Number of Delegates</strong></td>
								<td align="right"><strong>{{ (session('group_reg.no_of_registrants') > 5) ? session('group_reg.no_of_registrants') - 1 . ' + 1 Free' : session('group_reg.no_of_registrants') }}</strong></td>
							</tr>
							<tr>
								<td><strong>Total</strong></td>
								<td align="right">
								<?php
									$days = 2;
									if(session('group_reg.l_conference_day') < 2)
										$days = 1;
								?>
									<strong>{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format(session('group_reg.total_fee'),2,".",",") }}</strong>
								</td>
							</tr>
						@else
							<tr>
								<td><strong>Number of Delegates</strong></td>
								<td align="right"><strong>{{ (session('group_reg.no_of_registrants') > 5) ? session('group_reg.no_of_registrants') - 1 . ' + 1 Free' : session('group_reg.no_of_registrants') }}</strong></td>
							</tr>
							<tr>
								<td><strong>Total</strong></td>
								<td align="right"><strong>
									{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format(session('group_reg.total_fee'),2,".",",") }}</strong>
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
					{{ (session('group_reg.payment_opt') == 'bank') ? 'Direct Bank Deposit' : 'Check Payment' }}
				</div>
			</div>
			{!! Form::open(['route' => 'save-group', 'id' => 'formconfirm']) !!}
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
					<button type="submit" class="btn btn-default cancel" value="back" name="back1" id="back1">Back</button>
					<button type="submit" class="btn btn-primary">Proceed</button>
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
