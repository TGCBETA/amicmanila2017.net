<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model {

	protected $table = 'registrations';
	protected $fillable = ['firstname', 'lastname', 'organization', 'nationality', 'profession', 'gender', 'phone', 'email', 'address1', 'address2', 'city', 'province', 'country', 'zipcode', 'reg_category', 'payment_opt', 'status', 'paid', 'payment_date', 'payment_status', 'txn_id', 'txn_type', 'address_status', 'payer_id', 'ipn_track_id', 'receipt_id', 'mc_fee', 'confirmation_no', 'reg_rate', 'total_fee', 'PHP', 'USD', 'currency', 'f_city_tour', 'l_city_tour', 'l_city_tour_rate', 'l_conference_day', 'reg_type', 'group'];

	/*
	public static function generateConfirmationNo($id){
		return \DB::statement('call usp_generate_confirmation_no (:id)', array('id' => $id));
	}
	*/

	
	public static function generateConfirmationNo($id){
		//format: AMIC-2017-00000
		//Select * from registration where confirmation_no is not null order by 
		$confirmation_no = '';
		$last_confirmation_no = \DB::table('registrations')->where('id', '<>', $id)->whereNotNull('confirmation_no')->orderBy('id', 'desc');
		if($last_confirmation_no->count()){
			$last_confirmation_no = $last_confirmation_no->first();
			$no = explode('-', $last_confirmation_no->confirmation_no);
			$confirmation_no = 'AMIC-2017-' . substr("000000" . ($no[2] + 1), -6);
		}
		else{
			$confirmation_no = 'AMIC-2017-000001';
		}

		if($confirmation_no != ''){
			\DB::table('registrations')->where('id', '=', $id)->update(['confirmation_no' => $confirmation_no]);
		}
	}
	

}
