<?php 
	require_once("loader.php");
	//echo str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__)));
  if (!isset($_SESSION['user'])) 
  { 
	header("Location: login.php"); // think about user feedback, "your session timed out" ... index.php?action=session_timeout
	exit; // <= IMPORTANT !!!
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Registration List</title>
<?php 
	include('includes/head-section.php');
?>
</head>
<body>
<?php 
			include('includes/nav-section.php');
		?>
<div class="main-container" id="main-container">
  <script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
  <div class="main-container-inner">
	<?php 
			include('includes/side-nav.php');
		?>
	<div class="main-content">
	  <div class="breadcrumbs" id="breadcrumbs">
			
	  </div>
	  <div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
			  <div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<br />
				<div class="modal fade" id="detailsModal">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Details</h4>
					  </div>
					  <div class="modal-body">
						  <div id="modal-content"></div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					  </div>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-12">
					<div class="table-header"> List of Registrants 
					  <button class="btn btn-success btn-sm pull-right" style="margin-top:2px; margin-right:2px;" onclick="exporttoexcel();">Export to Excel</button>
					</div>
					<br />
					<div> <span>
					  <input type="hidden" id="page" name="page" />
					  <input type="hidden" id="order" name="order" />
					  <input type="hidden" id="direction" name="direction" />
					  Display :
					  <select id="recordDisplay" onChange="loadregistrants(true);">
						<option>10</option>
						<option selected="selected">25</option>
						<option>50</option>
						<option>75</option>
						<option>100</option>
					  </select>
					  records </span> <span class="pull-right"> Search :
					  <input type="text" id="searchKeyword" class="textBox" placeholder="Lastname/Firstname"/>
					  </span> </div>
					<div class="clearfix"></div>
					<div class="table-responsive" id="listcontainer"> </div>
				  </div>
				</div>
				<!-- PAGE CONTENT ENDS -->
			  </div>
			  <!-- /.col -->
				</div>
			</div>
		</div>
	  </div>
	  <!-- /.page-content -->
	</div>
	<!-- /.main-content -->
  </div>
  <!-- /.main-container-inner -->
  <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a> </div>
<!-- /.main-container -->
<?php 
			include('includes/script-section.php');
		?>
<!-- inline scripts related to this page -->
<script type="text/javascript">

			jQuery(function($) {

				$(".textBox").keydown(function(event){
					if(event.which == 13)
					{
						event.preventDefault();
						loadregistrants(true);
					}
				});
				
				loadregistrants(true);
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			});


	  function loadregistrants(resetpage)
	  {

		var recordCount = $("#recordDisplay");
		var searchKeyword = $("#searchKeyword");
		var category = $("#searchCategory");
		var order = $("#order");
		var direction = $("#direction");
		
		if(resetpage)
		{
		  $("#page").val("");
		}
		
		var page = $("#page");
		
		//alert(searchKeyword.val());
		
		var params = {recordCount:recordCount.val(),searchKeyword:searchKeyword.val(),page:page.val(),category:category.val(),order:order.val(),direction:direction.val()};

		$("#listcontainer").html("<p><i class=\"icon-spinner icon-spin icon-large\"></i></p>");
		$.ajax({
		  cache: false,
		  type: 'POST',
		  url: 'ajax_pages/registrant_list.php',
		  data: params,
		  success: function(data) 
		  {
		  	if(data == 'nosession')
            {
              window.location.reload();
            }
			$("#listcontainer").html(data);true;
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) 
		  {
			return false;
		  }
		});
	  }

	  function registrantsnextpage(page,aid)
	  {
		$("#page").val(page);
		loadregistrants(false);
	  }

	  function viewDetails(id){
		$("#modal-content").html("<p><i class=\"icon-spinner icon-spin icon-large\"></i></p>");
		$("#detailsModal").modal('show');
		var params = { id:id };
		$.ajax({
		  cache: false,
		  type: 'POST',
		  url: 'ajax_pages/registrant_details.php',
		  data: params,
		  success: function(data) 
		  {
			if(data == 'nosession')
			{
			  window.location.reload();
			}
			$("#modal-content").html(data);
			return true;
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) 
		  {
			return false;
		  }
		});
	  }

	  function sendemail(id){
	  	if(confirm('Are you sure you want to send email confirmation?')){
	  		var params = { id:id,status:status };
			$.ajax({
			  cache: false,
			  type: 'POST',
			  url: 'ajax/sendemailconfirmation.php',
			  data: params,
			  success: function(data) 
			  {
				if(data == 'nosession')
				{
				  window.location.reload();
				}
				else if(data == 1){
					alert('Email has been successfully sent.');
					loadregistrants(false);
				}
				else{
					alert('Something went wrong while sending email. Please try again later.');
				}
				return true;
			  },
			  error: function(XMLHttpRequest, textStatus, errorThrown) 
			  {
				return false;
			  }
			});
	  	}
	  }

	  function sendlink(id){
	  	if(confirm('Are you sure you want to send flight details?')){
	  		var params = { id:id,status:status };
			$.ajax({
			  cache: false,
			  type: 'POST',
			  url: 'ajax/sendflightdetails.php',
			  data: params,
			  success: function(data) 
			  {
				if(data == 'nosession')
				{
				  window.location.reload();
				}
				else if(data == 1){
					alert('Flight Details has been successfully sent.');
					loadregistrants(false);
				}
				else{
					alert('Something went wrong while sending email. Please try again later.');
				}
				return true;
			  },
			  error: function(XMLHttpRequest, textStatus, errorThrown) 
			  {
				return false;
			  }
			});
	  	}
	  }

	  function updatestatus(id, status){

	  	var status_name = '';
	  	switch(status){
	  		case '1' : {
	  			status_name = 'paid';
	  			break;
	  		}
	  		case '2' : {
	  			status_name = 'void';
	  			break;
	  		}
	  		default : {
	  			status_name = 'unpaid';
	  			break;
	  		}
	  	}

	  	if(confirm('Are you sure you want to set the status to ' + status_name)){
	  		var params = { id:id,status:status };
			$.ajax({
			  cache: false,
			  type: 'POST',
			  url: 'ajax/savestatus.php',
			  data: params,
			  success: function(data) 
			  {
				if(data == 'nosession')
				{
				  window.location.reload();
				}
				else if(data == 1){
					alert('Status has been successfully set.');
					loadregistrants(false);
				}
				else{
					alert('Something went wrong while saving information. Please try again later.');
				}
				return true;
			  },
			  error: function(XMLHttpRequest, textStatus, errorThrown) 
			  {
				return false;
			  }
			});
	  	}
	  }

	  function exporttoexcel(){
	  	var win = window.open("export.php", "Export to Excel", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=300");
	  }
			
		</script>
</body>
</html>
