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

 <!-- Top content -->
        <div class="top-content">
            <!-- <img src="<?=base_url('images/bg.jpg')?>" class="background-holder"> -->
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
                                <form role="form" action="" method="post" class="login-form" id="loginform">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="form-username" placeholder="Username..." class="form-control" id="USERNAME" required autofocus="autofocus">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="form-password" placeholder="Password..." class="form-control" id="PASSWORD" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Sign in!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>
            
        </div>
     
    <script type="text/javascript" src='js/jquery/jquery-1.11.3.js'></script>
    <script type="text/javascript" src='js/bootstrap/bootstrap.min.js'></script>
    <script type="text/javascript" src="<?=base_url('js/bootbox.min.js');?>"></script> 
    <script type="text/javascript" src='js/utility/ajaxCall.js'></script>
    <script type="text/javascript" src='js/index.js'></script>
</body>
</html>