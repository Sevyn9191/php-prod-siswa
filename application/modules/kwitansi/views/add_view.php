
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Formulir Kwitansi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kwitansi</li>
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
                <h3 class="card-title">Kwitansi Tambah</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date</label>
                            <?php foreach($samsan as $dd) { ?>
                            <input type="hidden" name="nis" value="<?php echo $dd['Nis']; ?>">
                            <?php } ?>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                                <input type="text" class="form-control" name="date" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                            </div>
                            <!-- /.input group -->
                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Biaya</label>
                        
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <select name="biaya" id="" class="form-control">
                            <?php foreach($lumia as $row) { ?>
                              <option value="<?php echo $row['Kd_Biaya']; ?>"><?php echo $row['Nm_Biaya']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        
                      <!-- /.input group -->
                      <?= form_error('biaya','<small class="text-danger pl-3">','</small>'); ?>
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
  