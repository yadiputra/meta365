
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
    <title>META 365</title>
    <!-- Icons-->
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <span class="navbar-brand-full">META 365</span>
        <span class="navbar-brand-minimized">META 365</span>
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>

      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-circle"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">

            <a class="dropdown-item" href="login.html">
              <i class="fa fa-lock"></i> Logout</a>
          </div>
        </li>
      </ul>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="nav-icon icon-speedometer"></i> Dashboard
              </a>
            </li>
             <li class="nav-item nav-saldo">
              Saldo<br/><span>Rp 200.000</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product_pulsa">Voucher Pulsa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> Travel & Ticket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bpjs"> Bpjs</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Multifinance"> Multifinance</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Pdam"> Pdam</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="pln"> Pln</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Telkom"> Telkom</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">E-Money</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Game">Voucher Game</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">History</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
		<div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <?php echo $_content; ?> 
        </div><!-- /.content-wrapper -->
    <footer class="app-footer">

      <div class="ml-auto">
        <span>Site by</span>
        <a href="#">#BlackSmith18</a>
      </div>
    </footer>
    <!-- Bootstrap and necessary plugins-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui-pro/dist/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
	<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script>
        $('#customCheck').click(function(){
          $('#kembali').toggle();
          $('#kembali-input').toggle();
        });
    </script>
  </body>
</html>

