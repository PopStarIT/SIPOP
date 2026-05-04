<?php if(isset($dashboard_table)) { ?>
	<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
		<div class="card-body">
			<?php if(isset($dashboard_table['nav_button'])) { ?>
				<div class="row">
					<div class="col-xl-12">
						<?php 
					    // var_dump($dashboard_table['nav_button'] );
				//		foreach($dashboard_table['nav_button'] as $dt_nav_button) {
				//			$permision = $this->authentication->permission_check($dt_nav_button['method_id']);
				//			if($permision){
				//				echo "<button type=\"button\" class=\"btn btn-default mb-1\" onclick=\"javascript:nav_button_".$dt_nav_button['method_id'] ."_". $data_method[$dt_nav_button['method_id']]['method']."();\">";
				//				echo "<i class=\"". $dt_nav_button['icon'] ."\"></i> ".$dt_nav_button['title'];
				//				echo "</button> ";
				//			}
				//		}
				
				
				          foreach($dashboard_table['nav_button'] as $dt_nav_button) {
								$permision = $this->authentication->permission_check($dt_nav_button['method_id']);
								if($permision){
									if(isset($dt_nav_button['btn'])){
									echo "<button type=\"button\" class=\"btn ". $dt_nav_button['btn']." mb-1\" onclick=\"javascript:nav_button_". $dt_nav_button['method_id'] ."_". $data_method[$dt_nav_button['method_id']]['method']."();\">";
									echo "<i class=\"". $dt_nav_button['icon'] ."\"></i> ".$dt_nav_button['title'];
									echo "</button> ";
									}else{	
									echo "<button type=\"button\" class=\"btn btn-default mb-1\" onclick=\"javascript:nav_button_". $dt_nav_button['method_id'] ."_". $data_method[$dt_nav_button['method_id']]['method']."();\">";
									echo "<i class=\"". $dt_nav_button['icon'] ."\"></i> ".$dt_nav_button['title'];
									echo "</button> ";
								  }
								}
							}
							
													
							if(isset($dashboard_table['dropdown_button'])){
								if(count($dashboard_table['dropdown_button']) > 0){
									foreach($dashboard_table['dropdown_button'] as $dt_dropdown_button){	
										$permision = $this->authentication->permission_check($dt_dropdown_button['method_id']);
										if($permision){
											echo "<button id=\"btnGroupDrop_" . $dt_dropdown_button['method_id']  . "\" type=\"button\" style=\"height:2.65em;margin-top:-0.2em\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
											echo "<i class='" . $dt_dropdown_button['icon']  . "'></i>" 	;										
											echo $dt_dropdown_button['title'] . "</button> ";
											echo "<div class=\"dropdown-menu\" aria-labelledby=\"btnGroupDrop_" . $dt_dropdown_button['method_id']   . "\">";
												foreach($dt_dropdown_button['child'] as $dt_child_button){
													$permision = $this->authentication->permission_check($dt_child_button['method_id']);
																										
													if($permision){
														//echo "<a class='dropdown-item' href='#' id='child_" . $dt_child_button['method_id']  . "'";
														echo "<a class='dropdown-item' href='" . '#' . "'";
														echo "onclick=javascript:nav_button_" .$dt_child_button['method_id'] ."_". $data_method[$dt_child_button['method_id']]['method']."();" .  ">"  ; 
														echo "<i class='" . $dt_child_button['icon']  . "'></i>&nbsp;&nbsp;"  ; 
														echo $dt_child_button['title'] ;
														echo "</a>";
													}
												}
											echo "</div>";		
											
										}	
									}
								}
							}
						?>                                                             
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
    <hr style="margin-right:30px;"/>
	<div class="row">
		<div class="col-xl-12">
		
			<table id="table_<?php echo $methodid ?>"></table>
			<div id="ptable_<?php echo $methodid ?>"></div>                                                     
		</div>
	</div>
<?php } ?>