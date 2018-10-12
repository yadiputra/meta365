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
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
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
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1>Register</h1>
              <p class="text-muted">Create your account</p>
			   <?php echo $message;?>
                <?php
                echo form_open('auth/register');
                ?>
				<div class="input-group mb-3">
				<?php echo form_error('first_name') ?>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input name="first_name" id="first_name" class="form-control" type="text" placeholder="First_name">
              </div>
			  <div class="input-group mb-3">
			  <?php echo form_error('last_name') ?>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input name="last_name" id="last_name" class="form-control" type="text" placeholder="last_name">
              </div>
			   <div class="input-group mb-3">
			  <?php echo form_error('username') ?>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input  name="username" id="username" class="form-control" type="text" placeholder="Username">
              </div>
              <div class="input-group mb-3">
			  <?php echo form_error('company') ?>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input  name="company" id="company" class="form-control" type="text" placeholder="Company">
              </div>
              <div class="input-group mb-3">
			  <?php echo form_error('email') ?>
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input name="email" id="email" class="form-control" type="email" placeholder="Email">
              </div>
              <div class="input-group mb-3">
			   <?php echo form_error('password') ?>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input name="password" id="password" class="form-control" type="password" placeholder="Password">
              </div>
              <div class="input-group mb-4">
			   <?php echo form_error('password_confirm') ?>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input name="password_confirm" id="password_confirm" class="form-control" type="password" placeholder="Repeat password">
              </div>
              <button type="submit" class="btn btn-block btn-success" type="button">Create Account</button>
            </div>
            <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-block btn-facebook" type="button">
                    <span>facebook</span>
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn btn-block btn-twitter" type="button">
                    <span>twitter</span>
                  </button>
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