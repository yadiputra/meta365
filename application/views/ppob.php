      <main class="main">
        <div class="main-content">
          <div class="col-md-6 offset-md-3">
            <div class="main-table justify-content-center card-group">
			<form action="<?php echo $action; ?>" method="post">
            <div class="header">
              PPOB
            </div>
            <div class="row body">

              <div class="col-md-6">
                No Id
              </div>
              <div class="col-md-6"> <?php echo form_error('idpel1') ?>
                <input name="idpel1" id="idpel1" type="number" class="form-control" placeholder="1234567"/>
              </div>
              <div class="col-md-6">
                ID Pelanggan
              </div>
              <div class="col-md-6"> <?php echo form_error('idpel2') ?>
                <input name="idpel2" id="idpel2" type="number" class="form-control" placeholder="1234567"/>
              </div>
			  <div class="col-md-6">
                Product
              </div>
              <div class="col-md-6"> <?php echo form_error('product') ?>
                <select name="product" id="product" class="form-control">
                  <option value="">--Pilih--</option>
                  <option  value="AZSA">AZSA</option>
                  <option  value="ASA">ASA</option>
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