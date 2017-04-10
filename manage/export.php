<?php 
	require_once("loader.php");


	$msg = '';
	if(!empty($_POST)){
		$filename = "registrants_" . date('Ymd') . ".xls"; 
		header("Content-Disposition: attachment; filename=\"$filename\""); 
		header("Content-Type: application/vnd.ms-excel"); 

		$start = '';
		$end = '';
		$data = array();

		if(isset($_POST['start']) && $_POST['start'] != '')
		{
			$start = $_POST['start'];
		}
 
 		if(isset($_POST['end']) && $_POST['end'] != '')
		{
			$end = $_POST['end'];
		}


		try{
			$sql = "SELECT  
						lname, 
						fname, 
						title, 
						gender, 
						nationality, 
						ac_lname, 
						ac_fname, 
						ac_title, 
						ac_gender, 
						ac_nationality, 
						company_name, 
						company_dept, 
						company_street, 
						company_state, 
						company_zipcode, 
						company_country, 
						company_phone, 
						company_mobile, 
						company_fax, 
						email, 
						reg_category, 
						SESSION, 
						payment_opt, 
						date_registered,
						confirmation_no, 
						tour, 
						totalfee, 
						withaccompanying,
						ispaid,
						isvoid,
						onsite_dp
						FROM 
						ism2015_registration 
						WHERE date_registered between :start AND :end
						and ispaid <> 2
						Order by date_registered desc
						";
			$stmt = $dbh->prepare($sql);

			$params = array(
				':start' => date('Y-m-d', strtotime($start)), 
				':end' => date('Y-m-d', strtotime($end))
			);

			//echo print_r($params);

			if($stmt->execute($params))
			{
				$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				//echo count($data);
			}
			
		}
		catch(PDOException $e){
			//echo $e->getMessage();
		}

		$flag = false; 
		$table = '<table border="1">';
		$table .= 	'<thead><tr>
						<th>Seq No</th>
						<th>Confirmation No</th>
						<th>Lastname</th>
						<th>Firstname</th>
						<th>Title</th>
						<th>Gender</th>
						<th>Nationality</th>
						<th>Accompany Lastname</th>
						<th>Accompany Firstname</th>
						<th>Accompany Title</th>
						<th>Accompany Gender</th>
						<th>Accompany Nationality</th>
						<th>Company</th>
						<th>Department</th>
						<th>Street</th>
						<th>State</th>
						<th>Zipcode</th>
						<th>Country</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Fax</th>
						<th>Email</th>
						<th>Registration Category</th>
						<th>Session</th>
						<th>Payment Option</th>
						<th>Date Registered</th>
						<th>Tour</th>
						<th>Fee</th>
						<th>Paid</th>
						<th>Onsite</th>
					</tr></thead>';
		$table .= '<tbody>';
		$index = 1;
		foreach($data as $row) 
		{

			$category = '';
			if($row['reg_category'] == 'student' || $row['reg_category'] == '2student') 
				$category = 'Student (2 Days)';
			elseif($row['reg_category'] == 'ishs' || $row['reg_category'] == '2ishs')
				$category = 'ISHS Member (2 Days)';
			elseif($row['reg_category'] == 'nonishs' || $row['reg_category'] == '2nonishs')
				$category = 'Non-ISHS Member (2 Days)';
			elseif($row['reg_category'] == '1nonishs')
				$category = 'Non-ISHS Member (1 Day)';
			elseif($row['reg_category'] == '1ishs')
				$category = 'ISHS Member (1 Day)';
			elseif($row['reg_category'] == '1student')
				$category = 'Student (1 Day)';
			else if($row['reg_category'] == 'avdrc_2nonishs')
				$category = 'AVRDC Non-ISHS Member (2 Days)';
			else if($row['reg_category'] == 'avdrc_2ishs')
				$category = 'AVRDC ISHS Member (2 Days)';
			else if($row['reg_category'] == 'committee_2nonishs')
				$category = 'Committee Non-ISHS Member (2 Days)';
			else if($row['reg_category'] == 'committee_2ishs')
				$category = 'Committee ISHS Member (2 Days)';

			$paid = 'No';
			if($row['ispaid'] === '1') 
			{
				$paid = 'Yes';
			}
			

			$onsite_dp = 'No';
			if($row['onsite_dp'] === '1') 
			{
				$onsite_dp = 'Yes';
			}

			$table .= '<tr>';
			$table .= '
						<td>'. $index .'</td>
						<td>'. $row['confirmation_no'] .'</td>
						<td>'. $row['lname'] .'</td>
						<td>'. $row['fname'] .'</td>
						<td>'. $row['title'] .'</td>
						<td>'. $row['gender'] .'</td>
						<td>'. $row['nationality'] .'</td>
						<td>'. $row['ac_lname'] .'</td>
						<td>'. $row['ac_fname'] .'</td>
						<td>'. $row['ac_title'] .'</td>
						<td>'. $row['ac_gender'] .'</td>
						<td>'. $row['ac_nationality'] .'</td>
						<td>'. $row['company_name'] .'</td>
						<td>'. $row['company_dept'] .'</td>
						<td>'. $row['company_street'] .'</td>
						<td>'. $row['company_state'] .'</td>
						<td>'. $row['company_zipcode'] .'</td>
						<td>'. $row['company_country'] .'</td>
						<td>'. $row['company_phone'] .'</td>
						<td>'. $row['company_mobile'] .'</td>
						<td>'. $row['company_fax'] .'</td>
						<td>'. $row['email'] .'</td>
						<td>'. $category .'</td>
						<td>'. $row['SESSION'] .'</td>
						<td>'. $row['payment_opt'] .'</td>
						<td>'. date('m-d-Y', strtotime($row['date_registered'])) .'</td>
						<td>'. $row['tour'] .'</td>
						<td>$'. number_format($row['totalfee'], 2) .'</td>
						<td>'. $paid . '</td>
						<td>'. $onsite_dp . '</td>
						';



			$table .= '</tr>';
			$index++;
			/*
			if(!$flag) 
			{ // display field/column names as first row 
				echo implode("\t", array_keys($row)) . "\r\n"; 
				$flag = true; 
			} 
			array_walk($row, 'cleanData'); 
			echo implode("\t", array_values($row)) . "\r\n"; 
			*/
		} 
		$table .= '</tbody>';
		$table .= '</table>';
		echo $table;
		exit;
	}



	function cleanData(&$str) 
	{ 
		$str = preg_replace("/\t/", "\\t", $str); 
		$str = preg_replace("/\r?\n/", "\\n", $str); 
		if(strstr($str, '"')) 
			$str = '"' . str_replace('"', '""', $str) . '"'; 
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php 
			include('includes/head-section.php');
		?>
	</head>

	<body>
		<div class="main-container">
			<div class="main-content">
					<div class="page-content">
						<form method="post">
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">
										Start Date
									</label>
									<input type="text" class="form-control date" id="start" name="start" readonly="readonly" />
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">
										End Date
									</label>
									<input type="text" class="form-control date" id="end" name="end" readonly="readonly"/>
								</div>
								<div class="col-md-12 form-group">
									<button class="btn btn-success" type="submit"><i class="icon-download"></i>&nbsp;Export</button>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
		<?php 
			include('includes/script-section.php');
		?>
		<script>
			$(function(){
				$('.date').datepicker({
					changeMonth :true,
					changeYear	:true
				});
				$('.date').datepicker("setDate", new Date());
			});
		</script>
	</body>
</html>

