<header id="home">
         
        <div class="main-nav">
          <div class="container customer-header" >
            <div class="navbar-header">
             
             
              <a class="navbar-brand" href="<?=base_url();?>">
                <h1><img class="img-responsive" src="<?=base_url('images/logo-home.png');?>" alt="logo"></h1>
              </a>   

            </div>
            <div class="action-holder pull-right">
              <?php if($role != "deliver") {?>
              
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
              
              <?php }?>

              <div class="account-holder">
                  <div class="dropdown">
                    <button type="button" class="dropdown-toggle" style="border:0px;color:white;background: transparent; " data-toggle="dropdown">
                      <span class="glyphicon glyphicon-user"></span><span class="caret"></span>
                    </button>
               
                     <ul class="dropdown-menu dropdown-menu-right" style="width:245px;">
                              <?php if($role != "deliver") {?>
                              <li>
                                 
                              </li>
                              <?php }?>
                              <?php if($username){ ?>
                                <li>
                                    <div class="navbar-content" style="padding:12px;">
                                        <div class="row"> 
                                            <div class="col-md-3" align="center">
                                            <span class="glyphicon glyphicon-user" style="font-size:40px;"></span> 
                                            </div>
                                            <div class="col-md-9">
                                                <span><?=$name;?></span>
                                                <div class="divider"></div>
                                                <span class="pull-right"><a style="color: gray;padding:12px; text-align: center;" href="<?=base_url('mypurchase')?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Purchase</a></span>
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
                            <?php } else {?>
                              <li><a style="color: gray;" href="<?=base_url('login');?>">Log in</a></li>    
                            <?php } ?>
                      </ul>
                  </div>
                
              </div>

              
            </div>

            <div class="pull-right action-holder-mobile" style="top:11px;"> 
                <div class="dropdown">
                  <button type="button" class="dropdown-toggle" style="border:0px;color:white;background: transparent; " data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span><span class="caret"></span>
                  </button>
             
                  <ul class="dropdown-menu dropdown-menu-right">
                    <?php if($username){ ?>
                      <li><a style="color: gray; "><span class="glyphicon glyphicon-user"></span> <?=$name;?></a></li>
                      <li class="divider"></li>
                    <?php } ?>

                    <?php if($role != "deliver") {?>
                    <li><a style="color: gray; " href="<?=base_url('items/cart')?>">My Cart  <span class="badge countCart-mobile"><?=$totalItemCart?></span></a></li>
                    <?php } ?>
                    <?php if($username){ ?>
                    <?php if($role != "deliver") {?>
                      <li><a style="color: gray; " href="<?=base_url('mypurchase')?>">My Purchase</a></li>
                    <?php } ?>

                      <li><a style="color: gray; ">Change Password</a></li>
                      <li><a style="color: gray; ">Log Out</a></li> 
                    <?php } else { ?>
                      <li><a style="color: gray;" href="<?=base_url('login');?>">Log in</a></li> 

                    <?php } ?>
                  </ul>
                </div>
                
 
            </div>
          </div>
        </div><!--/#main-nav-->
    </header>