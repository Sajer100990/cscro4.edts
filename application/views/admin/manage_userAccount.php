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
						<i class="icon-user text-primary"></i> <span>User</span>
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
				<li class="active">User Account</li>
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
			<!-- 1st col -->
			<div class="col-md-4">
				<!-- Create User -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>Create User Account</b><br>
							<small>Please fill all the field.</small>
						</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					
					<div class="panel-body">
						<form method="post">
							<div class="form-group has-feedback has-feedback-left">
								<select class="form-control input-xs" id="division" name="division">
									<option value="">- Select Division -</option>
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
									<i class="icon icon-tree7"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<select class="form-control input-xs" id="position" name="position">
									<option value="">- Select Position -</option>
									<?php
										$num = 1;
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

							<div class="form-group has-feedback has-feedback-left">
								<select class="form-control input-xs" id="gender" name="gender">
									<option value="">- Select Gender -</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
								<div class="form-control-feedback">
									<i class="icon icon-man-woman"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="fn" name="fn" type="text" class="form-control input-xs" placeholder="Firstname" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon icon-user"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="mi" name="mi" type="text" class="form-control input-xs" placeholder="Middle Initial (Optional)" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon icon-user"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="ln" name="ln" type="text" class="form-control input-xs" placeholder="Lastname" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon icon-user"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="contact" name="contact" type="number" class="form-control input-xs" placeholder="Contact (Optional)" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon icon-phone2"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="username" name="username" type="text" class="form-control input-xs" placeholder="Username" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon icon-user"></i>
								</div>
							</div>

							<small><p>
								<b>NOTE:</b> User default password is <i>123456</i>.
								<br><b>PS:</b> Please update user security after this query.
							</p></small>

							

							<button id="btn_add_dataEntry" type="button" class="btn btn-primary btn-xs pull-right" onclick="create_user()">
								<i class="icon-plus-circle2 position-left"></i> CREATE ACCOUNT
							</button>
						</form>
					</div>
				</div>
				<!-- Create User -->
			</div>
			<!-- /1st col -->

			<!-- 2nd col -->
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>User List</b><br>
							<small>Manage User Account.</small>
						</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					
					<div class="panel-body">
						<table class="table datatable-button-init-basic" style="text-transform: uppercase;">
							<thead>
								<tr>
									<!-- style="display:none;" -->
									<th>#</th>
									<th>FULLNAME</th>
									<th>DIVISION</th>
									<th>POSITION</th>
									<th>ACTION</th>
								</tr>
							</thead>
							
							<tbody style="text-transform: uppercase; font-size: 12px;">
								<?php
									$num = 1;
									if (is_array($UserList)) {
										foreach ($UserList as $list) {
											echo '
												<tr>
													<td align="center">'.$num++.'</td>
													<td align="center">
														'.$list->fn.' '.$list->ln.'
													</td>
													<td align="center">'.$list->division.'</td>
													<td align="center">'.$list->position.'</td>
													<td class="text-center">
														<ul class="icons-list">
															<li class="dropdown">
																<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																	<i class="icon-menu9"></i>
																</a>

																<ul class="dropdown-menu dropdown-menu-right">
																	<li>
																		<a href="'.base_url('Edit-UserAccount').'?userID='.$list->id.'">
																			<i class="icon icon-pencil7"></i> Edit
																		</a>
																	</li>
																	
																	<li><a href="#"><i class="icon icon-user-block"></i> Deactivate</a></li>
																</ul>
															</li>
														</ul>
													</td>
												</tr>
											';
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /2nd col -->
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