<?php
	require_once("loader.php");
	date_default_timezone_set("Asia/Manila");
	$loggedin = false;
	$status = "";
	$username = '';
	

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$status = login();
	}
	
	function login()
	{
		global $dbh;
		global $loggedin;
		global $username;
		$user='';
		$pass='';
		$userexists=false;
	
		$txtu_base64 = base64_decode($_POST["txtu_base64"]); // data_base64 from JS
		$txtp_base64 = base64_decode($_POST["txtp_base64"]); // data_base64 from JS
		$iv        = base64_decode($_POST["txtiv_base64"]);   // iv_base64 from JS
		$key       = base64_decode($_POST["txtkey_base64"]);  // key_base64 from JS
		$txtu_plain = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_128, $key, $txtu_base64, MCRYPT_MODE_CBC, $iv ), "\0 " );
		$txtp_plain = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_128, $key, $txtp_base64, MCRYPT_MODE_CBC, $iv ), "\0 " );
		
		
		$strPad = ord($txtu_plain[strlen($txtu_plain)-1]);
		$txtu_plain = substr($txtu_plain, 0, -$strPad);

		$strPad = ord($txtp_plain[strlen($txtp_plain)-1]);
		$txtp_plain = substr($txtp_plain, 0, -$strPad);
		
		
		if($txtu_plain == "" || $txtp_plain == "")
		{
			$loggedin = false;
			return 0;
		}
		
		$user=sanitize($txtu_plain);
		$pass=sanitize($txtp_plain);
		if($user == USER && md5($pass) == PASS){
			session_start();
			$_SESSION['user']=$user;
			Session_regenerate_id(true);
			$done="registrationlist.php";
			header( 'Location: '.$done );
			exit;
		}
		/*
		$username = $user;
		
		try
		{
		$SQL="select * from users where username=:user and password=:pass and isactive=1";
		$stmt = $dbh->prepare($SQL);
		$param = array();
		$param[":user"] = $user;
		$param[":pass"] = $pass;//md5($pass);


		
		if($stmt->execute($param))
		{
			$result = $stmt->fetchAll();
			if(count($result) > 0)
			{
				$userexists = true;
				session_start();
				$_SESSION['userid']=$result[0]["userid"];
				$_SESSION['name']=$result[0]["name"];
				//$_SESSION['access_level']=$result[0]["access_level"];
				//$_SESSION["token"] = uniqid(mt_rand(), true);
				Session_regenerate_id(true);
				$done="section.php";
				header( 'Location: '.$done );
				exit;
			}
		}
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
			echo 'Error!';
		}
		*/
		return 0;
		$loggedin = false;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login Page - <?php echo APPNAME;?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<!--i class="icon-food blue"></i-->
									<span class="red"><?php echo APPNAME;?></span>
									<span class="white">Admin</span>								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="fa fa-user green"></i>
												Please Enter Your Information											</h4>

											<div class="space-6"></div>

											
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username" id="user" name="user" />
															<i class="icon-user"></i>														</span>													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" id="pass" name="pass" />
                                                            
                                                            
                                                            
															<i class="icon-lock"></i>                                                        </span>                                                   </label>

													<div class="space"></div>

													<div class="clearfix">
                                                    	<form method="post" id="login">
                                                    	<input type="hidden" id="txtu_base64" name="txtu_base64"/>
                                                            <input type="hidden" id="txtp_base64" name="txtp_base64"/>
                                                            <input type="hidden" id="txtiv_base64" name="txtiv_base64"/>
                                                            <input type="hidden" id="txtkey_base64" name="txtkey_base64"/>
                                                            <span class="text-danger">
                                                            <?php 
																if($status === 0)
																{
																	echo "Invalid Username/Password";
																}
															?>
                                                            </span>
														<button type="button" id="loginButton" name="loginButton" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Login                                                        </button>
                                                        </form>
													</div>

													<div class="space-4"></div>
												</fieldset>
										</div><!-- /widget-main -->
									</div><!-- /widget-body -->
								</div><!-- /login-box -->

								
							</div><!-- /position-relative -->
						</div>
					</div>
				  <!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
		</script>
        
        <script type="text/javascript" src="assets/js/pbkdf2.js"></script>
		<script type="text/javascript" src="assets/js/aes.js"></script>
        <script src="assets/js/functions.js"></script>
        <script>
            $(function(){
                $("#loginButton").click(function(){
                    Submit();
                    //alert('test');
                });
            
                $("#user").keydown(function(event){
                    if(event.which == 13) 
                    {
                        $("#loginButton").click();
                    }
                });
                
                $("#pass").keydown(function(event){
                    if(event.which == 13)
                    {
                        $("#loginButton").click();
                    }
                });
            });
        </script>
	</body>
</html>
