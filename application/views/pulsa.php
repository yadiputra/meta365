 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <i class="icon-note"></i> Masked Input Plugin for jQuery
              <a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a>
              <div class="card-header-actions">
                <a class="card-header-action" href="https://github.com/digitalBush/jquery.maskedinput" target="_blank">
                  <small class="text-muted">docs</small>
                </a>
              </div>
            </div>
            <div class="card-body">
              <form>
                <fieldset class="form-group">
                  <label>Date input</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                    <input class="form-control" id="date" type="text">
                  </div>
                  <small class="text-muted">ex. 99/99/9999</small>
                </fieldset>
                <fieldset class="form-group">
                  <label>Phone input</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" id="phone" type="text">
                  </div>
                  <small class="text-muted">ex. (999) 999-9999</small>
                </fieldset>
                <fieldset class="form-group">
                  <label>Taxpayer Identification Numbers</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-usd"></i>
                      </span>
                    </span>
                    <input class="form-control" id="tin" type="text">
                  </div>
                  <small class="text-muted">ex. 99-9999999</small>
                </fieldset>
                <fieldset class="form-group">
                  <label>Social Security Number</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-male"></i>
                      </span>
                    </span>
                    <input class="form-control" id="ssn" type="text">
                  </div>
                  <small class="text-muted">ex. 999-99-9999</small>
                </fieldset>
                <fieldset class="form-group">
                  <label>Eye Script</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-asterisk"></i>
                      </span>
                    </span>
                    <input class="form-control" id="eyescript" type="text">
                  </div>
                  <small class="text-muted">ex. ~9.99 ~9.99 999</small>
                </fieldset>
                <fieldset class="form-group">
                  <label>Credit Card Number</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-credit-card"></i>
                      </span>
                    </span>
                    <input class="form-control" id="ccn" type="text" placeholder="0000 0000 0000 0000">
                  </div>
                  <small class="text-muted">ex. 9999 9999 9999 9999</small>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>