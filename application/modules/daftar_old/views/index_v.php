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
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>daftar">Home</a></li>
              <li class="breadcrumb-item active">Daftar</li>
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
              <h3 class="card-title">Registration Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
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
                    // $no = 1;
                    foreach ($cups as $row) { ?>
                    <tr>
                        <td><?= $row['NoDaftar']; ?></td>    
                        <td><?= $row['NmCaSis']; ?></td>    
                        <td><?= $row['TglDaftar']; ?></td>    
                        <td><?= $row['AsSek']; ?></td>    
                        <td><?= $row['TmptLahir']; ?></td>    
                        <td><?= $row['TglLahir']; ?></td>    
                        <td><?= $row['JenKel']; ?></td>    
                        <td><?= $row['Agama']; ?></td>    
                        <td><a href="<?= base_url();?>daftar/edit?id=<?php echo $row['NoDaftar']; ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url();?>daftar/delete?id=<?php echo $row['NoDaftar']; ?>" class="btn btn-danger">Delete</a></td>    
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