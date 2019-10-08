<div class="fixed-sidebar-left">
	<ul class="nav navbar-nav side-nav nicescroll-bar">
		
			<!-- User Profile -->
			<li>
				<div class="user-profile text-center">
					<img src="<?php echo $BASE_URL; ?>img/user1.png" alt="user_auth" class="user-auth-img img-circle"/>
					<div class="dropdown mt-5">
						<a href="#" class="dropdown-toggle pr-0 bg-transparent" data-toggle="dropdown">Hi, <?php echo $user->fullname; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="profile.php"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							<li>
								<a href="edit_profile.php"><i class="zmdi zmdi-settings"></i><span>Edit Profile</span></a>
							</li>
							<li class="divider"></li>
							<li class="sub-menu show-on-hover">
								<a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-minus-circle-outline text-danger"></i> Not Activated</a>
								<ul class="dropdown-menu open-left-side">
									<li>
										<a href="#"><i class="zmdi zmdi-check text-success"></i><span>Activated</span></a>
									</li>
									<li>
										<a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>Not Activated</span></a>
									</li>
								</ul>	
							</li>
							<li class="divider"></li>
							<li>
								<a href="../logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</div>
				</div>
			</li>
			<!-- /User Profile -->

		<li class="navigation-header">
			<span>Main</span> 
			<i class="zmdi zmdi-more"></i>
		</li>

		<li>
			<li>
				<a href="index.php"><div class="pull-left"><i class="zmdi zmdi-home mr-20"></i><span class="right-nav-text">Home</span></div><div class="clearfix"></div></a>
			</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#mem_dr"><div class="pull-left"><i class="zmdi zmdi-settings mr-20"></i><span class="right-nav-text">Business Settings</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
			<ul id="mem_dr" class="collapse collapse-level-1">
				<li>
					<a href="businessprofile.php">Business Details</a>
				</li>
				<li>
					<a href="edit_address.php">Address</a>
				</li>
				<li>
					<a href="#">Gallery/Portfolio</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#cat_dr"><div class="pull-left"><i class="zmdi zmdi-card-giftcard mr-20"></i><span class="right-nav-text">Jobs</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
			<ul id="cat_dr" class="collapse collapse-level-1">
				<!-- <li>
					<a href="#">Job Application</a>
				</li>
				<li>
					<a href="#">Finished Jobs</a>
				</li> -->
				<li>
					<a href="#">Testimony / Rating</a>
				</li>
			</ul>
		</li>
		<li><hr class="light-grey-hr mb-10"/></li>
		<li>
			<a href="../logout.php"><i class="zmdi zmdi-power mr-20"></i><span class="right-nav-text">Log Out</span></a>
		</li>
		<!-- <li>
			<a href=""><i class="zmdi zmdi-check text-success mr-20"></i><span class="right-nav-text">Account Activated</span></a>
		</li> -->
		
	</ul>
</div>