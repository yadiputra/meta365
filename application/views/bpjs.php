 <main class="main">
        <div class="main-content">
          <div class="col-md-6 offset-md-3">
            <div class="main-table justify-content-center card-group">
			<form action="<?php echo $action; ?>" method="post">
            <div class="header">
              BPJS Kesehatan
            </div>
            <div class="row body">
              <div class="col-md-6">
                Product
              </div>
              <div class="col-md-6"> <?php echo form_error('product') ?>
                <select name="product" id="product" class="form-control">
                  <option value="">--Pilih--</option>
                  <option  value="Pasca Bayar">Pasca Bayar</option>
                  <option  value="Pra Bayar">Pra Bayar</option>
                </select>
              </div>
			   <div class="col-md-6">
                Id Pelanggan
              </div>
              <div class="col-md-6"> <?php echo form_error('idpel') ?>
                <input  name="idpel" id="idpel" class="form-control" type="number" placeholder="1919119191919" />
              </div>
			   <div class="col-md-6">
                Periode
              </div>
              <div class="col-md-6"> <?php echo form_error('periode') ?>
                <input  name="periode" id="periode" class="form-control" type="number" placeholder="121" />
              </div>
              <div class="col-md-6">
                Sum Bulan
              </div>
              <div class="col-md-6"> <?php echo form_error('bulan') ?>
                <select name="bulan" id="bulan" class="form-control">
                  <option value="">--Pilih--</option>
				  <option value="1">1 Bulan</option>
                  <option  value="2">2 Bulan</option>
                  <option  value="3">3 Bulan</option>
                  <option  value="4">4 bulan</option>
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