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
							<b>Are you sure you want to delete this entry? </b><small> <?=$load_DateEntryID['doc_no']?></small>
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
									<table style="width: 100%">
										<tr>
											<td align="center" width="50%">
												<b>Subject</b><br>
												<?=$load_DateEntryID['subject']?>
											</td>

											<td align="center" width="50%">
												<b>Sender</b><br>
												<?=$load_DateEntryID['sender']?>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<br>

							<div class="pull-right">
								<a href="<?=base_url('DataEntry-Details')?>?ay=<?=$load_DateEntryID['year']?>&id=<?=$load_DateEntryID['id']?>" class="btn btn-link btn-xs">
									Back
								</a>

								<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
								<input type="hidden" name="doc_id" id="doc_id" value="<?=$_GET['id']?>">

								<button type="button" onclick="delete_edts()" class="btn btn-danger btn-xs">
									<i class="icon-trash position-left"></i> DELETE
								</button>
							</div>
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