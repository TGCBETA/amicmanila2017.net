<?php 
	require_once("../loader.php");
	
	if (!isset($_SESSION['user'])) 
	{ 
		echo 'nosession'; // think about user feedback, "your session timed out" ... index.php?action=session_timeout
		exit; // <= IMPORTANT !!!
	} 
	
	$registrationResult = array();
	
	$recordCount = 10;
	$searchKeyword = "";
	$pageCount = 1;
	
	
	if(isset($_POST["recordCount"]) && $_POST["recordCount"] != "")
	{
		if(isint($_POST["recordCount"]) && $_POST["recordCount"] >= 10)
		{
			$recordCount = $_POST["recordCount"];
		}
	}
	
	if(isset($_POST["searchKeyword"]) && $_POST["searchKeyword"] != "")
	{
		$searchKeyword = sanitize($_POST["searchKeyword"]);
	}
	
	if(isset($_POST["page"]) && $_POST["page"] != "")
	{
		if(isint($_POST["page"]) && $_POST["page"] > 0)
		{
			$pageCount = $_POST["page"];
		}
	}
	
	LoadList($recordCount,$searchKeyword,$pageCount);
	
	function LoadList($recordCount,$searchKeyword,$page)
	{
		global $registrationResult;
		global $dbh;
		$whereclause = " WHERE 1 = 1";
		
		$param = array();
		
		//$param[":parentID"] = $parentId;
		if($searchKeyword != "")
		{
			$whereclause .= " and (lname like :keyword or fname like :keyword)";// or Description like :keyword)";
			$param[":keyword"] = "%" . $searchKeyword . "%";
		}
		
		$whereclause .= " order by date_registered desc ";
		$whereclause .= " LIMIT " . (($page - 1) * $recordCount) . ", " . $recordCount;
		

		try{
			$sql = 'Select * from ism2015_registration ' . $whereclause;
			$stmt = $dbh->prepare($sql);
			if($stmt->execute($param)){
				$registrationResult = $stmt->fetchAll();
			}
		}
		catch(PDOException $e){}
	}
	
	function GetTotalRecorCount($searchKeyword)
	{
		global $dbh;
		$registrationResult = array();
		$whereclause = " WHERE 1 = 1 ";
		
		$param = array();
		
		//$param[":parentID"] = $parentId;
		if($searchKeyword != "")
		{
			$whereclause .= " and (lname like :keyword or fname like :keyword)";// or Description like :keyword)";
			$param[":keyword"] = "%" . $searchKeyword . "%";
		}
		
		
		try{
			$sql = 'Select * from ism2015_registration ' . $whereclause;
			$stmt = $dbh->prepare($sql);
			if($stmt->execute($param)){
				$registrationResult = $stmt->fetchAll();
			}
		}
		catch(PDOException $e){}

		return count($registrationResult);
	}
?>

