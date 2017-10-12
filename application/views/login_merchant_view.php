<!DOCTYPE html>
<html lang="en">
    <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/register_form.css">

    <!-- Website Font style -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        	<div style="width: 400px; margin: 0 auto; padding-top: 40px;">
	          	<div class="panel panel-login" style="background-color: transparent; box-shadow: none;">
		            <div class="col-md-12" style="text-align: center;">
		            	<img src="<?php echo base_url();?>assets/images/logo_bigxxxhdpi.png" width="250">
		            	<h4 style="color: #a7a9ac;">Merchant Admin Login</h4>
		            </div>
		            <div class="panel-body">
		              <div class="row">
		                <div class="col-lg-12">
		                    <div class="form-group">
		                      <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
		                    
		                      <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
		                    </div>
		                    <div class="form-group">
		                      <div class="row">
		                        <div class="col-sm-12" style="margin-top: 20px;">
		                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login btn-block" value="Login" style="background: transparent;" onclick="login_process()">
		                        </div>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <div class="row">
		                        <div class="col-lg-12">
		                          <div class="text-center">
		                            <a href="#" tabindex="5" class="forgot-password" style="color: #a7a9ac;">Forgot Password?</a>
		                          </div>
		                        </div>
		                      </div>
		                    </div>
		                </div>
		              </div>
		            </div>
	          	</div>
        	</div>
      	</div>
    </div>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/app/login.js"></script>
    
  </body>
</html>