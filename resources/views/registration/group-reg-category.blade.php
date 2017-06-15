@extends('layout.main')

@section('title')
	Registration Category
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
			Registration Category and Payment Method<br />
			<small>Please select your registration category.</small>
		</h3>
		<hr />
		{!! Form::open(['route' => 'post-registration-category', 'id' => 'formregcategory']) !!}
		<div class="row">
			<div class="col-md-12">
				@if(session('group_reg.country') != 'PH')
					<div id="f_container">
						<div class="form-group">
							{!! Form::label('city_tour', 'Are you joining the Conference organized city tour? ',  ['class' => 'control-label']) !!}
							<select id="f_city_tour" name="f_city_tour">
								<option value="">Select</option>
								<option value="1" {{ (session('group_reg.f_city_tour') == '1') ? 'selected=selected' : ''  }}>Yes</option>
								<option value="0" {{ (session('group_reg.f_city_tour') == '0') ? 'selected=selected' : ''  }}>No</option>
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
										<td><input type="radio" name="reg_category" id="f_amic_member" value="f_amic_member" {{ (session('group_reg.reg_category') == 'f_amic_member') ? 'checked=checked' : ''  }} /></td>
										<td>AMIC Member</td>
										<td>USD 250.00</td>
										<td>USD 350.00</td>
										<td>USD 400.00</td>
									</tr>
									<tr>
										<td><input type="radio" name="reg_category" id="f_non_amic_member" value="f_non_amic_member" {{ (session('group_reg.reg_category') == 'f_non_amic_member') ? 'checked=checked' : ''  }} /></td>
										<td>Non-AMIC Member</td>
										<td>USD 400.00</td>
										<td>USD 500.00</td>
										<td>USD 550.00</td>
									</tr>
									<tr>
										<td><input type="radio" name="reg_category" id="f_student" value="f_student" {{ (session('group_reg.reg_category') == 'f_student') ? 'checked=checked' : ''  }} /></td>
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
				@else
					<div id="l_container">
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
										<td><input type="radio" name="reg_category" id="l_amic_member" value="l_amic_member" {{ (session('group_reg.reg_category') == 'l_amic_member') ? 'checked=checked' : ''  }} /></td>
										<td>AMIC Member</td>
										<td>PHP 3,000.00</td>
										<td>PHP 4,000.00</td>
									</tr>
									<tr>
										<td><input type="radio" name="reg_category" id="l_non_amic_member" value="l_non_amic_member" {{ (session('group_reg.reg_category') == 'l_non_amic_member') ? 'checked=checked' : ''  }} /></td>
										<td>Non-AMIC Member (Inclusive of 1 Year AMIC Membership Fee)</td>
										<td>PHP 5,000.00</td>
										<td>PHP 6,000.00</td>
									</tr>
									<tr>
										<td><input type="radio" name="reg_category" id="l_student" value="l_student" {{ (session('group_reg.reg_category') == 'l_student') ? 'checked=checked' : ''  }} /></td>
										<td>Local Student</td>
										<td>PHP 800.00</td>
										<td>PHP 1,000.00</td>
									</tr>
									<tr>
										<td><input type="radio" name="reg_category" id="l_student_observer" value="l_student_observer" {{ (session('group_reg.l_student_observer') == 'f_amic_member') ? 'checked=checked' : ''  }} /></td>
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
										<td><input type="checkbox" name="l_city_tour" id="l_city_tour" value="l_city_tour" {{ (session('group_reg.l_city_tour') == 1) ? 'checked=checked' : ''  }} /></td>
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
								<option value="0" {{ (session('group_reg.l_conference_day') == '0') ? 'selected' : ''  }}>1st day</option>
								<option value="1" {{ (session('group_reg.l_conference_day') == '1') ? 'selected' : ''  }}>2nd day</option>
								<option value="2" {{ (session('group_reg.l_conference_day') == '2') ? 'selected' : ''  }}>1st and 2nd day</option>
							</select>
						</div>
					</div>
				@endif
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
								<input type="radio" name="payment_opt" id="check" value="check" {{ (session('single_reg.reg_info')['payment_opt'] == 'check') ? 'checked' : ''  }} />CHECK PAYMENT
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
				<span class="pull-right">
					<button type="submit" class="btn btn-default cancel" value="back" name="back">Back</button>
					<button class="btn btn-primary" id="btnsubmit">Submit</button>
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
			GroupRegistration.initRegCategory();
		});
	</script>
@stop
