<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Registration;
use App\GroupRegistration;

class PaypalController extends Controller {

	public function processPaypal(){

		if(session('single_reg') == '')
			return redirect()->route('get-registration');


		//echo dd(session('reg_info'));


		return view('paypal.paypal');


		//save



		/*
		$currency_code = 'USD';
		if(session('reg_info')['currency'] == 'P')
			$currency_code = 'PHP';
		
		// Prepare GET data
	    $query = array();
	    $query['notify_url'] = route('paypal-postback');
	    $query['cmd'] = '_cart';
	    $query['upload'] = '1';
	    $query['business'] = 'r.tuazon-facilitator@amic.asia';
	    //$query['address_override'] = '1';
	    $query['first_name'] = session('reg_info')['firstname'];
	    $query['last_name'] = session('reg_info')['lastname'];
	    $query['email'] = session('reg_info')['email'];
	    $query['address1'] = session('reg_info')['address1'];
	    $query['city'] = session('reg_info')['city'];
	    $query['state'] = session('reg_info')['province'];
	    $query['zip'] = session('reg_info')['zipcode'];
	    $query['currency_code'] = $currency_code;
	    $query['item_name_0'] = 'AMIC 25th Annual Conference Registration Fee';
	    $query['quantity_0'] = 1;
	    $query['amount_0'] = session('reg_info')['total_fee'];
	    

	    // Prepare query string
	    $query_string = http_build_query($query);

	    //header('Location: https://www.paypal.com/cgi-bin/webscr?' . $query_string);
	    return redirect('https://www.sandbox.paypal.com/cgi-bin/webscr?' . $query_string);
	    */
	    
	}

	public function postback(Request $request){

		\Log::info($request->all());

		$registration = Registration::find($request->get('custom'));
		if($registration){
			\Log::info($registration);
			$registration->paid = 0;
			if($request->get('payment_status') == 'Completed'){
				$registration->paid = 1;
			}
			elseif($request->get('payment_status') == 'Refunded'){
				$registration->paid = 2;
			}
			elseif($request->get('payment_status') == 'Created'){
				$registration->paid = 3;
			}
			elseif($request->get('payment_status') == 'Denied'){
				$registration->paid = 4;
			}
			elseif($request->get('payment_status') == 'Expired'){
				$registration->paid = 5;
			}
			elseif($request->get('payment_status') == 'Failed'){
				$registration->paid = 6;
			}
			elseif($request->get('payment_status') == 'Pending'){
				$registration->paid = 7;
			}
			elseif($request->get('payment_status') == 'Canceled_Reversal'){
				$registration->paid = 8;
			}
			elseif($request->get('payment_status') == 'Reversed'){
				$registration->paid = 9;
			}
			elseif($request->get('payment_status') == 'Processed'){
				$registration->paid = 10;
			}
			elseif($request->get('payment_status') == 'Voided'){
				$registration->paid = 11;
			}

			$registration->payment_status = $request->get('payment_status');
			$registration->payment_date = $request->get('payment_date');
			$registration->address_status = $request->get('address_status');
			$registration->txn_id = $request->get('txn_id');
			$registration->txn_type = $request->get('txn_type');
			$registration->payer_id = $request->get('payer_id');
			$registration->ipn_track_id = $request->get('ipn_track_id');
			$registration->receipt_id = $request->get('receipt_id');
			$registration->mc_fee = $request->get('mc_fee');
			if($registration->save()){
				Registration::generateConfirmationNo($registration->id);
				//send email notification
				$reg_info = Registration::find($request->get('custom'));
				\Mail::send('email.registration-emailnotification-cc', ['registration' => $reg_info, 
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

				$Emails = ['conference@amic.asia', 'info@amic.asia', 'amic.contactus@gmail.com', 'canaria97@gmail.com', 'anthonygalapiaroman@gmail.com'];
				\Mail::send('emails.registration-emailbackup', function($message) use ($registration, $Emails)
					{
						$message->from('no-reply@amicmanila2017.net', 'AMIC MANILA 2017 REGISTRATION');
						$message->to($Emails)
								->subject($registration->firstname . ' ' . $registration->lastname . ' has registered to AMIC Manila 2017 at ' . date_format($registration->created_at, 'g:ia \o\n l jS F Y'));
					});

			}
		}
		else{
			\Log::error($request->get('custom') . ' not found');
		}
	}

	public function cancel(){
		\Session::flush();
		return view('paypal.paypal-cancel');
	}

	public function paypalReturn(){
		\Session::flush();
		return view('paypal.paypal-return');	
	}


	public function processPaypalGroup(){
		if(session('group_reg') == '')
			return redirect()->route('get-registration');


		//echo dd(session('reg_info'));


		return view('paypal.paypal-group');
	}

	public function postbackGroup(Request $request){
		\Log::info($request->all());

		$registration = GroupRegistration::find($request->get('custom'));
		if($registration){
			\Log::info($registration);
			if($request->get('payment_status') == 'Completed'){
				$registration->paid = 1;
			}

			$registration->payment_status = $request->get('payment_status');
			$registration->payment_date = $request->get('payment_date');
			$registration->address_status = $request->get('address_status');
			$registration->txn_id = $request->get('txn_id');
			$registration->txn_type = $request->get('txn_type');
			$registration->payer_id = $request->get('payer_id');
			$registration->ipn_track_id = $request->get('ipn_track_id');
			$registration->receipt_id = $request->get('receipt_id');
			$registration->mc_fee = $request->get('mc_fee');
			if($registration->save()){
				GroupRegistration::generateConfirmationNo($registration->id);


				//send email to group contact
				


				$registrations = \DB::table('registrations')->where('group', '=', $registration->id);

				//send mail to group representative
				\Mail::send('email.group-registration-emailnotification-cc', [
					'group_registration' => $registration, 
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
					}], function($message) use ($registration){
						$message->from('no-reply@amicmanila2017.net', 'Asian Media Information and Communication Centre, Inc.');
						$message->to($registration->email)->subject('Confirmation of Initial Group Registration to the AMIC 25th Annual Conference on ' . date('F d, Y') . '.');
				});

				
				foreach($registrations->get() as $registration){
					Registration::generateConfirmationNo($registration->id);
				}

				
				foreach($registrations->get() as $registration){
					//Registration::generateConfirmationNo($registration->id);
					//$registration = Registration::find($registration->id);
					\Mail::send('email.registration-emailnotification-cc', ['registration' => $registration, 
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
			}


				/*


				//send email notification
				$reg_info = Registration::find($request->get('custom'));
				\Mail::send('email.registration-emailnotification-cc', ['registration' => $reg_info, 
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
			*/
		}
		else{
			\Log::error($request->get('custom') . ' not found');
		}
	}

}
