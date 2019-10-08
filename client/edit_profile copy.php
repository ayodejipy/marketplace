<?php 

	include __DIR__ . '../../config/config.php';
	include __DIR__ .'../../config/paths.php';
	include __DIR__ .'../../config/connect.php';
	include __DIR__ . '/checkLog.php';
	include __DIR__ . '/inc/mem-header.php';

		
		// <!-- Left Sidebar Menu -->

		// include __DIR__ . '/inc/mem-left-nav.php';

		//Left Sidebar Menu -->

		// <!-- Right Sidebar Menu -->

		// include __DIR__ . '/inc/mem-right-nav.php';

		//Left Sidebar Menu -->

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
				<!-- <div class="row">
					<div class="col-lg-3 col-xs-12">
						<div class="panel panel-default card-view  pa-0 bg-gradient">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											<div class="fileupload btn btn-default">
												<span class="btn-text">edit</span>
												<input class="upload" type="file">
											</div>
											<div class="profile-image-overlay"></div>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="../img/mock1.jpg" alt="user"/>
												<div class="fileupload btn btn-default">
													<span class="btn-text">edit</span>
													<input class="upload" type="file">
												</div>
											</div>	
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-warning"><?php echo $user->username; ?></h5>
											<h6 class="block capitalize-font pb-20 txt-light"><?php echo $user->role; ?></h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="col-md-9 col-sm-12 ">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li class="" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>edit profile</span></a></li>
										</ul>
										<div class="tab-content" id="myTabContent_8">
											<div id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="col-md-12">
													<div class="pt-20">
													
														<div class="form-wrap">
															<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
																<div class="form-body overflow-hide">
																	<div class="form-group">
																		<label class="control-label mb-10" for="firstName">First Name</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-user"></i></div>
																			<input type="text" name="firstname" class="form-control" value="<?php echo ( $_POST['firstname'] ?? $user->firstname);  ?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10" for="lastName">Last Name</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-user"></i></div>
																			<input type="text" name="lastname" class="form-control" value="<?php echo ( $_POST['lastname'] ?? $user->lastname );  ?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10" for="contactNumber">Contact number</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-phone"></i></div>
																			<input type="tel" name="phone" class="form-control" value="<?php echo ( $_POST['phone'] ?? $user->phone );  ?>">
																		</div>
																	</div>
																	<!-- <div class="form-group">
																		<label class="control-label mb-10" for="exampleInputpwd_01">Password</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-lock"></i></div>
																			<input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Enter pwd" value="password">
																		</div>
																	</div> -->
																	<div class="form-group">
																		<label class="control-label mb-10">Gender</label>
																		<select class="form-control" name="gender" data-placeholder="Select Gender" tabindex="1">
																			<?php
																			if (isset($user->gender)) {
																				echo '<option value="'.$user->gender.'" selected="selected">'.$user->gender.'</option>';
																			} else {
																				echo '<option value="">Choose Gender </option>'. "\n";
																			} 
																			?>
																			<option value="male">Male</option>
																			<option value="female">Female</option>
																		</select>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10">Country</label>
																		<input type="text" name="country" class="form-control" Value="<?php echo ( $_POST['country'] ?? $user->mem_country ); ?>">
																	</div>
																	
																	<div class="form-group">
																		<label class="control-label mb-10">State</label>
																		<select class="form-control" name="state" data-placeholder="Select State" tabindex="1">
																		<?php
																			if (!empty($user->mem_state)) {
																				echo '<option value="'.$user->mem_state.'" selected="selected">'.$user->mem_state.'</option>';
																			} else {
																				echo '<option value="">Select State </option>'. "\n";
																			} 
																		?>
																		<option value="Abuja FCT">Abuja FCT</option>
																		<option value="Abia">Abia</option>
																		<option value="Adamawa">Adamawa</option>
																		<option value="Akwa Ibom">Akwa Ibom</option>
																		<option value="Anambra">Anambra</option>
																		<option value="Bauchi">Bauchi</option>
																		<option value="Bayelsa">Bayelsa</option>
																		<option value="Benue">Benue</option>
																		<option value="Borno">Borno</option>
																		<option value="Cross River">Cross River</option>
																		<option value="Delta">Delta</option>
																		<option value="Ebonyi">Ebonyi</option>
																		<option value="Edo">Edo</option>
																		<option value="Ekiti">Ekiti</option>
																		<option value="Enugu">Enugu</option>
																		<option value="Gombe">Gombe</option>
																		<option value="Imo">Imo</option>
																		<option value="Jigawa">Jigawa</option>
																		<option value="Kaduna">Kaduna</option>
																		<option value="Kano">Kano</option>
																		<option value="Katsina">Katsina</option>
																		<option value="Kebbi">Kebbi</option>
																		<option value="Kogi">Kogi</option>
																		<option value="Kwara">Kwara</option>
																		<option value="Lagos">Lagos</option>
																		<option value="Nassarawa">Nassarawa</option>
																		<option value="Niger">Niger</option>
																		<option value="Ogun">Ogun</option>
																		<option value="Ondo">Ondo</option>
																		<option value="Osun">Osun</option>
																		<option value="Oyo">Oyo</option>
																		<option value="Plateau">Plateau</option>
																		<option value="Rivers">Rivers</option>
																		<option value="Sokoto">Sokoto</option>
																		<option value="Taraba">Taraba</option>
																		<option value="Yobe">Yobe</option>
																		<option value="Zamfara">Zamfara</option>
																		<option value="Outside Nigeria">Outside Nigeria</option>
																		</select>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10">City</label>
																		<input type="text" name="city" class="form-control" value="<?php echo ($_POST['city'] ?? $user->mem_city);  ?>">
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10">Address</label>
																		<input type="text" name="address" class="form-control" value="<?php echo ($_POST['address'] ?? $user->mem_address);  ?>">
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
				<!--</div> -->
				<!-- /Row -->
			
<?php include __DIR__ . '../../inc/adm-footer.php';	?>