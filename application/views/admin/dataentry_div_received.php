<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Masterlist</span></h4>
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
				<li><a href="#"><i class="icon-home2 position-left"></i> Data Entry</a></li>
				<li class="active">Masterlist - Received</li>
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

		<center>
			<a href="<?=base_url('Admin-Manage-Received?ay=')?><?=date('Y') ?>&division=PALD" class="btn btn-xs" style="width: 100px; background-color: #f2cf88; color: #000;">
				<b>PALD</b>
			</a>

			<a href="<?=base_url('Admin-Manage-Received?ay=')?><?=date('Y') ?>&division=LSD" class="btn btn-success btn-xs" style="width: 100px; color: #000;">
				<b>LSD</b>
			</a>

			<a href="<?=base_url('Admin-Manage-Received?ay=')?><?=date('Y') ?>&division=PSED" class="btn btn-danger btn-xs" style="width: 100px; color: #000;">
				<b>PSED</b>
			</a>

			<a href="<?=base_url('Admin-Manage-Received?ay=')?><?=date('Y') ?>&division=MSD" class="btn btn-warning btn-xs" style="width: 100px; color: #000;">
				<b>MSD</b>
			</a>

			<a href="<?=base_url('Admin-Manage-Received?ay=')?><?=date('Y') ?>&division=HRD" class="btn btn-primary btn-xs" style="width: 100px; color: #000;">
				<b>HRD</b>
			</a>

			<a href="Admin-Manage-Received?ay=<?=date('Y') ?>&division=ESD" class="btn btn-info btn-xs" style="width: 100px; color: #000;">
				<b>ESD</b>
			</a>

			<a href="<?=base_url('Admin-Manage-Received?ay=')?><?=date('Y') ?>&division=ORD" class="btn btn-xs" style="width: 100px; background-color: #9cdaf0; color: #000;">
				<b>ORD</b>
			</a>
		</center>

		<br>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>Data Received Masterlist</b><br>
							<small>Consolidated files.</small>
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
									<th style="display:none;">DIVISION</th>
									<th>DOCUMENT NO.<br><small>(TEMPORARY)</small></th>
									<th style="display:none;">DOCUMENT ENTRY MODE</th>
									<th style="display:none;">DOCUMENT TYPE</th>
									<th>SUBJECT</th>
									<th>SENDER NAME/ POSITION/ SENDER ADDRESS</th>
									<th>RECEIVED DATE</th>
									<th>ENCODE/ RECEIVED BY</th>
									<th>REMARKS</th>
									<th>RECEIVED BY</th>
								</tr>
							</thead>

							<tbody>
								<?php
									if (is_array($load_DivisionEntry)) {
										foreach ($load_DivisionEntry as $list) {
											echo '
												<tr>
													<td style="display: none;">'.$list->division.'</td>
													<td style="color:teal;">
														<abbr title="Manage Data">
															<a href="DataEntry-Details?ay='.date('Y').'&id='.$list->id.'&item=masterlist">
																'.$list->doc_no.'
															</a>
														</abbr>
													</td>
													<td style="display: none;">'.$list->doc_entry.'</td>
													<td style="display: none;">'.$list->doc_type.'</td>
													<td>'.$list->subject.'</td>
													<td>'.$list->sender.'</td>
													<td>'.$list->month.' '.$list->day.' '.$list->year.'</td>
													<td>'.$list->encoded_by.'</td>
													<td>'.$list->remarks.'</td>
													<td>&nbsp;</td>
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
<!-- /main content -->