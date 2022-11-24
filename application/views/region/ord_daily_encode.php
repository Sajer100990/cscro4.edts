<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Office of the Regional Director</span></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float text-size-small has-text">
						<i class="icon-home2 text-primary"></i> <span><?=$session_division;?></span>
					</a>

					<a href="#" class="btn btn-link btn-float text-size-small has-text">
						<i class="icon-calendar5 text-primary"></i> <span>Data</span>
					</a>
				</div>
			</div>
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
				<li class="active">ORD Daily Encode</li>
			</ul>

			<ul class="breadcrumb-elements">
				<li><a href="<?=BASE_URL('#')?>"><?=$show_SystemInfo['header']?></a></li>
			</ul>
		</div>
	</div>
	<!-- /page header -->

	<!-- Content area -->
	<div class="content">
		<!-- START OF MAIN CONTENT -->
		<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">

		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>Received Data Entry</b> /<small>Current Date (mm/dd/yy) - <?=$current_month.$current_day.$current_year2?></small>
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
								<li>Routed document received to divisions for action</li>
							</ul>
						</small>
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