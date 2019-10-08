<?php 

	include __DIR__ . '../../config/config.php';
	include __DIR__ .'../../config/paths.php';
	include __DIR__ .'../../config/connect.php';
	include __DIR__ . '/checkLog.php';
	include __DIR__ . '../../inc/adm-header.php';

?>
		
		<!-- Left Sidebar Menu -->
		<?php include __DIR__ . '/inc/mem-left-nav.php'; ?>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		<?php include __DIR__ . '/inc/mem-right-nav.php'; ?>
		<!-- /Right Sidebar Menu -->
			
					
		
		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
					
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-xs-12">
						<div class="panel panel-default card-view  pa-0 bg-gradient">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											<div class="profile-image-overlay"></div>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="../img/mock1.jpg" alt="user"/>
												
											</div>	
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-warning"><?php echo $user->fullname; ?></h5>
											
											<h6 class="block capitalize-font pb-20 txt-light"><?php echo $user->role; ?></h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span><?php echo $user->username; ?>'s profile</span></a></li>
											
										</ul>
										<div class="tab-content" id="myTabContent_8">
											<div id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="col-md-12">
													<div class="pt-20">
														<div class="form-wrap">
														<table class="table table-bordered">
															<tbody>
															<tr>
																<td><strong>Name</strong></td>
																<td><?php echo $user->fullname; ?></td>
															</tr>
															<tr>
																<td><strong>Username</strong></td>
																<td><?php echo $user->username; ?></td>
															</tr>
															<tr>
																<td><strong>Phone</strong></td>
																<td><?php echo $user->phone; ?></td>
															</tr>
															<tr>
																<td><strong>Country</strong></td>
																<td><?php echo $user->mem_country; ?></td>
															</tr>
															<tr>
																<td><strong>Location</strong></td>
																<td><?php echo $user->mem_address; ?>, <?php echo $user->mem_city; ?>, <?php echo $user->mem_state; ?>, <?php echo $user->mem_country; ?>.</td>
															</tr>
															<tr>
																<td><strong>Role</strong></td>
																<td style="color:#F00; text-transform:capitalize;"><?php echo $user->role; ?></td>
															</tr>
															<tr>
																<td><strong>Date of Reg.</strong></td>
																<td><?php echo $user->created_at; ?></td>
															</tr>
															</tbody>
															</table>
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
				<!-- /Row -->
			
<?php include __DIR__ . '../../inc/adm-footer.php';	?>