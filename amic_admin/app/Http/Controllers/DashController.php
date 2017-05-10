<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashController extends Controller {

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


    public function index()
	{
        return view('dash');
    }

	public function checkEmail(Request $request)
	{
		if($request->ajax()) {
			$email = $request->email;
			$find = \DB::table('users')->where('email', '=', $email)->count();
			/*$find='0';
			foreach ($emailSelect as $i)
			{
				if($i == $email) {
					$find='1';
				}
			}*/
			return $find;
		}
        //return view('dash');
    }


}
