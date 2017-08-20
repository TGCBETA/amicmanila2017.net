<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Response;
use Excel;
use DB;
use App\Registration;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$reg_s = Registration::get();
		$reg_m = Registration::where('paid', '1')->get();
		
		$cnt_single = count($reg_s);
		$cnt_paid = count($reg_m);
		
		$items = Registration::withTrashed()->get();
		$countries = \DB::table('countries')->get();
		$user = Auth::user();

		return view('home', ['cnt_single' => $cnt_single, 'getCountry' => function($code){
			$country = \DB::table('countries')->where('code', '=', $code);
			if($country->count()){
				$country = $country->first();
				return $country->name;
			}
			return '';
		}, 'cnt_paid' => $cnt_paid, 'items' => $items, 'countries' => $countries, 'user' => $user])->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function update(Request $request) 
	{
		if($request->ajax()) {
			$paid_id = $request->paid_id;
			if($request->status == "true") $status = 1;
			else $status = 0;
			
			$update = \DB::table('registrations')->where('id', $paid_id);
			$update->update(['paid' => $status]);
        }

	}
	public function attendUpdate(Request $request) 
	{
		if($request->ajax()) {
			$attend_id = $request->attend_id;
			if($request->status == "true") $status = 1;
			else $status = 0;
			
			$update = \DB::table('registrations')->where('id', $attend_id);
			$update->update(['status' => $status]);
        }

	}
	public function CheckInfo(Request $request){

		if($request->ajax()){
			$id = $request->id;
			$reg_s = \DB::table('registrations')->where('id', $id)->first();

			return response()->json($reg_s);
		}
	}
	public function destroy($id){
		$model = Registration::findOrfail($id);

		$model->delete();

		\Session::flash('flash_message', 'Successfully Removed!');

		return back();
	}
	public function RefreshDB(){
		$reg = \DB::table('registrations')->get();

		foreach($reg as $item){
			if(($item->PHP == null) or ($item->USD == null)){
				if($item->currency == 'P'){
					\DB::table('registrations')->where('id', $item->id)->update(['PHP' => $item->total_fee]);
					\DB::table('registrations')->where('id', $item->id)->update(['USD' => '0']);
				}
				else{
					\DB::table('registrations')->where('id', $item->id)->update(['USD' => $item->total_fee]);
					\DB::table('registrations')->where('id', $item->id)->update(['PHP' => '0']);
				}
			}
		}
		


		return back();
	}
	public function chart(){
		$user = Auth::user();
		$rates = \DB::table('new_rates')->get();
		$fchart = \DB::table('tb_fchart')->get();

		echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
		echo "<script type='text/javascript'> google.charts.load('current', {'packages':['bar']}); google.charts.setOnLoadCallback(drawChart);

	      function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          ['REGISTRATION TYPE: FOREIGN DELEGATES', 'TARGET PARTICIPANTS',";
	           foreach($fchart as $i){
	           	echo "'";
	          	echo date('d/m/Y', strtotime($i->date));
	          	echo "',";
	          }
	          echo "],
	          ['AMIC MEMBER', '50',";
	          foreach($fchart as $j){
	          	echo "'";
	          	echo $j->fmember;
				echo "',";
	          }
	          echo "],
	          ['NON AMIC MEMBER', '50',";
	          foreach($fchart as $k){
	          	echo "'";
	          	echo $k->fnonmember;
				echo "',";
	          }
	          echo "],
	          ['FOREIGN STUDENT', '10',";
	          foreach($fchart as $l){
	          	echo "'";
	          	echo $l->fstud;
				echo "',";
	          }
	        echo "],]);
	        
	        var options = {
	          chart: {
	            title: 'FOREIGN DELEGATES',
	            subtitle: '',
	          }
	        };

	        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

	        chart.draw(data, google.charts.Bar.convertOptions(options));
	      }
    </script>";


    	echo "<script type='text/javascript'> google.charts.load('current', {'packages':['bar']}); google.charts.setOnLoadCallback(drawChart);

	      function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          ['REGISTRATION TYPE: FOREIGN DELEGATES', 'TARGET PARTICIPANTS',";
	           foreach($fchart as $i){
	           	echo "'";
	          	echo date('d/m/Y', strtotime($i->date));
	          	echo "',";
	          }
	          echo "],
	          ['AMIC MEMBER', '50',";
	          foreach($fchart as $j){
	          	echo "'";
	          	echo $j->fmember;
				echo "',";
	          }
	          echo "],
	          ['NON AMIC MEMBER', '50',";
	          foreach($fchart as $k){
	          	echo "'";
	          	echo $k->fnonmember;
				echo "',";
	          }
	          echo "],
	          ['FOREIGN STUDENT', '10',";
	          foreach($fchart as $l){
	          	echo "'";
	          	echo $l->fstud;
				echo "',";
	          }
	        echo "],]);
	        
	        var options = {
	          chart: {
	            title: 'FOREIGN DELEGATES',
	            subtitle: '',
	          }
	        };

	        var chart = new google.charts.Bar(document.getElementById('columnchart_material1'));

	        chart.draw(data, google.charts.Bar.convertOptions(options));
	      }
    </script>";
		return view('chart')->with(['user' => $user, 'rates' => $rates]);
	}
	public function AddFdata(Request $request) {
		$user = Auth::user();
		$fchart = \DB::table('tb_fchart')->get();

		$date = $request->date;
		$fmember = $request->fmember;
		$fnonmember = $request->fnonmember;
		$fstud = $request->fstud;

		\DB::table('tb_fchart')->insert(['date' => $date, 'fmember' => $fmember, 'fnonmember' => $fnonmember, 'fstud' => $fstud]);
		return back()->with(['user' => $user, 'fchart' => $fchart]);
	}
}