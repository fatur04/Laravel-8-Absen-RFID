
      <div class="row">
        <div class="col-xs-6 col-sm-5">
          <label><h4><b>ID Kartu</b></h4></label><br>
          <label><h4><b>Nama</b></h4></label><br>
          <label><h4><b>Departement</b></h4></label>
        </div>
        
        <div class="col-xs-6 col-sm-7">
          <div class="form-group row">
            <input type="text" name="norfid" class="form-control" value="{{ $tampils->idkartu }}" readonly="true" placeholder="Departement ..." >
          </div>
          <div class="form-group row">
            <input type="text" name="nama_rfid" class="form-control" value="{{ $tampils->nama_rfid }}" readonly="true" placeholder="Departement ..." >
          </div>
          <div class="form-group row">
            <input type="text" name="departement" class="form-control" value="{{ $tampils->department }}" readonly="true" placeholder="Departement ..." >
          </div> 
        </div>
        <center>
          <p><b><h4>Terima Kasih Sudah Absen</h5></b></p>
          <a href="/absenkeluar" class="btn btn-primary">View Absen Keluar</a>
        </center>
    </div>

