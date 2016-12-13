<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Lampano Hardware</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/form-element.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/login.css');?>">
</head>
<body>
<div class="background-holder"> </div>

 <!-- Top content -->
<div class="company-logo" align="center">
    <img src="<?=base_url('images/logo.png')?>" width="300px">
</div>              
<div class="box">
   <?php if($this->session->flashdata('error')) {?>
        <p class="label label-danger"><?=$this->session->flashdata('error');?></p> 
      <?php }?>
  <div id="header">
  <h1 id="logintoregister">Login</h1>
 
  </div> 

   <form action="<?=base_url('login/validateUser')?>" method="post" class="login-form" id="loginform">
    <div class="group">      
      <input class="inputMaterial" type="text" name="username" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Username</label>
    </div>
        <div class="group">      
      <input class="inputMaterial" type="password" name="password"  required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Password</label>
    </div>
   
    <button id="buttonlogintoregister" type="submit">Login</button>

  </form>
  <div id="footer-box"><p class="footer-text">Not a member?<span class="sign-up"> Sign up now</span></p></div>
</div>
   <!--      <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                     
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">

                            <div class="form-top">
                                <div class="logo-holder">
                                    <img src="<?=base_url('images/logo.png')?>">
                                    
                                </div>

                                <div class="form-top-left" align="center">
                                    <h3>Login page</h3>
                                    
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="<?=base_url('login/validateUser')?>" method="post" class="login-form" id="loginform">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="Enter your username..." class="form-control" id="USERNAME" required autofocus="autofocus">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Enter your password..." class="form-control" id="PASSWORD" required>
                                    </div>
                                 
                                    <button type="submit" class="btn btn-success">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>
            
        </div> -->
     
    <script type="text/javascript" src='js/jquery/jquery-1.11.3.js'></script>
    <script type="text/javascript" src='js/bootstrap/bootstrap.min.js'></script>
    <script type="text/javascript" src="<?=base_url('js/bootbox.min.js');?>"></script> 
    <script type="text/javascript" src='js/utility/ajaxCall.js'></script>
    <!-- <script type="text/javascript" src='js/index.js'></script> -->
</body>
</html>