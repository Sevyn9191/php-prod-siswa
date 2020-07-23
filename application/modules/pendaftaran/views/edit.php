
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Pendaftaran Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Edit Pendaftaran Siswa</li>
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
        <?php form_open('pendaftaran'); ?>
        <div class="row">
          <div class="col-md-12">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Masukan Data Siswa</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nama Calon Siswa</label>
                                <input type="hidden" name="no_daftar" value="<?php echo $row['No_Daftar']; ?>">
                                <input type="hidden" name="kd_karyawan" value="<?php echo $row['Kd_Karyawan']; ?>">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['Nm_CaSis']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Asal Sekolah</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lg fa-building"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" value="<?php echo $row['As_Sek']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('asal_sekolah','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal Daftar</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <!-- <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir"> -->
                                    <input type="text" class="form-control" name="tgl_daftar" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="<?php echo $row['Tgl_Daftar']; ?>" readonly autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('tgl_daftar','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <!-- <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir"> -->
                                    <input type="text" class="form-control" name="tgl_lahir" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="<?php echo $row['Tgl_Lahir']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                    <label>Tempat Lahir</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt mr-1"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" value="<?php echo $row['Tmpt_Lahir']; ?>" autocomplete = 'off'>
                                    </div>
                                    <!-- /.input group -->
                                    <?= form_error('tmpt_lahir','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select name="gender" id="" class="form-control">
                                            <option value="pria">Pria</option>
                                            <option value="permepuan">Permepuan</option>
                                        </select>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('gender','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Agama</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt mr-1"></i></span>
                                        </div>
                                        <!-- <input type="text" class="form-control" name="religion" id="religion"> -->
                                        <select name="religion" id="" class="form-control">
                                            <option value="islam">ISLAM</option>
                                            <option value="yahudi">YAHUDI</option>
                                            <option value="kristen">KRISTEN</option>
                                            <option value="nasrani">NASRANI</option>
                                            <option value="hindu">HINDU</option>
                                            <option value="budha">BUDHA</option>
                                        </select>
                                    </div>
                                    <!-- /.input group -->
                                    <?= form_error('religion','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat Siswa</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt mr-1"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $row['Almt_Sis']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <!-- end row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Ayah</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo $row['Nm_Ayah_Sis']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('father_name','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Ibu</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" value="<?php echo $row['Nm_Ibu_Sis']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('mother_name','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat Orang Tua</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt mr-1"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="alamat_ortu" id="alamat_ortu" value="<?php echo $row['Al_Ortu_Sis']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('alamat_ortu','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                   
                </div>
                <!-- end row -->
                <!-- end row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Handphone Siswa</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lg fa-phone"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="stud_phon" id="stud_phon" value="<?php echo $row['No_HP_Sis']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                <?= form_error('stud_phon','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Wali</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="wali" id="wali" value="<?php echo $row['Nm_Wali']; ?>" autocomplete = 'off'>
                                </div>
                                <!-- /.input group -->
                                
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat Wali</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt mr-1"></i></span>
                                </div>
                                <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" value="<?php echo $row['Al_Wali']; ?>" autocomplete = 'off'>
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
      <?php } ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  