<br />
<?php
if(count($registrationResult) > 0)
{
?>
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Confirmation No</th>
			<th>Fullname</th>
			<th>Country</th>
			<th>Email</th>
			<th>Category</th>
			<th>Date Registered</th>
			<th>Amount</th>
			<th>Payment Option</th>
			<th>On Site</th>
			<th>Paid</th>
			<th></th>
			<!--th></th>
			<th></th-->
		</tr>
	</thead>
	<tbody>
		
		<?php 
			foreach($registrationResult as $register)
			{
		?>
			<tr>
				<td><?php echo $register['confirmation_no'] ?></td>
				<td><?php echo $register['fname'] ?> <?php echo $register['lname'] ?></td>
				<td><?php echo $register['company_country'] ?></td>
				<td><?php echo $register['email'] ?></td>
				<td><?php
					if($register['reg_category'] == 'student' || $register['reg_category'] == '2student') 
						echo 'Student (2 Days)'; 
					else if($register['reg_category'] == 'ishs' || $register['reg_category'] == '2ishs')
						echo 'ISHS Member (2 Days)';
					else if($register['reg_category'] == 'nonishs' || $register['reg_category'] == '2nonishs')
						echo 'Non-ISHS Member (2 Days)';
					else if($register['reg_category'] == '1nonishs')
						echo 'Non-ISHS Member (1 Day)';
					else if($register['reg_category'] == '1ishs')
						echo 'ISHS Member (1 Day)';
					else if($register['reg_category'] == '1student')
						echo 'Student (1 Day)';
					else if($register['reg_category'] == 'avdrc_2nonishs')
						echo 'AVRDC Non-ISHS Member (2 Days)';
					else if($register['reg_category'] == 'avdrc_2ishs')
						echo 'AVRDC ISHS Member (2 Days)';
					else if($register['reg_category'] == 'committee_2nonishs')
						echo 'Committee Non-ISHS Member (2 Days)';
					else if($register['reg_category'] == 'committee_2ishs')
						echo 'Committee ISHS Member (2 Days)';

					if($register['iswaived'] == 1):
						echo ' <span class="text-warning">(Waived)</span>';
					endif;

				?></td>
				<td><?php echo $register['date_registered'] ?></td>
				<td>$ <?php echo number_format($register['totalfee'], 2) ?></td>
				<td><?php echo $register['payment_opt'] ?></td>
				<td><?php 
					if($register['onsite_dp'] == 1)
						echo '<i class="icon-circle text-success"></i>';
					else
						echo '<i class="icon-circle text-danger"></i>';
				?></td>
				<td>

					<?php 
						if($register['ispaid'] == 1){
							echo '<span class="label label-success">Yes</span>';
						}
						else if($register['ispaid'] == 0){
							echo '<span class="label label-danger">No</span>';
						}
						elseif($register['ispaid'] == 2){
							echo '<span class="label label-warning">Void</span>';
						}
					?>
				</td>
				<td>

					<!--select id="paid_<?php echo $register['id']; ?>" style="border-color:<?php if($register['ispaid']  == 1) { echo '#87B87F'; } else { echo '#D15B47'; } ?>;">
						<option value="1" <?php if($register['ispaid']  == 1) { echo 'selected="selected"'; } ?>>Paid</option>
						<option value="0" <?php if($register['ispaid']  == 0) { echo 'selected="selected"'; } ?>>Unpaid</option>
						<option value="1" <?php if($register['ispaid']  == 2) { echo 'selected="selected"'; } ?>>Void</option>
					</select-->
					<div class="btn-group">
					  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Action <span class="icon-caret-down "></span>
					  </button>
					  <ul class="dropdown-menu">
					  	<li><a onclick="viewDetails(<?php echo $register['id']; ?>)" href="javascript:void(0)">Details</a></li>
					    <li><a onclick="updatestatus(<?php echo $register['id']; ?>, '1')" href="javascript:void(0)">Paid</a></li>
					    <li><a onclick="updatestatus(<?php echo $register['id']; ?>, '0')" href="javascript:void(0)">Unpaid</a></li>
					    <li><a onclick="updatestatus(<?php echo $register['id']; ?>, '2')" href="javascript:void(0)">Void</a></li>
					    <li><a onclick="sendemail(<?php echo $register['id']; ?>)" href="javascript:void(0)">Send Notification Email</a></li>
					    <li><a onclick="sendlink(<?php echo $register['id']; ?>)" href="javascript:void(0)">Send Flight Details Link</a></li>
					    <li><a onclick="viewactivities(<?php echo $register['id']; ?>)" href="javascript:void(0)">View Activities</a></li>
					  </ul>
					</div>

				</td>
				<!--td>
					<select id="paid_<?php echo $register['id']; ?>" style="border-color:<?php if($register['isvoid']  == 1) { echo '#87B87F'; } else { echo '#D15B47'; } ?>;">
						<option value="1" <?php if($register['isvoid']  == 1) { echo 'selected="selected"'; } ?>>Void</option>
						<option value="0" <?php if($register['isvoid']  == 0) { echo 'selected="selected"'; } ?>>Not Void</option>
					</select>
				</td-->
				<!--td>
					<button class="btn btn-sm btn-success"><i class="icon-save"></i></button>
				</td-->
				<!--td>
					<button class="btn btn-sm btn-warning" onclick="viewDetails(<?php echo $register['id']; ?>)"><i class="icon-list"></i></button>
				</td-->
			</tr>
		<?php 
			}
		?>
	</tbody>
    <tr>
      <td colspan="12"><span class="pull-right">
        <ul class="pagination">
          <?php 
						if($pageCount == 1)
						{
					?>
          <li class="prev disabled"> <a href="#"> <i class="icon-double-angle-left"></i> </a> </li>
			<?php
						}
						else
						{
			?>
          <li class="prev"> <a href="#" onclick="registrantsnextpage(<?php echo $pageCount - 1;?>)"> <i class="icon-double-angle-left"></i> </a> </li>
          <?php
						}
					?>
          <?php 
						$totalRecordCount = GetTotalRecorCount($searchKeyword);
						$pages = 0;
						
						if($totalRecordCount > 0)
						{
							$pages = ceil($totalRecordCount / $recordCount);
							if($pages > 1)
							{
								$startpage = 1;
								$endpage = 10;
								if($pages <= 9)
									$endpage = $pages;
								
								if($pageCount > 6 && $pages > 10)
								{
									$startpage = $pageCount - 4;
									$endpage = $pageCount + 5;
									if($endpage > $pages)
									{
										$startpage = $pages - 8;
										$endpage = $pages;
									}
								}
								
								
								for($page = $startpage; $page <= $endpage;$page++)
								{
									if($pageCount != $page)
									{
										echo "<li><a href=\"javascript:void(0);\"  onclick=\"registrantsnextpage(" . $page . ")\">".$page."</a></li>";
									}
									else
									{
										echo "<li class=\"active\"><a href=\"#\">" . $page . "</a></li>";
									}
								}
							}
							else
							{
								echo "<li><a href=\"#\">1</a></li>";
							}
						}
						else
						{
							echo "<li><a href=\"#\">1</a></li>";
							$pages = 1;
						}
					?>
          <?php 
						if($pageCount == $pages)
						{
					?>
          <li class="next disabled"> <a href="#"> <i class="icon-double-angle-right"></i> </a> </li>
          <?php
                    	}
						else
						{
					?>
          <li class="next"> <a href="#" onclick="registrantsnextpage(<?php echo $pageCount + 1;?>)"> <i class="icon-double-angle-right"></i> </a> </li>
          <?php
				}
			?>
        </ul>
        </span> </td>
    </tr>
  </tbody>
</table>
<?php
}
else
{
	echo "<span class=\"text-danger\"><i><strong>No Record to display</strong></i></span><br /><br /><br /><br />";
}
?>
