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
		$businessname = htmlspecialchars($_POST["businessname"]);
		$businesscategory = htmlspecialchars($_POST["category"]);
		$expertise = htmlspecialchars($_POST["expertise"]);
        $businessphone = htmlspecialchars($_POST["businessphone"]);
        $businessmail = htmlspecialchars($_POST["businessmail"]);

		// We either use an UPDATE or INSERT statement depending on whether or not
		// the user has added their address details before.

		
			
			// Prepare an update statement
			$sql = "UPDATE `members` SET `business_name`= :businessname, `business_exp` = :businessexp, `business_cat` = :businesscat,
            `business_phone`= :businessphone, `business_mail`= :businessmail
			WHERE `id`= :id ";
			
			if($stmt = $pdo->prepare($sql)) {
				
				// Bind variables to the prepared statement as parameters
				$stmt->bindValue(":id", $id, PDO::PARAM_STR);
				$stmt->bindValue(":businessname", $businessname, PDO::PARAM_STR);
				$stmt->bindValue(":businessexp", $expertise, PDO::PARAM_STR);
				$stmt->bindValue(":businesscat", $businesscategory, PDO::PARAM_STR);
				$stmt->bindValue(":businessphone", $businessphone, PDO::PARAM_STR);
				$stmt->bindValue(":businessmail", $businessmail, PDO::PARAM_STR);
				

			}
		
			if(!empty($businessname) && !empty($expertise) && !empty($businesscategory) && !empty($businessphone) && !empty($businessmail)) {

		
				//Update user info by saving infos to database
				if ($stmt->execute()) {

					//Show a success message
					header("location: businessprofile.php?message=success");
                    exit;
                    
				} else {
					//Show an error message
					header("location: businessprofile.php?message=error");
					exit;
				}
					
		
			} else {

				//Ask user to fill in their details
				header("location: businessprofile.php?message=warning");
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
					<div class="col-md-6 col-xs-12 col-md-offset-3">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li class="" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Complete Business Profile</span></a></li>
										
										</ul>
										<div class="tab-content" id="myTabContent_8">
											<div id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="col-md-12">
													<div class="pt-20">
													
														<div class="form-wrap">
															<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
																<div class="form-body overflow-hide">
																	<div class="form-group">
																		<label class="control-label mb-10" for="Business Name">Business Name</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-user"></i></div>
																			<input type="text" name="businessname" class="form-control" value="<?php echo ( $businessname ?? $user->business_name);  ?>">
																		</div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label mb-10" for="category">Choose Category</label>
                                                                        <select class="form-control" name="category" data-placeholder="Select Category" tabindex="1">
                                                                            <?php
                                                                                if (!empty($user->business_cat)) {
                                                                                    echo '<option value="'.$user->business_cat.'" selected="selected">'.$user->business_cat.'</option>';
                                                                                } else {
                                                                                    echo '<option value="">Select Category </option>'. "\n";
                                                                                } 
                                                                            ?>
                                                                            <option value=""></option>
                                                                            <option value="Automobile Repair">Automobile Repair</option>
                                                                            <option value="Barbing">Barbing</option>
                                                                            <option value="Event Management">Event Management</option>
                                                                            <option value="Driving">Driving</option>
                                                                            <option value="Design & Tech">Design & Tech</option>
                                                                        </select>
                                                                    </div>
																	<div class="form-group">
																		<label class="control-label mb-10" for="expertise">What we do?</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-user"></i></div>
																			<input type="text" name="expertise" class="form-control" value="<?php echo ( $expertise ?? $user->business_exp );  ?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label mb-10" for="Business Number">Business Number</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-phone"></i></div>
																			<input type="tel" name="businessphone" class="form-control" value="<?php echo ( $businessphone ?? $user->business_phone );  ?>">
																		</div>
                                                                    </div>
                                                                    <div class="form-group">
																		<label class="control-label mb-10" for="business__email">Business Email</label>
																		<div class="input-group">
																			<div class="input-group-addon"><i class="icon-phone"></i></div>
																			<input type="text" name="businessmail" class="form-control" value="<?php echo ( $businessmail ?? $user->business_mail );  ?>">
																		</div>
																	</div>
																	
																</div>
																<div class="form-actions mt-10">			
																	<button type="submit" class="btn btn-primary mr-10 mb-30">Update Business Profile</button>
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