<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Registration;
use App\GroupRegistration;

class BankController extends Controller {

	public function processBank(){
		//send notification
		Registration::generateConfirmationNo(session('single_reg.id'));
		$registration = Registration::find(session('single_reg.id'));


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
		return redirect()->route('return-process-bank');
	}

	public function bankReturn(){
		\Session::flush();
		return view('bank.bank-return');
	}

	public function processBankGroup(){
		if(session('group_reg') == '')
			return redirect()->route('get-registration');



		//send notification
		GroupRegistration::generateConfirmationNo(session('group_reg.id'));
		$group_registration = GroupRegistration::find(session('group_reg.id'));

		//echo dd($group_registration);



		$registrations = \DB::table('registrations')->where('group', '=', $group_registration->id);

		//send mail to group representative
		\Mail::send('email.group-registration-emailnotification-bank', [
			'group_registration' => $group_registration, 
			'registrations' => $registrations,
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
			}], function($message) use ($group_registration){
				$message->from('no-reply@amicmanila2017.net', 'Asian Media Information and Communication Centre, Inc.');
				$message->to($group_registration->email)->subject('Confirmation of Initial Group Registration to the AMIC 25th Annual Conference on ' . date('F d, Y') . '.');
		});

		
		foreach($registrations->get() as $registration){
			Registration::generateConfirmationNo($registration->id);
		}

		
		foreach($registrations->get() as $registration){
			//Registration::generateConfirmationNo($registration->id);
			//$registration = Registration::find($registration->id);
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
		}
		return redirect()->route('return-process-bank');
		
	}

}
