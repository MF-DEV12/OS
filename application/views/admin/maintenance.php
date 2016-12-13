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
	<input type="hidden" id="ctrl" value="<?=$controller;?>">
	<input type="hidden" id="collist" value='<?=$columns;?>'>
	<input type="hidden" id="mode" value='<?=$mode;?>'>
	<input type="hidden" id="requiredfields" value='<?=$requiredfields;?>'>
	<div class="table-wrap">
		
		<h4>List of <?=$title;?></h4>
		<div class="btn-group btn-action-group mode">
			<button id="btn-add" class="btn btn-success" data-toggle="modal" data-target="#save-modal" data-backdrop="static"  data-keyboard="false" type='button'><span class="glyphicon glyphicon-plus"></span></button>
		</div>
		<div class="table-group">
			<table class="list-table display">
				 
			</table> 
		</div>
	</div> 


	<!-- SAVE FORM -->
	<div id="save-modal" class="modal fade" mode="add">
	  <div class="modal-dialog form">
	    <div class="modal-content form">
		    <div class="modal-header">
		    	<button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" onclick="onModalClose();">&times;</button>
		    	<h4 class="modal-title"><mode>New</mode> <?=$title;?></h4>
	    	</div>
	      <!-- dialog body -->
	      <div class="modal-body form"> 
	        <div class="form-wrap">
		        <?php $fields = explode(",", $fields) ?>
		        <table width="100%">
		        <?php foreach($fields as $f){ ?>
		        	<?php $splitfld = explode("|", $f) ?>
		        	<?php $description = str_replace("*", "", $splitfld[1]); ?>
		        	<?php if($description != "ACTION") {?> 
			        	<tr>
				        	<td>
					        	
					        	<label for="fld-<?=$description?>" <?=(($description != "ID") ? "" : 'style="display:none;"');?>><?=$splitfld[1]?>:</label>
					        	<input type="text" id="fld-<?=$splitfld[0]?>" data-label="<?=$description?>" class="form-control" <?=((!strpos($splitfld[1], "*")) ? "" : 'required="required"');?> <?=(($description != "ID") ? "" : 'style="display:none;"');?>/>
				        	</td>
			        	</tr>
		        	<?php }?>

		        <?php } ?>
		        </table>
	        </div>
	      </div>
	      <!-- dialog buttons -->
	      <div class="modal-footer form">
	      <p class="message">*Please input all required field(s).</p>
		      <button type="button" data-dismiss="modal" class="btn btn-default btn-cancel">Cancel</button>
		      <button type="button" class="btn btn-primary btn-save">Save</button>
	      </div>
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