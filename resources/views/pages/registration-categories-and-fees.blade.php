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
						<th style="vertical-align: top; text-align: center;">EARLY BIRD UNTIL <br />JULY 31, 2017</th>
						<th style="vertical-align: top; text-align: center;">REGULAR REGISTRATION <br />AUGUST 1 - 31, 2017</th>
						<th style="vertical-align: top; text-align: center;">
							LATE REGISTRATION <br />SEPTEMBER 1 - 28, 2017<br />
							<span class="text-danger">PENALTY FEE:</span><br />
							USD 50.00
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>AMIC Member</td>
						<td>USD 250.00</td>
						<td>USD 350.00</td>
						<td>USD 400.00</td>
					</tr>
					<tr>
						<td>Non-AMIC Member</td>
						<td>USD 400.00</td>
						<td>USD 500.00</td>
						<td>USD 550.00</td>
					</tr>
					<tr>
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
							<span class="text-danger">PENALTY FEES (Except Local Student Observer):</span><br />
							PHP 1,000.00 <small>(AMIC and Non-AMIC Members)</small><br />
							PHP 200.00 <small>(Local Student)</small>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>AMIC Member</td>
						<td>PHP 5,000.00</td>
						<td>PHP 6,000.00</td>
					</tr>
					<tr>
						<td>Non-AMIC Member <br />(Inclusive of 1 Year AMIC Membership Fee)</td>
						<td>PHP 7,500.00</td>
						<td>PHP 8,500.00</td>
					</tr>
					<tr>
						<td>Local Student</td>
						<td>PHP 800.00</td>
						<td>PHP 1,000.00</td>
					</tr>
					<tr>
						<td>Local Student Observer (No Meals Included)</td>
						<td>PHP 500.00</td>
						<td>PHP 500.00</td>
					</tr>
					<tr>
						<td colspan="4"><small><i>Deadline of Full Payment of Conference Fee is on August 31, 2017. Late payment penalty of PHP 1,000.00 applies.</i></small></td>
					</tr>
				</tbody>
			</table>
		</div>
		<strong class="text-danger">Note:</strong> Conference Organized City Tour is not included in the Local Delegates Package. However, delegates who are interested in the said tour may directly contact the travel agency through this <a href="http://www.sharptravelservice.com/contact-us" target="_blank">link</a>.
		<br /><br />
		Inclusions:
		<ul>
			<li>Conference Kit</li>
			<li>Meals Per Day (Except Local Student Observer)</li>
		</ul>
		<hr />
		<h4>PAYMENT OPTIONS</h4>

		<strong>CREDIT CARD/PAYPAL.</strong> Pay through Paypal account or credit card (Visa, MasterCard, or American Express).<br /><br />
		<strong>BANK DEPOSIT.</strong> Pay through bank deposit. As proof of payment, scan and email deposit slip to conference@amic.asia. Registrants will receive Registration Payment Confirmation through email. Print a copy of emailed Registration Confirmation Payment and present it to the Secretariat on the day of the event.<br /><br />
		<strong>ONSITE REGISTRATION.</strong> Registrants may download, print, and fill-out registration form from the website, submit accomplished form to the Secretariat on event day, and pay corresponding conference fees at the Cashier onsite. <br /><br />
		<strong class="text-danger">Note:</strong> Conference Registration fee is based on the actual date of payment, with corresponding applicable penalty for late registrants.
		<p>&nbsp;</p>
	</div>
@stop

@section('script')

@stop