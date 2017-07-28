@extends('layout.main')

@section('title')
	Hotels | 
@stop

@section('head')

@stop

@section('content')
	<div class="bg-white padding page-content">
		<h3 class="text-center">AMIC Manila 2017 Official Hotel Partner<br />
		<small>In view of Amic Manila 2017’s newly forged exclusive accommodation partnership with Novotel Manila, 
		<br /> hotel and transfer rates will be significantly lowered. </small></h3>
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<img src="{{ asset('/images/hotels/novotel-manila.jpg') }}" class="img-responsive">
				<br />
				<h4>Novotel Manila Araneta Center</h4>
				<table class="table table-bordered table-striped">
					<tbody>
						<tr class="info">
							<td style="width: 30%;">Location</td>
							<td>General Aguinaldo Ave, Cubao, Quezon City, 0810 Metro Manila, Philippines</td>
						</tr>
						<tr>
							<td>Hotel Overview</td>
							<td>Located in the business and leisure district of Quezon City, Novotel Manila Araneta Center has direct access to LRT and MRT Stations, Gateway Mall and Smart Araneta Center. Discover modern comfort in its 401 stylish rooms and suites, experience contemporary casual dining at Food Exchange Manila, and enjoy a drink at the hip Gourmet Bar by Novotel before heading to the trendy Pool and Lounge Bar, Premier Lounge, outdoor Bridal Garden, pillarless Grand Ballroom and 7 spacious meeting rooms.</td>
						</tr>
						<tr>
							<td>Hotel Amenities and Services</td>
							<td>
								<div class="row">
									<div class="col-md-6">
										<ul>
											<li>Activities Desk</li>
											<li>Children Activities</li>
											<li>Bar</li>
											<li>Bell/Porterage Service</li>
											<li>Business Center</li>
											<li>Cafe/Coffee Shop</li>
											<li>Childcare</li>
											<li>Concierge</li>
											<li>Currency Exchange</li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul>
											<li>Dry Cleaning Service</li>
											<li>Fitness Center / Health Club</li>
											<li>Indoor Swimming Pool</li>
											<li>Massage Treatment</li>
											<li>Non-Smoking Room</li>
											<li>Room Service</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Hotel Website and Contact Details:</td>
							<td><a href="http://www.novotel.com/gb/hotel-7090-novotel-manila-araneta-center/index.shtml" target="_blank">http://www.novotel.com/gb/hotel-7090-novotel-manila-araneta-center/index.shtml</a><br />
							Tel: +63 2 990 7888</td>
						</tr>
						<tr>
					</tbody>
				</table>
				<div>
					<h2 align="center">Exclusive Hotel Deal</h2>
					<br />
					<p>AMIC Manila 2017 lets you experience authentic Filipino hospitality with the exquisite hotel and transfer services exclusively provided by Novotel Manila Araneta Center Hotel to AMIC Manila delegates!</p>
					<br />
					<p>Four-star Novotel Hotel offers super affordable and specially arranged room rates, from USD 240 for a one-night stay to USD 500 for a three-night stay, inclusive of the the following:</p>
					<br />
					<ul>
						<li>Buffet breakfast</li>
						<li>Wi-Fi guest room connection</li>
						<li>Two-day round trip drop-off and pick-up shuttle service from hotel to AMIC Conference’s venue on September 27-28, 2017 only</li>
						<li>And round trip airport transfers.</li>
					</ul>
					<br />
					<p>And if you want a total steal on the deal, share a room with a friend or colleague to split the room bill in half! Now, you can’t have it any better than that.</p>
					<br />
					<p>HURRY!  Hotel reservation is valid until 10 September 2017 only. For reservation or details, accomplish the exclusive AMIC- Novotel Hotel Reservation form and email to <a href="">H7090@accor.com.</a></p>
					<br />
					<p align="center"><a href="{{ asset('downloads/AMIC_Novotel_Reservations_Form.pdf') }}" target="_blank" class="btn btn-primary btn-lg">Click Here to Download Reservation Form</a></p>
					<br />
				</div>
			</div>

		</div>


	</div>
@stop

@section('script')

@stop