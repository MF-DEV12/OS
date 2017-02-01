<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware - Items</title>


    <link href="<?=base_url('css/homestyle/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('css/homestyle/animate.min.css');?>"  rel="stylesheet"> 
    <link href="<?=base_url('css/homestyle/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('css/homestyle/lightbox.css');?>" rel="stylesheet">
    <link href="<?=base_url('css/homestyle/main.css');?>"  rel="stylesheet">
    <link href="<?=base_url('css/treeview-style.css');?>"  rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('css/category_menu.css');?>">  
    <link id="css-preset" href="<?=base_url('css/homestyle/presets/preset1.css');?>"  rel="stylesheet">
    <link href="<?=base_url('css/homestyle/responsive.css');?>"  rel="stylesheet">

   
</head>
<body>

<?php $this->load->view("category_menu");?>

<div id="main">
    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
    <header id="home">
         
        <div class="main-nav">
          <div class="container customer-header" >
            <div class="navbar-header">
              <a class="navbar-brand" href="<?=base_url();?>">
                <h1><img class="img-responsive" src="images/logo-home.png" alt="logo"></h1>
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
                 <button type="button" class="navbar-toggle category-menu" onclick="openNav();" id="responsive-menu-button">
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
 


<section id="orders" style="padding-top: 0px;">
    <div class="container">
      <div class="search-mobile">
        <input type="text" placeholder="Search for items.." class="form-control"/>
        <span class="glyphicon glyphicon-search btn-itemsearch"></span> 
      </div>
      <div class="row">
        <div class="col-sm-3 category-treeview">

          <div id="collapseDVR3" class="panel-collapse">

              <div class="tree ">
                  <h5>Select Category:</h5>
                   <ul> 
                      <?php foreach($listfamily as $f) {?>
                      <li> 
                         <?php
                            $fno = $f->Level1No;
                            $listcategorybyfamily = array_filter( $listcategory,  function ($e) use ($fno) { return $e->Level1No == $fno; } ); 
                            $setFamilyActive = "";
                            if(count($family) > 0){
                              $setFamilyActive = ($family[0]->Level1No == $fno) ? "class=\"active\"" : "";
                            }
                         ?> 
                           <span data-id='{"l1":"<?=$fno;?>"}' data-name='["<?=$f->Name1?>"]' <?=$setFamilyActive;?>><i <?=(($listcategorybyfamily) ? "class=\"fa fa-plus-square\"" : "")?>></i> <?=$f->Name1;?></span> 

                         <?php if($listcategorybyfamily) {?>
                           <ul>
                           <?php foreach($listcategorybyfamily as $c) {?>
                           
                               <li>  
                                  <?php
                                      $cno = $c->Level2No; 
                                      $listSubcategorybyfamily = array_filter( $listsubcategory,  function ($e) use ($fno, $cno) { return $e->Level1No == $fno && $e->Level2No == $cno;  } ); 
                                  ?>
                                   <span data-id='{"l1":"<?=$fno;?>","l2":"<?=$cno;?>"}' data-name='["<?=$f->Name1?>","<?=$c->Name2?>"]'><i <i <?=(($listSubcategorybyfamily) ? "class=\"fa fa-plus-square\"" : "")?>></i> <?=$c->Name2;?></span>  
                                   <?php if($listSubcategorybyfamily) {?>
                                     <ul>
                                     <?php foreach($listSubcategorybyfamily as $sc) {?> 
                                         <li><span data-id='{"l1":"<?=$fno;?>","l2":"<?=$cno;?>","l3":"<?=$sc->Level3No;?>"}' data-name='["<?=$f->Name1?>","<?=$c->Name2?>","<?=$sc->Name3?>"]'><i></i> <?=$sc->Name3;?></span></li> 
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
                 
              </div>
          </div>

        </div>
          
        <div class="heading text-center col-xs-12 col-sm-12 col-md-9 col-lg-9 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
        <?php if(count($family) > 0){ ?>
          <ol class="breadcrumb item-header">
              <li class="breadcrumb-item <?=((!$category) ? "active" : "");?>"><?=$family[0]->Name1;?></li>  
          </ol>
        <?php } else{ ?>
          <ol class="breadcrumb item-header">
              <li class="breadcrumb-item"><span class="glyphicon glyphicon-info-sign"></span> <?=count($items)?> item(s) result found.</li>  
          </ol>
        <?php } ?>
        <div class="row list-items">
          <?php if($items){ ?>
            <?php foreach($items as $key) {?>
                 <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 item" title="Click to view">
                      <div class="row">
                        <div class="col-sm-12 item-holder"  onclick="viewItems('<?=$key->ItemNumber?>');">
                          <img width="200px" height="200px" src="images/variant-folder/<?=$key->ImageFile?>" alt="" onerror="this.src='<?=base_url("images/noimage.gif")?>';"/>
                          <h5><?=$key->Name?></h5>
                          <p class="category"><?=$key->Category?></p>
                          <h6><?=(($key->Stocks > 0) ? "Stock: " . $key->Stocks : "Out of Stocks");?></h6>
                          <b>Price: &#8369; <?=number_format($key->Price,2)?></b>
                        </div>
                        <div class="col-sm-12">
                          <button class="btn btn-action btn-buy"  data-toggle="modal" data-backdrop="static"  data-keyboard="false" data-target="#confirmcart" onclick="orderItem('<?=$key->ItemNumber?>');"  style="width:100%;" <?=(($key->Stocks > 0) ? "": "disabled");?>>Buy</button> 
                        </div> 
                      </div>
                   </div>
            <?php } ?>
          <?php }  ?>
            
        </div>
          


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


  <div class="modal fade" id="confirmcart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="font-size: 20px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-body">
              <h4 style="color:#048e81;"><span class="glyphicon glyphicon-ok"></span> This item has been added to your cart.</h4>
              <div class="row">
                <div class="col-xs-12 col-md-6 item-wrap">
                    <div class="row">
                        <div class="col-xs-5 col-md-5">
                          <img src="<?=base_url('');?>" class="cart-img" width="80px" height="80px"/>
                        </div>
                        <div class="col-xs-7 col-md-7">
                          <h4><name></name></h4>
                          <h6><category></category></h6>
                          <h5>&#8369; <price></price></h5>
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-md-6" style="border-left: 1px solid #ddd; padding-top: 10px;">
                    <h5>My Shopping Cart <a href="<?=base_url('items/cart')?>" title="Click to view your cart"><carttotal></carttotal> item(s)</a> </h5>
                    <dl style="font-size: 12px;">
                      <dd style="padding: 10px 2px; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;">
                        Subtotal: <span class="pull-right">&#8369; <subtotal></subtotal></span>
                      </dd>

                      <dd style="padding: 4px 2px; font-size: 14px !important;">
                        Total: <span class="pull-right">&#8369; <b><total></total></b></span>
                      </dd>

                    </dl>
                </div> 
              </div>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-default" data-dismiss="modal">Continue to Shopping</a>
            <button type="button" class="btn btn-action" id="btn-proceed">Proceed to Checkout</button>
          </div>
        </div>
      </div>
  </div>
</div> 

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

      


 
     
</body>
    
</html>         