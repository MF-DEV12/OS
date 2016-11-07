<!DOCTYPE html>
<html>
<head>
	<!-- Include meta tag to ensure proper rendering and touch zooming -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title><?=$title;?></title>
	<link rel="icon" href="<?=base_url('images/new logo.png');?>"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/jquery-ui.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/datatables/jquery.dataTables.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/rsTable.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/style.css');?>">
	 
</head>
<body> 
	
	<div class="table-wrap">
		<h4>List of <?=$title;?></h4>
		<table class="list-table display">
			<thead>
				<!-- HEADER -->
				<tr>  
					<th></th> 
					<?php $hdr = (array)$list[0]; ?>  
					<?php foreach( $hdr  as $row=>$value){ ?> 
					 	<th><?=$row;?></th>
					<?php } ?> 				 
				</tr>
			</thead>
			<tbody>
				<!-- LIST DATA -->
				<?php foreach($list as $row=>$value){ ?> 
					<tr> 
						<td>
							<span data-mode="display">
								<a href="#" class="btn-edit" data-id="<?=$value->ID;?>">Edit</a>  |  
								<a href="#" class="btn-delete" data-id="<?=$value->ID;?>">Delete</a>
							</span>
							<span data-mode="edit">
								<a href="#" class="btn-save" data-id="<?=$value->ID;?>">Save</a>  |  
								<a href="#" class="btn-cancel" data-id="<?=$value->ID;?>">Cancel</a>
							</span>
						</td>

						<?php foreach($value as $key=>$data) { ?>
							<td data-label="<?=$key;?>" data-type="<?=gettype($data);?>"><?=$data;?></td>
						<?php } ?>  

					</tr>
				<?php } ?> 
			</tbody>
		</table> 
	</div> 
	 
 
	<script type="text/javascript" src='<?=base_url("js/jquery/jquery-1.11.3.js")?>'></script>
	<script type="text/javascript" src='<?=base_url("js/jquery/jquery-ui.js")?>'></script> 
	<script type="text/javascript" src='<?=base_url("js/datatables/jquery.dataTables.min.js")?>'></script> 
    <script type="text/javascript" src="<?=base_url('js/bootstrap/bootstrap.min.js');?>"></script>  
    <script type="text/javascript" src="<?=base_url('js/bootbox.min.js');?>"></script>  
	<script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>  
	<script type="text/javascript" src='<?=base_url("js/utility/maintenance.js")?>'></script>  
	 
</body>
	
</html>