

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="<?php echo base_url();?>daftar/tambah" class="btn btn-primary">TAMBAH DATA</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Register</li>
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
              <h3 class="card-title">Register Data</h3>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example" class="table table-bordered table-striped display nowrap" style="width:100%">
                <thead class="thtable">
                <tr>
                    <th>No Daftar</th>
                    <th>Nama Calon Siswa</th>
                    <th>Tanggal Daftar</th>
                    <th>Asal Sekolah</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($cups as $row) { ?>
                    <tr>
                        <td><?= $row['No_Daftar']; ?></td>    
                        <td><?= $row['Nm_CaSis']; ?></td>    
                        <td><?= $row['Tgl_Daftar']; ?></td>    
                        <td><?= $row['As_Sek']; ?></td>    
                        <td><?= $row['Tmpt_Lahir']; ?></td>    
                        <td><?= $row['Tgl_Lahir']; ?></td>    
                        <td><?= $row['Jen_Kel']; ?></td>    
                        <td><?= $row['Agama']; ?></td>    
                        <td><a href="<?= base_url();?>daftar/edit?id=<?php echo $row['No_Daftar']; ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url();?>daftar/delete?id=<?php echo $row['No_Daftar']; ?>" class="btn btn-danger">Delete</a> | <a href="<?php echo base_url();?>siswa/add?id=<?php echo $row['No_Daftar']; ?>" class="btn btn-primary">Acc</a> | <a href="<?php echo base_url();?>kwitansi/print_daftar?id=<?php echo $row['No_Daftar']; ?>" class="btn btn-success">Print</a> </td>    
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>No Daftar</th>
                    <th>Nama Calon Siswa</th>
                    <th>Tanggal Daftar</th>
                    <th>Asal Sekolah</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
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