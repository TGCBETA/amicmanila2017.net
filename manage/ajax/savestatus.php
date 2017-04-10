<?php

require_once("../loader.php");
	
if (!isset($_SESSION['user'])) 
{ 
	echo 'nosession'; // think about user feedback, "your session timed out" ... index.php?action=session_timeout
	exit; // <= IMPORTANT !!!
}


$id = 0;
$status = '';

$statuses = array(
		'0' => 'Unpaid',
		'1'	=> 'Paid',
		'2'	=> 'Void'
	);


if(isset($_POST['id']) && $_POST['id'] != ''){
	$id = $_POST['id'];
}

if(isset($_POST['status']) && $_POST['status'] != ''){
	$status = $_POST['status'];
}




$sql = 'Update ism2015_registration set ispaid = :status where id = :id';
$param = array(
		':status'	=> $status,
		':id'		=> $id
	);
try{
	$stmt = $dbh->prepare($sql);
	Log::logMessage('Saving Status - Registration ID: ' . $id . ', Status : ' . $status, 'information');	
	if($stmt->execute($param)){
		if($status == '1'){
			Activity::logActivity('Update status to ' . $statuses[$status], $id);
			echo '1';
			exit;
			//Log::logMessage('Sending Email - Registration ID: ' . $id, 'information');	
			/*
			if(sendpaymentemailnotification($id))
			{
				echo '1';
				exit;
			}
			*/
		}
		else
		{
			echo '1';
			exit;
		}
	}
	else{
		Log::logMessage('Execute Error - Registration ID: ' . $id, 'error');	
	}
}
catch(PDOException $e){
	Log::logMessage($e->getMessage, 'exception');
}
echo '0';



