
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pembayaran Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Pembayaran Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
      <form>
        <div class="row">
          <div class="col-md-12">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Masukan Data Pembayaran</h3>
              </div>
               
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kwitansi Kode</label>
                               
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="kwitansi" id="kwitansi" value="<?php echo $cc; ?>" readonly>
                                </div>
                                <!-- /.input group -->
                                
                            </div>
                        </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Jenis Pembayaran</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lg fa-building"></i></span>
                                    </div>
                                    <select name="biaya" id="biaya" class="form-control">
                                    <?php foreach($by as $row) { ?>
                                        <option value="<?php echo $row['Kd_Biaya'] ?>"><?php echo $row['Nm_Biaya'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <!-- /.input group -->
                           
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Qty</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="qty" id="qty" >
                                    <!-- <input type="text" class="form-control" name="tgl_daftar" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask> -->
                                </div>
                                <!-- /.input group -->
                           
                        </div>
                    </div>
                </div>
                                      <br>
                   
            <input type="submit" value="Submit" class="btn btn-success" id="oke-pem">
                                      &nbsp; &nbsp;
                  <input type="submit" value="Print" class="btn btn-primary" id="oke-pret"> 
            </div>
              <!-- /.card-body -->
          </div>
            <!-- /.card -->

 
            


          <!-- /.col (left) -->
          
        </div>
        <!-- /.row -->
        
      </form>
                                        
      </div><!-- /.container-fluid -->
      &nbsp;<small class="float-left">*) <i>Bisa di submit lebih dari 1 kali untuk setiap no kwitansi yang sama</i></small><br> 
      &nbsp;<small class="float-left">*) <i>Apablia Sudah tidak input silahkan klik tombol print</i></small>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  