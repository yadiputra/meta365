<?php $this->load->view('include/header');?>
<body class="app flex-row align-items-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
            <h1>Login</h1>
            <p class="text-muted">Sign In to your account</p>
			<?php
                        echo form_open('auth/login');                       
                ?>  
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="icon-user"></i>
                </span>
              </div>
                <input type="text" name="identity" id="identity" class="form-control" placeholder="Email Address"/>
            </div>
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="icon-lock"></i>
                </span>
              </div>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
            </div>
            <div class="row">
              <div class="col-6">
                <button type="submit" class="btn btn-primary px-4" type="button">Login</button>
              </div>
              <div class="col-6 text-right">
                <button class="btn btn-link px-0" type="button">Forgot password?</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('include/script');?>