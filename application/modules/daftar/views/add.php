
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Pendaftaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pendaftaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
      <form action="" method="post">
        <?php form_open('daftar'); ?>
        <div class="row">
          <div class="col-md-12">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Masukan Data Pendaftar</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Calon Siswa</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Daftar</label>

                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="tgl_daftar" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                          </div>
                      <!-- /.input group -->
                      <?= form_error('tgl_daftar','<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                    <!-- /.form group -->
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asal Sekolah</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                                </div>
                                <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('asal_sekolah','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>

                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt mr-1"></i></span>
                            </div>
                            <input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir">
                          </div>
                      <!-- /.input group -->
                      <?= form_error('tmpt_lahir','<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                    <!-- /.form group -->
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal lahir</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                </div>
                                <input type="text" class="form-control" name="born" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                            </div>
                            <!-- /.input group -->
                            <?= form_error('born','<small class="text-danger pl-3">','</small>'); ?>
                          
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>

                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-sync-alt"></i></span>
                            </div>
                            <select name="gender" id="" class="form-control">
                              <option value="Pria">Pria</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                            <!-- <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask> -->
                          </div>
                      <!-- /.input group -->
                      
                      </div>
                    <!-- /.form group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Agama</label>

                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                            </div>
                            <select name="religion" id="" class="form-control">
                              <option value="Islam">Islam</option>
                              <option value="Kristen">Kristen</option>
                              <option value="Yahudi">Yahudi</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Budha">Budha</option>
                            </select>
                            <!-- <input type="text" name="religion" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask> -->
                          </div>
                      <!-- /.input group -->
                      </div>
                    <!-- /.form group -->
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
  