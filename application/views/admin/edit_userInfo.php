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
						<i class="icon-vcard text-primary"></i> <span>User</span>
					</a>

					<a href="#" class="btn btn-link btn-float text-size-small has-text">
						<i class="icon-reset text-primary"></i> <span>Update</span>
					</a>
				</div>
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><i class="icon-gear position-left"></i> Management</li>
				<li><a href="<?=base_url('Manage-UserAccount')?>">User Account</a></li>
				<li class="active">Edit User Details</li>
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
		<input type="hidden" name="user_id" id="user_id" value="<?=$EditUser['id']?>">
		<input type="hidden" name="upBy_id" id="upBy_id" value="<?=$user_data['id']?>">

		<div class="row">
			<!-- First Column -->
			<div class="col-md-7">
				<!-- First Column - First Row -->
				<!-- Update Personal Info -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>User Information</b><br>
									<small>Update User information.</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<div class="form-group has-feedback-left">
									<label class="control-label col-xs-3">Firstname</label>
									
									<div class="col-xs-9">
										<input type="text" name="fn" id="fn" class="form-control input-xS" autocomplete="off" value="<?=$EditUser['fn']?>" required>

										<div class="form-control-feedback">
											<i class="icon-user"></i>
										</div>
									</div>
								</div>

								<div class="form-group has-feedback-left">
									<label class="control-label col-xs-3">Middle Name</label>

									<div class="col-xs-9">
										<input type="text" name="mi" id="mi" class="form-control input-xS" autocomplete="off" value="<?=$EditUser['mi']?>" required>

										<div class="form-control-feedback">
											<i class="icon-user"></i>
										</div>
									</div>
								</div>

								<div class="form-group has-feedback-left">
									<label class="control-label col-xs-3">Lastname</label>

									<div class="col-xs-9">
										<input type="text" name="ln" id="ln" class="form-control input-xS" autocomplete="off" value="<?=$EditUser['ln']?>" required>

										<div class="form-control-feedback">
											<i class="icon-user"></i>
										</div>
									</div>
								</div>

								<div class="form-group has-feedback-left">
									<label class="control-label col-xs-3">Cell #</label>

									<div class="col-xs-9">
										<input type="number" name="contact" id="contact" class="form-control input-xS" autocomplete="off"value="<?=$EditUser['contact']?>" required>

										<div class="form-control-feedback">
											<i class="icon-iphone"></i>
										</div>
									</div>
								</div>

								<div class="form-group has-feedback-left">
									<label class="control-label col-xs-3">Position</label>

									<div class="col-xs-9">
										<select class="form-control input-xs" id="position" name="position">
											<option value="<?=$EditUser['position']?>" >
												<small style="text-transform: uppercase;"><?=$EditUser['position']?></small>
											</option>
											<option disabled>----------</option>
											<?php
												if (is_array($position)) {
													foreach ($position as $list) {
														echo '
															<option value="'.$list->position.'">'.$list->position.'</option>
														';
													}
												}
											?>
										</select>
										<div class="form-control-feedback">
											<i class="icon icon-user-tie"></i>
										</div>
									</div>
								</div>

								<button id="btn_update_personal_info" type="button" class="btn btn-primary btn-xs pull-right" style="margin-top: 20px;" onclick="update_user_info()">
									<i class="icon-reset position-left"></i> UPDATE INFORMATION
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /First Column - First Row -->

				<!-- First Column - Second Row -->
				<!-- Change Security -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Security</b><br>
									<small>Update Security Question and Answer. Please note that your security answer case sensitive.<br>This segment may help users for recovering his/her password.</small>
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
										<label class="control-label col-xs-3">Security Question</label>

										<div class="col-xs-9">
											<select class="form-control input-xS" name="security_question" id="security_question">
												<option value="<?=$EditUser['security_question']?>" ><small><?=$EditUser['security_question']?></small></option>
												<option disabled>----------</option>
												<option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
												<option value="On what school or university did you gradated from college?">On what school or university did you gradated from college?</option>
												<option value="What is your favorite meal for lunch?">What is your favorite meal for lunch?</option>
												<option value="How old are you now?">How old are you now?</option>
												<option value="What is your favorite movie of all time?">What is your favorite movie of all time?</option>
											</select>

											<div class="form-control-feedback">
												<i class="icon-question3"></i>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">New Answer</label>

										<div class="col-xs-9">
											<input type="text" name="security_answer" id="security_answer" class="form-control input-xS" autocomplete="off" placeholder="Please remember your answer for future reference." required>

											<div class="form-control-feedback">
												<i class="icon-clipboard2"></i>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<label class="control-label col-xs-3">Re-Type Answer</label>

										<div class="col-xs-9">
											<input type="text" name="security_answer1" id="security_answer1" class="form-control input-xS" autocomplete="off" placeholder="Please remember your answer for future reference." required>

											<div class="form-control-feedback">
												<i class="icon-clipboard2"></i>
											</div>
										</div>
									</div>

									<button id="btn_update_personal_security" type="button" class="btn btn-primary btn-xs pull-right" style="margin-top: 20px;" onclick="update_user_security()">
										<i class="icon-reset position-left"></i> UPDATE SECURITY ANSWER
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /First Column - Second Row -->

				<!-- First Column - Third Row -->
				<!-- Change Role -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Update Division/Role</b><br>
									<small>Require relogin after update.</small>
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
										<label class="control-label col-xs-3">Division</label>

										<div class="col-xs-9">
											<select class="form-control input-xS" name="division" id="division">
												<option value="<?=$EditUser['division']?>" >
													<small style="text-transform: uppercase;"><?=$EditUser['division']?></small>
												</option>
												<option disabled>----------</option>
												<?php
													if (is_array($division)) {
														foreach ($division as $list) {
															echo '
																<option value="'.$list->div_tag.'">'.$list->div_name.'</option>
															';
														}
													}
												?>
											</select>

											<div class="form-control-feedback">
												<i class="icon-select2"></i>
											</div>
										</div>
									</div>

									<input type="hidden" name="old_division" id="old_division" value="<?=$EditUser['division']?>">

									<button id="btn_update_personal_role" type="button" class="btn btn-primary btn-xs pull-right" style="margin-top: 20px;" onclick="update_DivRole()">
										<i class="icon-reset position-left"></i> UPDATE ROLE
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /First Column - Third Row -->
			</div>
			<!-- /First Column -->

			<!-- Second Column -->
			<div class="col-md-5">
				<!-- Second Column - First ROw -->
				<!-- Change Image -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Profile Picture</b><br>
									<small>Upload jpeg, jpg and png files only.</small>
								</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                	</ul>
			                	</div>
							</div>
							
							<div class="panel-body">
								<form method="post" id="imgFile" enctype="multipart/form-data"> 
									<div class="row">
										<div class="col-md-6">
											<img src="<?=base_url().'assets/image/user/'?><?=$EditUser['image']?>" class="img-responsive" style="width: 75%;">
										</div>

										<div class="col-md-6">
											<br>
											<div class="form-group has-feedback-left">
												<input type="file" name="image" id="image" class="form-control input-xS" autocomplete="off" required>

												<div class="form-control-feedback">
													<i class="icon-user"></i>
												</div>
											</div>

											<button type="button" class="btn btn-primary btn-xs" style="width: 100%;" onclick="update_image()">
												<i class="icon-file-picture position-left"></i> UPDATE IMAGE
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Second Column - First ROw -->

				<!-- Second Column - Second ROw -->
				<!-- Change Username -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Change Username</b><br>
									<small><b>Current Username: </b><?=$EditUser['username']?></small>
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
										<input type="text" name="ups_new_username" id="ups_new_username" class="form-control input-xS" autocomplete="off" placeholder="New Username" required>

										<div class="form-control-feedback">
											<i class="icon-users2"></i>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<input type="text" name="retype_username" id="retype_username" class="form-control input-xS" autocomplete="off" placeholder="Retype New Username" required>

										<div class="form-control-feedback">
											<i class="icon-users2"></i>
										</div>
									</div>

									<button id="btn_update_personal_username" type="button" class="btn btn-primary btn-xs pull-right" onclick="update_user_username()">
										<i class="icon-reset position-left"></i> UPDATE USERNAME
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Second Column - Second ROw -->

				<!-- Second Column - Third ROw -->
				<!-- Change Password -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title">
									<b>Change Password</b><br>
									<small>Update user password.</small>
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
										<input type="password" name="ups_new_password" id="ups_new_password" class="form-control input-xS" autocomplete="off" placeholder="New Password" required>

										<div class="form-control-feedback">
											<i class="icon-lock5"></i>
										</div>
									</div>

									<div class="form-group has-feedback-left">
										<input type="password" name="ups_retype_password" id="ups_retype_password" class="form-control input-xS" autocomplete="off" placeholder="Retype New Password" required>

										<div class="form-control-feedback">
											<i class="icon-lock5"></i>
										</div>
									</div>

									<button id="btn_update_personal_password" type="button" class="btn btn-primary btn-xs pull-right" onclick="update_user_password()">
										<i class="icon-reset position-left"></i> UPDATE PASSWORD
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Second Column - Third ROw -->
			</div>
			<!-- /Second Column -->
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