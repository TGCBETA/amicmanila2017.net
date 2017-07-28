<?php
namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmailController extends Controller
{

	public function __construct()
  	{

  	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Update posisi menu
	 *
	 * @param  int  $id
	 * @return Response
	 */

    public function create() {
        return view('pages.contactus');
    }

	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
            'name' 					=> 'required|max:255',
            'email' 				=> 'max:255|required',
			'contact' 				=> 'numeric',
            'message' 				=> 'required',
			'g-recaptcha-response'  => 'required',
        ], 
		[
		'name.required' 				=> 'Full name is Required!',
		'email.email' 					=> 'Invalid Email Address!',
		'email.required'				=> 'Email Address is Required!',
		'contact.numeric' 				=> 'Invalid Contact Number!',
		'message.required' 				=> 'Message is Required!',
		'g-recaptcha-response.required' => 'Captcha is Required!',
    	]);

		if ($validator->fails()) {
			\Session::flash('errors',$validator->messages());
			return \Redirect::route('send')->withInput(\Input::old('name'));
		}
		else {
			$data = array(
				'name' => $request->get('name'),
				'email' => $request->get('email'),
				'contact' => $request->get('contact'),
				'user_message' => $request->get('message'));
				
				$Emails = ['conference@amic.asia', 'info@amic.asia', 'amic.contactus@gmail.com', 'canaria97@gmail.com', 'secretariat@amicmanila2017.net'];
				
				\Mail::send('pages.emails', $data, function($message) use ($data, $Emails)
					{
						$message->from('no-reply@amicmanila2017.net', 'AMIC 2017');
						$message->to($Emails);
						$message->replyTo($data['email'],$data['name'])
								->subject('AMIC Online Inquiry');
					});
				\Session::flash('success_msg','Thank you for Contacting us!');
				return \Redirect::route('send');
			}
    }




}