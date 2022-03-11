<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Data Entry</span></h4>
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
				<li><a href="#"><i class="icon-stack position-left"></i> Data Entry</a></li>
				<li class="active">Manage Data Entry</li>
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
			<div class="col-md-3">&nbsp;</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>Manage Data Entry</b> /<small>Document #: <?=$load_DateEntryID['doc_no']?></small>
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
								<div class="col-md-12">
									<table class="table table-responsive table-bordered">
										<tr>
											<td style="width: 30%"><b>Division</b></td>
											<td style="width: 70%"><?=$load_DateEntryID['division']?></td>
										</tr>

										<tr>
											<td><b>Document Entry</b></td>
											<td><?=$load_DateEntryID['doc_entry']?></td>
										</tr>

										<tr>
											<td><b>Document Type</b></td>
											<td><?=$load_DateEntryID['doc_type']?></td>
										</tr>

										<tr>
											<td><b>Subject</b></td>
											<td><?=$load_DateEntryID['subject']?></td>
										</tr>

										<tr>
											<td><b>Sender</b></td>
											<td><?=$load_DateEntryID['sender']?></td>
										</tr>

										<tr>
											<td><b>Remarks</b></td>
											<td><?=$load_DateEntryID['remarks']?></td>
										</tr>

										<tr>
											<td><b>Encoded By</b></td>
											<td><?=$load_DateEntryID['encoded_by']?></td>
										</tr>
									</table>
								</div>
							</div>

							<br>

							<div class="pull-right">
								<a type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_theme_primary">
									<i class="icon-pencil5 position-left"></i> EDIT
								</a>

								<a href="<?=base_url('Delete-DataEntry')?>?ay=<?=$load_DateEntryID['year']?>&id=<?=$load_DateEntryID['id']?>&item=<?php echo $_GET['item'] ?>" class="btn btn-danger btn-xs">
									<i class="icon-trash position-left"></i> DELETE
								</a>
							</div>

							<!-- Primary modal -->
							<div id="modal_theme_primary" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-primary">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h6 class="modal-title">Update File - <?=$load_DateEntryID['doc_no']?> | Encoded By - <?=$load_DateEntryID['encoded_by']?></h6>
										</div>

										<div class="modal-body">
											<table style="width: 100%;">
												<tr>
													<td style="width: 30%"><b>Division</b></td>
													<td style="width: 70%">
														<div class="form-group has-feedback-left">
															<select class="form-control input-xS" name="division" id="division">
																<option value="<?=$load_DateEntryID['division']?>" >
																	<small><?=$load_DateEntryID['division']?></small>
																</option>
															</select>

															<div class="form-control-feedback">
																<i class="icon-select2"></i>
															</div>
														</div>
													</td>
												</tr>

												<tr>
													<td><b>Document Entry</b></td>
													<td>
														<div class="form-group has-feedback-left">
															<select class="form-control input-xS" name="doc_entry" id="doc_entry">
																<option value="<?=$load_DateEntryID['doc_entry']?>" >
																	<small><?=$load_DateEntryID['doc_entry']?>
																</option>

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
													</td>
												</tr>

												<tr>
													<td><b>Document Type</b></td>
													<td>
														<div class="form-group has-feedback-left">
															<select class="form-control input-xS" name="doc_type" id="doc_type">
																<option value="<?=$load_DateEntryID['doc_type']?>" >
																	<small><?=$load_DateEntryID['doc_type']?></small>
																</option>
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
													</td>
												</tr>

												<tr>
													<td><b>Subject</b></td>
													<td><textarea id="subject" name="subject" rows="4" class="form-control" placeholder="- SUBJECT -" style="resize: none;"><?=$load_DateEntryID['subject']?></textarea></td>
												</tr>

												<tr>
													<td><b>Sender</b></td>
													<td><textarea id="sender" name="sender" rows="4" class="form-control" placeholder="- SENDER -" style="resize: none;"><?=$load_DateEntryID['sender']?></textarea></td>
												</tr>

												<tr>
													<td><b>Remarks</b></td>
													<td><textarea id="remarks" name="remarks" rows="4" class="form-control" placeholder="- REMARKS -" style="resize: none;"><?=$load_DateEntryID['remarks']?></textarea></td>
												</tr>
											</table>
										</div>

										<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
										<input type="hidden" name="user_name" id="user_name" value="<?=$UserData['fn']?>">
										<input type="hidden" name="user_id" id="user_id" value="<?=$UserData['id']?>">
										<input type="hidden" name="doc_id" id="doc_id" value="<?=$_GET['id']?>">

										<!-- others -->
										<input type="hidden" name="month" id="month" value="<?=$load_DateEntryID['month']?>">
										<input type="hidden" name="day" id="day" value="<?=$load_DateEntryID['day']?>">
										<input type="hidden" name="year" id="year" value="<?=$load_DateEntryID['year']?>">
										<input type="hidden" name="year2" id="year2" value="<?=$load_DateEntryID['year2']?>">
										<input type="hidden" name="division" id="division" value="<?=$load_DateEntryID['division']?>">
										<input type="hidden" name="doc_no" id="doc_no" value="<?=$load_DateEntryID['doc_no']?>">

										<div class="modal-footer">
											<button type="button" class="btn btn-link btn-xs" data-dismiss="modal">Close</button>
											<button onclick="update_edts()" type="button" class="btn btn-success btn-xs">
												<i class="icon-reset position-left"></i> Save changes
											</button>
										</div>
									</div>
								</div>
							</div>
							<!-- /primary modal -->
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-3">&nbsp;</div>
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