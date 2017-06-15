<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Response;

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
		$reg_s = \DB::table('registrations')->get();
		$reg_m = \DB::table('registrations')->select('paid')->get();
		
		$cnt_single = count($reg_s);
		$cnt_paid = count($reg_m);
		
		$items = \DB::table('registrations')->get();
		$countries = \DB::table('countries')->get();

		return view('home', ['cnt_single' => $cnt_single, 'getCountry' => function($code){
			$country = \DB::table('countries')->where('code', '=', $code);
			if($country->count()){
				$country = $country->first();
				return $country->name;
			}
			return '';
		}, 'cnt_paid' => $cnt_paid, 'items' => $items, 'countries' => $countries])->with('i', ($request->input('page', 1) - 1) * 5);
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
}