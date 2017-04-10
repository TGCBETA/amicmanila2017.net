<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRegistration extends Model {

	protected $table = 'group_registrations';
	protected $fillable = ['email','contact','country','reg_category', 'no_of_registrants', 'payment_opt', 'status', 'paid', 'payment_date', 'payment_status', 'txn_id', 'txn_type', 'address_status', 'payer_id', 'ipn_track_id', 'receipt_id', 'mc_fee', 'confirmation_no', 'reg_rate', 'total_fee', 'currency', 'f_city_tour', 'l_city_tour', 'l_city_tour_rate', 'l_conference_day'];

	/*
	public static function generateConfirmationNo($id){
		return \DB::statement('call usp_generate_group_confirmation_no (:id)', array('id' => $id));
	}
	*/
	
	public static function generateConfirmationNo($id){
		//format: AMIC-2017-00000
		//Select * from registration where confirmation_no is not null order by 
		$confirmation_no = '';
		$last_confirmation_no = \DB::table('group_registrations')->where('id', '<>', $id)->whereNotNull('confirmation_no')->orderBy('id', 'desc');
		if($last_confirmation_no->count()){
			$last_confirmation_no = $last_confirmation_no->first();
			$no = explode('-', $last_confirmation_no->confirmation_no);
			$confirmation_no = 'AMIC-GRP-2017-' . substr("000000" . ($no[3] + 1), -6);
		}
		else{
			$confirmation_no = 'AMIC-GRP-2017-000001';
		}

		if($confirmation_no != ''){
			\DB::table('group_registrations')->where('id', '=', $id)->update(['confirmation_no' => $confirmation_no]);
		}
	}
	

}
