<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Upload Excel File</span></h4>
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
				<li class="active">Upload Excel File - Old EDTS File</li>
			</ul>

			<ul class="breadcrumb-elements">
				<li><a href="<?=BASE_URL('Admin-Dashboard')?>"><?=$show_SystemInfo['header']?></a></li>
			</ul>
		</div>
	</div>
	<!-- /page header -->

	<!-- Content area -->
	<div class="content">
		<!-- START OF MAIN CONTENT -->
		<!-- hidden file -->
		<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
		<input type="hidden" name="upBy_id" id="upBy_id" value="<?=$UserData['id']?>">
		
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>External Documents</b><br>
							<small>Please check the proper format for uploading old EDTS file(s).</small>
						</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					
					<div class="panel-body">
						<form method="POST" id="form_old_edts" enctype="multipart/form-data">
							<div class="form-group">
								<label>Select Year</label>
								<select id="select_year" name="select_year" class="form-control">
									<option value="null">- Select Year -</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2020">2021</option>
								</select>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<label>Select file to upload</label>
								<input id="old_edts_file" name="old_edts_file" type="file" class="form-control input-xs" accept=".xls, .xlsx" >
								<div class="form-control-feedback">
									<i class="icon icon-upload"></i>
								</div>
							</div>

							<br><br>

							<button id="btn_upload_edts" type="button" class="btn btn-primary btn-xs pull-right" onclick="upload_oldExtDocs()">
								<i class="icon-upload position-left"></i> UPLOAD DATA
							</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>Special Eligibility</b><br>
							<small>HGE, BOE, SME, MC11.</small>
						</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					
					<div class="panel-body">
						<form method="POST" id="form_spels_file" enctype="multipart/form-data">
							<div class="form-group has-feedback has-feedback-left">
								<label>Select file to upload</label>
								<input id="spels_file" name="spels_file" type="file" class="form-control input-xs" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon icon-upload"></i>
								</div>
							</div>

							<br><br>

							<button id="btn_upload_spels" type="button" class="btn btn-primary btn-xs pull-right" onclick="upload_spels()">
								<i class="icon-upload position-left"></i> UPLOAD SPELS
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
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