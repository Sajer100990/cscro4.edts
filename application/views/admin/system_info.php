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
						<i class="icon-pencil5 text-primary"></i> <span>Edit</span>
					</a>

					<a href="#" class="btn btn-link btn-float text-size-small has-text">
						<i class="icon-gear text-primary"></i> <span>System</span>
					</a>

					<a href="#" class="btn btn-link btn-float text-size-small has-text">
						<i class="icon-reset text-primary"></i> <span>Update</span>
					</a>
				</div>
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-gear position-left"></i> Management</a></li>
				<li class="active">System Information</li>
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
		<div class="row">
			<!-- 1st col -->
			<!-- System Info -->
			<div class="col-md-8">
				<!-- system details -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>System Information</b><br>
									<small>Update system information.</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<form method="post">
									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Title</label>
										
										<div class="col-xs-9">
											<input type="text" name="ups_title" id="ups_title" class="form-control input-xS" autocomplete="off" value="<?=$show_SystemInfo['title']?>" required>

											<div class="form-control-feedback">
												<i class="icon-pencil5"></i>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Header</label>
										
										<div class="col-xs-9">
											<input type="text" name="ups_header" id="ups_header" class="form-control input-xS" autocomplete="off" value="<?=$show_SystemInfo['header']?>" required>

											<div class="form-control-feedback">
												<i class="icon-pencil5"></i>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Footer</label>
										
										<div class="col-xs-9">
											<input type="text" name="ups_footer" id="ups_footer" class="form-control input-xS" autocomplete="off" value="<?=$show_SystemInfo['footer']?>" required>

											<div class="form-control-feedback">
												<i class="icon-pencil5"></i>
											</div>
										</div>
									</div>

									<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
									<input type="hidden" id="system_id" name="system_id" value="<?=$show_SystemInfo['id']?>">

									<button id="btn_update_system_info" type="button" class="btn btn-primary btn-xs pull-right" style="margin-top: 20px;" onclick="Update_SystemDetails()">
										<i class="icon-reset position-left"></i> UPDATE SYSTEM DETAILS
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /system details -->
				
				<!-- system contact info -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>System Contact Information</b><br>
									<small>Update system contact information.</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<form method="post">
									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Address</label>
										
										<div class="col-xs-9">
											<input type="text" name="ups_address" id="ups_address" class="form-control input-xS" autocomplete="off" value="<?=$show_SystemInfo['address']?>" required>

											<div class="form-control-feedback">
												<i class="icon-location3"></i>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Contact</label>
										
										<div class="col-xs-9">
											<input type="text" name="ups_contact" id="ups_contact" class="form-control input-xS" autocomplete="off" value="<?=$show_SystemInfo['contact']?>" required>

											<div class="form-control-feedback">
												<i class="icon-phone"></i>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Region</label>
										
										<div class="col-xs-9">
											<input type="text" name="ups_region" id="ups_region" class="form-control input-xS" autocomplete="off" value="<?=$show_SystemInfo['region']?>" required>

											<div class="form-control-feedback">
												<i class="icon-location4"></i>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Email Address</label>
										
										<div class="col-xs-9">
											<input type="text" name="ups_email" id="ups_email" class="form-control input-xS" autocomplete="off" value="<?=$show_SystemInfo['email']?>" required>

											<div class="form-control-feedback">
												<i class="icon-envelop"></i>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Facebook</label>
										
										<div class="col-xs-9">
											<input type="text" name="ups_fb" id="ups_fb" class="form-control input-xS" autocomplete="off" value="<?=$show_SystemInfo['fb']?>" required>

											<div class="form-control-feedback">
												<i class="icon-facebook2"></i>
											</div>
										</div>
									</div>

									<button id="btn_update_system_info" type="button" class="btn btn-primary btn-xs pull-right" style="margin-top: 20px;" onclick="Update_systemContact()">
										<i class="icon-reset position-left"></i> UPDATE SYSTEM CONTACT INFO
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /system contact info -->

				<!-- mission and vision -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>System Mission / Vision</b><br>
									<small>Update information.</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<form method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group has-feedback">
												<label id="upsmission"><i class="icon icon-clipboard6"></i>  Mission</label><br>

												<textarea id="myTextarea" name="upsmission" style="resize: none;" rows="5" class="form-control"><?=$show_SystemInfo['mission']?></textarea>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group has-feedback">
												<label id="upsvision"><i class="icon icon-eye"></i> Vision</label><br>

												<textarea id="myTextarea1" name="upsvision" style="resize: none;" rows="5" class="form-control"><?=$show_SystemInfo['vision']?></textarea>
											</div>
										</div>
									</div>

									<button id="btn_update_mv" type="button" class="btn btn-primary btn-xs pull-right" style="margin-top: 20px;" onclick="Update_systemMissionVision()">
										<i class="icon-reset position-left"></i> UPDATE MISSION / VISION
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /mission and vision -->

				
			</div>
			<!-- /System Info -->
			<!-- /1st col -->

			<!-- 2nd col -->
			<!-- System Icon -->
			<div class="col-md-4">
				<!-- Web Icon -->
				<div class="row">
					<!-- System Icon -->
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Web Icon</b><br>
									<small>Update Website Icon.</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<form method="post" id="imgIcon" enctype="multipart/form-data">
									<center>
										<img src="<?=base_url().'assets/image/system/'?><?=$show_SystemInfo['icon']?>" class="img-responsive" style="width: 75%;">
										<br>
										<div class="form-group has-feedback-left">
											<input type="file" name="SystemIcon" id="SystemIcon" class="form-control input-xS" autocomplete="off" required>

											<div class="form-control-feedback">
												<i class="icon-user"></i>
											</div>
										</div>

										<button type="button" class="btn btn-primary btn-xs" style="width: 100%;" onclick="Update_WebIcon()">
											<i class="icon-reset position-left"></i> UPDATE ICON
										</button>
									</center>
								</form>
							</div>
						</div>
					</div>
					<!-- /System Icon -->
				</div>
				<!-- /Web Icon -->

				<!-- Banner -->
				<div class="row">
					<!-- System Sidebar Banner -->
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Banner</b><br>
									<small>Update Banner.</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<form method="post" id="imgBanner" enctype="multipart/form-data">
									<center>
										<img src="<?=base_url().'assets/image/system/'?><?=$show_SystemInfo['banner']?>" class="img-responsive" style="width: 75%;">
										<br>
										<div class="form-group has-feedback-left">
											<input type="file" name="banner" id="banner" class="form-control input-xS" autocomplete="off" required>

											<div class="form-control-feedback">
												<i class="icon-user"></i>
											</div>
										</div>

										<button type="button" class="btn btn-primary btn-xs" style="width: 100%;" onclick="Update_WebBanner()">
											<i class="icon-reset position-left"></i> UPDATE BANNER
										</button>
									</center>
								</form>
							</div>
						</div>
					</div>
					<!-- /System Sidebar Banner -->
				</div>
				<!-- /Banner -->

				<!-- Side Banner -->
				<div class="row">
					<!-- System Banner -->
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Sidebar Banner</b><br>
									<small>Update Sidebar Banner.</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<form method="post" id="imgSideBanner" enctype="multipart/form-data">
									<center>
										<img src="<?=base_url().'assets/image/system/'?><?=$show_SystemInfo['sidebar_logo']?>" class="img-responsive" style="width: 75%;">
										<br>
										<div class="form-group has-feedback-left">
											<input type="file" name="sideBanner" id="sideBanner" class="form-control input-xS" autocomplete="off" required>

											<div class="form-control-feedback">
												<i class="icon-user"></i>
											</div>
										</div>

										<button type="button" class="btn btn-primary btn-xs" style="width: 100%;" onclick="Update_WebSideBanner()">
											<i class="icon-reset position-left"></i> UPDATE SIDE BANNER
										</button>
									</center>
								</form>
							</div>
						</div>
					</div>
					<!-- /System Banner -->
				</div>
				<!-- /Side Banner -->

				<!-- Year -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Manage Year</b><br>
									<small>This data is used for dynamic year selection.<br>(Masterlist Navigation)</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<div class="col-md-6">
									<form method="post">
										<div class="form-group has-feedback-left">
											<div class="col-xs-9">
												<input type="number" name="annual_year" id="annual_year" class="form-control input-xS" autocomplete="off" placeholder="Year" required>

												<div class="form-control-feedback">
													<i class="icon-calendar"></i>
												</div>
											</div>
										</div>

										<button id="btn_update_mv" type="button" class="btn btn-primary btn-xs pull-right" style="margin-top: 20px;" onclick="add_year()">
											<i class="icon-add position-left"></i> Add Year
										</button>
									</form>
								</div>

								<div class="col-md-6">
									<table class="table table-responsive" align="center">
										<thead>
											<tr>
												<th align="center">YEAR</th>
												<th align="center">ACTION</th>
											</tr>
										</thead>

										<tbody>
											<form method="post">
												<?php
													if (is_array($year_list)) {
														foreach ($year_list as $list) {
															echo '
																<tr>
																	<td>'.$list->annual_year.'</td>
																	<td>
																		<abbr title="Delete Year">
																			<a href="Delete-Year?annual_year='.$list->annual_year.'" class="btn btn-danger btn-xs">
																				<i class="icon-trash"></i>
																			</a>
																		</abbr>
																	</td>
																</tr>
															';
														}
													}
												?>
											</form>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Year -->
			</div>
			<!-- /2nd col -->
			<!-- /System Icon -->
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
<!-- /main content