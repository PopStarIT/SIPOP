 <style>
    
	.card-text {
      color: white;
	  font-size: 16px;
      font-weight: 500;
    }
	
	 .card-text small {
	  display: inline-block;
      width: 80px;
	  color: white;
	  font-size: 16px;
	  font-weight: 500; 
     
    }
	

 </style>

<?php if(isset($dashboard_tab)) { ?>
<div class="row">
	<div class="col-xl-12">
	   <div class="tab tab-border">
            <ul class="nav nav-tabs" role="tablist">
					<?php 
						$first = true;
						foreach($dashboard_tab as $tab) { 
							$class = "";
							if($first){
								$class = "active show";
							}

							echo "<li class=\"nav-item\">";
							echo "<a class=\"nav-link ". $class ." \" id=\"tab_". $methodid ."_". $tab['alias'] ."\" data-toggle=\"tab\" href=\"#content_". $methodid ."_". $tab['alias'] ."\" role=\"tab\" aria-controls=\"content_". $methodid ."_". $tab['alias'] ."\" aria-selected=\"true\">";	
							echo "<i class=\"". $tab['icon'] ."\"></i> ". $tab['title'];	
							echo "</a>";	
							echo "</li>";	
								
								
							$first = false;
						}
					?>
			</ul>
		  <div class="tab-content">
		    <?php 
				$first = true;
				
				 echo "<div class=\"tab_custom_ecc tab-pane fade active show \" id=\"content_". $methodid ."_Production\" role=\"tabpanel\" aria-labelledby=\"tab_". $methodid ."_". $tab['alias'] ."\">";
				 echo "<div class=\"row\">";
				// var_dump($dashboard_tab);
				?>
				
               <div class="col-xl-12 mb-10">	
              	 <div class="ui grid form">
					<div class="row field">
					<div class="twelve wide column">
						<button type="button" class="btn btn-default" onclick="javascript:preview_dashboard_<?php echo $methodid ?>();>
							<i class="fa fa-search"></i> Preview2
						</button>
					</div>
				  </div>
				 </div>
			   </div>
				
				<div class="col-xl-3 col-lg-6 col-md-6 ">
				 <div class="card title3 bg-success " >
				   <div class="card-body">
				     <a href="#" data-toggle="modal" data-target="#view_modal_prod_request">
				      <div class="card-body-icon" style="font-color:black;">
					  <?php echo $total_request ?>
					  </div>
					   </a>
				    <h5 class="card-title2">Production Request</h5>
					 
					  <p class="card-text">
					     <a href="#" data-toggle="modal" data-target="#view_modal_prod_request">
						 <small> Fabric </small>: <?php echo $total_request_fb ?> <br> 
						 </a>
						 <a href="#" >
                         <small> Other </small>: <?php echo $total_request_other ?>
						 </a>
                      </p>
				 
					 
					 
				   </div>
				  <!--  <div class="card-title2 ">
					    Fabric :  <?php //echo $total_request_fb ?>
					  </div>
					   <div class="card-title2 ">
					    ACC :  <?php //echo $total_request_fb ?>
					  </div> -->
					 
				 </div>
				</div>
				
				 <div class="col-xl-3 col-lg-6 col-md-6 ">
				 <div class="card title3 bg-danger " >
				  <a href="#" >
				   <div class="card-body">
				      <div class="card-body-icon" style="font-color:black;">
					    <?php echo $total_request_fb ?>
					  </div>
				    <h5 class="card-title2">Production Transfer</h5>
				   </div>
				  </a>
				 </div>
				</div>
			
			<?php
			 echo "</div>";
			    echo "</div>";
			
			?>
			
			    <?php 
					
	//			 echo "<div class=\"tab_custom_ecc tab-pane fade  \" id=\"content_". $methodid ."_Error\" role=\"tabpanel\" aria-labelledby=\"tab_". $methodid ."_". $tab['alias'] ."\">";
				?>	
				  
		<!--			  <div class="col-xl-3 col-lg-6 col-md-6">
										        <a href="#" class="tile tile-danger tile-valign" data-toggle="modal" data-target="#view_modal_M">
												<div class="att att-absen">M-Absen Tanpa keterangan gsgsdgsdg</div>
												<span class="fa fa-bed"></span>
												<div class="att att-absen dir-att" id="ket_<?php //echo $methodid ?>_M">
												5
												</div>
												</a>
									          </div> -->
			<?php
		//	    echo "</div>";
			
			?>
		  </div>
	  </div>
<?php } ?>

<div class="modal fade" id="view_modal_prod_request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Daftar Production Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
		  <form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_modal_coba" action="javascript:addx_<?php echo $methodid ?>_absen()">
           	</form>
			  <div class="row">
                <div class="col-xl-12">
                 <table id="table_<?php echo $methodid ?>_keterangan_M"></table>
                 <div id="ptable_<?php echo $methodid ?>_keterangan_M"></div>                                                     
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
</div>



