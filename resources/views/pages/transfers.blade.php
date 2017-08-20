@extends('layout.main')

@section('title')
	Transfers | 
@stop

@section('head')

@stop

@section('content')
	<div class="bg-white padding page-content">
		<h3 class="text-center">U-HOP DISCOUNT FOR ALL AMIC DELEGATES<br />
		<small>In need of transfer service?  U-Hop got you covered!</small></h3><br />
		<h4 class="text-center">Travel safe and hassle-free with U-Hop,<br />the best Filipino-developed ride-sharing service in the country,<br />and avail its exclusive discounted fares for AMIC delegates: </h4>
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<img src="{{ asset('/images/U-HOP fees.jpg') }}" class="img-responsive">
				<br />
				<h4 class="text-center color: red"><b style="color: red;">HURRY!</b><br />This promo is valid until  October 26, 2017 only!</h4><br />
				<h4 class="text-center"><b>BOOK NOW!</b></h4>
				<h4 class="text-center"><a href="http://www.amicmanila2017.net/u-hop-form">Click Here</a></h4><br />
				<h4><small>*To subscribe and avail other U-Hop services, you may visit their website at: <br /><a href="http://www.u-hop.net">www.u-hop.net</a>.</small></h4>
			</div>
		</div>
		<br />
	</div>
@stop

@section('script')

@stop