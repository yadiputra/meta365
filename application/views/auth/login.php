<!DOCTYPE html>
<!--
* CoreUI Pro - Bootstrap Admin Template
* @version v2.1.1
* @link https://coreui.io/pro/
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* License (https://coreui.io/pro/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Meta 365</title>
    <!-- Icons-->
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendors/pace-progress/css/pace.min.css'); ?>" rel="stylesheet">
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
				<?php
                        echo form_open('auth/login');                       
                ?>    
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                   <input type="text" name="identity" id="identity" class="form-control" placeholder="Email Address"/>
                </div>
                <div class="input-group mb-5">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                   <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                  <p class="error-message">Error message here</p>
                </div>
                <div class="row">
                  <div class="col-6">
				   <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <label>
                                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>  Remember Me
                                </label>
                            </div>                        
                        </div>
                    <button type="submit" class="btn btn-primary px-4" type="button">Login</button>
                  </div>
                  <div class="col-6 text-right">
				    <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
					<p><a href="register"><?php echo lang('index_create_user_link');?></a></p>
                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap and necessary plugins-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui-pro/dist/js/coreui.min.js"></script>
  </body>
</html>