@extends('layout.main')

@section('title')
	
@stop

@section('head')

@stop

@section('content')
	<div class="bg-white page-content" style="padding: 0px 7px;">
	<div class="row" style="background-color: #A6C4D7;">
		<div id="leftpanel" class="col-md-9 no-padding bg-white">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-pause="hover">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="7"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="8"></li>
			    {{-- <li data-target="#carousel-example-generic" data-slide-to="9"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="10"></li> --}}
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	<div class="item active">
			      <a href="{{ route('get-registration') }}"><img src="{{ asset('images/sliders/slider1.jpg') }}" alt="Early Bird" class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/sliders/Amic_slider-13.jpg') }}" alt="Speakers and Moderators" class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/sliders/Amic_slider-14.jpg') }}" alt="Speakers and Moderators" class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
						 <div class="item">
			      <img src="{{ asset('images/sliders/Amic_slider-15.jpg') }}" alt="Speakers and Moderators" class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>

			  	<div class="item">
			      <a href="{{ route('get-registration') }}"><img src="{{ asset('images/sliders/slider7.jpg') }}" alt="" class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <a href="{{ route('get-registration') }}"><img src="{{ asset('images/sliders/slider8.jpg') }}" alt="" class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			   {{-- <div class="item">
			      <a href="{{ route('get-registration') }}"><img src="{{ asset('images/sliders/slider9.jpg') }}" alt="" class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <a href="{{ route('get-registration') }}"><img src="{{ asset('images/sliders/slider10.jpg') }}" alt="" class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div> 
			    </div> --}}
			    <div class="item">
			      <img src="{{ asset('images/sliders/slider3.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/sliders/slider4.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/sliders/slider6.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
			<div class="padding">
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('get-page', ['25th-annual-conference']) }}">
						<img src="{{ asset('images/amic_poster_thumb.jpg') }}" class="img-responsive center-block">
						<h3>25<sup>th</sup> Annual Conference</h3></a>
						<p style="text-align: justify;">The 25th AMIC Conference on 27-29 September 2017 will continue to be intellectually stimulating, plus more.</p>
						<p style="text-align: justify;">As in previous conferences, plenary and parallel sessions will feature debates on current and emerging communication and media issues. There will also be discussions on best practices in communication strategies and tools. </p>
					</div>
					<div class="col-sm-6">
						<a href="{{ route('get-page', ['about-the-venue']) }}">
						<img src="{{ asset('images/miriam-college-thumb.jpg') }}" class="img-responsive center-block">
						<h3>About the Venue</h3></a>
						<p style="text-align: justify;">Miriam (formerly Maryknoll) College is a non-profit, non-stock Catholic educational institution that has offered programs for young women at the basic, tertiary, post-graduate and adult education levels for more than 85 years. The institution also supports specialized centers engaged in curriculum development, research, community outreach and advocacy in the fields of social development, peace education, environmental studies and women’s empowerment. Together, these academic courses and special centers work in harmony to realize Miriam College’s vision as a premier educational institution in the Philippines.</p>
					</div>
				</div>
				
			</div>
			<div class="bg-parallax1 padding">
					<p><strong><h3 class="text-center">Join AMIC Manila 2017’s Essay-Writing Contest 
					and Win Cash and Exciting Prizes!</h3></strong></p>
					<a href="{{ route('get-page', ['essay-contest']) }}"><img src="{{ asset('images/essay-writing.jpg') }}" class="img-responsive center-block"></a>

				</div>
		</div>
		<div id="rightpanel" class="col-md-3 no-padding text-center">
			<h4 class=""><strong>ANNOUNCEMENTS</strong></h4>
			<hr style="border:2px solid #064C7D;" />
			<h5 align="left"><strong>PHILIPPINE AIRLINES SPECIAL ONLINE DISCOUNT (LIMITED OFFER)</strong><p align="left"><i>Posted August 18, 2017</i></p></h5><p align="left">Are you flying in to Manila for the AMIC 25th Annual Conference 2017?  We have great news for you!... <a href="{{ route('get-page', ['flight-booking']) }}">more</a><p>
			<br />


			<h4 class=""><strong>Important Dates</strong></h4>
			<hr style="border:2px solid #064C7D;" />
			<h5><strong>May 31, 2017</strong></h5>
			Deadline for <br />Abstract Submission
			<h5><strong>July 2017</strong></h5>
			Deadline for Full <br />Paper Submission
			<h5><strong>August 15, 2017</strong></h5>
			Deadline for <br />Early Rate Registration for <br />Foreign Delegates
			<h5><strong>August 31, 2017</strong></h5>
			Deadline for <br />Early Rate Registration for <br />local Delegates
			<h5><strong>August 31, 2017</strong></h5>
			Deadline for Regular Rate Registration
			<h5><strong>September 27-28, 2017</strong></h5>
			Conference Dates
			<h5><strong>September 29, 2017</strong></h5>
			Day Tour*<br />
			<p><small>*For those who availed the tour packages</small></p>
			<!--img src="{{ asset('images/twitter_block.png') }}" class="img-responsive" />
			<h4 class="text-white"><strong>Sponsors</strong></h4>
			<div class="row sponsors">
				<div class="col-sm-12 col-xs-4">
					<img src="{{ asset('images/sponsors/sponsor-logo-dummy.jpg') }}" class="img-responsive center-block" />
				</div>
				<div class="col-sm-12 col-xs-4">
					<img src="{{ asset('images/sponsors/sponsor-logo-dummy.jpg') }}" class="img-responsive center-block" />
				</div>
				<div class="col-sm-12 col-xs-4">
					<img src="{{ asset('images/sponsors/sponsor-logo-dummy.jpg') }}" class="img-responsive center-block" />
				</div>
				<div class="col-sm-12 col-xs-4">
					<img src="{{ asset('images/sponsors/sponsor-logo-dummy.jpg') }}" class="img-responsive center-block" />
				</div>
			</div-->
			<br /><br /><br />
			<h4><strong>Download Flyer</strong></h4>
			<hr style="border:2px solid #064C7D;" />
			<img src="{{ asset('images/cover_amic_brochure.jpg') }}" class="img-responsive center-block">
			<br />
			<a href="{{ asset('downloads/amic_brochure_web.pdf') }}" target="_blank" class="btn btn-primary">Download</a>
		</div>
	</div>
	</div>

	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="AMIC_ANNOUNCE" id="AMIC_ANNOUNCE">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <br />
		      </div>
			      <div class="modal-body">
			      	<h1 align="center">ANNOUNCEMENT</h1>
			      	<h4 align="center">Are you flying in to Manila for the AMIC 25th Annual Conference 2017? <br />We have great news for you!</h4>
			      	<br />
			      	<p>We are pleased to inform all AMIC Manila 2017 foreign and local registered delegates that the Philippine Airlines offers you a special online airfare discount, with the following conditions:<p>
			      	<br />

			      	<table class="table table-responsive">
			      		<tr>
			      			<td>Travel Period&nbsp;:&nbsp;</td>
			      			<td>September 20, 2017 to September 30, 2017</td>
			      		</tr>
			      		<tr>
			      			<td>Selling Period&nbsp;:&nbsp;</td>
			      			<td>August 16, 2017 to September 7, 2017</td>
			      		</tr>
			      		<tr>
			      			<td>Booking and Ticketing&nbsp;:&nbsp;</td>
			      			<td>Online via <a href="http://www.philippineairlines.com" taget="_blank">www.philippineairlines.com</a></td>
			      		</tr>
			      		<tr>
			      			<td>Promo Code&nbsp;:&nbsp;</td>
			      			<td>To be provided upon request by emailing <a href="mailto:amicmanila2017@gmail.com">amicmanila2017@gmail.com</a></td>
			      		</tr>
			      		<tr>
			      			<td></td>
			      			<td></td>
			      		</tr>
			      	</table>

			      	<p>For your travel booking inquiries, please contact the Conference’s official travel agency, Sharp Travel Services.  Visit <a href="http://www.sharptravelservices.com" taget="_blank">www.sharptravelservices.com</a>	, call +63 (2) 817 0071 to 74, or email <a href="mailto:ststours.inbound@cfsharp.com">ststours.inbound@cfsharp.com</a> and <a href="mailto:stssales@cfsharp.com">stssales@cfsharp.com</a>. </p>
			      </div>
		    </div>
		  </div>
		</div>
@stop

@section('script')
<script type="text/javascript">
		$(function(){
			$('#AMIC_ANNOUNCE').modal('show')
		});
	</script>
@stop