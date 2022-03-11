<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$show_SystemInfo['title']?></title>
	<link rel="icon" href="<?=base_url().'assets/image/system/'?><?=$show_SystemInfo['icon']?>">

	<!-- Global stylesheets -->
	<link href="<?=base_url().'assets/css/icons/icomoon/styles.css'?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url().'assets/css/core.css'?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url().'assets/css/components.css'?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url().'assets/css/colors.css'?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- SWEETALERT -->
	<link rel="stylesheet" href="<?=base_url().'assets/sweetalert/sweetalert.css'?>">
	<script type="text/javascript" src="<?=base_url().'assets/sweetalert/sweetalert-dev.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/sweetalert/sweetalert.min.js'?>"></script>
</head>

<body>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?=BASE_URL('Admin-Dashboard')?>">
				<img src="<?=base_url().'assets/image/system/'?><?=$show_SystemInfo['banner']?>" alt="" style="height:200%;margin-top:-4%;">
			</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5" style="color: #000;"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3" style="color: #000;"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3" style="color: #000;"></i></a></li>
			</ul>

			<div class="navbar-right">
				<p class="navbar-text"><b style="text-transform: uppercase;color: #fff;"><?=$UserData['fn'].' '.$UserData['ln']?></b></p>
			</div>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user-material">
						<div class="category-content">
							<div class="sidebar-user-material-content">
								<a href="#">
									<img src="<?=base_url().'assets/image/user/'?><?=$UserData['image']?>" class="img-circle img-responsive" alt="">
								</a>
								
								<h6><?=$UserData['fn'].' '.$UserData['ln']?></h6>
								<span class="text-size-small"><?=$UserData['position']?></span>
							</div>
														
							<div class="sidebar-user-material-menu">
								<a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
							</div>
						</div>
						
						<div class="navigation-wrapper collapse" id="user-nav">
							<ul class="navigation">
								<li class="<?=$nav == 'Admin-Personal-Info' ? 'active' : ''?>">
									<a href="<?=BASE_URL('Admin-Personal-Info');?>">
										<i class="icon-user-plus"></i> <span>My profile</span>
									</a>
								</li>
								
								<li><a href="<?=BASE_URL('Admin-Logout');?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /user menu -->

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main Page Navigation -->
								<li class="navigation-header"><span>Home</span> <i class="icon-menu" title="Main pages"></i></li>

								<li class="<?=$nav == 'Admin-Dashboard' ? 'active' : ''?>">
									<a href="<?=BASE_URL('Admin-Dashboard')?>"><i class="icon-home4"></i> <span>Dashboard</span></a>
								</li>

								<li>
									<a href="#"><i class="icon-stack"></i> <span>Data Entry</span></a>
									<ul>
										<li class="<?=$nav == 'DataEntry-PALD' ? 'active' : ''?>">
											<a href="<?=BASE_URL('DataEntry-PALD?ay=')?><?php echo date('Y') ?>">PALD - Daily Encode</a>
										</li>

										<li class="<?=$nav == 'Admin-Manage-Received' ? 'active' : ''?>">
											<a href="<?=BASE_URL('Admin-Manage-Received?ay='.date('Y').'&division=PALD')?>">
												Received per Division AY <?php echo date('Y') ?>
											</a>
										</li>

										<li class="<?=$nav == 'SPELS-Masterlist' ? 'active' : ''?>">
											<a href="<?=BASE_URL('SPELS-Masterlist')?>">Special Eligibility Card</a>
										</li>

										<li class="<?=$nav == 'DataEntry-Masterlist' ? 'active' : ''?>">
											<a href="<?=BASE_URL('DataEntry-Masterlist?ay=')?><?=date('Y')?>">EDTS Masterlist</a>
										</li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-stack"></i> <span>Outgoing / Calabarzon</span></a>
									<ul>
										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Calamba</a>
										</li>

										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Laguna</a>
										</li>

										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Batangas</a>
										</li>

										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Rizal</a>
										</li>

										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Quezon</a>
										</li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-stack"></i> <span>Outgoing / Mimaropa</span></a>
									<ul>
										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Oriental Mindoro</a>
										</li>

										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Occidental Mindoro</a>
										</li>

										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Marinduque</a>
										</li>

										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Romblon</a>
										</li>

										<li class="<?=$nav == '' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Palawan</a>
										</li>
									</ul>
								</li>

								<li class="<?=$nav == '' ? 'active' : ''?>">
									<a href="<?=BASE_URL('Admin-Dashboard')?>"><i class="icon-pen"></i> <span>Feedback/Suggestion</span></a>
								</li>

								<li>
									<a href="#"><i class="icon-gear"></i> <span>Management</span></a>
									<ul>
										<li class="<?=$nav == 'Manage-UserAccount' ? 'active' : ''?>">
											<a href="<?=BASE_URL('Manage-UserAccount')?>">User Account</a>
										</li>

										<li class="<?=$nav == 'Admin-Manage-SystemInfo' ? 'active' : ''?>">
											<a href="<?=BASE_URL('Admin-Manage-SystemInfo')?>">System Information</a>
										</li>

										<li class="<?=$nav == 'Upload-Old-EDTS-File' ? 'active' : ''?>">
											<a href="<?=BASE_URL('Upload-Old-EDTS-File')?>">Upload Excel File</a>
										</li>

										<li class="<?=$nav == 'Export-Database' ? 'active' : ''?>">
											<a href="<?=BASE_URL('Export-Database')?>">Export Database</a>
										</li>
									</ul>
								</li>

								
								<!-- /Main Page Navigation -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->