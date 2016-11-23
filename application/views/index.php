<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Century%20Gothic">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/datatables/jquery.dataTables.css');?>">
    <link rel="stylesheet" href="<?=base_url('css/navside/nav.css');?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url('css/rsTable.css');?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url('css/style.css');?>"> <!-- Resource style -->

    <link href="<?=base_url('js/bootstrap-datepicker/css/bootstrap-datetimepicker.css');?>" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <?php $this->load->view("header");?>

    <main class="cd-main-content">

    <?php $this->load->view("sub-menu");?>

        <div class="content-holder">
            <?php $this->load->view($role);?> 
        </div>

    

    </main>          
    <script type="text/javascript" src='<?=base_url("js/jquery/jquery-1.11.3.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/jquery/jquery-ui.js")?>'></script> 
    <script type="text/javascript" src='<?=base_url("js/datatables/jquery.dataTables.min.js")?>'></script> 
    <script type="text/javascript" src='<?=base_url("js/bootstrap/bootstrap.min.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/bootbox.min.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/highcharts.js")?>'></script>
    <script src="<?=base_url('js/navside/main.js');?>"></script>   
    <script src="<?=base_url('js/scripts/admin.js');?>"></script>   
     
</body>
    
</html>         