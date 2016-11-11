 
 <header>
  
	<div class="cd-logo"> <img class="company-logo" src="<?=base_url('images/logo.png');?>" alt=""/>  </div>

	<nav class="cd-main-nav-wrapper">
	 	<ul class="cd-main-nav">
	 	<!-- CUSTOMER NAVIGATION MENU -->
	 	<?php if($role=="customer") { ?>

				
					<li><a href="<?=base_url('admin/dashboard');?>"><span class="glyphicon glyphicon-shopping-cart"></span> Order</a></li>
					<li><a href="<?=base_url('admin/project');?>"><span class="glyphicon glyphicon-comment"></span> Forum</a></li>
					<li><a href="<?=base_url('admin/contributors');?>">  About us</a></li>
					  
				 

	 	<?php } ?>

	 	<!-- CUSTOMER NAVIGATION MENU -->
	 	<?php if($role=="admin") { ?>
				 
				<li class="active"><a href="#purchaseorder"><span class="glyphicon glyphicon-edit"></span> Purchase Order</a></li>
				<li><a href="#inventory"><span class="glyphicon glyphicon-glyphicon glyphicon-tasks"></span> Inventory</a></li>
				<li><a href="#orders"><span class="glyphicon glyphicon-shopping-cart"></span> Orders</a></li>
				<li><a href="#reports"><span class="glyphicon glyphicon-list-alt"></span> Reports</a></li>
				<li><a href="#settings"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-comment"></span> Forums</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> 
				 
					  
	 	<?php } ?>

	 	<!-- CUSTOMER NAVIGATION MENU -->
	 	<?php if($role=="supplier") { ?>

				 
				<li><a href="<?=base_url('admin/dashboard');?>"><span class="glyphicon glyphicon-download-alt"></span> Requests</a></li>
				<li><a href="<?=base_url('admin/project');?>"><span class="glyphicon glyphicon-tasks"></span> Items</a></li> 
			 
				<li><a href="<?=base_url('login/clearSession');?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> 

	 	<?php } ?>



		<!-- <ul class="cd-main-nav">
			<li><a href="<?=base_url('admin/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<li><a href="<?=base_url('admin/project');?>"><span class="glyphicon glyphicon-glyphicon glyphicon-tasks"></span> Projects</a></li>
			<li><a href="<?=base_url('admin/contributors');?>"><span class="glyphicon glyphicon-user"></span> Contributors</a></li>
			 
			
		 	<li>
				<a href="#1" class="cd-subnav-trigger"><span class="glyphicon glyphicon-modal-window"></span> Transactions </a> 
				<ul >
					<li class="go-back"> <a href="#1" > Back</a></li>
					<li><a href="<?=base_url('admin/contributions');?>"><span class="glyphicon glyphicon-piggy-bank"></span> Contributions</a></li>
					<li><a href="<?=base_url('admin/debt');?>"><span class="glyphicon glyphicon-export"></span> Debt</a></li>
					<li><a href="<?=base_url('admin/expenses');?>"><span class="glyphicon glyphicon-import"></span> Expenses</a></li> 
					<li><a href="#0" class="placeholder">Placeholder</a></li> 
					<li><a href="#0" class="placeholder">Placeholder</a></li>
					<li><a href="#0" class="placeholder">Placeholder</a></li>

				</ul>
			</li>

			<li>
				<a href="#2" class="cd-subnav-trigger "><span class="glyphicon glyphicon-modal-window"></span> Settings </a> 
				<ul>
					<li class="go-back"> <a href="#2" > Back</a></li>
					<li><a href="<?=base_url('indexpage/utilities');?>"><span class="glyphicon glyphicon-save"></span> Backup</a></li>  
					<li><a href="<?=base_url('indexpage/aboutus');?>"><span class="glyphicon glyphicon-info-sign"></span> About us</a></li>
					 
					<li><a href="#0" class="placeholder">Placeholder</a></li> 
					<li><a href="#0" class="placeholder">Placeholder</a></li>
					<li><a href="#0" class="placeholder">Placeholder</a></li>

				</ul>
			</li>-->

			 
		</ul> <!-- .cd-main-nav -->
	</nav> <!-- .cd-main-nav-wrapper --> 

	<a href="#0" class="cd-nav-trigger" style="color:transparent !important;">Menu<span></span></a>



</header>
 	