<div class="container-fluid">
	<div id="panel_content_<?php echo $methodid ?>">
		<div class="row">
			<div class="col-xl-12">
				<div class="card card-statistics"> 
					<div class="card-body">
						<div class="row">
							<div class="col-xl-12">
								<div id="accordion">
									<div class="card">
										<div class="card-header" id="headingOne">
											<h5 class="mb-0">
												<?php echo $page_title ?>
											</h5>
										</div>

										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
												<form class="form-inline" id="form_<?php echo $methodid ?>">
													<div class="form-group">
														<label for="inputPassword6">Periode : &nbsp </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-calendar"></i></span>
															</div>
															<input class="form-control" id="form_<?php echo $methodid ?>_date_start"  name="date_start" type="text" value="<?php echo date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) ) ?>" />
														</div>
														
														 &nbsp S / D &nbsp 
														
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-calendar"></i></span>
															</div>
															<input class="form-control" id="form_<?php echo $methodid ?>_date_end"  name="date_end" type="text" value="<?php echo date("Y-m-d") ?>" />
														</div>
														 &nbsp &nbsp
														<button type="button" class="btn btn-default" onclick="javascript:search_<?php echo $methodid ?>();">
															<i class="fa fa-search"></i> Search
														</button> 
														
														&nbsp &nbsp
														<button type="button" class="btn btn-default" onclick="javascript:print_<?php echo $methodid ?>('pdf');">
															<i class="fa fa-search"></i> Print PDF
														</button>
														
														&nbsp &nbsp
														<button type="button" class="btn btn-default" onclick="javascript:print_<?php echo $methodid ?>('xlsx');">
															<i class="fa fa-search"></i> Print Xlsx
														</button>
													</div>									
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xl-12">
								<table id="table_<?php echo $methodid ?>_bb"></table>
								<div id="ptable_<?php echo $methodid ?>_bb"></div>                                                     
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
</div>

<div class="modal fade" id="view_modal_masuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pemasukan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			    <div class="row">
					<div class="col-xl-12">
						<table id="table_<?php echo $methodid ?>_report_absen_keteranganx"></table>
						<div id="ptable_<?php echo $methodid ?>_report_absen_keteranganx"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="view_modal_keluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pengeluaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			    <div class="row">
					<div class="col-xl-12 table-responsive">
						<table id="table_<?php echo $methodid ?>_pengeluaran_rincian"></table>
						<div id="ptable_<?php echo $methodid ?>_pengeluaran_rincian"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>