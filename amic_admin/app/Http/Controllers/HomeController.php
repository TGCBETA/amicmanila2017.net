<?php namespace App\Http\Controllers;

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
	public function index()
	{
		$reg_s = \DB::table('registrations')->get();
		$reg_m = \DB::table('group_registrations')->get();
		$cnt_single=0;
		$cnt_multiple=0;
		foreach ($reg_s as $s)
		{
			$cnt_single=$cnt_single+1;
		}

		foreach ($reg_m as $m)
		{
			$cnt_multiple=$cnt_multiple+1;
		}
		return view('home', ['cnt_single' => $cnt_single], ['cnt_multiple' => $cnt_multiple]);
		//return view('home');
	}

}
