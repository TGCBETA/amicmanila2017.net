@extends('app')

@section('content')


	
		<br>
	<form role="form" class="form-horizontal" method="POST" action="{{ url('/home') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<section class="content-header">
			<h1>
				Dashboard
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
			</section>

			<!-- Main content -->
			<section class="content">
						<div class="row">
								<div class="col-lg-6 col-xs-6">
									<!-- small box -->
									<div class="small-box bg-aqua">
											<div class="inner">
												<h3> {{ $cnt_single }} </h3>

												<div>Registration<br>Bank</div>
											</div>
										<div class="icon">
											<i class="ion ion-stats-bars"></i>
										</div>
										<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
								
								<div class="col-lg-6 col-xs-6">
									<!-- small box -->
										<div class="small-box bg-aqua">
												<div class="inner">
													<h3> {{ $cnt_paid }} / {{ $cnt_single }} </h3>
												
													<div>Paid<br>Status</div>
												</div>
													<div class="icon">
														<i class="ion ion-stats-bars"></i>
													</div>
											<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										</div>
								</div>
							</div>

						<!-- Datatable -->
						 <div class="box">
							<div class="box-header">
								<h3 class="box-title">Registration Table</h3>
							</div>
							<!-- /.box-header -->
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th>id</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Phone</th>
											<th>Email</th>
											<th>Paid</th>
											<th>Attended</th>
										</tr>
										<tbody>
										@foreach ($items as $key => $item)
										<tr>
											<td>{{ ++$i }}</td>
											<td>{{ $item->firstname }}</td>
											<td>{{ $item->lastname }}</td>
											<td>{{ $item->phone }}</td>
											<td>{{ $item->email }}</td>
											<td><center><input type="checkbox" class="flat-red" name="paid_{{ $i }}"></center></td>
											<td><center><input type="checkbox" class="flat-red" name="Attend_{{ $i }}"></center><center></td>	
										</tr>
										
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
	

@endsection
