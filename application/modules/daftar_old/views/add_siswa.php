


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registration Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registration</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <form action="" method="post">
        <div class="row">
          <div class="col-md-12">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Input Data Registration</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Input Name</label>

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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Daftar</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="" class="form-control datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker" name="date_daftar" placeholder="tanggal Daftar" autocomplete="off">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Daftar</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" type="number" name="harga" id="harga">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Daftar</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" type="number" name="harga" id="harga">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Daftar</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" type="number" name="harga" id="harga">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Daftar</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" type="number" name="harga" id="harga">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Daftar</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" type="number" name="harga" id="harga">
                            </div>
                            <!-- /.input group -->
                            <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                        <input type="submit" value="Submit" class="btn btn-success" id="oke-jo">
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
</form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->