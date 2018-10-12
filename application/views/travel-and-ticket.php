      <main class="main">
        <div class="main-content">
          <div class="col-md-6 offset-md-3">
            <div class="main-table justify-content-center card-group">
              <div class="header">
                Travel & Ticket
              </div>
              <div class="row body">
                <div class="col-md-6">
                  <label>from</label>
                  <select class="form-control">
                    <option>IND</option>
                    <option>IND</option>
                    <option>IND</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label>to</label>
                  <select class="form-control">
                    <option>IND</option>
                    <option>IND</option>
                    <option>IND</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Keberangkatan</label>
                   <input type="date" name="bday" max="3000-12-31" min="1000-01-01" class="form-control" />
                </div>
                <div class="col-md-6">
                  <label class="hidden" id="kembali">Kembali</label>
                  <input type="date" name="bday" max="3000-12-31" min="1000-01-01" class="form-control hidden" id="kembali-input" />
                </div>
                <div class="col-12">
                  <div class="custom-control custom-checkbox mt-1">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label mt-1" for="customCheck"> Pulang Pergi</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <button class="btn btn-primary mt-3" type="submit">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>