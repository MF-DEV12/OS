<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Century%20Gothic">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/datatables/jquery.dataTables.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('js/tagsinput/bootstrap-tagsinput.css');?>">
    <link rel="stylesheet" href="<?=base_url('css/navside/nav.css');?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url('css/rsTable.css');?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url('css/style.css');?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url('css/admin_navi_style.css');?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url('css/stepnavi.css');?>"> <!-- Resource style -->

    <link href="<?=base_url('js/bootstrap-datepicker/css/bootstrap-datetimepicker.css');?>" rel="stylesheet" type="text/css" />
</head>
<body>
    
 

    <div class='wrapper'> 
     <?php $this->load->view("admin_menu");?> 
          <div class='content isOpen'>
            <div class="header-wrap">
                <span class='button'></span> 
                <span class="content-header"><span>Dashboard</span><subheader></subheader></span>
                 <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:gray;">
                        <span>Account </span>
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="width:245px;">
                            <li>
                                <div class="navbar-content">
                                    <div class="row"> 
                                        <div class="col-md-3" align="center">
                                        <span class="glyphicon glyphicon-user" style="font-size:40px;"></span> 
                                        </div>
                                        <div class="col-md-9">
                                            <span><?=$username;?></span>
                                            <p class="text-muted small"><?=$role;?></p>
                                            <div class="divider">
                                            </div>
                                            <!-- <a href="#" class="btn btn-primary btn-sm active">View Profile</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="#" class="btn btn-default btn-sm">Change Passowrd</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="<?=base_url('login/clearSession');?>" class="btn btn-sm pull-right btn-action">Log Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            

            <?php $this->load->view($role);?>
          </div> 
    </div>


    <script type="text/javascript" src='<?=base_url("js/jquery/jquery-1.11.3.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/jquery/jquery-ui.js")?>'></script> 
    <script type="text/javascript" src='<?=base_url("js/datatables/jquery.dataTables.min.js")?>'></script> 
    <script type="text/javascript" src='<?=base_url("js/bootstrap/bootstrap.min.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/bootbox.min.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/highcharts.js")?>'></script>
    <script type="text/javascript" src='<?=base_url("js/tagsinput/bootstrap-tagsinput.js")?>'></script>
    <script src="<?=base_url('js/scripts/admin.js');?>"></script>   
    <script src="<?=base_url('js/navside/main.js');?>"></script>   
     
</body>
    
</html>         