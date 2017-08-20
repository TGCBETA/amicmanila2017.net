@extends('app')

@section('script')

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['REGISTRATION TYPE: LOCAL DELEGATES', 'TARGET PARTICIPANTS', '8/16/17', '8/17/17'],
          ['AMIC MEMBER', 90, 0, 0],
          ['NON AMIC MEMBER', 0, 0, 0],
          ['GRADUATE (WITH MEALS)', 50, 0, 0],
          ['GRADUATE (NO MEALS)', 50, 0, 0],
          ['UNDERGRADUATE (WITH MEALS)', 50, 0, 0],
          ['UNDERGRADUATE (NO MEALS)', 650, 0, 0],
          ['FOC Faculty and Students (50) + Essay (6) - With Meals', 56, 0, 0],
          ['FOC Sponsors + Media Partners - With Meals', 20, 0, 0],
          ['FOC Speakers + BOM + Guests', 0, 0, 0],
        ]);

        var options = {
          chart: {
            title: 'LOCAL DELEGATES',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
@endsection

@section('content')
<br>
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
		@if($user->type == 'SUPERUSER')
		<section class="content">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Input Data</h3>
				</div>

					<div class="box-body">
						<div class="col-md-6" style="border: dashed">
							<h3 class="box-title"><b>FOREIGN DELEGATES</b></h3>
								<form role="form" action="{{ url('/AddFdata') }}" method="get">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<p><b>Date: </b>&nbsp;<input type="date" name="date" id="date" required="true"></p>
									<p><b><h4 class="text-center">Registration Category:</h4></b>
									<p><b>AMIC MEMBER: </b>&nbsp;<input type="text" name="fmember" id="fmember" required="true"></p>
									<p><b>NON - AMIC MEMBER: </b>&nbsp;<input type="fnonmember" name="fnonmember" id="value" required="true"></p>
									<p><b>FOREIGN STUDENTS: </b>&nbsp;<input type="fstud" name="fstud" id="value" required="true"></p>
									<input type="submit" class="btn btn-primary" >
								</form>
						</div>
						<div class="col-md-6" style="border: dashed">
						<h3 class="box-title"><b>LOCAL DELEGATES</b></h3>
							<form role="form" action="{{ url('/AddFdata') }}" method="get">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<p><b>Date: </b>&nbsp;<input type="date" name="date" id="date" required="true"></p>
									<p><b><h4 class="text-center">Registration Category:</h4></b>
									<p><b>AMIC MEMBER: </b>&nbsp;<input type="text" name="lmember" id="lmember" required="true"></p>
									<p><b>NON - AMIC MEMBER: </b>&nbsp;<input type="text" name="lnonmember" id="lnonmember" required="true"></p>
									<p><b>GRADUATE STUDENTS: </b>&nbsp;<input type="text" name="lgrad" id="lgrad" required="true"></p>
									<p><b>GRADUATE STUDENTS (No Meals): </b>&nbsp;<input type="lgradno" name="lgradno" id="value" required="true"></p>
									<p><b>UNDERGRADUATE STUDENTS: </b>&nbsp;<input type="text" name="lunder" id="lunder" required="true"></p>
									<p><b>UNDERGRADUATE STUDENTS (No Meals): </b>&nbsp;<input type="lunderno" name="lunderno" id="value" required="true"></p>
									<input type="submit" class="btn btn-primary" >

							</form>
						</div>
					</div>
			</div>
		</section>
		@endif

		<section class="content">
			<div class="box">
				<div class="box-body">
						<div class="col-md-8">
							<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
						</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="box">
				<div class="box-body">
						<div class="col-md-8">
							<div id="columnchart_material1" style="width: 800px; height: 500px;"></div>
						</div>
				</div>
			</div>
		</section>


@endsection