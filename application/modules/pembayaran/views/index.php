

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <a href="<?php echo base_url();?>biaya/tambah" class="btn btn-primary">Kwitansi</a> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Kwitansi</li>
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
              <h3 class="card-title">Kwitansi Data</h3>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example" class="table table-bordered table-striped display nowrap" style="width:100%">
                <thead class="thtable">
                <tr>
                    <th>No Kwitansi</th>
                    <th>Tgl Kwitansi</th>
                    <th>Nis</th>
                    <th>Create By</th>
                    <!-- <th>Opsi</th> -->
                </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($cups as $row) { ?>
                    <tr>
                        <td><?= $row['No_Kwitansi']; ?></td>    
                        <td><?= $row['Tgl_Kwitansi']; ?></td>    
                        <td><?= $row['Nis']; ?></td>    
                        <td><?= $row['Nama']; ?></td>    
                        <!-- <td><a href="<?= base_url();?>biaya/edit?id=<?php echo $row['Kd_Biaya']; ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url();?>biaya/delete?id=<?php echo $row['Kd_Biaya']; ?>" class="btn btn-danger">Delete</a></td>     -->
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>No Kwitansi</th>
                    <th>Tgl Kwitansi</th>
                    <th>Nis</th>
                    <th>Create By</th>
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