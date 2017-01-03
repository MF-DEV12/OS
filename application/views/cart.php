<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware - My Shopping Cart</title>


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

   
</head>
<body>
    
    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
    <?php $this->load->view("header_home");?>
 
 

<div id="orders">
    <div class="container">
      <div class="row">
          <h5 style="margin-bottom: 0px"><b></b></h5>
        <div class="col-sm-12 col-md-8" style="border-right: 1px dashed #ddd;">
          <div class="alert alert-success">
           <span class="pull-right"><carttotal><?=(($totalItemCart=="") ? "0" : $totalItemCart);?></carttotal> item(s)</span>
           <strong>My Shopping Cart</strong> <br>
         </div>
          <table class="display table" id="table-cart">
              <thead>
                <tr>
                  <th>Name / Description / Price</th>
                <!--   <th>Price</th>
                  <th>Quantity</th> -->
                  <!-- <th>Total</th> -->
                  <th></th> 
                </tr>
              </thead>
              <tbody>
                <?php $total = 0.00;?>
                <?php if($itemsoncart) {?>

                    <?php foreach($itemsoncart as $key) {?>
                    <tr>
                      <td>
                        <div class="row">
                          <div class="col-xs-4">
                            <img src="../images/variant-folder/<?=$key->ImageFile;?>" width="100px" height="100px" alt=""/>
                          </div>
                          <div class="col-xs-4">
                            <h5><?=$key->Name?></h5> 
                            <h6><?=$key->VariantName?></h6>
                            <h6>&#8369; <span class="cart-price"><?=number_format($key->Price,2)?></span></h6>
                            
                          </div>
                          <div class="col-xs-4">
                          QTY: 
                            <div class="btn-group cartqty" data-item="<?=$key->ItemNumber;?>">
                              <button class="btn btn-default dec" onclick="incDecQty(this,-1);">-</button>
                              <button class="btn btn-default qty disabled"><?=$key->Quantity?></button>
                              <button class="btn btn-default inc" onclick="incDecQty(this,1);">+</button>
                            </div>  
                            <h6>&#8369; <span class="cart-total"><?=number_format(($key->Price * $key->Quantity),2);?></span></h6>
                          </div>

                        </div> 
                      </td>
                      <!-- <td>&#8369; <span class="cart-price"><?=number_format($key->Price,2)?></span></td>
                      <td>
                        <div class="btn-group cartqty" data-item="<?=$key->ItemNumber;?>">
                          <button class="btn btn-default dec" onclick="incDecQty(this,-1);">-</button>
                          <button class="btn btn-default qty disabled"><?=$key->Quantity?></button>
                          <button class="btn btn-default inc" onclick="incDecQty(this,1);">+</button>
                        </div>  
                      </td> -->
                      <!-- <td></td> -->
                      <td><span class="glyphicon glyphicon-remove removeCart" onclick="removeCart(this,'<?=$key->ItemNumber;?>');"></span></td>
                    </tr>
                    <?php $total += ($key->Price * $key->Quantity);?>
                    <?php }?>
              <?php } else{ ?>
                <tr>
                  <td colspan="5" align="center">
                    <p class="empty">No item(s) on the cart.</p>
                  </td>
                  
                </tr>

              <?php }?>

              </tbody>
          </table>
        </div>
        <div class="col-sm-12 col-md-4" <?=(($totalItemCart == "") ? "style=\"display:none;\"" : "")?>>
         <div class="alert alert-success">
           <strong>Order Summary</strong> <br>
         </div>
          <dl id="order-summary">
            <dd style="padding: 6px 10px;">Payment Type:  <span class="pull-right">Cash on delivery</span></dd>
            <dd style="padding: 34px 10px; border-bottom: 1px solid #dcdcdc;border-top: 1px solid #dcdcdc;">Subtotal: <span class="subtotal pull-right">&#8369; <?=number_format($total,2);?></span></dd>
            <dd style="padding: 6px 10px;"><b>Total:</b>  <span class="total pull-right"><b>&#8369; <?=number_format($total,2);?></b></span></dd>
            <dd><button class="btn btn-action btn-checkout" ><span class="glyphicon glyphicon-saved"></span> PROCEED TO CHECKOUT</button></dd>
          </dl> 
        </div>
      </div>
    </div>
   
 
    <div id="portfolio-single-wrap">
      <div id="portfolio-single">
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



 

      <script type="text/javascript" src="<?=base_url("js/homestyle/jquery.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/bootstrap.min.js")?>"></script>
      <script type="text/javascript" src='<?=base_url("js/utility/ajaxCall.js")?>'></script>
      <script type="text/javascript" src='<?=base_url("js/maskMoney.js")?>'></script>
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

     <!--  <script type="text/javascript">
         $('#responsive-menu-button').sidr({
            name: 'sidr-main',
            source: '#navigation',
            side: 'left'
          });
      </script> -->


 
     
</body>
    
</html> 