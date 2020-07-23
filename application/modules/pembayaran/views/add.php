
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pembayaran</h1>
            <?php echo $this->session->flashdata('fail'); ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Pembayaran </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="<?php echo base_url(); ?>pembayaran/bayar" method="post">
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
                            <label>Nis/No Daftar</label>
                               
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nis" id="nis" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                
                            </div>
                        </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Kwitansi</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lg fa-building"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="tgl" id="tgl" value="<?php echo date('Y-m-d'); ?>" readonly>
                                </div>
                                <!-- /.input group -->
                           
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Karyawan</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="karyawan" id="karyawan" value="<?php echo $this->session->userdata('username'); ?>" readonly>
                                    <!-- <input type="text" class="form-control" name="tgl_daftar" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask> -->
                                </div>
                                <!-- /.input group -->
                           
                        </div>
                    </div>
                </div>
             
                  <input type="submit" value="Submit" class="btn btn-success" id="oke-jo"> 
            </div>
              <!-- /.card-body -->
          </div>
            <!-- /.card -->

            


          <!-- /.col (left) -->
          
        </div>
        <!-- /.row -->
        
      </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  