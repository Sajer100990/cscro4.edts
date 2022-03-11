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

	<!-- Datatables -->
	<link href="<?=base_url().'assets/datatable/css/dataTables.bootstrap.min.css'?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url().'assets/datatable/css/buttons.bootstrap.min.css'?>" rel="stylesheet" type="text/css">
	<!-- /Datatables -->

	<!-- SWEETALERT -->
	<link rel="stylesheet" href="<?=base_url().'assets/sweetalert/sweetalert.css'?>">
	<script type="text/javascript" src="<?=base_url().'assets/sweetalert/sweetalert-dev.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/sweetalert/sweetalert.min.js'?>"></script>
</head>

<body>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?=base_url('User-Dashboard')?>">
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
								<li class="<?=$nav == 'User-Dashboard' ? 'active' : ''?>">
									<a href="<?=BASE_URL('User-Dashboard');?>">
										<i class="icon-user-plus"></i> <span>My profile</span>
									</a>
								</li>
								
								<li><a href="<?=BASE_URL('user_logout');?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>
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

								<li class="<?=$nav == 'User-Dashboard' ? 'active' : ''?>">
									<a href="<?=BASE_URL('user-dashboard')?>"><i class="icon-home4"></i> <span>Dashboard</span></a>
								</li>

								<li class="<?=$nav == 'Received-Document' ? 'active' : ''?>">
									<a href="<?=BASE_URL('received_document')?>"><i class="icon-drawer-in"></i> <span>Document Received</span></a>
								</li>

								<!-- <li>
									<a href="#"><i class="icon-folder-search"></i> <span>Masterlist</span></a>
									<ul>
										<li class="<?=$nav == 'User-DataEntry-Masterlist' ? 'active' : ''?>">
											<a href="<?=BASE_URL('User-DataEntry-Masterlist')?>">Data Entry</a>
										</li>

										<li class="<?=$nav == '#' ? 'active' : ''?>">
											<a href="<?=BASE_URL('#')?>">Special Eligibility</a>
										</li>
									</ul>
								</li> -->

								<li class="<?=$nav == '' ? 'active' : ''?>">
									<a href="<?=BASE_URL('#')?>"><i class="icon-pen"></i> <span>Feedback/Suggestion</span></a>
								</li>
								<!-- /Main Page Navigation -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->