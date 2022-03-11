<!-- Main content -->
<div class="content-wrapper">
	<!-- hidden file -->
	<input type="hidden" name="user_name" id="user_name" value="<?=$UserData['fn']?>">
	<input type="hidden" name="user_id" id="user_id" value="<?=$UserData['id']?>">
	<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Public Assistance and Liason Division</span></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float text-size-small has-text">
						<i class="icon-enter text-primary"></i> <span>Data</span>
					</a>

					<a href="#" class="btn btn-link btn-float text-size-small has-text">
						<i class="icon-cogs text-primary"></i> <span>Manage</span>
					</a>
				</div>
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-stack position-left"></i> Data Entry</a></li>
				<li class="active">Public Assistance and Liason Division</li>
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
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>Received Data Entry</b> /<small>Current Date - <?=$current_month.$current_day.$current_year2?></small>
						</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					
					<div class="panel-body" style="text-transform: uppercase;">
						<form method="post">
							<div class="col-md-6">
								<div class="form-group has-feedback-left">
									<select class="form-control input-xS" name="division" id="division" onchange="GenerateNum()">
										<option value="null_value" ><small>- SELECT DIVISION -</small></option>
										<option disabled>----------</option>
										<?php
											if (is_array($load_Division)) {
												foreach ($load_Division as $list) {
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

								<div class="form-group has-feedback-left">
									<p class="form-control input-xS" type="text" name="doc_no" id="doc_no" style="text-transform: uppercase;">
										<small>- Doc Number (Auto Generated) -</small>
									</p>

									<div class="form-control-feedback">
										<i class="icon-list"></i>
									</div>
								</div>

								<div class="form-group has-feedback-left">
									<select class="form-control input-xS" name="doc_entry" id="doc_entry">
										<option value="null_value" ><small>- DOCUMENT ENTRY -</small></option>
										<option disabled>----------</option>
										<?php
											if (is_array($user_docEntry)) {
												foreach ($user_docEntry as $list) {
													echo '
														<option value="'.$list->doc_entry.'">'.$list->doc_entry.'</option>
													';
												}
											}
										?>
									</select>

									<div class="form-control-feedback">
										<i class="icon-select2"></i>
									</div>
								</div>

								<div class="form-group has-feedback-left">
									<select class="form-control input-xS" name="doc_type" id="doc_type">
										<option value="null_value" ><small>- DOCUMENT TYPE -</small></option>
										<option disabled>----------</option>
										<?php
											if (is_array($user_docType)) {
												foreach ($user_docType as $list) {
													echo '
														<option value="'.$list->doc_type.'">'.$list->doc_type.'</option>
													';
												}
											}
										?>
									</select>

									<div class="form-control-feedback">
										<i class="icon-select2"></i>
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-12" style="margin-bottom: 10px;">
										<textarea id="remarks" name="remarks" rows="2" class="form-control" placeholder="- REMARKS -" style="resize: none;"></textarea>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<div class="col-xs-12">
										<textarea id="subject" name="subject" rows="6" class="form-control" placeholder="- SUBJECT -" style="resize: none;"></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-12" style="margin-bottom: 10px;">
										<textarea id="sender" name="sender" rows="6" class="form-control" placeholder="- SENDER -" style="resize: none;"></textarea>
									</div>
								</div>
								
								<button id="btn_add_dataEntry" type="button" class="btn btn-primary btn-xs pull-right" onclick="add_PaldENtry()">
									<i class="icon-plus-circle2 position-left"></i> SUBMIT
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>NOTE:</b></small>
						</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					
					<div class="panel-body">
						<small>
							<ul>
								<li>Accept documents for Civil Service Commission Regional Office 4 only.</li>
								<li>Don't open return documents or return to sender mail.</li>
								<li>If document routed to wrong division, immediately update the division where the document intended to belong.</li>
							</ul>
						</small>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>RECEIVED UPDATER</b></small>
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
								<select class="form-control input-xS" name="received_by" id="received_by">
									<option value="null_value" ><small>- Select Employee -</small></option>
									<option disabled>----------</option>
									<?php
										if (is_array($select_userList)) {
											foreach ($select_userList as $list) {
												echo '
													<option value="'.$list->fn.' '.$list->ln.'">'.$list->fn.' '.$list->ln.'</option>
												';
											}
										}
									?>
								</select>

								<div class="form-control-feedback">
									<i class="icon-select2"></i>
								</div>
							</div>

							<div class="form-group">
								<div class="input-group">
									<select class="form-control input-xS" name="received_division" id="received_division">
										<option value="null_value" ><small>- SELECT DIVISION -</small></option>
										<option disabled>----------</option>
										<?php
											$num = 1;
											if (is_array($load_Division)) {
												foreach ($load_Division as $list) {
													echo '
														<option value="'.$list->div_tag.'">'.$num++.' - '.$list->div_name.'</option>
													';
												}
											}
										?>
									</select>

									<div class="input-group-btn">
										<button type="button" class="btn btn-danger btn-icon" onclick="onday_receiver()">
											<i class="icon-reset"></i>
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>LIST OF ENCODED DATA</b> /<small>Current Date - <?=$current_month.$current_day.$current_year2?></small>
						</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					
					<div class="panel-body">
						<table class="table datatable-button-init-basic" style="width:100%">
							<thead>
								<tr>
									<!-- style="display:none;" -->
									<th style="display:none;">DIVISION</th>
									<th>DOCUMENT NO.<br><small>(TEMPORARY)</small></th>
									<th style="display:none;">DOCUMENT ENTRY MODE</th>
									<th style="display:none;">DOCUMENT TYPE</th>
									<th>SUBJECT</th>
									<th>SENDER NAME/ POSITION/ SENDER ADDRESS</th>
									<th style="display:none;">RECEIVED DATE</th>
									<th>ENCODE/RECEIVED BY</th>
									<th>REMARKS</th>
									<th>RECEIVED BY</th>
								</tr>
							</thead>
							
							<tbody style="text-transform: uppercase; font-size: 12px;">
								<?php
									if (is_array($CurrentListEDTS)) {
										foreach ($CurrentListEDTS as $list) {
											$entry_date = $list->reg_date;

											if ($list->print == "") {
												$print_receive = '*';
											}

											else {
												$print_receive = $list->print;
											}

											echo '
												<tr>
													<td align="center" style="display:none;">'.$list->division.'</td>

													<td style="color:teal;">
														<abbr title="Manage Data">
															<a href="DataEntry-Details?ay='.$list->year.'&id='.$list->id.'&item=today">
																'.$list->doc_no.'
															</a>
														</abbr>
													</td>

													<td align="center" style="display:none;">'.$list->doc_entry.'</td>

													<td align="center" style="display:none;">'.$list->doc_type.'</td>

													<td>'.$list->subject.'</td>

													<td>'.$list->sender.'</td>

													<td align="center" style="display:none;">'.$entry_date.'</td>

													<td align="center">'.$list->encoded_by.'</td>

													<td align="center">'.$list->remarks.'</td>

													<td align="center">
														'.$print_receive.'
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