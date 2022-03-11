<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Management</span></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float text-size-small has-text">
						<i class="icon-calendar5 text-primary"></i> <span>Data</span>
					</a>
				</div>
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-gear position-left"></i> Management</a></li>
				<li class="active">Export Database</li>
			</ul>

			<ul class="breadcrumb-elements">
				<li><a href="<?=BASE_URL('#')?>"><?=$show_SystemInfo['header']?></a></li>
			</ul>
		</div>
	</div>
	<!-- /page header -->

	<!-- Content area -->
	<div class="content">
		<!-- hidden file -->
		<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">

		<!-- START OF MAIN CONTENT -->
        <container class="container">
        	<h1>Export Database</h1>

        	<p>Download database: If you want to proceed,<br><br>
        		<a href="<?=BASE_URL('exportDB')?>" class="btn btn-danger btn-xs" onclick="export_db()">
        			<i class="icon-download position-left"></i> CLICK HERE
        		</a><br><br>
        		<b>NOTE:</b> Once click check your save folder.<br>
        		<b>WARNING:</b> Do not spam DB Request.
        	</p>

		</container>
		<!-- /START OF MAIN CONTENT -->
		
		<!-- Footer -->
		<div class="footer text-muted">
			<?=$show_SystemInfo['footer']?>
		</div>
		<!-- /footer -->
	</div>
	<!-- /content area -->
</div>
<!-- /main content -->