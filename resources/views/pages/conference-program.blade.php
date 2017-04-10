@extends('layout.main')

@section('title')
	Conference Program
@stop

@section('head')

@stop

@section('content')
	<div class="bg-white padding page-content">
		<h4 class="text-center">25TH Annual AMIC Conference</h4>
		<h4 class="text-center">27-29 September 2017, Manila, Philippines</h4>
		<br /><br />
		<h4 class="text-center">Rethinking Communication in a Resurgent Asia</h4>
		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<th></th>
					<th class="text-center">Day 0</th>
					<th class="text-center">Day 1</th>
					<th class="text-center">Day 2</th>
					<th class="text-center">Day 3</th>
				</tr>
				<tr class="info">
					<th></th>
					<th class="text-center">Sept. 26</th>
					<th class="text-center">Sept. 27</th>
					<th class="text-center">Sept. 28</th>
					<th class="text-center">Sept. 29</th>
				</tr>
				<tr class="info">
					<th></th>
					<th class="text-center">Tuesday</th>
					<th class="text-center">Wednesday</th>
					<th class="text-center">Thursday</th>
					<th class="text-center">Friday</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>7:00AM to 8:00AM</td>
					<td rowspan="2"></td>
					<td rowspan="2">REGISTRATION</td>
					<td rowspan="2">REGISTRATION</td>
					<td rowspan="8" style="vertical-align: middle;">CONFERENCE ORGANIZED DAY TOUR (DETAILS TO FOLLOW)</td>
				</tr>
				<tr>
					<td>8:00AM to 9:00AM</td>
				</tr>
				<tr>
					<td>9:00AM to 10:30AM</td>
					<td></td>
					<td>Opening Ceremony</td>
					<td>Plenary Session 2 <br />(University Presidents' Session)  UNESCO</td>
				</tr>
				<tr>
					<td>10:30AM to 12:30NN</td>
					<td></td>
					<td>Plenary Session 1 <br />(AMIC Distinguished Forum)</td>
					<td>PARALLEL SESSIONS<br /> C1 Communication Education, C2 Communication Media (including Asian Traditional / Folk Media)</td>
				</tr>
				<tr>
					<td>12:30NN to 2:00PM</td>
					<td></td>
					<td>Lunch</td>
					<td>Lunch</td>
				</tr>
				<tr>
					<td>2:00PM to 3:30PM</td>
					<td></td>
					<td>PARALLEL SESSIONS <br /> A1 Asian Communication Philosophies, Theories, and Paradigms, A2 Communication and Culture</td>
					<td>PARALLEL SESSIONS <br /> D1 Communication Strategies and Approaches, <br /> D2 Inclusive Knowledge Societies</td>
				</tr>
				<tr>
					<td>3:30PM to 5:00PM</td>
					<td></td>
					<td>PARALLEL SESSIONS <br />B1 Global Communication, B2 Asian Business Communication</td>
					<td>PLENARY SESSION 3 <br />(Closing Plenary/ Closing Ceremony)</td>
				</tr>
				<tr>
					<td>5:00PM to 6:30PM</td>
					<td>Arrival of Delegates</td>
					<td>DINNER</td>
					<td>AMIC General Meeting / Wellness Sessions</td>
				</tr>
				<tr>
					<td>6:30PM to 9:00PM</td>
					<td>Videoke Night/ AMIC GOT TALENT</td>
					<td>AMIC Communications Awards/Cultural Show</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>9:00PM</td>
					<td>DAY ENDS</td>
					<td>DAY ENDS</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>


		<!--table class="table">
			<tr>
				<td colspan="3"><strong>26 September 2017</strong></td>
			</tr>
			<tr>
				<td><strong>Day 0:</strong></td>
				<td>PM:</td>
				<td>
					Registration<br />
					Welcome Cocktails (Karaoke)
				</td>
			</tr>
			<tr>
				<td colspan="3"><strong>27 September 2017 </strong></td>
			</tr>
			<tr>
				<td><strong>Day 1:</strong></td>
				<td>AM: </td>
				<td>
					Registration<br />
					Opening Ceremony (including Keynote Speeches)<br />
					Plenary 1: AMIC Distinguished Forum
				</td>
			</tr>
			<tr>
				<td></td>
				<td>PM: </td>
				<td>
					Parallel Sessions*<br />
					Sessions on Asian Communication Philosophies, Theories, and Paradigms<br />
					Sessions on Communication and Culture<br />
					Wellness Sessions (post-sessions)**<br />
					Gala Dinner and 2017 AMIC Asia Communication Awards
				</td>
			</tr>
			<tr>
				<td colspan="3"><strong>28 September 2017 </strong></td>
			</tr>
			<tr>
				<td><strong>Day 2:</strong></td>
				<td>AM: </td>
				<td>
					Registration<br />
					Plenary Session 2: UNESCO Emeritus Dialogue  - University Presidents' Session<br />
					Challenges to an Inclusive and Quality Education in the Asia-Pacific Region: Charting a Common Response.<br /><br />

					Parallel Sessions*<br />
					Sessions on Communication Education<br />
					Sessions on Communication Media (including Asian Traditional (Folk) Media)

				</td>
			</tr>
			<tr>
				<td></td>
				<td>PM:	</td>
				<td>
					Parallel Sessions*<br />
					Sessions on Communication Strategies and Approaches<br />
					Sessions on Inclusive Knowledge Societies<br />
					AMIC General Membership Meeting<br />
					Wellness Sessions (post-sessions)**

				</td>
			</tr>
			<tr>
				<td colspan="3"><strong>29 September 2017</strong></td>
			</tr>
			<tr>
				<td><strong>Day 3:</strong></td>
				<td>AM: </td>
				<td>
					Plenary Closing Session <br />
					Parallel Sessions*<br />
					Sessions on Global Communication<br />
					Sessions on Asian Business Communication<br />
					Business (Matching) Sessions***<br />
					Wellness Sessions (post-sessions)**

				</td>
			</tr>
			<tr>
				<td></td>
				<td>PM:	</td>
				<td>
					Business (Matching) Sessions<br />
					Closing Ceremony<br />
					City Tour
				</td>
			</tr>
		</table>
		

		Notes:
		*There will be at least five simultaneous parallel sessions 
		**Wellness sessions may include massage, exercises (Tai-chi), etc. to be conducted after plenary/parallel sessions.
		*** Business (matching) sessions will feature launching of products (e.g., books, technologies) and services, dialogue with potential business partners, signing of Memorandum of Understanding/Agreement, etc. A distinct room/hall will be provided for business sessions. 
		-->
	</div>

@stop

@section('script')

@stop
