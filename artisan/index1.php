<?php 

	include __DIR__ . '../../config/config.php';
	include __DIR__ .'../../config/paths.php';
	include __DIR__ .'../../config/connect.php';
	include __DIR__ . '/checkLog.php';
	include __DIR__ . '../../inc/adm-header.php';

	


		// $users = $pdo->prepare("SELECT f_name, l_name, phone, business_name, business_cat FROM members where username = '". $_SESSION['username'] ."' ");
		// // $users->bindParam(":user", $$_SESSION['username'], PDO::PARAM_ARR);
		// $users->execute();
		// $user = $users->fetchObject();

		// var_dump($user);

		// echo $user->f_name;
?>
		
		<!-- Left Sidebar Menu -->
		<?php include __DIR__ . '../../inc/adm-left-nav.php'; ?>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		<?php include __DIR__ . '../../inc/adm-right-nav.php'; ?>
		<!-- /Right Sidebar Menu -->
			
					
		
		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<!-- Row -->
				<div class="row">
					

					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0 bg-gradient">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim">914,001</span></span>
													<span class="weight-500 uppercase-font block font-13 txt-light">employees</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-people  data-right-rep-icon txt-light"></i>
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
				</div>
				<!-- /Row -->
				
			</div>

<?php include __DIR__ . '../../inc/adm-footer.php';	?>