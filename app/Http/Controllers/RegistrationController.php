<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Registration;
use App\Rate;
use App\GroupRegistration;

class RegistrationController extends Controller {

	public function getRegistration(){
		return view('registration.registration');
	}

	public function getSingleRegistration(){
		\Session::put('single_reg.reg_type', 'single');
		return view('registration.single-registration');
	}

	public function saveRegistration(Request $request){
		//echo dd($request->all());

		//return redirect()->back()->with('failedMsg', 'Something went wrong while saving information. Please try again later.')->withInput();

		$current_date = date('Ymd');


		$firstname = $request->get('firstname');
		$lastname = $request->get('lastname');
		$organization = $request->get('organization');
		$nationality = $request->get('nationality');
		$profession = $request->get('profession');
		$gender = $request->get('gender');
		$phone = $request->get('phone');
		$email = $request->get('email');
		$address1 = $request->get('address1');
		$address2 = $request->get('address2');
		$city = $request->get('city');
		$province = $request->get('province');
		$country = $request->get('country');
		$zipcode = $request->get('zipcode');
		
		$f_city_tour = $request->get('f_city_tour');
		$reg_category = $request->get('reg_category');
		$l_city_tour = $request->get('l_city_tour');
		$payment_opt = $request->get('payment_opt');
		$l_conference_day = $request->get('l_conference_day');

		$total_fee = 0;
		$PHP = 0;
		$USD = 0;
		$l_city_tour = 0;
		$l_tour_rate = 0;
		$currency = '';



		//get rates
		$rates = Rate::all();


		$reg_rate = $rates->where('rate_name', $reg_category);
		if(!$reg_rate->count()){
			abort(500);
		}

		$reg_rate = $reg_rate->first();
		$currency = $reg_rate->currency;

		if($country == 'PH') {
			if($current_date <= 20170815){
				$reg_rate = $reg_rate->early_bird_rate;
			}
			elseif($current_date <= 20170831){
				$reg_rate = $reg_rate->rate;
			}
			elseif($current_date <= 20170928){
				$reg_rate = $reg_rate->walkin_rate;
			}
			else{
				abort(500);
			}
		}
		else {
			if($current_date <= 20170831){
			$reg_rate = $reg_rate->early_bird_rate;
			}
			elseif($current_date <= 20170831){
				$reg_rate = $reg_rate->rate;
			}
			elseif($current_date <= 20170928){
				$reg_rate = $reg_rate->walkin_rate;
			}
			else{
				abort(500);
			}
		}

		$total_fee += $reg_rate;

		if($l_conference_day > 1){
			$total_fee = $total_fee * 2;
		}


		//Local Delegate City Tour
		
		if(\Input::has('l_city_tour')){
			$l_city_tour = 1;
			$l_tour_rate = $rates->where('rate_name', 'l_city_tour');
			if($l_tour_rate->count()){
				$l_tour_rate = $l_tour_rate->first()->rate;
			}

			$total_fee += $l_tour_rate;
		}


		if($currency == 'P') {
			$PHP = $total_fee;
		}
		else{
			$USD = $total_fee;
		}
		

		/*
		echo print_r($request->all()) . '<br />';
		echo $f_city_tour . '<br />';
		echo $reg_rate . '<br />';
		echo $l_city_tour . '<br />';
		echo $l_tour_rate . '<br />';

		exit;
		*/
		


/*
  "firstname" => "Mark Francis"
  "lastname" => "Lomugdang"
  "organization" => "The Good Chronicle"
  "nationality" => "Filipino"
  "profession" => "Web Programmer"
  "gender" => "male"
  "phone" => "1234567"
  "email" => "francis.lomugdang@gmail.com"
  "address1" => "Address 1"
  "address2" => null
  "city" => "Pasig City"
  "province" => "NCR"
  "country" => "Philippines"
  "zipcode" => "1605"
  "reg_category" => "l_non_amic_member"
  "payment_opt" => "paypal"
  "total_fee" => 0
  "f_city_tour" => ""
  "l_city_tour" => 1
  "l_city_tour_rate" => "1000.00"
  "l_conference_day" => "1"
  "reg_rate" => "7500.00"
*/

  		$reg_info = [
					'firstname'			=> $firstname, 
					'lastname'			=> $lastname, 
					'organization'		=> $organization, 
					'nationality'		=> $nationality, 
					'profession'		=> $profession, 
					'gender'			=> $gender, 
					'phone'				=> $phone, 
					'email'				=> $email, 
					'address1'			=> $address1, 
					'address2'			=> $address2, 
					'city'				=> $city, 
					'province'			=> $province, 
					'country'			=> $country, 
					'zipcode'			=> $zipcode, 
					'reg_category'		=> $reg_category, 
					'payment_opt'		=> $payment_opt, 
					'total_fee'			=> $total_fee, 
					'PHP'				=> $PHP,
					'USD'				=> $USD,
					'f_city_tour'		=> $f_city_tour, 
					'l_city_tour'		=> $l_city_tour,
					'l_city_tour_rate'	=> $l_tour_rate,
					'l_conference_day'	=> $l_conference_day,
					'reg_rate'			=> $reg_rate,
					'currency'			=> $currency,
				];

		\Session::put('single_reg.reg_info', $reg_info);


		

		return redirect()->route('confirm-registration');
		

		

	}

