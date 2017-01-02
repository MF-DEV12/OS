<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware - Checkout</title>


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
    <header id="home">
         
        <div class="main-nav">
          <div class="container customer-header" >
            <div class="navbar-header">
             
             
              <a class="navbar-brand" href="<?=base_url();?>">
                <h1><img class="img-responsive" src="<?=base_url('images/logo-home.png');?>" alt="logo"></h1>
              </a>   

            </div>
            <div class="action-holder pull-right">

              <div class="search-holder">    
                <input type="text" name="search" class="form-control" placeholder="Search for items" > 
                <span class="glyphicon glyphicon-search btn-itemsearch"></span> 
                 
              </div> 
              <div class="cart-holder">
                <button type="button" class="cart" style="border:0px;color:white;" >
                    <span class="glyphicon glyphicon-shopping-cart"></span> 
                    <span class="badge countCart"><?=$totalItemCart?></span>
                </button>
              </div>
              <div class="account-holder">
                <button type="button" class="account" style="border:0px;color:white;" >
                    <span class="glyphicon glyphicon-user"></span>
                </button>
              </div>

              
            </div>

            <div class="pull-right action-holder-mobile" style="top:0px;">
                 <button type="button" class="navbar-toggle category-menu" id="responsive-menu-button">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                 <button type="button" class="navbar-toggle" style="border:0px;color:white;" >
                    <span class="glyphicon glyphicon-user"></span>
                </button>
                <button type="button" class="navbar-toggle cart" style="border:0px;color:white;" >
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  <span class="badge countCart"><?=$totalItemCart?></span>
                  
                </button>
               
            </div>
          </div>
        </div><!--/#main-nav-->
    </header>
 
 
<div id="navigation" style="display: none;">
    <nav class="nav">
        <h4>Select the Category</h4>
        <ul> 
          <?php foreach($listfamily as $f) {?>
          <li> 
             <?php
                $fno = $f->Level1No;
                $listcategorybyfamily = array_filter( $listcategory,  function ($e) use ($fno) { return $e->Level1No == $fno; } ); 

             ?>

             <a  data-id='{"l1":"<?=$fno;?>"}' data-name='["<?=$f->Name1?>"]'  <?=(($listcategorybyfamily) ? "data-toggle=\"collapse\" class=\"collapsed\" data-target=\"#sidr-id-f" . $fno . "\"" : "");?> onclick="categorymenuClick(this);"> <?=$f->Name1;?></a>  

             <?php if($listcategorybyfamily) {?>
               <ul <?="class=\"collapse\" id=\"f". $fno ."\"";?> aria-expanded="false" style="height: 1px;">
               <?php foreach($listcategorybyfamily as $c) {?>
               
                   <li>  
                   <?php $url = base_url('customer?family='. $fno .'&category='. $c->Level2No);?>
                      <?php
                          $cno = $c->Level2No;

                          $listSubcategorybyfamily = array_filter(
                              $listsubcategory,
                              function ($e) use ($fno, $cno) {
                                  return $e->Level1No == $fno && $e->Level2No == $cno; 
                              }
                          ); 
                       ?>
                      <a  data-id='{"l1":"<?=$fno;?>","l2":"<?=$cno;?>"}' data-name='["<?=$f->Name1?>","<?=$c->Name2?>"]' onclick="categorymenuClick(this);"> <?=$c->Name2;?></a> 
                       <?php if($listSubcategorybyfamily) {?>
                         <ul>
                         <?php foreach($listSubcategorybyfamily as $sc) {?> 
                             <li><a data-id='{"l1":"<?=$fno;?>","l2":"<?=$cno;?>","l3":"<?=$sc->Level3No;?>"}' data-name='["<?=$f->Name1?>","<?=$c->Name2?>","<?=$sc->Name3?>"]' onclick="categorymenuClick(this);"> <?=$sc->Name3;?></a>   </li> 
                         <?php } ?>
                         </ul>
                       <?php } ?>
                   </li> 
               <?php } ?>

               </ul>
             <?php } ?>




          </li>
         <?php } ?>
           
        </ul>
    </nav>
</div>

