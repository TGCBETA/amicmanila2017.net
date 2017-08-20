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
			$reg_category = call_user_func_array($getRate, [$group_registration->reg_category]);
			$country = call_user_func_array($getCountry, [$group_registration->country]);
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
					<p>Dear Representative,</p><br />
					<p>Thank you for your initial registration to the AMIC 25th Annual Conference which will be held from September 27 to 29, 2017, at <strong>Miriam College, Katipunan Avenue, Loyola Heights, Quezon City, Philippines</strong>.<br />
					Your registration details have been received. Please take a moment to verify your registration information below:</p><br />
					<p><h4><strong>Group Confirmation No: </strong><small>{{ $group_registration->confirmation_no }}</small></h4></p>
					<p>
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
								@foreach($registrations->get() as $registration)
								    <tr>
								    	<td>{{ $registration->firstname }} {{ $registration->lastname }}</td>
								    	<td>{{ $registration->profession }}</td>
								    	<td>{{ ($registration->gender == 'male') ? 'Male' : 'Female' }}</td>
								    	<td>{{ $registration->phone }}</td>
								    	<td>{{ $registration->email }}</td>
								    </tr>
								@endforeach
							</tbody>
						</table>
					</p>
					@if($group_registration->country != 'PH')
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
									@if($group_registration->country == 'PH')
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
								@if($group_registration->l_city_tour == 1)
									<tr>
										<td>Conference Organized City Tour</td>
										<td align="right">{{ ($group_registration->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format($group_registration->l_city_tour_rate,2,".",",") }}</td>
									</tr>						
								@endif
							</tbody>
							<tfoot>
								@if($group_registration->country == 'PH')
									<tr>
										<td><strong>Number of Days attending</strong></td>
										<td align="right">
											<strong>{{ ($group_registration->l_conference_day < 2) ? 1 : 2 }} day(s)</strong>
										</td>
									</tr>
									<tr>
										<td><strong>Number of Delegates</strong></td>
										<td align="right"><strong>{{ ($group_registration->no_of_registrants > 5) ? $group_registration->no_of_registrants - 1 . ' + 1 Free' : $group_registration->no_of_registrants }}</strong></td>
									</tr>
									<tr>
										<td><strong>Total</strong></td>
										<td align="right">
										<?php
											$days = 2;
											if($group_registration->l_conference_day < 2)
												$days = 1;
										?>
											<strong>{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format($group_registration->total_fee,2,".",",") }}</strong>
										</td>
									</tr>
								@else
									<tr>
										<td><strong>Number of Delegates</strong></td>
										<td align="right"><strong>{{ $group_registration->no_of_registrants }}</strong></td>
									</tr>
									<tr>
										<td><strong>Total</strong></td>
										<td align="right"><strong>
											{{ ($reg_category->currency == 'U') ? 'USD' : 'PHP' }} {{ number_format($group_registration->total_fee,2,".",",") }}</strong>
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
						{{ ($group_registration->payment_opt == 'bank') ? 'Direct Bank Deposit' : 'Check Payment' }}
					</p>
					<p>BANK PAYMENT DETAILS</p><br />
					<table class="table">
						<tr>
					    	<td colspan="2">
					        	<strong>For Foreign Transfers (Dollar Account):</strong>
					        </td>
					    </tr>
						<tr>
					    	<td>
					        	Account Name:
					        </td>
					        <td>
					        	<strong>ASIAN MEDIA INFORMATION AND COMMUNICATION CENTRE, INC.</strong>
					        </td>
					    </tr>
					    <tr>
					    	<td>
					        	Account No:
					        </td>
					        <td>
					        	<strong>0184-0305-94</strong>
					        </td>
					    </tr>
					    <tr>
					    	<td>
					        	Bank Name:
					        </td>
					        <td>
					        	<strong>Bank of the Philippine Islands</strong>
					        </td>
					    </tr>
					    <tr>
					    	<td>
					        	Swift Code/ BIC Code:
					        </td>
					        <td>
					        	<strong>BOPIPHMM</strong>
					        </td>
					    </tr>
					</table>
					<br />
					<table class="table">
						<tr>
					    	<td colspan="2">
					        	<strong>For Local Peso Deposit (Peso Account):</strong>
					        </td>
					    </tr>
						<tr>
					    	<td>
					        	Account Name:
					        </td>
					        <td>
					        	<strong>ASIAN MEDIA INFORMATION AND COMMUNICATION CENTRE, INC.</strong>
					        </td>
					    </tr>
					    <tr>
					    	<td>
					        	Account No:
					        </td>
					        <td>
					        	<strong>0183-3748-69</strong>
					        </td>
					    </tr>
					    <tr>
					    	<td>
					        	Bank Name:
					        </td>
					        <td>
					        	<strong>Bank of the Philippine Islands</strong>
					        </td>
					    </tr>
					    <tr>
					    	<td>
					        	Swift code:
					        </td>
					        <td>
					        	<strong>BOPIPHMM</strong>
					        </td>
					    </tr>
					</table>
					<br />
					<p>To ensure confirmation of your registration:</p>
    				<p>Please e-mail a scanned copy of your deposit slip as proof of payment to amicmanila2017@gmail.com.</p>
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