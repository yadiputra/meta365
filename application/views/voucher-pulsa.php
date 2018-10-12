 <main class="main">
        <div class="main-content">
          <div class="col-md-6 offset-md-3">
            <div class="main-table justify-content-center card-group">
			<form action="<?php echo $action; ?>" method="post">
            <div class="header">
              Voucher Pulsa
            </div>
            <div class="row body">
              <div class="col-md-6">
                Phone Number
              </div>
              <div class="col-md-6"> <?php echo form_error('phone') ?>
                <input  name="phone" id="phone" class="form-control" type="number" placeholder="+62xxx" />
              </div>
              <div class="col-md-6">
                Voucher Type
              </div>
              <div class="col-md-6"> <?php echo form_error('product') ?>
                <select name="product" id="product" class="form-control">
                  <option value="">--Pilih--</option>
                  <option  value="Pasca Bayar">Pasca Bayar</option>
                  <option  value="Pra Bayar">Pra Bayar</option>
                </select>
              </div>
              <div class="col-md-6">
                Nominal
              </div>
              <div class="col-md-6"> <?php echo form_error('nominal') ?>
                <select name="nominal" id="nominal" class="form-control">
                  <option value="">--Pilih--</option>
				  <option value="10">10k</option>
                  <option  value="25">25k</option>
                  <option  value="50">50k</option>
                  <option  value="100">100k</option>
                </select>
              </div>
              <div class="col-md-6">
                 <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                 <a href="<?php echo site_url('product_pulsa') ?>" class="btn btn-default">Cancel</a>
              </div>

            </div>
			</form>
            </div>
          </div>
        </div>
      </main>