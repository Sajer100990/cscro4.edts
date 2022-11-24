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
					<!-- start here -->
					<center><h1><b>EDTS DATA MASTERLIST FOR F.Y <?php echo date('Y');?></b></h1></center><br>

					<center>
						<a href="<?=base_url('data-received-masterlist?ay=')?><?=date('Y') ?>&division=PALD" class="btn btn-xs" style="width: 100px; background-color: #f2cf88; color: #000;">
							<b>PALD</b>
						</a>

						<a href="<?=base_url('data-received-masterlist?ay=')?><?=date('Y') ?>&division=LSD" class="btn btn-success btn-xs" style="width: 100px; color: #000;">
							<b>LSD</b>
						</a>

						<a href="<?=base_url('data-received-masterlist?ay=')?><?=date('Y') ?>&division=PSED" class="btn btn-danger btn-xs" style="width: 100px; color: #000;">
							<b>PSED</b>
						</a>

						<a href="<?=base_url('data-received-masterlist?ay=')?><?=date('Y') ?>&division=MSD" class="btn btn-warning btn-xs" style="width: 100px; color: #000;">
							<b>MSD</b>
						</a>

						<a href="<?=base_url('data-received-masterlist?ay=')?><?=date('Y') ?>&division=HRD" class="btn btn-primary btn-xs" style="width: 100px; color: #000;">
							<b>HRD</b>
						</a>

						<a href="data-received-masterlist?ay=<?=date('Y') ?>&division=ESD" class="btn btn-info btn-xs" style="width: 100px; color: #000;">
							<b>ESD</b>
						</a>

						<a href="<?=base_url('data-received-masterlist?ay=')?><?=date('Y') ?>&division=ORD" class="btn btn-xs" style="width: 100px; background-color: #9cdaf0; color: #000;">
							<b>ORD</b>
						</a>
					</center>

					<table class="table datatable-button-init-basic" style="text-transform: uppercase;">
						<thead>
							<tr>
								<!-- style="display:none;" -->
								<th style="display:none;">DIVISION</th>
								<th>DOCUMENT NO.<br><small>(TEMPORARY)</small></th>
								<th style="display:none;">DOCUMENT ENTRY MODE</th>
								<th style="display:none;">DOCUMENT TYPE</th>
								<th>SUBJECT</th>
								<th>SENDER NAME/ POSITION/ SENDER ADDRESS</th>
								<th>RECEIVED DATE</th>
								<th>ENCODE/ RECEIVED BY</th>
								<th>REMARKS</th>
							</tr>
						</thead>

						<tbody>
							<?php
								if (is_array($load_DivisionEntry)) {
									foreach ($load_DivisionEntry as $list) {
										echo '
											<tr>
												<td style="display: none;">'.$list->division.'</td>
												<td style="color:teal;">'.$list->doc_no.'</td>
												<td style="display: none;">'.$list->doc_entry.'</td>
												<td style="display: none;">'.$list->doc_type.'</td>
												<td>'.$list->subject.'</td>
												<td>'.$list->sender.'</td>
												<td>'.$list->month.' '.$list->day.' '.$list->year.'</td>
												<td>'.$list->encoded_by.'</td>
												<td>'.$list->remarks.'</td>
											</tr>
										';
									}
								}
							?>
						</tbody>
					</table>

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
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/tables/datatables/datatables.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/tables/datatables/extensions/buttons.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/forms/selects/select2.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/visualization/d3/d3.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/visualization/d3/d3_tooltip.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/forms/styling/switchery.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/forms/styling/uniform.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/forms/selects/bootstrap_multiselect.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/ui/moment/moment.min.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/plugins/pickers/daterangepicker.js'?>"></script>

<script type="text/javascript" src="<?=base_url().'assets/js/core/app.js'?>"></script>
<script type="text/javascript" src="<?=base_url().'assets/js/pages/datatables_extension_buttons_init.js'?>"></script>

<script type="text/javascript" src="<?=base_url().'assets/js/plugins/ui/ripple.min.js'?>"></script>

<!-- include js function -->