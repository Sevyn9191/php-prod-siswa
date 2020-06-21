<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="<?php echo base_url();?>admin/tambah" class="btn btn-primary">TAMBAH DATA</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
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
              <h3 class="card-title">Karyawan Data</h3>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nik</th>
                    <th>Kode Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                        <?php 
                    // $no = 1;
                    foreach ($cups as $row) { ?>
                    <tr>
                        <td><?= $row['NIK']; ?></td>    
                        <td><?= $row['Kd_Karyawan']; ?></td>    
                        <td><?= $row['Nama']; ?></td>    
                        <td><?= $row['Alamat']; ?></td>    
                        <td><?= $row['No_HP']; ?></td>    
                        <td><a href="<?= base_url();?>admin/edit?id=<?php echo $row['Kd_Karyawan']; ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url();?>admin/delete?id=<?php echo $row['Kd_Karyawan']; ?>" class="btn btn-danger">Delete</a></td>    
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Nik</th>
                    <th>Kode Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
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