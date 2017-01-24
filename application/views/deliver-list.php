<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware - Order Tracker</title>


    <link href="<?=base_url('css/homestyle/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/datatables/jquery.dataTables.css');?>">
    <link href="<?=base_url('css/homestyle/animate.min.css');?>"  rel="stylesheet"> 
    <link href="<?=base_url('css/homestyle/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('css/homestyle/lightbox.css');?>" rel="stylesheet">
    <link href="<?=base_url('css/homestyle/main.css');?>"  rel="stylesheet">
    <link href="<?=base_url('css/treeview-style.css');?>"  rel="stylesheet">
    <link href="<?=base_url('css/side-menu/side-menu.css');?>"  rel="stylesheet">
    <link id="css-preset" href="<?=base_url('css/homestyle/presets/preset1.css');?>"  rel="stylesheet">
    <link href="<?=base_url('css/homestyle/responsive.css');?>"  rel="stylesheet">
    <link href="<?=base_url('css/menutabs.css');?>"  rel="stylesheet">

   
</head>
<body>
    
    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
    <?php $this->load->view("header_home");?>
    
  
<div id="orders">
    <div class="container">


        <div class="row" style="padding-top: 8px;">
          <div class="alert alert-success">
            <strong>Shipping Order Tracker</strong>
          </div>
           <div class='multitab-section'>
            <div>
              <ul class='multitab-widget multitab-widget-content-tabs-id'> 
                <li class='multitab-tab'><a href='#multicolumn-widget-id3'>Shipping</a></li>
                <li class='multitab-tab'><a href='#multicolumn-widget-id4'>Delivered</a></li>
                <li class='multitab-tab'><a href='#multicolumn-widget-id5'>Cancelled</a></li>
              </ul>
            </div>
             
             
            <div class='-content multitab-widget-content-widget-id' id='multicolumn-widget-id3'>
              <span class='sidebar' id='sidebartab3' preferred='yes'>
               <table class="display table" id="table-cart">
                    <thead>
                      <tr>
                        <th>Order List</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($shipping) {?>

                          <?php foreach($shipping as $key) {?>
                          <tr>
                            <td onclick="viewOrderList('<?=$key->OrderNo?>');"  data-toggle="modal" data-backdrop="static"  data-keyboard="false" data-target="#viewOrderList">
                              <div class="row">
                                <div class="col-xs-6">
                                  <h4 style="color:#048e81;">#<?=$key->OrderNo?></h4> 
                                  <h5>Shipping Address : <br/><?=$key->ShipAddress?></h5> 
                                </div>
                                <div class="col-xs-6"> 
                                  <h6>Total Payment : <br/> &#8369; <span class="cart-total"><?=$key->TotalAmount?></span></h6>  
                                  <h6><?=$key->NoOfItems?> item(s)</h6>
                                  <span class="label label-default">on-Shipping</span>
                                </div> 
                              </div> 
                            </td> 
                          </tr>
                          <?php }?>
                      <?php } else{ ?>
                         <tr>
                            <td align="center">
                              <p class="empty">No orders yet.</p>
                            </td> 
                          </tr> 
                      <?php }?>

                    </tbody>
                </table>
              </span>
            </div>
            <div class='-content multitab-widget-content-widget-id' id='multicolumn-widget-id4'>
              <span class='sidebar' id='sidebartab4' preferred='yes'>
               <table class="display table" id="table-cart">
                    <thead>
                      <tr>
                        <th>Order List</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($delivered) {?>

                          <?php foreach($delivered as $key) {?>
                          <tr>
                             <td onclick="viewOrderList('<?=$key->OrderNo?>');"  data-toggle="modal" data-backdrop="static"  data-keyboard="false" data-target="#viewOrderList">
                              <div class="row">
                                <div class="col-xs-6">
                                  <h4 style="color:#048e81;">#<?=$key->OrderNo?></h4> 
                                  <h5>Shipping Address : <br/><?=$key->ShipAddress?></h5> 
                                </div>
                                <div class="col-xs-6"> 
                                  <h6>Total Payment : <br/> &#8369; <span class="cart-total"><?=$key->TotalAmount?></span></h6>  
                                  <h6><?=$key->NoOfItems?> item(s)</h6>
                                  <span class="label label-success">Delivered</span>
                                </div> 
                              </div> 
                            </td> 
                          </tr>
                          <?php }?>
                      <?php } else{ ?>
                         <tr>
                            <td align="center">
                              <p class="empty">No orders yet.</p>
                            </td> 
                          </tr> 
                      <?php }?>

                    </tbody>
                </table>
              </span>
            </div>
            <div class='-content multitab-widget-content-widget-id' id='multicolumn-widget-id5'>
              <span class='sidebar' id='sidebartab5' preferred='yes'>
                <table class="display table" id="table-cart">
                    <thead>
                      <tr>
                        <th>Order List</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($cancelled) {?>

                          <?php foreach($cancelled as $key) {?>
                          <tr>
                            <td onclick="viewOrderList('<?=$key->OrderNo?>');"  data-toggle="modal" data-backdrop="static"  data-keyboard="false" data-target="#viewOrderList">
                              <div class="row">
                                <div class="col-xs-6">
                                  <h4 style="color:#048e81;">#<?=$key->OrderNo?></h4> 
                                  <h5>Shipping Address : <br/><?=$key->ShipAddress?></h5> 
                                </div>
                                <div class="col-xs-6"> 
                                  <h6>Total Payment : <br/> &#8369; <span class="cart-total"><?=$key->TotalAmount?></span></h6>  
                                  <h6><?=$key->NoOfItems?> item(s)</h6>
                                  <span class="label label-default">Cancelled</span>
                                </div> 
                              </div> 
                            </td> 
                          </tr>
                          <?php }?>
                      <?php } else{ ?>
                          <tr>
                            <td align="center">
                              <p class="empty">No orders yet.</p>
                            </td> 
                          </tr> 
                      <?php }?>

                    </tbody>
                </table>
              </span>
            </div>
          </div>


       
 
        </div>
      </div>
      
   
 
    <div id="portfolio-single-wrap">
      <div id="portfolio-single">
      </div>
    </div>
  </div> 
</section>  

 

<footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <!-- <div class="footer-logo">
          <a href="index.html"><img class="img-responsive" src="images/logo.png" alt=""></a>
        </div> -->
        <div class="social-icons">
          <ul>
            <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2016 Lampano Hardware.</p>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>
</footer>

 
    <div class="modal fade" id="viewOrderList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="font-size: 20px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-body">
              <div class="row">
                <div class="col-md-12 image-variant">
                  <table class="display table" id="table-orderlist">
                    <thead>
                      <tr>
                        <th>Order List - #<orderno></orderno></th> 
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                </table>
                </div>   
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

 

      <script type="text/javascript" src="<?=base_url("js/homestyle/jquery.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/bootstrap.min.js")?>"></script>
      <script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>
      <script type="text/javascript" src='<?=base_url("js/maskMoney.js")?>'></script>
      <script type="text/javascript" src='<?=base_url("js/bootbox.min.js")?>'></script>
      <script type="text/javascript" src='<?=base_url("js/utility/helpers.js")?>'></script>
 
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/jquery.inview.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/wow.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/mousescroll.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/smoothscroll.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/jquery.countTo.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/lightbox.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/main.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/side-menu/side-menu.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/customerorder.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/menutabs.js")?>"></script>

      <script type="text/javascript">
         $('#responsive-menu-button').sidr({
            name: 'sidr-main',
            source: '#navigation',
            side: 'left'
          });
      </script>


 
     
</body>
    
</html> 