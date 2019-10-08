<?php 

	include __DIR__ . '/config/config.php';
	include __DIR__ . '/config/paths.php';
	include __DIR__ . '/config/connect.php'; 

	

	// Check if the user is already logged in, if yes then redirect him to welcome page
	 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ 
		header("location: artisan/index.php");
    	exit;
	} 
	
	// Define variables and initialize with empty values
	$username = $password = "";
	$username_err = $password_err = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		// Check if username is empty
		if(empty(trim($_POST["username"]))){
			$username_err = "Please enter username.";
		} else{
			$username = trim($_POST["username"]);
		}
		
		// Check if password is empty
		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter your password.";
		} else{
			$password = trim($_POST["password"]);
		}
		
		// Validate credentials
		if(empty($username_err) && empty($password_err)){
			// Prepare a select statement
			$sql = "SELECT id, username, passkey, u_role FROM members WHERE username = :username";
			
			if($stmt = $pdo->prepare($sql)){
				// Bind variables to the prepared statement as parameters
				$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
				
				// Set parameters
				$param_username = trim($_POST["username"]);
				
				// Attempt to execute the prepared statement
				if($stmt->execute()){

					// Check if username exists, if yes then verify password
					if($stmt->rowCount() == 1){
						if($row = $stmt->fetch()){

							$id = $row["id"];
							$username = $row["username"];
							$role = $row["u_role"];
							$hashed_password = $row["passkey"];

							if(password_verify($password, $hashed_password)){
								
								$smsg = "Login Successful! Redirecting";

								// Password is correct, so start a new session
								session_start();
								
								// Store data in session variables
								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["username"] = $username;                            
								
								if($role == "admin") {
									// Redirect user to welcome page
									header("location: admin/index.php");
									exit;	
								} elseif($role == "artisan"){
									// Redirect user to welcome page
									header("location: artisan/index.php");
									exit;
								} else {
									// Redirect user to welcome page
									header("location: client/index.php");
									exit;
								}
								

							} else {
								// Display an error message if password is not valid
								$password_err = "The password you entered was not valid.";
							}
						}
					} else {
						// Display an error message if username doesn't exist
						$username_err = "No account found with that username.";
					}
				} else{
					$err = "Cannot retrieve data at the moment. Please try again later.";
				}
			}
			
			// Close statement
			unset($stmt);
		}
		
		// Close connection
		unset($pdo);
	}
	
?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title> <?php echo $TITLE; ?> | Login </title>
		<meta name="description" content="Grandin is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Grandin Admin, Grandinadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="<?php echo $BASE_URL; ?>vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		
		
		<!-- Custom CSS -->
		<link href="<?php echo $BASE_URL; ?>admin/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
						<h4 class="white-text bold-text">Verify Your Mobile Number</h4>
					</a>
				</div>
				<!-- <div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Don't have an account?</span>
					<a class="inline-block btn btn-primary  btn-rounded" href="signup.html">Sign Up</a>
				</div> -->
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div id="login-bg" class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div id="cus-card" class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-light mb-10">Sign in</h3>
											<?php if(isset($smsg)) {
                                            	?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div> <?php
                                        	} ?>
										</div>	
										<div class="form-wrap">
											<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
												<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
													<label class="control-label mb-10" for="username">Username</label>
													<input id="input-round" type="text" name="username" class="form-control" required="" id="" value="<?php echo $username; ?>">
													<span class="help-block"><?php echo $username_err; ?></span>
												</div>
												<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
													<label class="pull-left control-label mb-10" for="password">Password</label>
													<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">forgot password ?</a>
													<div class="clearfix"></div>
													<input id="input-round" type="password" name="password" value="<?php echo $password; ?>" class="form-control" required="" id="">
													<span class="help-block"><?php echo $password_err; ?></span>
												</div>
												
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2" required="" type="checkbox">
														<label for="checkbox_2"> Keep me logged in</label>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-5">
														<a style="text-decoration: underline" class="capitalize-font txt-info block mb-10 pull-left font-12" href="forgot-password.html">Become a Merchant </a>
														<a style="text-decoration: underline" class="capitalize-font txt-info block mb-10 pull-right font-12" href="forgot-password.html">Become a Buyer </a>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<input type="submit" name="login" value="sign in" class="btn btn-primary btn-rounded">
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo $BASE_URL; ?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo $BASE_URL; ?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo $BASE_URL; ?>vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo $BASE_URL; ?>admin/dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="<?php echo $BASE_URL; ?>admin/dist/js/init.js"></script>
	</body>
</html>
