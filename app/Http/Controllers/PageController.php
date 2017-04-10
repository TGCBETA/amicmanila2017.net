<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {

	public function loadHome(){
		return view('pages.home');
	}

	public function getPage($page){
		if (view()->exists('pages.' . $page)){
			return view('pages.' . $page);
		}
		\App::abort(404);
	}

	public function testMail(){
		
		$registration = \App\Registration::find(session('id'));

		\Mail::send('email.registration-emailnotification-bank', ['registration' => $registration, 
			'getRate' => function($name){
				$rate = \DB::table('rates')->where('rate_name', '=', $name);
				if($rate->count()){
					return $rate->first();
				}
				return '';
			},
			'getCountry' => function($code){
				$country = \DB::table('countries')->where('code', '=', $code);
				if($country->count())
					return $country->first();
				return '';
			}], function($message) use ($registration){
				$message->from('no-reply@amicmanila2017.net', 'Asian Media Information and Communication Centre, Inc.');
				$message->to($registration->email)->subject('Confirmation of Initial Registration of '. $registration->firstname .' '. $registration->lastname .' to the AMIC 25th Annual Conference on ' . date('F d, Y') . '.');
		});
		
		return view('email.registration-emailnotification-bank');
	}

}