<div id="orders">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-8" style="border-right: 1px dashed #ddd;">
          <h5 style="margin-bottom: 0px"><b></b></h5>
         <div class="alert alert-success">
           <strong>Account Information</strong> <br>
          <?php $username = $this->session->userdata("username"); ?>   
          <?php $customer = ($customer) ? $customer[0] : null;  ?>

          <?php $lastname = ($customer) ? $customer->Lastname : ""; ?>   
          <?php $firstname = ($customer) ? $customer->Firstname : ""; ?>   
          <?php $contact = ($customer) ? $customer->ContactNo : ""; ?>   
          <?php $email = ($customer) ? $customer->Email : ""; ?>   
          <?php $shipaddress = ($customer) ? $customer->ShipAddress : ""; ?>   
          <?php $readonly = ($username) ? "readonly" : ""; ?>   
          <?php if(!$username){ ?>   
            Already registered? Click <a href="<?=base_url('login?t=customer')?>">Login</a>
          <?php } ?>   
         </div>
          <div class="row customer-form <?=(($customer) ? 'login' : '');?>">
           
              <div class="col-sm-12 col-lg-6">
                <div class="group">      
                    <input class="inputMaterial" type="text" id="txt-lastname" value="<?=$lastname;?>" required  <?=$readonly?>>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="formlabel">Last name:</label>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="group">      
                    <input class="inputMaterial" type="text"  id="txt-firstname" value="<?=$firstname;?>" required <?=$readonly?>>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="formlabel">First name:</label>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="group">      
                    <input class="inputMaterial" type="text"  id="txt-contact"  value="<?=$contact;?>" required <?=$readonly?>>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="formlabel">Contact #:</label>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="group">      
                    <input class="inputMaterial" type="text"  id="txt-email"  value="<?=$email;?>" required <?=$readonly?>>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="formlabel">Email Address:</label>
                </div>
              </div>
              <?php if(!$username){ ?>   
              <div class="col-sm-12 col-lg-12">
                <div class="group">      
                    <input class="inputMaterial" type="text"  id="txt-homeaddress" required >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="formlabel">Home Address:</label>
                </div>
              </div>
              <?php } ?>   
              <div class="col-sm-12 col-lg-12">
                <div class="group">      
                    <input class="inputMaterial" type="text"  id="txt-shipaddress"  value="<?=$shipaddress;?>" required <?=$readonly?>>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="formlabel">Shipping Address:</label>
                </div>
                <?php if(!$username){ ?>   
                  <div class="checkbox chk-sameaddress pull-right">
                    <label><input type="checkbox">Same to Home Address</label>
                  </div>
                <?php } ?>   
              </div>  

          </div>  
         </div> 
        <div class="col-sm-12 col-md-4" style="padding-top:15px;"> 
            <?php $total = 0.00;?> 
            <?php foreach($itemsoncart as $key) {?> 
            <?php $total += ($key->Price * $key->Quantity);?>
            <?php }?>
          
          <div class="alert alert-success">
          <a class="pull-right" href="<?=base_url('items/cart')?>"><carttotal><?=$totalItemCart?></carttotal> item(s)</a>
           <strong>Order Summary</strong> <br>
         </div>
          <dl id="order-summary">
            <dd style="padding: 6px 10px;">Payment Type:  <span class="pull-right">Cash on delivery</span></dd>
            <dd style="padding: 34px 10px; border-bottom: 1px solid #dcdcdc;border-top: 1px solid #dcdcdc;">Subtotal: <span class="subtotal pull-right">&#8369; <?=number_format($total,2);?></span></dd>
            <dd style="padding: 6px 10px;"><b>Total:</b>  <span class="total pull-right"><b>&#8369; <?=number_format($total,2);?></b></span></dd>
            <dd>
                <div class="checkbox chk-termcondition" align="center">
                  <label><input type="checkbox" value="">I agree to the <a href="">term of conditions</a></label>
                </div>
                <button class="btn btn-action btn-submitorder" ><span class="glyphicon glyphicon-saved"></span> SUBMIT</button>
            </dd>
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

      <script type="text/javascript">
         $('#responsive-menu-button').sidr({
            name: 'sidr-main',
            source: '#navigation',
            side: 'left'
          });
      </script>


 
     
</body>
    
</html> 