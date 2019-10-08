<?php 

	include __DIR__ . '../../config/config.php';
	include __DIR__ .'../../config/paths.php';
	include __DIR__ .'../../config/connect.php';
	include __DIR__ . '/checkLog.php';
	include __DIR__ . '/inc/art-header.php';




		
		// <!-- Left Sidebar Menu -->
			include __DIR__ . '/inc/art-left-nav.php';
		// <!-- /Left Sidebar Menu -->
		
		// <!-- Right Sidebar Menu -->
			include __DIR__ . '/inc/art-right-nav.php'; 
		// <!-- /Right Sidebar Menu -->
		
		
			/**
			 * We want to add or update the details in the database
			 */

			

			// update profile ends here...
					
?>


        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<!-- Row -->
				<!-- <div class="row">
					
				

					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0 bg-gradient">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim">914,001</span></span>
													<span class="weight-500 uppercase-font block font-13 txt-light">edit your personal details like name, profile image, etc... </span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-left">
													<i class="icon-people data-right-rep-icon txt-light"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0 bg-gradient2">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 txt-light data-wrap-left">
													<span class="block counter"><span class="counter-anim">54,876</span></span>
													<span class="weight-500 uppercase-font block">visitors</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
													<i class=" icon-book-open data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0 bg-gradient3">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim">46.43</span>%</span>
													<span class="weight-500 uppercase-font block txt-light">growth rate</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
													<div id="sparkline_4" class="sp-small-chart" ></div>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /Row -->
				
				<!-- Row -->
				<div class="row">
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


					<div class="col-lg-12 col-sm-12">
						<div class="panel panel-default card-view">
							
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div  class="tab-struct custom-tab-1 mt-40">
										<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#home_7">Profile</a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#profile_edit" aria-expanded="false">Personal Details</a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#update_pwd" aria-expanded="false">Update Password</a></li>
										</ul>
										<div class="tab-content" id="myTabContent_7">
											<div  id="home_7" class="tab-pane fade active in" role="tabpanel">
												<div class="pull-left" style="margin-bottom: 25px">
													<h2 class="panel-title txt-dark">Hello, <?php echo $user->fullname; ?>. Welcome to your profile! </h2>
												</div>
												<div class="clearfix"></div>

												<!-- Row -->
												<div class="row">
					

													<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
														<div class="panel panel-default card-view pa-0 bg-gradient">
															<div class="panel-wrapper collapse in">
																<div class="panel-body pa-0">
																	<div class="sm-data-box">
																		<div>
																			<div id="home_7" class="tab-pane fade active in" role="tabpanel">
																				<div class="row">
																					<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
																						<span class="weight-500 lowercase-font block txt-light">Visit your profile page to see how others see you </span>
																					</div>
																					<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
																						<i class="icon-user data-right-rep-icon txt-light"></i>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													
													<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
														<div class="panel panel-default card-view pa-0 bg-gradient2">
															<div class="panel-wrapper collapse in">
																<div class="panel-body pa-0">
																	<div class="sm-data-box">
																		<div class="container-fluid">
																			<div class="row">
																				<div class="col-xs-6 text-center pl-0 pr-0 txt-light data-wrap-left">
																					<span class="weight-500 uppercase-font block">edit your details like name, address</span>
																				</div>
																				<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
																					<i class="icon-book-open data-right-rep-icon"></i>
																				</div>

																				<div class="clearfix"></div>
																			</div>	
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
														<div class="panel panel-default card-view pa-0 bg-gradient3">
															<div class="panel-wrapper collapse in">
																<div class="panel-body pa-0">
																	<div class="sm-data-box">
																		<div class="container-fluid">
																			<div class="row">
																				<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
																					<span class="weight-500 uppercase-font block txt-light">edit your details like name, address</span>
																				</div>
																				<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
																					<i class="icon-key data-right-rep-icon"></i>
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
											</div>

											<div  id="profile_edit" class="tab-pane fade" role="tabpanel">

												<div class="row">
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

													<div class="col-lg-9">
														<div class="pt-20">
															
															<div class="form-wrap">
																<form action="edit_profile.php" method="POST">
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
																			<input type="text" name="country" class="form-control" Value="<?php echo ( $_POST['country'] ?? $user->art_country ); ?>">
																		</div>
																		
																		<div class="form-group">
																			<label class="control-label mb-10">State</label>
																			<select class="form-control" name="state" data-placeholder="Select State" tabindex="1">
																			<?php
																				if (!empty($user->art_state)) {
																					echo '<option value="'.$user->art_state.'" selected="selected">'.$user->art_state.'</option>';
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
																			<input type="text" name="city" class="form-control" value="<?php echo ($_POST['city'] ?? $user->art_city);  ?>">
																		</div>
																		<div class="form-group">
																			<label class="control-label mb-10">Address</label>
																			<input type="text" name="address" class="form-control" value="<?php echo ($_POST['address'] ?? $user->art_address);  ?>">
																		</div>
																	</div>
																	<div class="form-actions mt-10">			
																		<button type="submit" class="btn btn-primary mr-10 mb-30">Update profile</button>
																	</div>				
																</form>
															</div> <!-- /.form wrap -->
														</div>
													</div> 
													<!-- /col-9 ends  -->
													
												</div>
											</div>
											
											<div id="update_pwd" class="tab-pane fade " role="tabpanel">
												<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->


			</div>

<?php include __DIR__ . '/inc/art-footer.php';	?>