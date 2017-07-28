@extends('app')

@section('content')
<section class="content">
	<br />
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><b>Users Table</b></h3>
		</div>
			<div class="box-body">
				<div class="col-md-16">
					<table d="user" class="table table-bordered table-hover">
						<thead>
							<tr>
								<td>No</td>
								<td>Name</td>
								<td>Email</td>
								<td>Type</td>
							</tr>
						</thead>
						<tbody>
						<?php $i=0 ?>
						@foreach ($items as $item)
							<tr>
								<td>{{ ++$i }}</td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->email }}</td>
								<td>
									<select class="drop btn btn-primary dropdown-toggle" id="{{ $item->id }}">
										<option value="{{ $item->type }}">{{ $item->type }}</option>
										@foreach($type as $itype)
											@if($item->type !== $itype->type)
											<option id="type_select" value="{{ $itype->type }}">{{ $itype->type }}</option>
											@endif
										@endforeach
									</select>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
	</div>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><b>User Roles Table</b></h3>
		</div>
			<div class="box-body">
				<div class="col-md-4">
				<form method="get" action="{{ url('/add_user') }}">
					
					<input type="text" name="Add_type" id="Add_type" placeholder="Add User-Type" class="form-control"><br />
					<input type="text" name="Add_description" id="Add_description" placeholder="Add Description" class="form-control"><br />
					<input type="submit" class="btn btn-primary" value="ADD"><br /><br />
				</form>
				</div>

				<div class="col-md-8">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td>No</td>
							<td>Type</td>
							<td>Description</td>
						</tr>
					</thead>
					<tbody>
					<?php $j=0 ?>
					@foreach ($type as $t)
						<tr>
							<td>{{ ++$j }}</td>
							<td>{{ $t->type }}</td>
							<td>{{ $t->description }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				</div>
			</div>
	</div>
</section>	
@endsection

@section('script')
<script type="text/javascript">
     $('.drop').bind("change",function(){
		var id = $(this).attr('id');
		var val = $("#" + id).val();
		alert('USER TYPE UPDATED!');

		var check = "userid=" + id + "&typeid=" + val;
				$.ajax({
					type: 'POST',
					url: './TypeUserUpdate',
					data: check,
					success: function(data) {
						console.log(data);
					}
				});
	 });

</script>
@endsection