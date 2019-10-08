<?php 

	include __DIR__ . '../../config/config.php';
	include __DIR__ .'../../config/paths.php';
	include __DIR__ .'../../config/connect.php';
	include __DIR__ . '/checkLog.php';
	include __DIR__ . '../../inc/adm-header.php';

		
		// <!-- Left Sidebar Menu -->

		include __DIR__ . '../../inc/adm-left-nav.php';
		//Left Sidebar Menu -->
		
		//Right Sidebar Menu -->
		include __DIR__ . '../../inc/adm-right-nav.php';

		// <!-- /Right Sidebar Menu -->

	/**
	 * We want to add or update the details in the database
	 */

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		

		//Retrieve user input and save to a variable
		$id = $_SESSION['id'];
		$firstname = htmlspecialchars($_POST["firstname"]);
		$lastname = htmlspecialchars($_POST["lastname"]);
		$gender = htmlspecialchars($_POST["gender"]);
		$phone = htmlspecialchars($_POST["phone"]);
		$country = htmlspecialchars($_POST["country"]);
		$state = htmlspecialchars($_POST["state"]);
		$city = htmlspecialchars($_POST["city"]);
		$address = htmlspecialchars($_POST["address"]);

		// We either use an UPDATE or INSERT statement depending on whether or not
		// the user has added their address details before.

		
			
			// Prepare an update statement
			$sql = "UPDATE `members` SET `firstname`= :firstname, `lastname` = :lastname, `phone`= :phone, `gender`= :gender, `mem_country`= :country, `mem_state`= :state, `mem_city`= :city, 
			`mem_address`= :address WHERE `id`= :id ";
			// $sql = "UPDATE `members` SET `f_name`= $firstname, `l_name` = $lastname, `phone`= $phone, `gender`= $gender, `mem_country`= $country, `mem_state`= $state, `mem_city`= $city, 
			// `mem_address`= $address WHERE `id`= $id ";
			
			if($stmt = $pdo->prepare($sql)) {
				
				// Bind variables to the prepared statement as parameters
				$stmt->bindValue(":id", $id, PDO::PARAM_STR);
				$stmt->bindValue(":firstname", $firstname, PDO::PARAM_STR);
				$stmt->bindValue(":lastname", $lastname, PDO::PARAM_STR);
				$stmt->bindValue(":gender", $gender, PDO::PARAM_STR);
				$stmt->bindValue(":phone", $phone, PDO::PARAM_STR);
				$stmt->bindValue(":country", $country, PDO::PARAM_STR);
				$stmt->bindValue(":state", $state, PDO::PARAM_STR);
				$stmt->bindValue(":city", $city, PDO::PARAM_STR);
				$stmt->bindValue(":address", $address, PDO::PARAM_STR);
				
				// // Set parameters
				// $param_id = $id;
				// $param_firstname = $firstname;
				// $param_lastname = $lastname;
				// $param_gender = $gender;
				// $param_phone = $phone;
				// $param_country = $country;
				// $param_state = $state;
				// $param_city = $city;
				// $param_address = $address;

				// $data = [
				// 	'firstname' => $param_firstname,
				// 	'lastname' => $param_lastname,
				// 	'gender' => $param_gender,
				// 	'phone' => $param_phone,
				// 	'country' => $param_country,
				// 	'state' => $param_state,
				// 	'city' => $param_city,
				// 	'address' => $param_address,
				// ];

			}
		
			if (!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($gender) && !empty($country) && !empty($state) && !empty($city) && !empty($address)) {

		
				//Update user info by saving infos to database
				if ($stmt->execute()) {
					//Show a success message
					header("location: edit_profile.php?message=success");
					exit;
				} else {
					//Show an error message
					header("location: edit_profile.php?message=error");
					exit;
				}
					
		
			} else {

				//Ask user to fill in their details
				header("location: edit_profile.php?message=warning");
				exit;
			}

		//  if (!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($gender) && !empty($country) && !empty($state) && !empty($city) && !empty($address)) {

		// 	try {

		// 		if ($stmt->execute()) {
		// 			echo "DONE MOTHERFUCKER!";
		// 		}

		// 	} catch(PDOException $e) {
		// 		die("ERROR: Could not Update. " . $e->getMessage());
		// 	}

		//  	// Update user info by saving infos to database
		//  	// if ($stmt->execute()) {
		//  	// 	//Show a success message
		//  	// 	header("location: edit_profile.php?message=success");
		//  	// 	exit;
		//  	// } else {
		//  	// 	//Show an error message
		//  	// 	header("location: edit_profile.php?message=error");
		//  	// 	exit;
		// 	// }
			

		// } else {
		//  	// //Ask user to fill in their details
		//  	// header("location: edit_profile.php?message=warning");
		//  	// exit;
		//  }
	}	
													
?>		
					
		
		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">

				<?php if (isset($_GET['message'])) : ?>
					<div class="row">
						<?php if ($_GET['message'] == 'success') : ?>
							<div class="col-sm-12">
								<div class="alert alert-success text-center" role="alert">
									<?php echo "Congratulations, we have successfully updated your profile."; ?>
								</div>
							</div>
						<?php elseif ($_GET['message'] == 'error') : ?>
							<div class="col-sm-12">
								<div class="alert alert-danger text-center" role="alert">
									<?php echo "There were errors while trying to process your details! Please make sure that you have completed all the fields in the form below and try again."; ?>
								</div>
							</div>
						<?php elseif ($_GET['message'] == 'warning') : ?>
							<div class="col-sm-12">
								<div class="alert alert-warning " role="alert">
									<?php echo "You have not completed all the form fields below and we cannot update your Address. Please make sure that you have completed all the fields in the form below and try again."; ?>
									
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>


				
				
				
				
				<!-- Row -->
				<div class="row">
					<div class="col-md-6 col-xs-12 col-md-offset-3">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li class="" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Gallery</span></a></li>
										</ul>
										<div class="tab-content" id="myTabContent_8">
											<div id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="col-md-12">
													<div class="pt-20">
													
														<div class="form-wrap">
															<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
																<div class="form-body overflow-hide">
																	<div class="form-group">
																		<label class="control-label mb-10" for="firstName">First Name</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-user"></i></div>
																			<input type="file" name="photo" class="form-control" id="fileupload">	
																		</div>
																	</div>
																	
																</div>
																<div class="form-actions mt-10">			
																	<button type="submit" class="btn btn-primary mr-10 mb-30">Update profile</button>
																</div>				
															</form>
														</div> <!-- /.form wrap -->
													</div>
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
							
					</div>
				</div>
				<!-- /Row -->
			
<?php include __DIR__ . '../../inc/adm-footer.php';	?>