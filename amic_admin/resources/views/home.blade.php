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
											<i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
										</div>
										<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
									</div> 
								</div>
								
								<div class="col-lg-4 col-xs-6" id="refresh">
									<!-- small box -->
										<div class="small-box bg-aqua">
												<div class="inner">
												{{--*/ $j=0 /*--}}
												@foreach ($items as $key => $item)
												{{--*/ ($item->paid == 1) ? ++$j : '' /*--}}
												@endforeach
													<h3> {{ $j }} / {{ $cnt_single }} </h3>
												
													<div>Paid<br>Status</div>
												</div>
													<div class="icon">
														<i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
													</div>
										<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
										</div>
								</div>
								<div class="col-lg-4 col-xs-6" id="refresh">
									<!-- small box -->
										<div class="small-box bg-aqua">
												<div class="inner">
												{{--*/ $j=0 /*--}}
												@foreach ($items as $key => $item)
												{{--*/ ($item->status == 1) ? ++$j : '' /*--}}
												@endforeach
													<h3> {{ $j }} / {{ $cnt_single }} </h3>
												
													<div>Attended<br>Status</div>
												</div>
													<div class="icon">
														<i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
													</div>
										<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
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
								<b><p><font color="red">*Note: Once you change the Checkbox status for the field "Paid" and Attended, it is necessary that you must wait for the result below. (eg: if PAID or not NOT PAID).</font></p></b>
									<table id="example1" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th>ID</th>
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
											<td align="center"><input type="checkbox" name="{{ $i }}" value="{{ $i }}" {{ ($item->paid == 1) ? 'checked=checked' : '' }} onchange="Paid_Up(this);"><br /><b><span id = "response{{ $i }}">{{ ($item->paid == 1) ? 'PAID' : 'NOT PAID' }}</span></b></td>
											<td align="center"><input type="checkbox" name="{{ $i }}" value="{{ $i }}" {{ ($item->status == 1) ? 'checked=checked' : '' }} onchange="Attend_Up(this);"><br /><b><span id = "attendstat{{ $i }}">{{ ($item->status == 1) ? 'ATTENDED' : 'NOT ATTENDED' }}</span></b></td>
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
