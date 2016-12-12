<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware</title>


    <link href="<?=base_url('css/homestyle/bootstrap.min.css');?>" rel="stylesheet">
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
          <div class="container">
            <div class="navbar-header">
             
             
              <a class="navbar-brand" href="<?=base_url();?>">
                <h1><img class="img-responsive" src="images/logo-home.png" alt="logo"></h1>
              </a>   

            </div>
            <div class="pull-right cart-menu">
                 <button type="button" class="navbar-toggle order" id="responsive-menu-button">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <button type="button" class="navbar-toggle order" style="border:0px;color:white;" >
                  <span class="glyphicon glyphicon-shopping-cart"></span><span class="badge">4</span>
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

             <a <?=(($listcategorybyfamily) ? "data-toggle=\"collapse\" data-target=\"#sidr-id-f" . $fno . "\"" : "");?>> <?=$f->Name1;?></a>  

             <?php if($listcategorybyfamily) {?>
               <ul <?="class=\"collapse\" id=\"f". $fno ."\"";?>>
               <?php foreach($listcategorybyfamily as $c) {?>
               
                   <li>  
                      <a> <?=$c->Name2;?></a> 
                      <?php
                          $cno = $c->Level2No;

                          $listSubcategorybyfamily = array_filter(
                              $listsubcategory,
                              function ($e) use ($fno, $cno) {
                                  return $e->Level1No == $fno && $e->Level2No == $cno; 
                              }
                          ); 
                       ?>
                       <?php if($listSubcategorybyfamily) {?>
                         <ul>
                         <?php foreach($listSubcategorybyfamily as $sc) {?> 
                             <li><a> <?=$sc->Name3;?></a>   </li> 
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

<section id="orders">
    <!-- <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

          <h2>Select the Category</h2>
        </div>
      </div> 
    </div> -->
   
      <!--   <ul class="trees">
         <?php foreach($category as $key) {?>
          <li class="has-child">
            <input id="tree-controll1" type="checkbox"><span class="tree-control"></span>
            <label><?=$key->Name2;?></label>
            
          </li>
         <?php } ?>
          
          
        </ul> -->
        
     
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
 
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/jquery.inview.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/wow.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/mousescroll.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/smoothscroll.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/jquery.countTo.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/lightbox.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/main.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/side-menu/side-menu.js")?>"></script>

      <script type="text/javascript">
         $('#responsive-menu-button').sidr({
            name: 'sidr-main',
            source: '#navigation',
            side: 'right'
          });
      </script>


 
     
</body>
    
</html>         