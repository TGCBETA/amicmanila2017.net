@extends('layout.main')

@section('title')
	About Manila | 
@stop

@section('head')

@stop

@section('content')
	<div class="bg-white padding page-content">
	<br />
	<h3 class="text-center">About the Philippines</h3>
		<hr />
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="{{ asset('images/philippine_flag.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b> The National Flag of the Philippines </b></font></h3>
					<p>(<i>Pambansang Watawat ng Pilipinas</i>) is a horizontal flag bicolor with equal bands of royal blue and scarlet, and with a white, equilateral triangle at the hoist.</p>
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/tarsier.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>The Philippine tarsier</b></font></h3>
        			<p>known locally as <i>mawmag</i> in Cebuano/Visayans and mamag in Luzon, is a species of tarsier endemic to the Philippines.</p>
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/mt-bulusan.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>Mount Bulusan</b></font></h3>
        			<p> or <b>Bulusan Volcano</b>, is the southernmost volcano on Luzon Island in the Republic of the Philippines. It is situated in the province of Sorsogon in the Bicol region, 70 km (43 mi) southeast of Mayon Volcano and approximately 250 km (160 mi) southeast of the Philippine capital of Manila.</p>
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
		<br />
		<p>The Philippines is the third largest English speaking country in the world. It has a rich history combining Asian, European, and American influences. Prior to Spanish colonization in 1521, the Filipinos had a rich culture and were trading with the Chinese and the Japanese. Spain's colonization brought about the construction of Intramuros in 1571, a "Walled City" comprised of European buildings and churches, replicated in different parts of the archipelago. In 1898, after 350 years and 300 rebellions, the Filipinos, with leaders like Jose Rizal and Emilio Aguinaldo, succeeded in winning their independence.</p> 
		<p>In 1898, the Philippines became the first and only colony of the United States. Following the Philippine-American War, the United States brought widespread education to the islands. Filipinos fought alongside Americans during World War II, particularly at the famous battle of Bataan and Corregidor which delayed Japanese advance and saved Australia. They then waged a guerilla war against the Japanese from 1941 to 1945. The Philippines regained its independence in 1946.</p>
		<p>Filipinos are a freedom-loving people, having waged two peaceful, bloodless revolutions against what were perceived as corrupt regimes. The Philippines is a vibrant democracy, as evidenced by 12 English national newspapers, 7 national television stations, hundreds of cable TV stations, and 2,000 radio stations.</p>
		<p>Filipinos are a fun-loving people. Throughout the islands, there are fiestas celebrated everyday and foreign guests are always welcome to their homes.</p>
		<p><a href="http://www.tourism.gov.ph/pages/default.aspx" target="_blank">Click here to view more</a></p>
		<hr />
		<br />
		<h3 class="text-center">About Manila</h3>
		<hr />
		<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="{{ asset('images/manila_slide.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/jeep.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>Jeepney</b></font></h3>
        			<p>Jeepney (<i>Filipino: Dyipni</i>), is the most popular means of public transportation in the Philippines</p>
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/cathedral.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>Manila Cathedral</b></font></h3>
        			<p>is a Roman Catholic basilica located in Manila, Philippines, dedicated to the Blessed Virgin Mary as Our Lady of the Immaculate Conception, the Principal Patroness of the Philippines.</p>
			      </div>
			    </div>
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
		</div>
		<br />
		<p><strong>Overview of the City</strong><br />
		Manila is the capital city of the Philippines, an archipelago of more than 7,000 islands in Southeast Asia, located south of Taiwan and Hong Kong, east of Vietnam, north of Indonesia, Malaysia and Singapore. It is bounded in the east by the Philippine Sea and the Pacific Ocean.</p>
		<p>Manila is located in Luzon, the biggest island. The city occupies an area of 38.55 square kilometers with a 2010 population of 1,652,171 down from 1,660,714 in 2007. It is bounded by the west by the Manila Bay. It is part of the Metro Manila or National Capital Region composed on 16 cities and 1 municipality.</p>
		<p>
			<strong>Demography</strong><br />
			According to international sources, Manila is the second densest city in the world in 2013; previously the densest city in 2007 43,079 per square kilometers (111,576/sq.mile). However, the official country records show that the population density of Manila in year 2010 was 66,140 persons/km², and increase of its 2000 population density of 63,294 persons/km². In 2010, Manila’s population of 1,652,171 registered a 0.44% of its 2000 population of 1,581,082
		</p>
		<a href="http://manila.gov.ph/government/" target="_blank">Click here to view more</a></p>
		<hr />
		<br />
		
		<h3 class="text-center">About Quezon City</h3>
		<hr />
		<div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					<li data-target="#carousel-example-generic" data-slide-to="3"></li>
					<li data-target="#carousel-example-generic" data-slide-to="4"></li>
					<li data-target="#carousel-example-generic" data-slide-to="5"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="{{ asset('images/quezon.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			      <h3><font color="white"><b>The Quezon Memorial Circle</b></font></h3>
			      <p>is a national park, city square and a national shrine located in Quezon City, <br />which became the capital of the Philippines from 1948 to 1976.</p>
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/art-in-island.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>Art in Island</b></font></h3>
        			<p>is Located at 175 15th Ave., Brgy. Socorro, Cubao, Quezon City</p>
					<p align="right"><font size="1px">This image is from: http://www.amusingplanet.com/2015/03/art-in-island-interactive-3d-art-museum.html</font></p>
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('images/hardin.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>Hardin ng mga Bulaklak</b></font></h3>
        			<p>QC Memorial Circle Garden, Pinyahan</p>
			      </div>
			    </div>

					<div class="item">
			      <img src="{{ asset('images/miriam-college.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>Miriam College</b></font></h3>
        			<p>is one of the most renowned and successful schools in the district of Quezon City.</p>
							<p align="right"><font size="1px">This image is from: https://www.hoppler.com.ph/blog/design-and-architecture/top-10-largest-campuses-in-metro-manila-in-terms-of-land-area</font></p>
						</div>
			    </div>
				<div class="item">
			      <img src="{{ asset('images/ateneo-gallery.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>Ateneo Art Gallery</b></font></h3>
        			<p>The Gallery is located at the Rizal Library Special Collections Building, <br />Ateneo de Manila University, Katipunan Avenue, Loyola Heights, Quezon City.</p>
							<p align="center"><font size="1px">This image is from: http://manila-photos.blogspot.com/2010/03/</font></p>
			      </div>
			    </div>
				<div class="item">
			      <img src="{{ asset('images/up-diliman.jpg') }}" alt="..." class="fullwidth img-responsive">
			      <div class="carousel-caption">
			        <h3><font color="white"><b>University of the Philippines Diliman</b></font></h3>
        			<p>is a coeducational, research state university located in Diliman, Quezon City, Philippines. It was established on February 12, 1949 as the flagship campus and seat of administration of the University of the Philippines System, the national university of the Philippines.</p>
					<p align="right"><font size="1px">This image is from: http://manila-photos.blogspot.com/2010/03/https://www.hoppler.com.ph/blog/design-and-architecture/top-10-largest-campuses-in-metro-manila-in-terms-of-land-area</font></p>
			      </div>
			    </div>
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
		</div>
		<br />
		<p>
		Quezon City is the largest city of Metropolitan Manila, which is an urban agglomeration of 16 cities and 1 one municipality. This region is the political, economic, social, cultural, and educational center of the Philippines. As proclaimed by Presidential Decree No. 940, Metro Manila as a whole is the Philippines' seat of government.</p>
		<p>
		<P>
		Of the Metro Manila local governments, Quezon City has the biggest population, constituting 24% of the regional population. With a population of nearly three million, Quezon City is one of the largest sources of manpower in the Philippines, with its employable human resource assets of 1.672 million. More than 20,000 college graduates contribute to its productive pool every year. Its big consumer market is dominated by the youth, with more than 40% of the population younger than 20 years. 
		</p>

		<a href="http://quezoncity.gov.ph/index.php/visiting-qc" target="_blank">Click here to view more</a></p>
		<hr />
		<br />

	</div>

@stop

@section('script')

@stop