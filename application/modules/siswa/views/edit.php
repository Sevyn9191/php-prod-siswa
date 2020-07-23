
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active"> Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      <form action="" method="post">
        <?php form_open('siswa'); ?>
        <div class="row">
          <div class="col-md-12">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Masukan Data Siswa</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <?php foreach($lumia as $row) { ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                                <!-- <input type="hidden" name="no_daftar" value="<?php echo $row['No_Daftar']; ?>"> -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="hidden" class="form-control" name="nis" id="nis" value="<?php echo $row['Nis']; ?>" readonly>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['Nm_CaSis']; ?>" readonly>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>No Daftar</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lg fa-building"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="no_daftar" id="no_daftar" value="<?php echo $row['No_Daftar']; ?>" readonly>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('no_daftar','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label>Jurusan</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt mr-1"></i></span>
                                        </div>
                                        <!-- <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?php echo $row['Jurusan']; ?>" autocomplete="off"> -->
                                        <select name="jurusan" id="" class="form-control">
                                          <option value="perkantoran">perkantoran</option>
                                          <option value="pemasaran">pemasaran</option>
                                          <option value="akutansi">akutansi</option>
                                        </select>
                                    </div>
                                    <!-- /.input group -->
                                    <?= form_error('jurusan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <?php } ?>
                  
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
  