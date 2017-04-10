<?php
require_once("../loader.php");

if (!isset($_SESSION['user'])) 
{ 
	echo 'nosession';
	exit;
}

$id = 0;
$result = array();

$selected_tour = array(
			'tour1'	=> 'SBE Farms Enterprises, Inc., Rosales, Pangasinan',
			'tour2'	=> 'Moringa Propagation Company, San Fernando, Pampanga',
			'tour3'	=> 'JPM/Japan-Philippines Malunggay Eco Farm, Tranca Bay, Laguna',
			'tour4'	=> 'Not Interested'
	);

if(isset($_POST['id']) && $_POST['id'] != ''){
	if(isint($_POST['id'])){
		$id = $_POST['id'];
	}
}



try{
	$sql = 'Select * from ism2015_registration where id = :id';
	$stmt = $dbh->prepare($sql);
	if($stmt->execute(array(':id' => $id))){
		$result = $stmt->fetchAll();
	}
}
catch(PDOException $e){}

if(count($result) > 0)
{
?>
<div class="row">
	<div class="col-sm-4 form-group">
		<label>Confirmation No</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['confirmation_no'] ?>"/>
	</div>
	<div class="clearfix"></div>
	<h4>Delegate Info</h4>
	<div class="col-sm-2 form-group">
		<label>Title</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['title'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Firstname</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['fname'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Lastname</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['lname'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Gender</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['gender'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Nationality</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['nationality'] ?>"/>
	</div>
	<div class="clearfix"></div>
	<h4>Accompany Info</h4>
	<div class="col-sm-2 form-group">
		<label>Title</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['ac_title'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Firstname</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['ac_fname'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Lastname</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['ac_lname'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Gender</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['ac_gender'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Nationality</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['ac_nationality'] ?>"/>
	</div>
	<div class="col-sm-12 form-group">
		<label>Company Name</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['company_name'] ?>"/>
	</div>
	<div class="col-sm-12 form-group">
		<label>Department</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['company_dept'] ?>"/>
	</div>
	<div class="col-sm-12 form-group">
		<label>Street</label>
		<textarea class="form-control" readonly="true"><?php echo $result[0]['company_street'] ?></textarea>
	</div>
	<div class="col-sm-4 form-group">
		<label>State</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['company_state'] ?>"/>
	</div>
	<div class="col-sm-3 form-group">
		<label>zipcode</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['company_zipcode'] ?>"/>
	</div>
	<div class="col-sm-5 form-group">
		<label>Country</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['company_country'] ?>"/>
	</div>
	<div class="col-sm-4 form-group">
		<label>Phone</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['company_phone'] ?>"/>
	</div>
	<div class="col-sm-4 form-group">
		<label>Mobile</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['company_mobile'] ?>"/>
	</div>
	<div class="col-sm-4 form-group">
		<label>Fax</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['company_fax'] ?>"/>
	</div>
	<div class="col-sm-12 form-group">
		<label>Email</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['email'] ?>"/>
	</div>
	<div class="col-sm-6 form-group">
		<label>Registration Category</label>
		<input type="text" class="form-control" readonly="true" value="<?php
					if($result[0]['reg_category'] == 'student' || $result[0]['reg_category'] == '2student') 
						echo 'Student (2 Days)'; 
					else if($result[0]['reg_category'] == 'ishs' || $result[0]['reg_category'] == '2ishs')
						echo 'ISHS Member (2 Days)';
					else if($result[0]['reg_category'] == 'nonishs' || $result[0]['reg_category'] == '2nonishs')
						echo 'Non-ISHS Member (2 Days)';
					else if($result[0]['reg_category'] == '1nonishs')
						echo 'Non-ISHS Member (1 Day)';
					else if($result[0]['reg_category'] == '1ishs')
						echo 'ISHS Member (1 Day)';
					else if($result[0]['reg_category'] == '1student')
						echo 'Student (1 Day)';
					else if($register['reg_category'] == 'avdrc_2nonishs')
						echo 'AVRDC Non-ISHS Member (2 Days)';
					else if($register['reg_category'] == 'avdrc_2ishs')
						echo 'AVRDC ISHS Member (2 Days)';

				?>"/>
	</div>
	<div class="col-sm-12 form-group">
		<label>Selected Tour</label>
		<textarea class="form-control" readonly="true"><?php echo isset($selected_tour[$result[0]['tour']]) ? $selected_tour[$result[0]['tour']] : '' ?></textarea>
	</div>
	<div class="col-sm-12 form-group">
		<label>Selected Session(s)</label>
		<textarea class="form-control" readonly="true"><?php echo $result[0]['session'] ?></textarea>
	</div>
	<div class="col-sm-4 form-group">
		<label>Payment Option</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['payment_opt'] ?>"/>
	</div>
	<div class="col-sm-4 form-group">
		<label>Date Registerd</label>
		<input type="text" class="form-control" readonly="true" value="<?php echo $result[0]['date_registered'] ?>"/>
	</div>
	<div class="col-sm-4 form-group">
		<label>Total Fee</label>
		<input type="text" class="form-control" readonly="true" value="$ <?php echo number_format($result[0]['totalfee'], 2) ?>"/>
	</div>
</div>
<?php
}
else
{
	echo '<h4>Registrant not found on the database.</h4>';
}