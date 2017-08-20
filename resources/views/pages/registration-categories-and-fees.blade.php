@extends('layout.main')

@section('title')
	Registration Categories and Fees | 
@stop

@section('head')

@stop

@section('content')
	<div class="bg-white padding page-content">
		<h3 class="text-center">Registration Categories and Fees</h3>
		<hr />
		<div>
			<h4 class="text-center">FOREIGN DELEGATES</h4>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="info">
						<th style="vertical-align: top;">FOREIGN DELEGATES
						</th>
						<th style="vertical-align: top; text-align: center;">EARLY BIRD UNTIL <br />August 15 - 31, 2017</th>

						<th style="vertical-align: top; text-align: center;">
							REGULAR REGISTRATION <br />SEPTEMBER 1 - 28, 2017<br />
							<span class="text-danger">PENALTY FEE:</span><br />
							USD 50.00
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>AMIC Member</td>
						<td>USD 250.00</td>
						<td>USD 400.00</td>
					</tr>
					<tr>
						<td>Non-AMIC Member</td>
						<td>USD 400.00</td>
						<td>USD 550.00</td>
					</tr>
					<tr>
						<td>Foreign Student</td>
						<td>USD 250.00</td>
						<td>USD 300.00</td>
					</tr>
					<tr>
						<td colspan="5"><small><i>Deadline of Full Payment of Conference Fee is on August 31, 2017. Late payment penalty of USD 50.00 applies.</i></small></td>
					</tr>
				</tbody>
			</table>
		</div>
		Inclusions:<br />
		<ul>
			<li>Conference Kit</li>
			<li>Conference Meals</li>
			<li>Conference Organized City Tour with Lunch</li>
		</ul>
		<hr />
		<div>
			<h4 class="text-center">LOCAL DELEGATES</h4>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr class="info">
						<th style="vertical-align: top;">LOCAL DELEGATES
						</th>
						<th style="vertical-align: top; text-align: center;">LOCAL RATE PER DAY UNTIL <br />AUGUST 31, 2017</th>
						<th style="vertical-align: top; text-align: center;">
							LOCAL RATE PER DAY <br />SEPTEMBER 1 - 28, 2017<br />
							{{-- <span class="text-danger">PENALTY FEES (Except Local Student Observer):</span><br />
							PHP 1,000.00 <small>(AMIC and Non-AMIC Members)</small><br />
							PHP 200.00 <small>(Graduate and Undergraduate Student)</small> --}}
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>AMIC Member</td>
						<td>PHP 3,000.00</td>
						<td>PHP 4,000.00</td>
					</tr>
					<tr>
						<td>Non-AMIC Member <br />(Inclusive of 1 Year AMIC Membership Fee)</td>
						<td>PHP 5,000.00</td>
						<td>PHP 6,000.00</td>
					</tr>
					<tr>
						<td>Graduate Student (Inclusive of Meals, Except Welcome Dinner)</td>
						<td>PHP 1,500.00</td>
						<td>PHP 2,500.00</td>
					</tr>
					<tr>
						<td>Graduate Student (No Meals Included)</td>
						<td>PHP 1,000.00</td>
						<td>PHP 2,000.00</td>
					</tr>
					<tr>
						<td>Undergraduate Student (Inclusive of Meals, Except Welcome Dinner) </td>
						<td>PHP 800.00</td>
						<td>PHP 1,000.00</td>
					</tr>
					<tr>
						<td>Undergraduate Student (No Meals Included)</td>
						<td>PHP 500.00</td>
						<td>PHP 500.00</td>
					</tr>
				</tbody>
			</table>
		</div>
		<strong class="text-danger">Note:</strong> Conference Organized City Tour is not included in the Local Delegates Package{{--. However, delegates who are interested in the said tour may directly contact the travel agency through this <a href="http://www.sharptravelservice.com/contact-us" target="_blank">link --}}</a>.
		<br /><br />
		Inclusions:
		<ul>
			<li>Conference Kit</li>
			<li>Meals Per Day <b>(Except where indicated)</b></li>
		</ul>
		
		<hr />
		<h4><b>PAY VIA BANK DEPOSIT</b></h4>

		<p><i>Registration fees are categorized depending on your registration type and the date and time when your payment is remitted.</i></p>

		<p><b>1. Peso Payments for Local Delegates:</b><br />
		Bank of the Philippine Islands (BPI)<br />
		Savings Account Number <b>0183 374 869</b></p>

		<p><b>2. Foreign Currency Payments for Foreign Delegates:</b><br />
		Bank of the Philippine Islands (BPI) <br />
		Savings Account Number <b>0184 030 594</b><br />
		Swift Code: <b>BOPIPHMM</b></p>

		<p><u>Make payments to:</u> <b>ASIAN MEDIA INFORMATION AND COMMUNICATION CENTRE, INC.</b></p>

		<p><i>As proof of payment, scan and email deposit slip to conference@amic.asia. Registrants will receive Registration Payment Confirmation through email. Print a copy of emailed Registration Confirmation Payment and present it to the Secretariat on the day of the event.</i></p>
		<br />

		<h4><b>PAY VIA CREDIT CARD</b></h4>
		<p>Credit card payment facility is now available at <a href="http://amicmanila2017.net">amicmanila2017.net</a>. Once transaction is completed, you will receive an email confirmation as proof of your payment.</p>
		<p>Those who have registered before the installation of the new online payment gateway, and would like to complete their payment using credit card, simply go <a href="http://amicmanila2017.net">amicmanila2017.net</a> and register again.</p>
		<p>Please note that registration fees are categorized depending on your registration type and the date and time when your payment is remitted. The AMIC Secretariat will collect penalties during the conference in cases when there are discrepancies with the amount remitted. </p>
		<br />
		<p align="right"><a href="{{ route('get-page', ['registration']) }}" class="btn btn-primary">Register Now</a></p>
		<br />
	</div>
@stop

@section('script')

@stop