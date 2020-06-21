
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Karyawan Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php foreach($lumia as $row) { ?>
      <form action="" method="post">
        <?php form_open('admin'); ?>
        <div class="row">
          <div class="col-md-12">

            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edit Karyawan</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="row">
                    <div class="col-md-12">
                    <input type="hidden" name="id" value="<?php echo $row['Kd_Karyawan']; ?>">
                    <input type="hidden" name="nik" value="<?php echo $row['NIK']; ?>">
                        <div class="form-group">
                            <label>Nama Karyawan</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['Nama']; ?>">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>

                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt mr-1"></i></span>
                            </div>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $row['Alamat']; ?>">
                          </div>
                      <!-- /.input group -->
                      <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                    <!-- /.form group -->
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>No Handphone</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa fa-phone"></i></span>
                                </div>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo $row['No_HP']; ?>">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('no_hp','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Status</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" name="status" id="status" value="<?php echo $row['Status']; ?>">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('status','<small class="text-danger pl-3">','</small>'); ?>
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
        <?php } ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  