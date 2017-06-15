@extends('layout.main')

@section('title')
	Single Registration
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
		<h3 class="text-center">Registration</h3>
		<hr />
		{!! Form::open(['route' => 'save-registration', 'id' => 'formregistration', 'novalidate' => 'novalidate']) !!}
			@if(session('single_reg') == '')
				<div class="row">
					<div class="col-md-12">
						<p>
							Please complete the form below then click "Submit" button.<br />
							<span class="text-danger">* - required fields</span>
						</p>
						<h4 class="text-center">
							Delegate Information
							<hr />
						</h4>

					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('firstname', 'Firstname',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('firstname', old('firstname'), ['class' => 'form-control', 'required' => 'required']) !!}
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('lastname', 'Lastname',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
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
								<option value="male" {{ (old('gender') == "male") ? 'selected' : ''  }}>Male</option>
								<option value="female" {{ (old('gender') == "female") ? 'selected' : ''  }}>Female</option>
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
								<option value="">Select Country</option>
								@if($countries->count())
									@foreach($countries->get() as $country)
										<option value="{{ $country->code }}" {{ (old('country') == $country->code) ? 'selected' : ''  }}>{{ $country->name }}</option>
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
						<div id="f_container" style="display:none;">
							<div class="form-group">
								{!! Form::label('city_tour', 'Are you joining the Conference organized city tour? ',  ['class' => 'control-label']) !!}
								<select id="f_city_tour" name="f_city_tour">
									<option value="">Select</option>
									<option value="1" {{ (old('f_city_tour') == '1') ? 'selected' : ''  }}>Yes</option>
									<option value="0" {{ (old('f_city_tour') == '0') ? 'selected' : ''  }}>No</option>
								</select>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="active">
											<th></th>
											<th style="vertical-align: top;">FOREIGN DELEGATES <br /><br />
												Inclusion:<br />
												<ul>
													<li>Conference Kit</li>
													<li>Conference Meals</li>
													<li>Conference Organized City Tour with Lunch</li>
												</ul>
											</th>
											<th style="vertical-align: top; text-align: center;">EARLY BIRD UNTIL JULY 31, 2017</th>
											<th style="vertical-align: top; text-align: center;">REGULAR REGISTRATION AUGUST 1 - 31, 2017</th>
											<th style="vertical-align: top; text-align: center;">
												LATE REGISTRATION SEPTEMBER 1 - 28, 2017<br />
												<span class="text-danger">PENALTY FEE:</span><br />
												USD 50.00
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="radio" name="reg_category" id="f_amic_member" value="f_amic_member" /></td>
											<td>AMIC Member</td>
											<td>USD 250.00</td>
											<td>USD 350.00</td>
											<td>USD 400.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="f_non_amic_member" value="f_non_amic_member" /></td>
											<td>Non-AMIC Member</td>
											<td>USD 400.00</td>
											<td>USD 500.00</td>
											<td>USD 550.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="f_amic_member" value="f_student" /></td>
											<td>Foreign Student</td>
											<td>USD 250.00</td>
											<td>USD 250.00</td>
											<td>USD 300.00</td>
										</tr>
										<tr>
											<td colspan="5"><small><i>Deadline of Full Payment of Conference Fee is on August 31, 2017. Late payment penalty of USD 50.00 applies.</i></small></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="l_container" style="display:none;">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="active">
											<th></th>
											<th style="vertical-align: top;">LOCAL DELEGATES <br /><br />
												Inclusions:
												<ul>
													<li>Conference Kit</li>
													<li>Meals Per Day (Except Local Student Observer)</li>
												</ul>
											</th>
											<th style="vertical-align: top; text-align: center;">LOCAL RATE PER DAY UNTIL AUGUST 31, 2017</th>
											<th style="vertical-align: top; text-align: center;">
												LOCAL RATE PER DAY SEPTEMBER 1 - 28, 2017<br />
												<span class="text-danger">PENALTY FEES (Except Local Student Observer):</span><br />
												PHP 1,000.00 <small>(AMIC and Non-AMIC Members)</small><br />
												PHP 200.00 <small>(Local Student)</small>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="radio" name="reg_category" id="f_amic_member" value="l_amic_member" /></td>
											<td>AMIC Member</td>
											<td>PHP 3,000.00</td>
											<td>PHP 4,000.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="f_amic_member" value="l_non_amic_member" /></td>
											<td>Non-AMIC Member (Inclusive of one (1) Year AMIC Membership Fee)</td>
											<td>PHP 5,000.00</td>
											<td>PHP 6,000.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="f_amic_member" value="l_student" /></td>
											<td>Local Student</td>
											<td>PHP 800.00</td>
											<td>PHP 1,000.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="f_amic_member" value="l_student_observer" /></td>
											<td>Local Student Observer (No Meals Included)</td>
											<td>PHP 500.00</td>
											<td>PHP 500.00</td>
										</tr>

										<tr>
											<td colspan="4" class="active">&nbsp;</td>
										</tr>
										<!--tr>
											<td colspan="4">
												<strong class="text-danger">Note:</strong> Conference Organized City Tour is not included in the Local Delegates Package. However, delegates who are interested in the said tour may directly contact the travel agency through this <a href="http://www.sharptravelservice.com/contact-us" target="_blank">link</a>.
											</td>
										</tr-->
										<tr>
											<td><input type="checkbox" name="l_city_tour" id="l_city_tour" value="l_city_tour" {{ (old('payment_opt') == 'bank') ? 'checked' : ''  }} /></td>
											<td>Conference Organized City Tour (Inclusive of Round Trip Transfers and Lunch)</td>
											<td>PHP 1,000.00</td>
											<td>PHP 1,500.00</td>
										</tr>
										<tr>
											<td colspan="4"><small><i>Deadline of Full Payment of Conference Fee is on August 31, 2017. Late payment penalty of PHP 1,000.00 applies.</i></small></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="form-group">
								{!! Form::label('conference_day', 'On what day are you going to attend? ',  ['class' => 'control-label']) !!}
								<select id="l_conference_day" name="l_conference_day">
									<option value="">Select</option>
									<option value="0" {{ (old('l_conference_day') == '0') ? 'selected' : ''  }}>1st day</option>
									<option value="1" {{ (old('l_conference_day') == '1') ? 'selected' : ''  }}>2nd day</option>
									<option value="2" {{ (old('l_conference_day') == '2') ? 'selected' : ''  }}>1st and 2nd day</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr class="active">
									<th colspan="2">
										Select your payment option
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="width: 25%;">
										<input type="radio" name="payment_opt" id="bank" value="bank" {{ (old('payment_opt') == 'bank') ? 'checked' : ''  }} />
										Bank Deposit
									</td>
									<td>
										Pay through bank deposit. As proof of payment, scan and email deposit slip to <strong>conference@amic.asia</strong>. Registrants will receive Registration Payment Confirmation through email. Print a copy of emailed Registration Confirmation Payment and present it to the Secretariat on the day of the event.
									</td>
								</tr>
								<tr>
									<td>
										<input type="radio" name="payment_opt" id="creditcard" value="creditcard" {{ (old('payment_opt') == 'creditcard') ? 'checked' : ''  }} />
										
		                  				<span class="strong">Credit Card</span> 
		                  				</td>
		                				<td> 
					                		Payment can be made via AMIC's paypal account using a credit card (VISA, MASTERCARD, or AMERICAN EXPRESS). You do not need a paypal account to use your credit card for this purpose.
					                    	<br />
					                    	<img src="{{ asset('images/creditcards.jpg') }}" width="150px" />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-12">
							<button class="btn btn-primary pull-right" id="btnsubmit">Submit</button>
					</div>
				</div>
			@else
				<div class="row">
					<div class="col-md-12">
						<p>
							Please complete the form below then click "Submit" button.<br />
							<span class="text-danger">* - required fields</span>
						</p>
						<h4 class="text-center">
							Delegate Information
							<hr />
						</h4>

					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('firstname', 'First name',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('firstname', session('single_reg.reg_info')['firstname'], ['class' => 'form-control', 'required' => 'required']) !!}
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('lastname', 'Last name',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('lastname', session('single_reg.reg_info')['lastname'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							{!! Form::label('organization', 'Company/Organization/School',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('organization', session('single_reg.reg_info')['organization'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							{!! Form::label('nationality', 'Nationality',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('nationality', session('single_reg.reg_info')['nationality'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							{!! Form::label('profession', 'Profession',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('profession', session('single_reg.reg_info')['profession'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							{!! Form::label('gender', 'Gender',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							<select name="gender" id="gender" class="form-control">
								<option value="">Select gender</option>
								<option value="male" {{ (session('single_reg.reg_info')['gender'] == "male") ? 'selected' : ''  }}>Male</option>
								<option value="female" {{ (session('single_reg.reg_info')['gender'] == "female") ? 'selected' : ''  }}>Female</option>
							</select>
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							{!! Form::label('phone', 'Phone',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('phone', session('single_reg.reg_info')['phone'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							{!! Form::label('email', 'Email',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('email', session('single_reg.reg_info')['email'], ['class' => 'form-control']) !!}
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
							{!! Form::label('address1', 'Address',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('address1', session('single_reg.reg_info')['address1'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('city', 'City',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('city', session('single_reg.reg_info')['city'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('province', 'State/Province',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>
							{!! Form::text('province', session('single_reg.reg_info')['province'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('country', 'Country',  ['class' => 'control-label']) !!} <span class="text-danger">*</span>

							<select class="form-control" name="country" id="country">
								<option value="">Select Country</option>
								@if($countries->count())
									@foreach($countries->get() as $country)
										<option value="{{ $country->code }}" {{ (session('single_reg.reg_info')['country'] == $country->code) ? 'selected=selected' : ''  }}>{{ $country->name }}</option>
									@endforeach
								@endif
							</select>
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('zipcode', 'Zipcode',  ['class' => 'control-label']) !!}
							{!! Form::text('zipcode', session('single_reg.reg_info')['zipcode'], ['class' => 'form-control']) !!}
						</div>	
					</div>
					<div class="col-md-12">
						<div id="f_container" style="display:none;">
							<div class="form-group">
								{!! Form::label('city_tour', 'Are you joining the Conference organized city tour? ',  ['class' => 'control-label']) !!}
								<select id="f_city_tour" name="f_city_tour">
									<option value="">Select</option>
									<option value="1" {{ (session('single_reg.reg_info')['f_city_tour'] == 1) ? 'selected=selected' : ''  }}>Yes</option>
									<option value="0" {{ (session('single_reg.reg_info')['f_city_tour'] == 0) ? 'selected=selected' : ''  }}>No</option>
								</select>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="active">
											<th></th>
											<th style="vertical-align: top;">FOREIGN DELEGATES <br /><br />
												Inclusion:<br />
												<ul>
													<li>Conference Kit</li>
													<li>Conference Meals</li>
													<li>Conference Organized City Tour with Lunch</li>
												</ul>
											</th>
											<th style="vertical-align: top; text-align: center;">EARLY BIRD UNTIL JULY 31, 2017</th>
											<th style="vertical-align: top; text-align: center;">REGULAR REGISTRATION AUGUST 1 - 31, 2017</th>
											<th style="vertical-align: top; text-align: center;">
												LATE REGISTRATION SEPTEMBER 1 - 28, 2017<br />
												<span class="text-danger">PENALTY FEE:</span><br />
												USD 50.00
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="radio" name="reg_category" id="f_amic_member" value="f_amic_member" {{ (session('single_reg.reg_info')['reg_category'] == 'f_amic_member') ? 'checked=checked' : 'checked=checked'  }}/></td>
											<td>AMIC Member</td>
											<td>USD 250.00</td>
											<td>USD 350.00</td>
											<td>USD 400.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="f_non_amic_member" value="f_non_amic_member" {{ (session('single_reg.reg_info')['reg_category'] == 'f_non_amic_member') ? 'checked=checked' : ''  }} /></td>
											<td>Non-AMIC Member</td>
											<td>USD 400.00</td>
											<td>USD 500.00</td>
											<td>USD 550.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="f_student" value="f_student" {{ (session('single_reg.reg_info')['reg_category'] == 'f_student') ? 'checked=checked' : ''  }} /></td>
											<td>Foreign Student</td>
											<td>USD 250.00</td>
											<td>USD 250.00</td>
											<td>USD 300.00</td>
										</tr>
										<tr>
											<td colspan="5"><small><i>Deadline of Full Payment of Conference Fee is on August 31, 2017. Late payment penalty of USD 50.00 applies.</i></small></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="l_container" style="display:none;">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="active">
											<th></th>
											<th style="vertical-align: top;">LOCAL DELEGATES<br /><br />
												Inclusions:
												<ul>
													<li>Conference Kit</li>
													<li>Meals Per Day (Except Local Student Observer)</li>
												</ul>
											</th>
											<th style="vertical-align: top; text-align: center;">LOCAL RATE PER DAY UNTIL AUGUST 31, 2017</th>
											<th style="vertical-align: top; text-align: center;">
												LOCAL RATE PER DAY SEPTEMBER 1 - 28, 2017<br />
												<span class="text-danger">PENALTY FEES (Except Local Student Observer):</span><br />
												PHP 1,000.00 <small>(AMIC and Non-AMIC Members)</small><br />
												PHP 200.00 <small>(Local Student)</small>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="radio" name="reg_category" id="l_amic_member" value="l_amic_member" {{ (session('single_reg.reg_info')['reg_category'] == 'l_amic_member') ? 'checked=checked' : ''  }} /></td>
											<td>AMIC Member</td>
											<td>PHP 5,000.00</td>
											<td>PHP 6,000.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="l_non_amic_member" value="l_non_amic_member" {{ (session('single_reg.reg_info')['reg_category'] == 'l_non_amic_member') ? 'checked=checked' : ''  }} /></td>
											<td>Non-AMIC Member (Inclusive of 1 Year AMIC Membership Fee)</td>
											<td>PHP 7,500.00</td>
											<td>PHP 8,500.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="l_student" value="l_student" {{ (session('single_reg.reg_info')['reg_category'] == 'l_student') ? 'checked=checked' : ''  }} /></td>
											<td>Local Student</td>
											<td>PHP 800.00</td>
											<td>PHP 1,000.00</td>
										</tr>
										<tr>
											<td><input type="radio" name="reg_category" id="l_student_observer" value="l_student_observer" {{ (session('single_reg.reg_info')['reg_category'] == 'l_student_observer') ? 'checked=checked' : ''  }} /></td>
											<td>Local Student Observer (No Meals Included)</td>
											<td>PHP 500.00</td>
											<td>PHP 500.00</td>
										</tr>
										<tr>
											<td colspan="4" class="active">&nbsp;</td>
										</tr>
										<!--tr>
											<td colspan="4">
												<strong class="text-danger">Note:</strong> Conference Organized City Tour is not included in the Local Delegates Package. However, delegates who are interested in the said tour may directly contact the travel agency through this <a href="http://www.sharptravelservice.com/contact-us" target="_blank">link</a>.
											</td>
										</tr-->
										<tr>
											<td><input type="checkbox" name="l_city_tour" id="l_city_tour" value="l_city_tour" {{ (session('single_reg.reg_info')['payment_opt'] == 1) ? 'checked=checked' : ''  }} /></td>
											<td>Conference Organized City Tour (Inclusive of Round Trip Transfers and Lunch)</td>
											<td>PHP 1,000.00</td>
											<td>PHP 1,500.00</td>
										</tr>
										<tr>
											<td colspan="4"><small><i>Deadline of Full Payment of Conference Fee is on August 31, 2017. Late payment penalty of PHP 1,000.00 applies.</i></small></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="form-group">
								{!! Form::label('conference_day', 'On what day are you going to attend? ',  ['class' => 'control-label']) !!}
								<select id="l_conference_day" name="l_conference_day">
									<option value="">Select</option>
									<option value="0" {{ (session('single_reg.reg_info')['l_conference_day'] == '0') ? 'selected' : ''  }}>1st day</option>
									<option value="1" {{ (session('single_reg.reg_info')['l_conference_day'] == '1') ? 'selected' : ''  }}>2nd day</option>
									<option value="2" {{ (session('single_reg.reg_info')['l_conference_day'] == '2') ? 'selected' : ''  }}>1st and 2nd day</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr class="active">
									<th colspan="2">
										Select your payment option
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="width: 25%;">
										<input type="radio" name="payment_opt" id="bank" value="bank" {{ (session('single_reg.reg_info')['payment_opt'] == 'bank') ? 'checked' : ''  }} />
										DIRECT BANK DEPOSIT
									</td>
									<td>
										<p><b>1. Peso Payments for Local Delegates:</b><br />
										Bank of the Philippine Islands (BPI)<br />
										Savings Account Number <b>0183 374 869</b></p>

										<p><b>2. Foreign Currency Payments for Foreign Delegates:</b><br />
										Bank of the Philippine Islands (BPI) <br />
										Savings Account Number <b>0184 030 594</b><br />
										Swift Code: <b>BOPIPHMM</b></p>

										<p><i>As proof of payment, scan and email deposit slip to <strong>conference@amic.asia</strong>. Registrants will receive Registration Payment Confirmation through email. Print a copy of emailed Registration Confirmation Payment and present it to the Secretariat on the day of the event.</i></p>
									</td>
								</tr>
								<tr>
									<td>
										<input type="radio" name="payment_opt" id="check" value="check" {{ (session('single_reg.reg_info')['payment_opt'] == 'check') ? 'checked' : ''  }} />								
		                  				CHECK PAYMENT
		                  				</td>
		                				<td>
					                		<p><u>Make check payable to:</u> <b>ASIAN MEDIA INFORMATION AND COMMUNICATION CENTRE, INC.</b></p>
					                		<u>Send check to:</u>
					                		<p>Asian Media Information and Communication Centre, Inc.<br />
											2nd Floor, Philippine Women's University<br />
											1743 Taft Avenue, Manila 1004<br />
											Philippines.</p>

									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-12">
							<button class="btn btn-primary pull-right" id="btnsubmit">Submit</button>
					</div>
				</div>
			@endif
		{!! Form::close() !!}
	</div>

@stop

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/registration.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			Registration.init();
		});
	</script>
@stop
