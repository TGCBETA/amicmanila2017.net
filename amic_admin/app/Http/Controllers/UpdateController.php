<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

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
    public function index(Request $request)
	{
         if(Request::ajax()) {
            $data = Input::all();
            print_r($data);die;
         }
         return $data;

		/*$up = $request::input('checkbox1');

        
		\DB::table('registrations')->update(['paid' => 0]);
		if($up === null) return Redirect::back();
		else foreach($up as $pay){
			$update = \DB::table('registrations')->where('id', $pay);	
			$update->update(['paid' => 1]);
		}
		return Redirect::back();*/
	}

}