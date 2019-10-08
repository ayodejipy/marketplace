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

		

		//Get user ID from session, retrieve user input and save to a variable
		$id = $_SESSION['id'];
		$businessstate = htmlspecialchars($_POST["businessstate"]);
		$businesscity = htmlspecialchars($_POST["businesscity"]);
		$businessaddress = htmlspecialchars($_POST["businessaddress"]);

		// We either use an UPDATE or INSERT statement depending on whether or not
		// the user has added their address details before.

		
			
			// Prepare an update statement
			$sql = "UPDATE `members` SET  `business_city` = :bcity, `business_state` = :bstate, `business_addr` = :baddress
            WHERE `id`= :id ";
			
			if($stmt = $pdo->prepare($sql)) {
				
				// Bind variables to the prepared statement as parameters
				$stmt->bindValue(":id", $id, PDO::PARAM_STR);
				$stmt->bindValue(":bstate", $businessstate, PDO::PARAM_STR);
				$stmt->bindValue(":bcity", $businesscity, PDO::PARAM_STR);
				$stmt->bindValue(":baddress", $businessaddress, PDO::PARAM_STR);
				

			}
		
			if(!empty($businessstate) && !empty($businesscity) && !empty($businessaddress)) {

		
				//Update user info by saving infos to database
				if ($stmt->execute()) {

					//Show a success message
					header("refresh: 5; location: edit_address.php?message=success");
                    exit;
                    
				} else {
					//Show an error message
					header("location: edit_address.php?message=error");
					exit;
				}
					
		
			} else {

				//Ask user to fill in their details
				header("location: edit_address.php?message=warning");
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
									<?php echo "Congratulations, we have successfully updated your business details."; ?>
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
									<?php echo "You have not completed all the form fields below and we cannot update your details. Please make sure that you have completed all the fields in the form below and try again."; ?>
									
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				
				<!-- Row -->
				<div class="row">
					<div class="col-md-6 col-xs-12 ">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li class="" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Edit Business Address</span></a></li>
										</ul>
										<div class="tab-content" id="myTabContent_8">
											<div id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="col-md-12">
													<div class="pt-20">
													
														<div class="form-wrap">
															<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
																<div class="form-body overflow-hide">
																	
																	<div class="form-group">
																		<label class="control-label mb-10">Country</label>
																		<input type="text" name="businesscountry" class="form-control" value="<?php echo $user->mem_country; ?>" readonly>
																	</div>
																	
																	<div class="form-group">
																		<label class="control-label mb-10">State</label>
																		<select class="form-control" name="businessstate" data-placeholder="Select State" tabindex="1">
                                                                            <?php
                                                                                if (!empty($user->business_state)) {
                                                                                    echo '<option value="'.$user->business_state.'" selected="selected">'.$user->business_state.'</option>';
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
																		<input type="text" name="businesscity" class="form-control" value="<?php echo ($businesscity ?? $user->business_city);  ?>">
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10">Address</label>
																		<input type="text" name="businessaddress" class="form-control" value="<?php echo ($businessaddress ?? $user->business_addr);  ?>">
																	</div>
																</div>
																<div class="form-actions mt-10">			
																	<button type="submit" class="btn btn-primary mr-10 mb-30">Update Business Address</button>
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