	public function confirmRegistration(){

		if(session('single_reg') == '')
			return redirect()->route('get-registration');

		//echo dd(session()->all());
		return view('registration.confirm-registration', [
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
			}
		]);


		/*
		$registration = Registration::create([
							'firstname'			=> $firstname, 
							'lastname'			=> $lastname, 
							'organization'		=> $organization, 
							'nationality'		=> $nationality, 
							'profession'		=> $profession, 
							'gender'			=> $gender, 
							'phone'				=> $phone, 
							'email'				=> $email, 
							'address1'			=> $address1, 
							'address2'			=> $address2, 
							'city'				=> $city, 
							'province'			=> $province, 
							'country'			=> $country, 
							'zipcode'			=> $zipcode, 
							'reg_category'		=> $reg_category, 
							'payment_opt'		=> $payment_opt, 
							'total_fee'			=> $total_fee, 
							'f_city_tour'		=> $f_city_tour, 
							'l_city_tour'		=> $l_city_tour,
							'l_city_tour_rate'	=> $l_city_tour_rate,
							'l_conference_day'	=> $l_conference_day,
						]);


		if($registration){
			if($payment_opt == 'paypal')
				return redirect()->route('process-paypal');
		}

		return redirect()->back()->with('failedMsg', 'Something went wrong while saving information. Please try again later.')->withInput();
		*/
	}

	public function save(Request $request){

		if(session('single_reg') == '')
			return redirect()->route('get-registration');


		//echo dd(session('reg_info'));


		if($request->has('back')){
			return redirect()->route('get-single-registration');
		}


		$recaptcha = new \ReCaptcha\ReCaptcha('6Lff_v0SAAAAACu-X_jR2QCRbdiSkFvDCCQp8nI4');
        $resp = $recaptcha->verify($request->get('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
        if (!$resp->isSuccess()) {
		    return redirect()->back()->with('failedMsg', 'Please make sure that you are not a robot. Please check the "Im not a robot" portion.');
		}

		$registration = '';
		if(\Session::has('id')){
			$registration = Registration::find(session('id'));
			if($registration){
				$registration->firstname 		= session('single_reg.reg_info')['firstname']; 
				$registration->lastname			= session('single_reg.reg_info')['lastname'];
				$registration->organization		= session('single_reg.reg_info')['organization'];
				$registration->nationality		= session('single_reg.reg_info')['nationality'];
				$registration->profession		= session('single_reg.reg_info')['profession'];
				$registration->gender			= session('single_reg.reg_info')['gender'];
				$registration->phone			= session('single_reg.reg_info')['phone'];
				$registration->email			= session('single_reg.reg_info')['email']; 
				$registration->address1			= session('single_reg.reg_info')['address1'];
				$registration->city				= session('single_reg.reg_info')['city'];
				$registration->province			= session('single_reg.reg_info')['province'];
				$registration->country			= session('single_reg.reg_info')['country'];
				$registration->zipcode			= session('single_reg.reg_info')['zipcode']; 
				$registration->reg_category		= session('single_reg.reg_info')['reg_category'];
				$registration->payment_opt		= session('single_reg.reg_info')['payment_opt'];
				$registration->reg_rate			= session('single_reg.reg_info')['reg_rate'];
				$registration->total_fee		= session('single_reg.reg_info')['total_fee'];
				$registration->PHP              = session('single_reg.reg_info')['PHP'];
				$registration->USD              = session('single_reg.reg_info')['USD'];
				$registration->f_city_tour		= session('single_reg.reg_info')['f_city_tour'];
				$registration->l_city_tour		= session('single_reg.reg_info')['l_city_tour'];
				$registration->l_city_tour_rate	= session('single_reg.reg_info')['l_city_tour_rate'];
				$registration->l_conference_day	= session('single_reg.reg_info')['l_conference_day'];
				$registration->currency			= session('single_reg.reg_info')['currency'];
				$registration->reg_type			= session('single_reg.reg_type');
				$registration->save();
			}
		}
		else {
			$registration = Registration::create([
				'firstname'			=> session('single_reg.reg_info')['firstname'], 
				'lastname'			=> session('single_reg.reg_info')['lastname'], 
				'organization'		=> session('single_reg.reg_info')['organization'], 
				'nationality'		=> session('single_reg.reg_info')['nationality'], 
				'profession'		=> session('single_reg.reg_info')['profession'], 
				'gender'			=> session('single_reg.reg_info')['gender'], 
				'phone'				=> session('single_reg.reg_info')['phone'], 
				'email'				=> session('single_reg.reg_info')['email'], 
				'address1'			=> session('single_reg.reg_info')['address1'],
				'city'				=> session('single_reg.reg_info')['city'], 
				'province'			=> session('single_reg.reg_info')['province'], 
				'country'			=> session('single_reg.reg_info')['country'], 
				'zipcode'			=> session('single_reg.reg_info')['zipcode'], 
				'reg_category'		=> session('single_reg.reg_info')['reg_category'], 
				'payment_opt'		=> session('single_reg.reg_info')['payment_opt'], 
				'reg_rate'			=> session('single_reg.reg_info')['reg_rate'],
				'total_fee'			=> session('single_reg.reg_info')['total_fee'], 
				'PHP'				=> session('single_reg.reg_info')['PHP'], 
				'USD'				=> session('single_reg.reg_info')['USD'], 
				'f_city_tour'		=> session('single_reg.reg_info')['f_city_tour'], 
				'l_city_tour'		=> session('single_reg.reg_info')['l_city_tour'],
				'l_city_tour_rate'	=> session('single_reg.reg_info')['l_city_tour_rate'],
				'l_conference_day'	=> session('single_reg.reg_info')['l_conference_day'],
				'currency'			=> session('single_reg.reg_info')['currency'],
				'reg_type'			=> session('single_reg.reg_type'),
			]);
		}



		if($registration){
			session(['single_reg.id' => $registration->id]);
			if(session('single_reg.reg_info')['payment_opt'] == 'check')
				return redirect()->route('process-check');
			else if(session('single_reg.reg_info')['payment_opt'] == 'bank')
				return redirect()->route('process-bank');
		}

		return redirect()->route('get-single-registration')->with('failedMsg', 'Something went wrong while saving information. Please try again later.')->withInput();
	}


	public function getGroupRegistration(){
		
		//session[['group_reg' => d]]


		
		return view('registration.group-registration');
	}

	public function postNoofRegistrants(Request $request){
		\Session::flush();
		\Session::put('group_reg.reg_type', 'group');

		if($request->get('no_of_registrants') == 5){
			//session(['no_of_registrants' => $request->get('no_of_registrants') + 1]);
			\Session::put('group_reg.no_of_registrants', $request->get('no_of_registrants') + 1);
		}
		else{

			//session(['no_of_registrants' => $request->get('no_of_registrants')]);
			\Session::put('group_reg.no_of_registrants', $request->get('no_of_registrants'));
		}
		//session(['country' => $request->get('country')]);
		//session(['idx' => $idx + 1]);
		\Session::put('group_reg.country', $request->get('country'));
		return redirect()->route('add-registrant', ['1']);
	}

	public function getAddRegistrant($idx){
		if(session('group_reg') == '')
			return redirect()->route('get-registration');

		if(session('group_reg.no_of_registrants') >= 5 && $idx == 6){
			\Session::put('group_reg.no_of_registrants', 6);
		}

		if($idx < 1 || $idx > session('group_reg.no_of_registrants'))
			\App::abort(404);
		//echo print_r(session('group_reg.no_of_registrants'));
		//echo '<pre>', print_r(session()->all()), '</pre>';

		//get profile by $idx

		if(\Session::has('group_reg.profile' . $idx))
			return view('registration.group-registrant-profile', ['idx' => $idx, 'info' => session('group_reg.profile' . $idx)]);
		return view('registration.group-registrant-profile', ['idx' => $idx]);
	}



	public function postAddRegistrant(Request $request, $idx){

		if($request->has('back')){
			if($idx == 1)
				return redirect()->route('get-group-registration');
			return redirect()->route('add-registrant', $idx - 1);
		}

		if($request->has('skip')){
			\Session::put('group_reg.no_of_registrants', session('group_reg.no_of_registrants') - 1);
			return redirect()->route('get-registration-category');
		}

		$profile = [
			"idx"			=> $idx,
			"firstname" 	=> $request->get('firstname'),
			"lastname" 		=> $request->get('lastname'),
			"organization" 	=> $request->get('organization'),
			"nationality" 	=> $request->get('nationality'),
			"profession" 	=> $request->get('profession'),
			"gender" 		=> $request->get('gender'),
			"phone" 		=> $request->get('phone'),
			"email" 		=> $request->get('email'),
			"address1" 		=> $request->get('address1'),
			"city" 			=> $request->get('city'),
			"province" 		=> $request->get('province'),
			"country" 		=> $request->get('country'),
			"zipcode" 		=> $request->get('zipcode')
		];

		//session(['profile' . $idx => $profile]);
		\Session::put('group_reg.profile' . $idx, $profile);
		//echo dd(count(session('profile')));

		session(['idx' => $idx + 1]);
		if($idx < session('group_reg.no_of_registrants')){
			return redirect()->route('add-registrant', [$idx + 1]);
		}
		else{
			//proceed to next step
			return redirect()->route('get-registration-category');
		}

	}

	public function getRegistrationCategory(){
		if(session('group_reg') == '')
			return redirect()->route('get-registration');
		return view('registration.group-reg-category');
	}

	public function postRegistrationCategory(Request $request){
		//echo dd($request->all());


		if($request->has('back')){
			if(session('group_reg.no_of_registrants') >= 5)
			return redirect()->route('add-registrant', 6);
		}

		$current_date = date('Ymd');

		$f_city_tour = $request->get('f_city_tour');
		$reg_category = $request->get('reg_category');
		$l_city_tour = $request->get('l_city_tour');
		$payment_opt = $request->get('payment_opt');
		$l_conference_day = $request->get('l_conference_day');

		$total_fee = 0;
		$PHP = 0;
		$USD = 0;
		$l_city_tour = 0;
		$l_tour_rate = 0;
		$currency = '';



		//get rates
		$rates = Rate::all();


		$reg_rate = $rates->where('rate_name', $reg_category);
		if(!$reg_rate->count()){
			abort(500);
		}

		$reg_rate = $reg_rate->first();
		$currency = $reg_rate->currency;


		if($current_date <= 20170731){
			$reg_rate = $reg_rate->early_bird_rate;
		}
		elseif($current_date <= 20170831){
			$reg_rate = $reg_rate->rate;
		}
		elseif($current_date <= 20170928){
			$reg_rate = $reg_rate->walkin_rate;
		}
		else{
			abort(500);
		}


		if(session('group_reg.no_of_registrants') < 5)
			$total_fee += $reg_rate * session('group_reg.no_of_registrants');
		else
			$total_fee += $reg_rate * 5;

		//Local Delegate City Tour
		
		if(\Input::has('l_city_tour')){
			$l_city_tour = 1;
			$l_tour_rate = $rates->where('rate_name', 'l_city_tour');
			if($l_tour_rate->count()){
				$l_tour_rate = $l_tour_rate->first()->rate;
			}

			if(session('group_reg.no_of_registrants') < 5)
				$total_fee += $l_tour_rate * session('group_reg.no_of_registrants');
			else
				$total_fee += $l_tour_rate * 5;
		}

		if($l_conference_day > 1){
			$total_fee = $total_fee * 2;
		}

		if($currency == 'P'){
			$PHP = $reg_rate + $l_tour_rate;
			if($l_conference_day == '0'){
				$PHP = $PHP * 1;
			}
			else if($l_conference_day == '1'){
				$PHP = $PHP * 1;
			}
			else {
				$PHP = $PHP * 2;
			}
		}
		else {
			$USD = $reg_rate + $l_tour_rate;
			if($l_conference_day == '0'){
				$USD = $USD * 1;
			}
			else if($l_conference_day == '1') {
				$USD = $USD * 1;
			}
			else {
				$USD = $USD * 2;
			}
		}

		session(['group_reg.reg_category' => $reg_category]); 
		session(['group_reg.payment_opt' => $payment_opt]);
		session(['group_reg.total_fee' => $total_fee]);
		session(['group_reg.PHP' => $PHP]);
		session(['group.reg.USD' => $USD]);
		session(['group_reg.f_city_tour' => $f_city_tour]);
		session(['group_reg.l_city_tour' => $l_city_tour]);
		session(['group_reg.l_city_tour_rate' => $l_tour_rate]);
		session(['group_reg.l_conference_day' => $l_conference_day]);
		session(['group_reg.reg_rate' => $reg_rate]);
		session(['group_reg.currency' => $currency]);


		//echo dd(session()->all());

		return redirect()->route('get-group-contact');
	}

	public function getGroupContact(){
		//echo dd(session()->all());
		if(session('group_reg') == '')
			return redirect()->route('get-registration');

		return view('registration.group-contact');
	}

	public function postGroupContact(Request $request){
		//echo dd(session()->all());

		if($request->has('back')){
			return redirect()->route('get-registration-category');
		}

		session(['group_reg.group_contact_no' => $request->get('group_contact_no')]);
		session(['group_reg.group_email' => $request->get('group_email')]);


		//confirmation page
		return redirect()->route('get-group-confirmation');

	}

	public function getGroupConfirmation(){
		if(session('group_reg') == '')
			return redirect()->route('get-registration');

		//echo print_r(session()->all());
		return view('registration.confirm-group-registration', [
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
			}
		]);
	}

	public function saveGroup(Request $request){
		if(session('group_reg') == '')
			return redirect()->route('get-registration');

		if($request->has('back1')){
			return redirect()->route('get-group-contact');
		}


		$recaptcha = new \ReCaptcha\ReCaptcha('6Lff_v0SAAAAACu-X_jR2QCRbdiSkFvDCCQp8nI4');
        $resp = $recaptcha->verify($request->get('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
        if (!$resp->isSuccess()) {
		    return redirect()->back()->with('failedMsg', 'Please make sure that you are not a robot. Please check the "Im not a robot" portion.');
		}

		



		//echo '<pre>', print_r(session()->all()), '</pre>';
		//exit;

		//save group
		$group_reg = GroupRegistration::create([
			'email' 				=> session('group_reg.group_email'), 
			'contact'				=> session('group_reg.group_contact_no'), 
			'reg_category'			=> session('group_reg.reg_category'), 
			'payment_opt'			=> session('group_reg.payment_opt'), 
			'reg_rate'				=> session('group_reg.reg_rate'), 
			'total_fee'				=> session('group_reg.total_fee'), 
			'PHP'					=> session('group_reg.PHP'), 
			'USD'					=> session('group_reg.USD'), 
			'currency'				=> session('group_reg.currency'), 
			'f_city_tour'			=> session('group_reg.f_city_tour'), 
			'l_city_tour'			=> session('group_reg.l_city_tour'), 
			'l_city_tour_rate'		=> session('group_reg.l_city_tour_rate'), 
			'l_conference_day'		=> session('group_reg.l_conference_day'),
			'country'				=> session('group_reg.country'),
			'no_of_registrants'		=> session('group_reg.no_of_registrants')
		]);

		//save individual
		if($group_reg){
			for($i = 1; $i <= session('group_reg.no_of_registrants'); $i++){
				$registration = Registration::create([
					'firstname'			=> session('group_reg.profile' . $i)['firstname'], 
					'lastname'			=> session('group_reg.profile' . $i)['lastname'], 
					'organization'		=> session('group_reg.profile' . $i)['organization'], 
					'nationality'		=> session('group_reg.profile' . $i)['nationality'], 
					'profession'		=> session('group_reg.profile' . $i)['profession'], 
					'gender'			=> session('group_reg.profile' . $i)['gender'], 
					'phone'				=> session('group_reg.profile' . $i)['phone'], 
					'email'				=> session('group_reg.profile' . $i)['email'], 
					'address1'			=> session('group_reg.profile' . $i)['address1'],
					'city'				=> session('group_reg.profile' . $i)['city'], 
					'province'			=> session('group_reg.profile' . $i)['province'], 
					'country'			=> session('group_reg.profile' . $i)['country'], 
					'zipcode'			=> session('group_reg.profile' . $i)['zipcode'],
					'reg_type'			=> session('group_reg.reg_type'),
					'group'				=> $group_reg->id,
					'no_of_registrants'	=> session('group_reg.no_of_registrants'),
					'currency'			=> session('group_reg.currency'), 
					'f_city_tour'		=> session('group_reg.f_city_tour'), 
					'l_city_tour'		=> session('group_reg.l_city_tour'), 
					'l_city_tour_rate'	=> session('group_reg.l_city_tour_rate'), 
					'l_conference_day'	=> session('group_reg.l_conference_day'),
					'reg_category'		=> session('group_reg.reg_category'), 
					'payment_opt'		=> session('group_reg.payment_opt'), 
					'reg_rate'			=> session('group_reg.reg_rate'), 
					'total_fee'			=> session('group_reg.total_fee'),
					'PHP'				=> session('group_reg.PHP'),
					'USD'				=> session('group_reg.USD'),
				]);
			}

			//check if inserted data is equal to no of registrants
			//$registrants = \DB::table('registrants')->where('group', '=', $group_reg->id);
			//if($registrants->count() != session('group_reg.no_of_registrants'))

			if($registration){
				session(['group_reg.id' => $group_reg->id]);
				if(session('group_reg.payment_opt') == 'check')
					return redirect()->route('process-check-group');
				else if(session('group_reg.payment_opt') == 'bank')
					return redirect()->route('process-bank-group');
			}


		}
		return redirect()->back()->with('failedMsg', 'Something went wrong while saving information. Please try again or contact us for assistance.');
		



		//echo '<pre>', print_r(session()->all()), '</pre>';
	}

}