function sendpaymentemailnotification($id){
	global $dbh;
	$now=date('Y-m-d H:i:s',time());
	$lastname = '';
	$firstname = '';
	$title = '';
	$gender = '';
	$nationality = '';
	$ac_lastname = '';
	$ac_firstname = '';
	$ac_title = '';
	$ac_gender = '';
	$ac_nationality = '';
	$companyname = '';
	$department = '';
	$street = '';
	$state = '';
	$zipcode = '';
	$country = '';
	$phonenumber = '';
	$mobilenumber = '';
	$faxnumber = '';
	$email = '';
	$category = '';
	$session = array();
	$sessionstr = '';
	$payopt = '';
	$captcha = '';
	$regfee = 0;
	$confirmation_no = '';
	$tour = '';
	$ac_tour = '';
	$ac_fee = '';
	$withaccompany = 0;
	$totalfee = 0;
	
	
	$regfee = 0;
	$del_regfee = 0;
	$del_tourfee = 0;
	$ac_regfee = 0;
	$ac_tourfee = 0;

	$iswaived = '';
	$result = array();

	$selected_tour = array(
			'tour1'	=> 'SBE Farms Enterprises, Inc., Rosales, Pangasinan',
			'tour2'	=> 'Moringa Propagation Company, San Fernando, Pampanga',
			'tour3'	=> 'JPM/Japan-Philippines Malunggay Eco Farm, Tranca Bay, Laguna',
			'tour4'	=> 'Not Interested'
	);


	$sql = "Select * from ism2015_registration where id = :id";
	try{
		$stmt = $dbh->prepare($sql);
		if($stmt->execute(array(':id' => $id))){
			$result = $stmt->fetchAll();
		}
		if(count($result) > 0){
			$lastname = $result[0]['lname'];
			$firstname = $result[0]['fname'];
			$title = $result[0]['title'];
			$gender = $result[0]['gender'];
			$nationality = $result[0]['nationality'];
			$ac_lastname = $result[0]['ac_lname'];
			$ac_firstname = $result[0]['ac_fname'];
			$ac_title = $result[0]['ac_title'];
			$ac_gender = $result[0]['ac_gender'];
			$ac_nationality = $result[0]['ac_nationality'];
			$companyname = $result[0]['company_name'];
			$department = $result[0]['company_dept'];
			$street = $result[0]['company_street'];
			$state = $result[0]['company_state'];
			$zipcode = $result[0]['company_zipcode'];
			$country = $result[0]['company_country'];
			$phonenumber = $result[0]['company_phone'];
			$mobilenumber = $result[0]['company_mobile'];
			$faxnumber = $result[0]['company_fax'];
			$email = $result[0]['email'];
			$category = $result[0]['reg_category'];
			$session = explode(',', $result[0]['session']);
			$sessionstr = $result[0]['session'];
			$payopt = $result[0]['payment_opt'];
			$confirmation_no = $result[0]['confirmation_no'];
			$tour = $result[0]['tour'];
			$ac_tour = $result[0]['ac_tour'];
			$ac_fee = $result[0]['ac_fee'];
			$totalfee = $result[0]['totalfee'];
			$withaccompany = $result[0]['withaccompanying'];
			$iswaived = $result[0]['iswaived'];

			$del_cat = '';

			if($result[0]['reg_category'] == 'student' || $result[0]['reg_category'] == '2student') 
				$del_cat = 'Student (2 Days)'; 
			else if($result[0]['reg_category'] == 'ishs' || $result[0]['reg_category'] == '2ishs')
				$del_cat = 'ISHS Member (2 Days)';
			else if($result[0]['reg_category'] == 'nonishs' || $result[0]['reg_category'] == '2nonishs')
				$del_cat = 'Non-ISHS Member (2 Days)';
			else if($result[0]['reg_category'] == '1nonishs')
				$del_cat = 'Non-ISHS Member (1 Day)';
			else if($result[0]['reg_category'] == '1ishs')
				$del_cat = 'ISHS Member (1 Day)';
			else if($result[0]['reg_category'] == '1student')
				$del_cat = 'Student (1 Day)';
			else if($result[0]['reg_category'] == 'avdrc_2nonishs')
				$del_cat = 'AVRDC Non-ISHS Member (2 Days)';
			else if($result[0]['reg_category'] == 'avdrc_2ishs')
				$del_cat = 'AVRDC ISHS Member (2 Days)';



			$fee =  ($iswaived == 0) ? 'Standard Fee' : 'Waived Fee';
			$tour = isset($selected_tour[$tour]) ? $selected_tour[$tour] : '';
			$regcat = ($iswaived == 0) ? 'Developed Country' : 'Developing/Less Developed Country';


			$Body = '';
			/*
			$Body.="<h2><strong>Confirmation No.: </strong> $confirmation_no</h2><br />"; 
			$Body.="<strong>Delegate Info</strong><br />"; 
			$Body.="Title: $title<br />";
			$Body.="First Name: $firstname<br />";
			$Body.="Last Name: $lastname<br />";
			$Body.="Gender: $gender<br />";
			$Body.="Nationality: $nationality<br /><br />";
			$Body.="<strong>Accompanying Person Info</strong><br />";
			$Body.="Title: $ac_title<br />";
			$Body.="First Name: $ac_firstname<br />";
			$Body.="Last Name: $ac_lastname<br />";
			$Body.="Gender: $ac_gender<br>";
			$Body.="Nationality: $ac_nationality<br /><br />";
			$Body.="<strong>Company Info</strong><br />";
			$Body.="Company Name: $companyname<br />";
			$Body.="Department: $department<br />";
			$Body.="Street/City: $street<br />";
			$Body.="State: $state<br />";
			$Body.="Zipcode: $zipcode<br />";
			$Body.="Country: $country<br />";
			$Body.="E-mail: $email<br />";
			$Body.="Tel. No.: $phonenumber<br />";
			$Body.="Mob. No.: $mobilenumber<br />";
			$Body.="Fax No.: $faxnumber<br />";
			$Body.="Category: $category<br />";
			$Body.="Session: $sessionstr<br />";
			$Body.="Payment Option: $payopt<br />";
			$Body.="Date Registered: $now<br />";
			$Body.="<br /><br />";
			*/
			//$Body.="<strong>Total Fee: </strong>$$regfee<br /><br />";
			$Body.='<table style="width:100%;" border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td colspan="2" style="text-align:center"><strong><h3>REGISTRATION PAYMENT CONFIRMATION</h3></strong></td>
						</tr>
						<tr>
							<td><strong>DATE</strong></td>
							<td>'.$now.'</td>
						</tr>
						<tr>
							<td><strong>CONFIRMATION NO.</strong></td>
							<td><span>'.$confirmation_no.'</span></td>
						</tr>
						<tr>
							<td><strong>NAME OF DELEGATE</strong></td>
							<td><span>' . $firstname . ' '. $lastname .'</span></td>
						</tr>
						<tr>
							<td><strong>ORGANIZATION</strong></td>
							<td><span>' . $companyname .'</span></td>
						</tr>
						<tr>
							<td><strong>ADDRESS</strong></td>
							<td><span>' . $street . ', ' . $state . ', ' . $country . ' ' . $zipcode . '</span></td>
						</tr>
						<tr>
							<td><strong>DELEGATE CATEGORY</strong></td>
							<td><span>' . $del_cat . '</span></td>
						</tr>
						<tr>
							<td><strong>COUNTRY</strong></td>
							<td><span>' . $country . '</span></td>
						</tr>
						<tr>
							<td><strong>REGISTRATION CATEGORY</strong></td>
							<td><span>' . $regcat . '</span></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center">&nbsp;</td>
						</tr>
						<tr>
							<td><strong>BREAKDOWN OF CHARGES</strong></td>
							<td></td>
						</tr>
						<tr>
							<td><strong>1. Registration Fee (Standard or Waived)</strong></td>
							<td><span>' . $fee . '</span></td>
						</tr>
						<tr>
							<td><strong>2. Farm Tour</strong></td>
							<td>' . $tour . '</td>
						</tr>
						<tr>
							<td>Total Due</td>
							<td align="right"><span>$'.$totalfee.'</span></td>
						</tr>
						<tr>
							<td>Payment Mode</td>
							<td><span>'.$payopt.'</span></td>
						</tr>
						<tr class="success">
							<td><strong>Amount Received</strong></td>
							<td align="right"><span>$'.$totalfee.'</span></td>
						</tr>
					</table>';


					if(noticetoregistrant($firstname,$lastname,$email,$now,$Body))
					{
						Log::logMessage('Message sent to ' . $email, 'information');
						return true;
					}
					else
					{
						Log::logMessage('Error sending to ' . $email, 'error');		
					}



		}
	}
	catch(PDOException $e){
		Log::logMessage($e->getMessage, 'exception');
	}
	return false;
}



function noticetoregistrant($firstname,$lastname,$email,$now,$info)
{
	$name=$firstname.' '.$lastname;
	$info=str_replace('\r\n',', ',$info);
	$info=str_replace('\R\N',', ',$info);
	//$info=str_replace(chr(13),', ',$info);
	$Sender="ISM2015 Registration <noreply@moringaling.net>";
	$Recipient=$email;
	$Subject="ISM2015 Registration Payment Confirmation";
	$Body = '';
	$Body = file_get_contents('ism2015-email-payment-notification.html');
	$Body = str_replace("%INFO%", $info, $Body);
	$mailheaders  = "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$mailheaders .= "Return-Path: noreply@moringaling.net \r\n";
	$mailheaders .= "From: ISM2015 <noreply@moringaling.net>  \r\n"; // from address fo the person
	$mailheaders .= "Reply-To: noreply@moringaling.net\r\n"; // reply field
	$mailheaders .= "Bcc: francis.lomugdang@gmail.com" . "\r\n";
	$send=0;
	//$send = mail($Recipient,$Subject,$Body,$mailheaders);
	Log::logMessage('Sending Email to ' . $email, 'information');
	return $send;
}