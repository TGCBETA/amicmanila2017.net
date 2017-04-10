<?php namespace App\Library;

class UtilityFunctions {
	static function sanitize($sbj){
		$sbj=str_replace("{","", $sbj);
		$sbj=str_replace("}","", $sbj);
		$sbj=str_replace(":","", $sbj);
		$sbj=str_replace("/","", $sbj);
		$sbj=str_replace("\\","", $sbj);
		$sbj=str_replace("[","", $sbj);
		$sbj=str_replace("]","", $sbj);
		$sbj=str_replace("#","", $sbj);
		$sbj=str_replace("%","", $sbj);
		$sbj=str_replace("&","", $sbj);
		$sbj=str_replace("*","", $sbj);
		$sbj=str_replace("+","", $sbj);
		$sbj=str_replace("=","", $sbj);
		$sbj=str_replace("^","", $sbj);
		$sbj=str_replace("$","", $sbj);
		$sbj=str_replace("!","", $sbj);
		$sbj=str_replace("?","", $sbj);
		$sbj=str_replace("<","", $sbj);
		$sbj=str_replace(">","", $sbj);
		//$sbj=str_replace("phpinfo()","", $sbj);
		return $sbj;
	}

	static function convertDash($num){
		$retval = '';
		for($index = 2; $index <= $num; $index++){
			$retval .= ' -- ';
		}
		return $retval;
	}

	static function getRate($name){
		$rate = \DB::table('rates')->where('rate_name', '=', $name);
		if($rate->count()){
			return $rate->first();
		}
		return '';
	}

	static function getCountry($code){
		$country = \DB::table('countries')->where('code', '=', $code);
		if($country->count())
			return $country->first();
		return '';
	}
}