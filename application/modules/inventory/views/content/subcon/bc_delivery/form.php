<div class="row">
	<div class="col-xl-12 mb-30">     
		<div class="card card-statistics h-100"> 
			<div class="card-body" style="padding: 1.25rem !important">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
				<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
					<?php 
						$this->ecc_library->form('hidden','',"form_".$methodid,$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
						$this->ecc_library->form('hidden','',"form_".$methodid,'bc_out_header_id','');
					?>
					
					<div class="row">
						<div class="col-xl-4">
							<?php 
								$this->ecc_library->form('text','Contract No',"form_".$methodid,'contract_subcon_no','','','');
								$this->ecc_library->form('date','Contract Date',"form_".$methodid,'contract_subcon_date_start','','','');
							?>
						</div>
						
						<div class="col-xl-4">
					
							<?php 
								$this->ecc_library->form('select','Partner',"form_".$methodid,'partner_id','','','partner');
								$this->ecc_library->form('select','Subcon Type',"form_".$methodid,'contract_subcon_type_id','','','contract_subcon_type');
							?>
						
						</div>
						
						<div class="col-xl-4">
							<?php 
								$this->ecc_library->form('select','Inv GL Account',"form_".$methodid,'inv_gl_account_id','','','gl_account');
							?>
						</div>
					</div>
				</form>
				<br>	
				<div class="ui grid form">
					<div class="row field">
						<div class="twelve wide column">
							<button type="button" class="btn btn-success" onclick="save_<?php echo $methodid ?>()">
								<i class="fa fa-save"></i> Save
							</button>
							
							<button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>()">
								<i class="fa fa-arrow-left"></i> Back
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>   
	</div>
</div>