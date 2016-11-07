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
	<link rel="stylesheet" type="text/css" href="<?=base_url('js/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/rsTable.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/style.css');?>">
	 
</head>
<body> 
	
	<div class="table-wrap">
		<h4>List of <?=$title;?></h4>
		<div class="btn-group">
			<button id=\"btn-add\" class="btn btn-default" data-toggle="modal" data-target="#save-modal" data-backdrop="static"  data-keyboard="false" type='button' >Add Category</button>
			<button id=\"btn-filter\" class="btn btn-default">Filter</button> 
		</div>
		<table class="list-table display">
			<thead>
				<!-- HEADER -->
				<tr>  
					<th>Action</th> 
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


	<!-- SAVE FORM -->
	<div id="save-modal" class="modal fade">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <!-- dialog body -->
	      <div class="modal-body">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <div class="form-wrap">
		        <?php $fields = explode(",", $fields) ?>
		        <table>
		        <?php foreach($fields as $f){ ?>
		        	<tr>
			        	<td>
				        	<?php $splitfld = explode("|", $f) ?>
				        	<label for="fld-<?=$splitfld[0]?>"><?=$splitfld[1]?>:</label>
				        	<input type="text" id="fld-<?=$splitfld[0]?>" class="form-control" <?=((!strpos($splitfld[1], "*")) ? "" : 'required="required"');?>/>
			        	</td>
		        	</tr>
		        <?php } ?>
		        </table>
	        </div>
	      </div>
	      <!-- dialog buttons -->
	      <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
	    </div>
	  </div>
	</div>
	 
 
	<script type="text/javascript" src='<?=base_url("js/jquery/jquery-1.11.3.js")?>'></script>
	<script type="text/javascript" src='<?=base_url("js/jquery/jquery-ui.js")?>'></script> 
	<script type="text/javascript" src='<?=base_url("js/datatables/jquery.dataTables.min.js")?>'></script> 
    <script type="text/javascript" src="<?=base_url('js/bootstrap/bootstrap.min.js');?>"></script>  
    <script type="text/javascript" src="<?=base_url('js/bootbox.min.js');?>"></script>  
    <script type="text/javascript" src="<?=base_url('js/bootstrap-datepicker/js/moment.min.js');?>"></script>  
    <script type="text/javascript" src="<?=base_url('js/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js');?>"></script>  
	<script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>  
	<script type="text/javascript" src='<?=base_url("js/utility/maintenance.js")?>'></script>  
	 
</body>
	
</html>