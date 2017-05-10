@extends('layout.main')

@section('title')
	
@stop

@section('head')

@stop

@section('content')
	<div class="bg-white page-content" style="padding: 0px 7px;">
	<div class="row bg-white">
		<div id="leftpanel" class="col-md-9 no-padding">
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
			    <li data-target="#carousel-example-generic" data-slide-to="9"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="10"></li>
					<li data-target="#carousel-example-generic" data-slide-to="11"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	<div class="item active">
			      <a href="{{ route('get-registration') }}"><img src="{{ asset('images/sliders/slider1.jpg') }}" alt="Early Bird" class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/sliders/slider12.png') }}" alt="Speakers and Moderators" class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/sliders/slider13.jpg') }}" alt="Speakers and Moderators" class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
						 <div class="item">
			      <img src="{{ asset('images/sliders/slider14.png') }}" alt="Speakers and Moderators" class="fullwidth img-responsive">
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
			    <div class="item">
			      <a href="{{ route('get-registration') }}"><img src="{{ asset('images/sliders/slider9.jpg') }}" alt="" class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <a href="{{ route('get-registration') }}"><img src="{{ asset('images/sliders/slider10.jpg') }}" alt="" class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			  	<div class="item">
			      <a href="{{ route('get-page', ['call-for-papers']) }}#abstract"><img src="{{ asset('images/sliders/slider2.jpg') }}" alt="..." class="fullwidth img-responsive"></a>
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
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
				
				<!--p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium ipsum vitae iaculis luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque in nibh massa. Donec neque ex, egestas nec ornare vel, posuere sit amet eros. Etiam auctor pretium dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce bibendum elementum neque, ut porttitor nulla porta ut. Donec nibh eros, volutpat sed lobortis nec, eleifend quis purus. Sed facilisis vitae lectus vitae hendrerit. Aenean sed leo ac tortor vestibulum faucibus. Fusce volutpat rutrum lacus, tempus lacinia dolor accumsan aliquam.</p>
				<p>Suspendisse mollis turpis in pulvinar ultricies. Sed quis tincidunt ex. Curabitur pharetra scelerisque laoreet. Cras elit nunc, varius nec orci non, scelerisque vestibulum mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent suscipit justo in dignissim bibendum. Aliquam erat volutpat. Praesent enim ex, maximus nec nisl sit amet, tempus dictum diam. Cras sit amet nunc in magna feugiat hendrerit. Donec lobortis pellentesque lectus, in feugiat dui. Suspendisse varius eros ac felis tempus pretium. Vivamus nec quam vitae erat pulvinar lobortis.</p>
				<p>Donec ligula ante, viverra at lectus ac, aliquet commodo dui. Cras vel molestie orci, imperdiet blandit felis. Sed laoreet turpis lacus, quis varius massa semper vel. Sed eu convallis diam. Etiam sed neque eget lectus posuere imperdiet. Aliquam sit amet erat tortor. Nunc fringilla, nunc at euismod lobortis, elit tellus rhoncus nunc, nec varius leo erat ac velit.</p>
				<p>Cras sit amet velit a ipsum ultrices volutpat. Nunc vestibulum tempus justo, et malesuada elit varius ut. Mauris velit felis, interdum id mattis sit amet, iaculis sed eros. Morbi eget vestibulum leo. Suspendisse et dui mattis dolor tincidunt vestibulum accumsan ac orci. Phasellus sit amet nibh auctor, efficitur nisi quis, venenatis eros. Integer porta vel diam vel ornare. Ut vehicula orci ut dolor fermentum, vel faucibus lacus mattis. Aliquam ut ligula vel dolor dapibus egestas. Nulla facilisi. Donec euismod luctus nisl, id mattis elit vulputate eu. Nulla facilisi. </p-->
			</div>
			<div class="bg-parallax1 padding">
					<h3 class="text-danger"><i class="fa fa-warning"></i> ATTENTION!!</h3>
					<p><strong><h2>AMIC 25th Conference Call for Papers</h2></strong></p>

					<p>AMIC is now preparing for the 25th AMIC International Conference to be held in Manila on <br> 27-29 September 2017. We are readopting our 2016 conference theme,<i> Rethinking Communication in a Resurgent Asia.</i></p>

					<p>We have attached the Call for Papers for the AMIC Manila 2017 Conference. Please invite your colleagues to submit abstracts of conference papers if they are interested to present. Deadline for submission of new abstracts to our Conference Secretariat is on<font color="red"> 31 May 2017.</font></p>
					<p>Please click <a href="{{ route('get-page', ['call-for-papers']) }}">here</a> for more details.</p>

					<p>Very truly yours,</p>

					<p>
					<strong>Ramon R. Tuazon</strong><br />
					Secretary General
					</p>

				</div>
		</div>
		<div id="rightpanel" class="col-md-3 no-padding text-center">
			<h4 class=""><strong>Important Dates</strong></h4>
			<hr style="border:2px solid #064C7D;" />
			<h5><strong>May 31, 2017</strong></h5>
			Deadline for <br />Abstract Submission
			<h5><strong>July 2017</strong></h5>
			Deadline for Full <br />Paper Submission
			<h5><strong>July 31, 2017</strong></h5>
			Deadline for <br />Early Rate Registration for <br />Foreign Delegates
			<h5><strong>August 31, 2017</strong></h5>
			Deadline for Regular Rate Registration
			<h5><strong>September 27-29, 2017</strong></h5>
			Conference
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
@stop

@section('script')

@stop