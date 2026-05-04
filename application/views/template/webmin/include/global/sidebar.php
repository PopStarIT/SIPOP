<div class="side-menu-fixed">
	<div class="scrollbar side-menu-bg">
		<ul class="nav navbar-nav side-menu" id="sidebarnav">
			<?php
			$permision = $this->authentication->permission_check(25);
			if ($permision) {
			?>
				<li>
					<a href="javascript:add_tab(25,'Purchase','purchase','fa fa-shopping-basket');">
						<div class="pull-left">
							<i class="fa fa-shopping-cart"></i>
							<span class="right-nav-text">PURCHASE</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permision = $this->authentication->permission_check(26);
			if ($permision) {
			?>
				<li>
					<a href="javascript:add_tab(26,'Sales','sales','fa fa-line-chart');">
						<div class="pull-left">
							<i class="fa fa-bar-chart"></i>
							<span class="right-nav-text">SALES</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permision = $this->authentication->permission_check(27);
			if ($permision) {
			?>
				<li>
					<a href="javascript:add_tab(27,'Inventory','inventory','fa fa-archive');">
						<div class="pull-left">
							<i class="fa fa-archive"></i>
							<span class="right-nav-text">INVENTORY</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permision = $this->authentication->permission_check(7);
			if ($permision) {
			?>
				<li>
					<a href="javascript:add_tab(7,'Accounting','accounting','fa fa-pie-chart');">
						<div class="pull-left">
							<i class="fa fa-pie-chart"></i>
							<span class="right-nav-text">ACCOUNTING</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permision = $this->authentication->permission_check(938);
			if ($permision) {
			?>
				<li>
					<a href="javascript:add_tab(938,'Warehouse','warehouse','fa fa-archive');">
						<div class="pull-left">
							<i class="fa fa-archive"></i>
							<span class="right-nav-text">WAREHOUSE</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permision = $this->authentication->permission_check(28);
			if ($permision) {
			?>
				<li>
					<a href="javascript:add_tab(28,'Reports','report','fa fa-files-o');">
						<div class="pull-left">
							<i class="fa fa-files-o"></i>
							<span class="right-nav-text">REPORTS</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			//$permision = $this->authentication->permission_check(1015);
			$permission_pop = $this->authentication->permission_check_pop(781015);
			if ($permission_pop) {
			?>
				<li>
					<a href="javascript:add_tab(781015,'Hrd','hrd','fa fa-users');">
						<div class="pull-left">
							<i class="fa fa-users"></i>
							<span class="right-nav-text">HRD</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permission_pop = $this->authentication->permission_check_pop(781044);
			if ($permission_pop) {
			?>
				<li>
					<!--http://192.168.99.133:8083/SIPOP/dashboard/index
				 loaddata_jml_tanggal_prod_transfer_lebih -->
					<a href="javascript:add_tab(781044,'Dashboard','dashboard','fa fa-bars');">
						<!-- <a href="javascript:add_tab(7811208,'Monitoringdata','monitoringdata/monitoringdata','fa fa-bars');"> -->


						<div class="pull-left">
							<i class="fa fa-bars"></i>
							<span class="right-nav-text">DASHBOARD</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permision = $this->authentication->permission_check(23);
			if ($permision) {
			?>
				<li>
					<a href="javascript:add_tab(23,'Settings','settings','fa fa-gear');">
						<div class="pull-left">
							<i class="fa fa-gear"></i>
							<span class="right-nav-text">SETTINGS</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permission_pop = $this->authentication->permission_check_pop(781075);
			if ($permission_pop) {
			?>
				<li>
					<a href="javascript:add_tab(781075,'Pattern','pattern','fa fa-puzzle-piece');">
						<div class="pull-left">
							<i class="fa fa-puzzle-piece"></i>
							<span class="right-nav-text">PATTERN</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>

			<?php
			$permission_pop = $this->authentication->permission_check_pop(781112);
			if ($permission_pop) {
			?>
				<li>
					<a href="javascript:add_tab(781112,'Gudang','gudang','fa fa-building');">
						<div class="pull-left">
							<i class="fa fa-building"></i>
							<span class="right-nav-text">GUDANG</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>
			<?php
			$permission_pop = $this->authentication->permission_check_pop(781112);
			if ($permission_pop) {
			?>
				<li>
					<a href="javascript:add_tab(7811101,'it_assets','it_assets','fa-drivers-license');">
						<div class="pull-left">
							<i class="fa fa-wrench"></i>
							<span class="right-nav-text">IT ASSETS</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>
			<?php
			if (intval($this->session->userdata('user_id')) === -99) {
			?>
				<li>
					<a href="javascript:add_tab(7811177,'Line Monitoring Administrator','master_settings','fa-fa-cog');">
						<div class="pull-left">
							<i class="fa fa-check-circle-o"></i>
							<u style="color: white;"><span class="right-nav-text">Line Monitoring Administrator</span></u>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>
			<?php
			if (intval($this->session->userdata('user_id')) !== -99) {
			?>
				<li>
					<a href="javascript:add_tab(7811317,'Line Monitoring Operator','master_settings_task','fa-fa-cog');">
						<div class="pull-left">
							<i class="fa fa-check-square-o"></i>
							<span class="right-nav-text">Line Monitoring OPERATOR</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
			<?php } ?>




		</ul>
	</div>
</div>