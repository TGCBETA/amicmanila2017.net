<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
		$cnt_single=0;
		$cnt_paid=0;
		foreach ($reg_s as $s)
		{
			$cnt_single=$cnt_single+1;
		}

		foreach ($reg_m as $m)
		{
			if($m == '0') {
				$cnt_paid=$cnt_paid+1;
			}
		}

		$items = \DB::table('registrations')->get();
		return view('home', ['cnt_single' => $cnt_single], ['cnt_paid' => $cnt_paid])
        ->with(	compact('items'))->with('i', ($request->input('page', 1) - 1) * 5);
		//return view('home');
	}

}
