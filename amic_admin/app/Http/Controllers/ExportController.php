<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Excel;
use DB;
use App\Registration;

class ExportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function downloadExcel() {
		$data = Registration::get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function downloadExcel1() {
		$data = Registration::where('currency', 'USD')->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('LOCAL DELEGATES: AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function f_excelAmic(){
		$data = Registration::where('reg_category', 'f_amic_member')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('FOREIGN DELEGATES-AMIC MEMBER: AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function f_excelNonAmic(){
		$data = Registration::where('reg_category', 'f_non_amic_member')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('FOREIGN DELEGATES-NON AMIC MEMBER: AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function f_excelStudent(){
		$data = Registration::where('reg_category', 'f_student')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('FOREIGN DELEGATES-STUDENT: AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function l_excelAmic(){
		$data = Registration::where('reg_category', 'l_amic_member')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('LOCAL DELEGATES-AMIC MEMBER: AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function l_excelNonAmic(){
		$data = Registration::where('reg_category', 'l_non_amic_member')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('LOCAL DELEGATES-NON AMIC MEMBER: AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function l_excelGrad(){
		$data = Registration::where('reg_category', 'l_graduate')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('LOCAL DELEGATES-GRADUATE STUDENT: AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function l_excelGrad_nom(){
		$data = Registration::where('reg_category', 'l_graduate_nom')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('LOCAL DELEGATES-GRADUATE STUDENT (No Meals): AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function l_excelUnder(){
		$data = Registration::where('reg_category', 'l_undergraduate')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('LOCAL DELEGATES-UNDERGRADUATE STUDENT: AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}
	public function l_excelUnder_nom(){
		$data = Registration::where('reg_category', 'l_undergraduate_nom')->where('deleted_at', null)->get(['firstname', 'lastname', 'organization', 'nationality', 'profession','gender', 'phone','email','address1','city','province','country','zipcode','reg_category','payment_opt','confirmation_no','reg_rate','PHP', 'USD','currency','l_city_tour_rate','l_conference_day','reg_type'])->toArray();
		$today = date("F j, Y");
		return Excel::create('LOCAL DELEGATES-GRADUATE STUDENT (No Meals): AMIC MANILA 2017' . ' - '. $today, function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xls');
	}




}
