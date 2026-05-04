<style>

#panel_content_<?php echo $methodid ?>{
       max-width: 100% !important;
       width: 100% !important;
       overflow-x: hidden; /* Mencegah pecah layout saat transisi resize */
    }
	
	/* Tambahkan di file CSS Anda atau di dalam tag <style> */
      .ui-jqgrid {
            max-width: 100% !important;
       }

        .ui-jqgrid-view, .ui-jqgrid-hdiv, .ui-jqgrid-bdiv, .ui-jqgrid-hbox {
            width: 100% !important;
      }
	  
	  /* Menghilangkan lebar kaku pada pager */
      .ui-jqgrid .ui-jqgrid-pager {
            width: 100% !important;
            height: auto !important;
            padding: 5px 0 !important;
       }

        /* Merapikan elemen di dalam pager (kiri, tengah, kanan) */
       .ui-pager-control {
             table-layout: fixed;
         }

       /* Di tablet/HP, sembunyikan info "View 1 - 10 of 100" jika terlalu sempit */
        @media (max-width: 768px) {
            .ui-pager-control td[id$="_right"] {
            display: none; /* Menyembunyikan info jumlah record di kanan */
        }
       .ui-pager-control td[id$="_left"] {
          width: 100px !important; /* Memperkecil area tombol navigasi kiri */
         }
}

</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card card-statistics"> 
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12">
							<div id="accordion">
								<div class="card-body p-0"> <!-- sebelumnya hanya menggunakan card saja -->
								<!--	<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<?php //echo $page_title ?>
										</h5>
									</div> -->
									
									<div id="panel_content_<?php echo $methodid ?>">
										<?php $this->load->view($path_template.'/library/content/dashboard_table2'); ?>
									</div>
									
									<div id="panel_content_form_<?php echo $methodid ?>" style="display:none">
										<?php
											if(isset($view_load_form)){
												$this->load->view('content/'.$view_load_form);
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>