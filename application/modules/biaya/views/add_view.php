

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="<?php echo base_url();?>biaya/tambah" class="btn btn-primary">TAMBAH DATA</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Biaya</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Biaya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No Biaya</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Create By</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($cups as $row) { ?>
                    <tr>
                        <td><?= $row['Kd_Biaya']; ?></td>    
                        <td><?= $row['Nm_Biaya']; ?></td>    
                        <td><?= $row['Besar_Biaya']; ?></td>    
                        <td><?= $row['Nama']; ?></td>    
                        <td><a href="<?= base_url();?>biaya/edit?id=<?php echo $row['Kd_Biaya']; ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url();?>biaya/delete?id=<?php echo $row['Kd_Biaya']; ?>" class="btn btn-danger">Delete</a></td>    
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>No Biaya</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Create By</th>
                    <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->