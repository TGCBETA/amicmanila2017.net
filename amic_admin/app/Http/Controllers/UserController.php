<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Input;

class UserController extends Controller {

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
		$user = Auth::user();
		$items = User::get();
		$type = \DB::table('types')->get();

        return view('user')->with(array('user' => $user, 'items' => $items, 'type' => $type));
    }
    public function add_user(Request $request)
    {	
    	$user = Auth::user();
    	$items = User::get();
    	$type = \DB::table('types')->get();

    	$Add_type = $request->input('Add_type');
    	$Add_description = $request->input('Add_description');
    	$types = \DB::table('types')->insert(['type' => $Add_type, 'description' => $Add_description]);
   
    	return redirect()->back()->with(array('user' => $user, 'items' => $items, 'type' => $type));
    }
    public function TypeUserUpdate(Request $request)
    {
    	if($request->ajax()) {
    		$userid = $request->userid;
			$typeid = $request->typeid;
			
			\DB::table('users')->where('id', $userid)->update(['type' => $typeid]);
        }

    }


}
