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
				<li class="active">Masterlist - SPELS CARD</li>
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
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h6 class="panel-title">
							<b>Special Eligibility Card</b><br>
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
									<th>NO.</th>
									<th>NAME</th>
									<th>TYPE</th>
									<th>COE ISSUED</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$num = 1;
									if (is_array($load_SpelsData)) {
										foreach ($load_SpelsData as $list) {
											echo '
												<tr>
													<td>'.$num++.'</td>

													<td style="color:teal;">
														<abbr title="Manage Data">
															<a href="Edit-Spels?id='.$list->id.'">
																'.$list->lastname.', '.$list->firstname.' '.$list->middleinitial.'. '.$list->extraname.'
															</a>
														</abbr>
													</td>
													
													<td>'.$list->tag.' - '.$list->type.'</td>
													<td>'.$list->coe_issued.'</td>
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