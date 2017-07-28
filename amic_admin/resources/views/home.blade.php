@extends('app')

@section('content')
	<br>
	<form role="form" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<section class="content-header">
			<h1>
				Home
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Control Panel</li>
			</ol>
			</section>

			<!-- Main content -->
			<section class="content">
						<div class="row">
								<div class="col-lg-4 col-xs-6">
									<!-- small box -->
									<div class="small-box bg-aqua">
											<div class="inner">
												<h3> {{ $cnt_single }} </h3>
												<div>Registration<br>Bank</div>
											</div>
										<div class="icon">
											<i class="fa fa-cog fa-1x fa-fw"></i>
										</div>
										<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
									</div> 
								</div>
								
								<div class="col-lg-4 col-xs-6">
									<!-- small box -->
										<div class="small-box bg-aqua">
												<div class="inner">
												{{--*/ $j=0 /*--}}
												@foreach ($items as $item)
												{{--*/ ($item->paid == 1) ? ++$j : '' /*--}}
												@endforeach
													<h3> {{ $cnt_paid }} / {{ $cnt_single }} </h3>

													<div>Paid<br>Status</div>

												</div>
													<div class="icon">
														<i class="fa fa-cog fa-1x fa-fw"></i>
													</div>
										<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
										</div>
								</div>
								<div class="col-lg-4 col-xs-6" id="refresh">
									<!-- small box -->
										<div class="small-box bg-aqua">
												<div class="inner">
												{{--*/ $j=0 /*--}}
												@foreach ($items as $item)
												{{--*/ ($item->status == 1) ? ++$j : '' /*--}}
												@endforeach
													<h3> {{ $j }} / {{ $cnt_single }} </h3>
												
													<div>Attended<br>Status</div>
												</div>
													<div class="icon">
														<i class="fa fa-cog fa-1x fa-fw"></i>
													</div>
										</div>
								</div>

							</div>
						@if(Session::has('flash_message'))
						    <div class="alert alert-danger"><em> {!! session('flash_message') !!}</em></div>
						@endif
						<!-- Datatable -->
						 <div class="box">
							<div class="box-header">
								<h3 class="box-title">Registration Table</h3>
							</div>
							<!-- /.box-header -->
								<div class="box-body">
								<a href="{{ url('/downloadExcel') }}" class="btn btn-primary"><h5><b>EXCEL EXPORT</b></h5></a>
								<br /><br />
									<table id="example1" class="table table-bordered table-hover">
										<thead>
										<tr>
											<th>No</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Phone</th>
											<th>Email</th>
											<th>Country</th>
											<th>Payment Method</th>
											<th>Registration Rate</th>
											<th>Currency</th>
											<th>Date/Time</th>
											<th>Paid</th>
											<th>Attendance</th>
											@if($user->email == 'canaria97@gmail.com')
											<th>Action</th>
											@endif
										</tr>
										<tbody>
											@foreach ($items as $item)

											@if($item->trashed())
											@else
											<tr data-id="{{ $item->id }}">
												<td>{{ ++$i }}</td>
												<td>{{ $item->firstname }}</td>
												<td>{{ $item->lastname }}</td>
												<td>{{ $item->phone }}</td>
												<td>{{ $item->email }}</td>
												<td>{{ call_user_func_array($getCountry, [$item->country]) }}</td>
												{{--
											@foreach($countries as $key => $code )
												@if($code->code == $item->country)
													<td>{{ $code->name }}</td>
												@endif
											@endforeach
												--}}

												<td>{{ ($item->payment_opt == 'bank') ? 'DIRECT BANK DEPOSIT' : 'CHECK PAYMENT'}}</td>
												<td>{{ $item->reg_rate }}</td>
												<td>{{ ($item->currency == 'U') ? 'USD' : 'PHP' }}</td>
												<td>{{ $item->created_at }}</td>
												<td align="center"><input type="checkbox" class="icheckbox_square-blue checked" id="check_{{ $item->id }}" name="{{ $item->id }}" value="{{ $item->id }}" {{ ($item->paid == 1) ? 'checked=checked' : '' }} onchange="Paid_Up(this);"><br /><b>
												<span id = "response{{ $item->id }}">{{ ($item->paid == 1) ? 'PAID' : 'NOT PAID' }}</span></b></td>
												<td align="center">
													<input type="checkbox" class="icheckbox_square-blue checked" id="attendCheck_{{ $item->id }}" name="{{ $item->id }}" value="{{ $item->id }}" {{ ($item->status == 1) ? 'checked=checked' : '' }} onchange="Attend_Up(this);">
												<br /><b>
												<span id = "attendstat{{ $item->id }}">{{ ($item->status == 1) ? 'YES' : 'NO' }}</span></b>
												</td>
												@if($user->type == 'SUPERUSER')
													<td>
													<form class="delete" action="destroy/{{$item->id}}" method="get">
														 <input type="hidden" name="_method" value="DELETE">
												        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
												        <input type="submit" value="Delete" class="btn btn-danger">	
											        </form>
													</td>
												@endif
											</tr>
											@endif
					  						@endforeach
										</tbody>
									</table>
									
								</div>
							
						<!-- End Datatable -->
						</div>
					</div>
			</section>
		</form>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 align="center" class="modal-title" id="exampleModalLabel"><b>Registration Information</b></h2>
      </div>
      <div class="modal-body">
	    <div class="card">
	    	<h4>Delegate Information: </h4>
	    		<table class="table table-bordered table-responsive">
	    		<tr>
	    			<td align="center"><b>PAID</b><br /> 
	    			<input type="checkbox" class="icheckbox_square-blue checked" id="Paidid" name="Paidid" value="" {{ ($item->paid == 1) ? 'checked=checked' : '' }} onchange="Paid_Up(this);"><br /><b><span id = "responseid">{{ ($item->paid == 1) ? 'PAID' : 'NOT PAID' }}</span></b></td>

	    			<td align="center"><b>ATTENDANCE</b><br />
	    			<input type="checkbox" class="icheckbox_square-blue checked" id="Attendid" name="Attendid" value="" {{ ($item->status == 1) ? 'checked=checked' : '' }} onchange="Attend_Up(this);"><br /><b><span id = "attendstatid">{{ ($item->status == 1) ? 'YES' : 'NO' }}</span></b></td>
	    		</tr>
	    		</table>
		        <table class="table table-bordered table-responsive">
		        	<tr>
		        		<td><b>First Name</b></td>
		        		<td><span id="info_firstname"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Last Name</b></td>
		        		<td><span id="info_lastname"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Company/Organization/School</b></td>
		        		<td><span id="info_organization"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Nationality</b></td>
		        		<td><span id="info_nationality"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Profession</b></td>
		        		<td><span id="info_profession"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Gender</b></td>
		        		<td><span id="info_gender"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Phone</b></td>
		        		<td><span id="info_phone"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Email</b></td>
		        		<td><span id="info_email"></span></td>
		        	</tr>
		        </table>
	  	</div>

	  	<div class="card">
	    	<h4>Address: </h4>
		        <table class="table table-bordered table-responsive">
		        	<tr>
		        		<td><b>Address</b></td>
		        		<td><span id="info_address"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>City</b></td>
		        		<td><span id="info_city"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Province</b></td>
		        		<td><span id="info_province"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Country</b></td>
		        		<td><span id="info_country"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Zipcode</b></td>
		        		<td><span id="info_zip"></span></td>
		        	</tr>
		        </table>
	  	</div>

	  	<div class="card">
	    	<h4>Payment Details: </h4>
		        <table class="table table-bordered table-responsive">
		        	<tr>
		        		<td><b>Conference Organized City Tour</b></td>
		        		<td><span id="info_conference"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Registration Rate</b></td>
		        		<td><span id="info_category"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Going to attend</b></td>
		        		<td><span id="info_days"></span></td>
		        	</tr>
		        	<tr>
		        		<td><b>Payment Method</b></td>
		        		<td><span id="info_payment"></span></td>
		        	</tr>
		        </table>
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
	<script>
		$('#example1 tbody').on( 'click', 'tr', function () {
			var check = "id="+ $(this).data('id');
			$.ajax({
					type: 'POST',
					url: './CheckInfo',
					data: check,
					success: function(data) {
						console.log(data);
						var res = "response"+data.id;
						$('#info_firstname').html(data.firstname);
						$('#info_lastname').html(data.lastname);
						$('#info_organization').html(data.organization);
						$('#info_nationality').html(data.nationality);
						$('#info_profession').html(data.profession);
						$('#info_gender').html(data.gender);
						$('#info_phone').html(data.phone);
						$('#info_email').html(data.email);

						$('#info_address').html(data.address1);
						$('#info_city').html(data.city);
						$('#info_province').html(data.province);
						$('#info_country').html(data.country);
						$('#info_zip').html(data.zipcode);

						if(data.country == 'PH') {
							if(data.l_city_tour == '1') {
								var tour = 'YES';
							}
							else {
								var tour = 'NO';
							}
						}
						else {
							if(data.f_city_tour == '1') {
								var tour = 'YES';
							}
							else {
								var tour = 'NO';
							}
						}

						$('#info_conference').html(tour);

						if(data.currency == 'U') {
							var currency = 'USD';
						}
						else {
							var currency = 'PHP';
						}
						$('#info_category').html(currency + " " + data.reg_rate);
						
						if(data.l_conference_day == '0') {
							var days = '1st Day';
						}
						else if(data.l_conference_day == '1') {
							var days = '2nd Day';
						}
						else {
							var days = '1st and 2nd Day';
						}
						$('#info_days').html(days);

						if(data.payment_opt == 'bank') {
							var payment = 'DIRECT BANK DEPOSIT';
						}
						else {
							var payment = 'CHECK PAYMENT';
						}

						$('#info_payment').html(payment);
						document.getElementById('Paidid').value = data.id;
						document.getElementById('Attendid').value = data.id;
						
						$( "#Paidid" ).prop( "checked", false );
						$( "#Attendid" ).prop( "checked", false );
						$( "#responseid" ).html('NOT YET PAID');
						$( "#attendstatid" ).html('NO');
						if(data.paid == '1'){
							$( "#Paidid" ).prop( "checked", true );
							$( "#responseid" ).html('PAID');
						}
						if(data.status == '1'){
							$( "#Attendid" ).prop( "checked", true );
							$( "#attendstatid" ).html('YES');
						}
					}
				});
	       $('#myModal').modal('show')
	    } );
	</script>

	<script>
	    $(".delete").on("submit", function(){
	        return confirm("Do you want to delete this item?");
	    });
	    $('#myModal').modal('hide');
	</script>
@endsection