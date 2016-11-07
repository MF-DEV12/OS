 
 <header>

 <?php
 	$curLabel = "CMS";
 	if($index==1)
 		$curLabel .= " - PROJECTS";
 	if($index==2)
 		$curLabel .=  " - CONTRIBUTORS";
 	if($index==3)
 		$curLabel .=  " - CONTRIBUTIONS";
 	if($index==4)
 		$curLabel .=  " - ASSETS";
 	if($index==5)
 		$curLabel .=  " - EXPENSES";
 	if($index==6)
 		$curLabel .=  " - DASHBOARD";
 	if($index==7)
 		$curLabel .=  " - ABOUT US";
 	if($index==8)
 		$curLabel .=  " - BACKUP";

 ?>

	<div class="cd-logo"><?=$curLabel;?></div>

	<nav class="cd-main-nav-wrapper">

		<ul class="cd-main-nav">
			<li <?=(($index == 6) ? "class='active'" : "");?>><a href="<?=base_url('admin/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<li <?=(($index == 1) ? "class='active'" : "");?>><a href="<?=base_url('admin/project');?>"><span class="glyphicon glyphicon-glyphicon glyphicon-tasks"></span> Projects</a></li>
			<li <?=(($index == 2) ? "class='active'" : "");?>><a href="<?=base_url('admin/contributors');?>"><span class="glyphicon glyphicon-user"></span> Contributors</a></li>
			
			<li>
				<a href="#1" class="cd-subnav-trigger"><span class="glyphicon glyphicon-modal-window"></span> Transactions </a> 
				<ul>
					<li class="go-back"> <a href="#1" > Back</a></li>
					<li <?=(($index == 3) ? "class='active'" : "");?>><a href="<?=base_url('admin/contributions');?>"><span class="glyphicon glyphicon-piggy-bank"></span> Contributions</a></li>
					<li <?=(($index == 4) ? "class='active'" : "");?>><a href="<?=base_url('admin/assets');?>"><span class="glyphicon glyphicon-export"></span> Assets</a></li>
					<li <?=(($index == 5) ? "class='active'" : "");?>><a href="<?=base_url('admin/expenses');?>"><span class="glyphicon glyphicon-import"></span> Expenses</a></li> 
					<li><a href="#0" class="placeholder">Placeholder</a></li>
					<li><a href="#0" class="placeholder">Placeholder</a></li>
					<li><a href="#0" class="placeholder">Placeholder</a></li>
					<li><a href="#0" class="placeholder">Placeholder</a></li>

				</ul>
			</li>
			<li <?=(($index == 8) ? "class='active'" : "");?>><a href="<?=base_url('indexpage/utilities');?>"><span class="glyphicon glyphicon-save"></span> Backup</a></li> 

			<li <?=(($index == 7) ? "class='active'" : "");?>><a href="<?=base_url('indexpage/aboutus');?>"><span class="glyphicon glyphicon-info-sign"></span> About us</a></li>
			
		 
			<li><a href="<?=base_url('login/clearSession');?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			 
		</ul> <!-- .cd-main-nav -->
	</nav> <!-- .cd-main-nav-wrapper --> 
	<a href="#0" class="cd-nav-trigger" style="color:transparent !important;">Menu<span></span></a>

</header>
 