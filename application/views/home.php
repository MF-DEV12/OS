<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

      
    <title>Lampano Hardware - Home</title>


    <link href="<?=base_url('css/homestyle/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('css/homestyle/animate.min.css');?>"  rel="stylesheet"> 
    <link href="<?=base_url('css/homestyle/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('css/homestyle/lightbox.css');?>" rel="stylesheet">
    <link href="<?=base_url('css/homestyle/main.css');?>"  rel="stylesheet">
    <link id="css-preset" href="<?=base_url('css/homestyle/presets/preset1.css');?>"  rel="stylesheet">
    <link href="<?=base_url('css/homestyle/responsive.css');?>"  rel="stylesheet">

   
</head>
<body>
    
    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
    <header id="home">
        <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="item active" style="background-image: url(images/slider/1.jpg)">
              <div class="caption">
                <h1 class="animated fadeInLeftBig">Welcome to <br/><span>Lampano Hardware</span></h1>
                <!-- <p class="animated fadeInRightBig">Techniques don't produce quality products and services: People do, people who care,people who are treated as creatively contributing individuals</p> -->
                <a data-scroll class="btn btn-start animated fadeInUpBig" href="#orders">Order now</a>
              </div>
            </div>
            <div class="item" style="background-image: url(images/slider/2.jpg)">
              <div class="caption">
                <h1 class="animated fadeInLeftBig"><span>Quality</span></h1>
                <p class="animated fadeInRightBig">Techniques don't produce quality products and services <br/> People do, people who care, <br/>people who are treated as creatively contributing individuals</p>
                <a data-scroll class="btn btn-start animated fadeInUpBig" href="#orders">Order now</a>
              </div>
            </div>
            <div class="item" style="background-image: url(images/slider/3.jpg)">
              <div class="caption">
                <h1 class="animated fadeInLeftBig"><span>Value</span></h1>
                <p class="animated fadeInRightBig">Successful companies create value by providing products or services their customers <br/>value more highly than available alternatives</p>
                <a data-scroll class="btn btn-start animated fadeInUpBig" href="#orders">Order now</a>
              </div>
            </div>
          </div>
          <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
          <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

          <a id="tohash" href="#orders"><i class="fa fa-angle-down"></i></a>

        </div><!--/#home-slider-->
        <div class="main-nav">
          <div class="container">
            <div class="navbar-header">
            <div class="pull-right action-holder-mobile">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                 <button type="button" class="navbar-toggle cart" style="border:0px;color:white;" >
                  <span class="glyphicon glyphicon-shopping-cart"></span> 
                  <span class="badge countCart"><?=$totalItemCart?></span>
                </button>
                
 
            </div>
              
              <a class="navbar-brand" href="#">
                <h1><img class="img-responsive" src="images/logo-home.png" alt="logo"></h1>
              </a> 
            </div>
            <div class="collapse navbar-collapse">
               <div class="action-holder" style="position: absolute;margin-left: 252px;">

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
                  
                </div>

              <!-- <div class="search-holder">    
                <input type="text" name="search" class="form-control" placeholder="Search for items" > 
                <span class="glyphicon glyphicon-search"></span> 
                  <div class="cart-holder">
                    <button type="button" class="cart" style="border:0px;color:white;" >
                        <span class="glyphicon glyphicon-shopping-cart"></span><span class="badge">4</span>
                    </button>
                  </div>
              </div> -->
          
              

              <ul class="nav navbar-nav navbar-right" style="z-index: 99999;">                 
                <li class="scroll active"><a href="#home">Home</a></li>
                <li class="scroll"><a href="#orders">Orders</a></li> 
                <!-- <li class="scroll"><a href="#forums">Forums</a></li>                      -->
                <!-- <li class="scroll"><a href="#about-us">About Us</a></li>      -->
                <li class="scroll"><a href="#contact">Contact</a></li>   
             
                <?php if($this->session->userdata("username")){ ?>    
                   <li class="account-mobile"><a href="<?=base_url('mypurchase')?>">My Purchase</a></li>
                   <li class="account-mobile"><a>Change Password</a></li>
                   <li class="account-mobile"><a href="<?=base_url('login/logout');?>">Logout</a></li>
                   <li class="dropdown account-desktop"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><span class="glyphicon glyphicon-user"></span></span>
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="width:245px;">
                            <li>
                               <a style="color: gray;padding:12px;" href="<?=base_url('mypurchase')?>">My Purchase</a>
                            </li>
                            <li>
                                <div class="navbar-content" style="padding:12px;">
                                    <div class="row"> 
                                        <div class="col-md-3" align="center">
                                        <span class="glyphicon glyphicon-user" style="font-size:40px;"></span> 
                                        </div>
                                        <div class="col-md-9">
                                            <span><?=$name;?></span>
                                            <!-- <p class="text-muted small role"><?=$role;?></p> -->
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
                                                <button class="btn btn-default btn-sm">Change Password</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-sm pull-right btn-action">Log Out</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php } else {?>    
                  <li><a href="<?=base_url('login');?>">Login</a></li>       
                <?php } ?>    
              </ul>
            </div>
          </div>
        </div><!--/#main-nav-->
    </header>
    <div class="search-mobile">
      <input type="text" placeholder="Search for items.." class="form-control"/>
      <span class="glyphicon glyphicon-search btn-itemsearch"></span> 
    </div>
<section id="orders">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Categories</h2>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p> -->
        </div>
      </div> 
    </div>
    <div class="container">
      <div class="row">
        <?php $ctr = 0;?>
        <?php foreach($family as $key) {?>
        <?php $animate = ($ctr % 2 == 0) ? "fadeInRightBig" : "fadeInLeftBig";?>
        <?php $ctr++;?>

              <div class="col-sm-3">
                <div class="folio-item wow <?=$animate;?>" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="folio-image">
                    <img class="img-responsive" src="<?=base_url('images/variant-folder/' . $key->ImageFile);?>" alt="" onerror="this.src='images/noimage.gif';">
                  </div>
                  <div class="overlay">
                    <div class="overlay-content">
                      <div class="overlay-text">
                        <div class="folio-info">
                          <h3><?=$key->Name1;?></h3>
                        </div>
                        <div class="folio-overview">
                          <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="<?=base_url('items?family='.$key->Level1No);?>" ><i class="fa fa-arrow-circle-right"></i></a></span>
                          <!-- <span class="folio-expand"><a href="<?=base_url('images/variant-folder/' . $key->ImageFile);?>" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
               
        <?php } ?>  

      
         
    </div>
    <div id="portfolio-single-wrap">
      <div id="portfolio-single">
      </div>
    </div><!-- /#portfolio-single-wrap -->
</section>



<section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="14.7202842" data-longitude="121.01659" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h1>Get in Touch!</h1>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> at 22 General Luis Novaliches, Quezon City, Metro Manila </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> +928 123 4567  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@lhs.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.lampanohardware.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
</section> 


<footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="index.html"><img class="img-responsive" src="images/logo.png" alt=""></a>
        </div>
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
 
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBAlK9GyBqRtZ6xTAk3p8u5IWUECzbKpZ0"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/jquery.inview.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/wow.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/mousescroll.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/smoothscroll.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/jquery.countTo.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/lightbox.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("js/homestyle/main.js")?>"></script>




 
     
</body>
    
</html>         