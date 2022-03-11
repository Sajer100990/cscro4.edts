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

<body class="login-container">
	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?=base_url()?>">
				<img src="assets/image/system/<?=$show_SystemInfo['banner']?>" alt="" style="height:200%;margin-top:-5%;">
			</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="<?=base_url()?>" style="color:#fff;"><b><?=$show_SystemInfo['header']?></b></a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<!-- Simple login form -->
					<form method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300" style="width:50%;">
									<img src="assets/image/system/<?=$show_SystemInfo['icon']?>" alt="" style="width:100%;">
								</div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" required autocomplete="off" name="username" id="username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" required autocomplete="off" name="password" id="password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<input type="hidden" id="base_url" value="<?=base_url()?>">

								<button id="mySubmitLogin" type="button" class="btn bg-primary btn-block" onclick="login()">
									Sign in <i class="icon-circle-right2 position-right"></i>
								</button>
							</div>

							<div class="text-center">
								<a href="#">Get Help?</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->

					<!-- Footer -->
					<div class="footer text-muted text-center">
						<b><?=$show_SystemInfo['footer']?></b><br>
						<small>Developed By: <?=$show_SystemInfo['developer']?></small>
					</div>
					<!-- /footer -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>

</html>

<!-- Core JS files -->
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/loaders/pace.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/core/libraries/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/core/libraries/bootstrap.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/loaders/blockui.min.js'?>"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="<?=base_url().'assets/js/core/app.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/ui/ripple.min.js'?>"></script>
<!-- /theme JS files -->

<!-- include js function -->
<script src="<?=base_url().'custom/js/login.js'?>"></script>
<script type="text/javascript">login_enter();</script>