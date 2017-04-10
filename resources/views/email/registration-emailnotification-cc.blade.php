<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<style type="text/css">
			.table{
				width: 100%;
			}

			.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
			    padding: 8px;
			    line-height: 1.42857143;
			    vertical-align: top;
			    border-top: 1px solid #ddd;
			}
			.table tr.active td{
				background-color: #f5f5f5;
			}

			.table-bordered {
				border: 1px solid #ddd;
			}

			.table .label {
				width: 40%;
				margin:0px 5px;
			}
			.text-danger {
			    color: #a94442;
			}
		</style>
	</head>
	<body style="background-color: #eee; padding-top: 10px;">
		<?php 
			$reg_category = call_user_func_array($getRate, [$registration->reg_category]);
			$country = call_user_func_array($getCountry, [$registration->country]);
		?>
		<table width="600" align="center" style="background-color: #fff;">
			<tr>
				<td>
			    	<img src="http://www.amicmanila2017.net/images/amic_emailbanner.jpg" style="width: 100%; height:auto;" />
			    </td>
			</tr>
			<tr>
				<td style="padding:0px 10px;">
					<br />
					<p>Greetings!</p><br />
					<p>Thank you for your initial registration to the AMIC 25th Annual Conference which will be held from September 27 to 29, 2017, at <strong>Miriam College, Katipunan Avenue, Loyola Heights, Quezon City, Philippines</strong>.<br />
					Your registration details have been received. Please take a moment to verify your registration information below:</p><br />
					<p><h2><strong>Confirmation No: </strong><small>{{ $registration->confirmation_no }}</small></h2></p>
					<p>
						<h3>Delegate Information</h3>
						<table style="" class="table">
							<tbody>
								<tr>
									<td class="label"><strong>Firstname</strong></td>
									<td>{{ $registration->firstname }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Lastname</strong></td>
									<td>{{ $registration->lastname }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Company/Organization/School</strong></td>
									<td>{{ $registration->organization }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Nationality</strong></td>
									<td>{{ $registration->nationality }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Profession</strong></td>
									<td>{{ $registration->profession }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Gender</strong></td>
									<td>{{ ($registration->gender == 'male') ? 'Male' : 'Female' }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Phone</strong></td>
									<td>{{ $registration->phone }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Email</strong></td>
									<td>{{ $registration->email }}</td>
								</tr>
							</tbody>
						</table>
					</p>
					<p>
						<h3>Mailing Address</h3>
						<table style="" class="table">
							<tbody>
								<tr>
									<td class="label"><strong>Address</strong></td>
									<td>{{ $registration->address1 }}</td>
								</tr>
								<tr>
									<td class="label"><strong>City</strong></td>
									<td>{{ $registration->city }}</td>
								</tr>
								<tr>
									<td class="label"><strong>State/Province</strong></td>
									<td>{{ $registration->province }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Country</strong></td>
									<td>{{ $registration->country }}</td>
								</tr>
								<tr>
									<td class="label"><strong>Zipcode</strong></td>
									<td>{{ $registration->zipcode }}</td>
								</tr>
							</tbody>
						</table>
					</p>
					@if($registration->country != 'PH')
						<p>
							<label>
									<strong>Are you joining the Conference organized city tour?</strong>
								</label>
								{{ ($registration->f_city_tour == 1) ? 'Yes' : 'No' }}
						</p>
					@endif
					<p>
						<table class="table table-bordered">
							<thead>
								<tr class="active">
									<th colspan="2">Breakdown of Fees</th>
								</tr>
								<tr>
									@if($registration->country == 'PH')
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
										<td align="right">{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format($registration->reg_rate,2,".",",") }}</td>
									</tr>
								@endif
								@if($registration->l_city_tour == 1)
									<tr>
										<td>Conference Organized City Tour</td>
										<td align="right">{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format($registration->l_city_tour_rate,2,".",",") }}</td>
									</tr>						
								@endif
							</tbody>
							<tfoot>
								@if($registration->country == 'PH')
									<tr>
										<td><strong>Number of Days attending</strong></td>
										<td align="right">
											<strong>{{ ($registration->l_conference_day < 2) ? 1 : 2 }} day(s)</strong>
										</td>
									</tr>
									<tr>
										<td><strong>Total</strong></td>
										<td align="right">
										<?php
											$days = 2;
											if($registration->l_conference_day < 2)
												$days = 1;
										?>
											<strong>{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format($registration->reg_rate * $days + $registration->l_city_tour_rate,2,".",",") }}</strong>
										</td>
									</tr>
								@else
									<tr>
										<td><strong>Total</strong></td>
										<td align="right"><strong>
											{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format($registration->reg_rate,2,".",",") }}</strong>
										</td>
									</tr>
								@endif
							</tfoot>
						</table>
					</p>
					<p>
						<label>
							<strong>Payment Option:</strong>
						</label>
						{{ ($registration->payment_opt == 'bank') ? 'Bank Deposit' : 'Credit Card' }}
					</p>
					<br />
					<p>We look forward to welcoming you in Manila.</p>
					<p></p><br />
					<p>Sincerely,</p><br />

					<p>AMIC Secretariat</p>
					<br />
					<br />
				</td>
			</tr>
			</table>
			<p>&nbsp;</p>

			<p>&nbsp;</p>

	</body>
</html>
