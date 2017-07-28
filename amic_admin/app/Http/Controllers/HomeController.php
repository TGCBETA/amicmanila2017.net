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
}