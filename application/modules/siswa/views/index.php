
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="<?php echo base_url();?>daftar" class="btn btn-primary">TAMBAH DATA</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Siswa</li>
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
              <h3 class="card-title">Siswa Data</h3>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-bordered table-striped display nowrap" style="width:100%">
                <thead class="thtable">
                <tr>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Alamat Ortu</th>
                    <th>No Handphone Siswa</th>
                    <th>Nama Wali</th>
                    <th>Alamat Wali</th>
                    <th>No Daftar</th>
                    <th>Kd Karyawan</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                        <?php 
                    foreach ($cups as $row) { ?>
                    <tr>
                        <td><?= $row['Nis']; ?></td>    
                        <td><?= $row['Nm_Sis']; ?></td>    
                        <td><?= $row['As_Sek']; ?></td>    
                        <td><?= $row['Tmpt_Lahir']; ?></td>    
                        <td><?= $row['Tgl_Lhr_Sis']; ?></td>    
                        <td><?= $row['Jen_Kel']; ?></td>    
                        <td><?= $row['Agama_Sis']; ?></td>    
                        <td><?= $row['Almt_Sis']; ?></td>    
                        <td><?= $row['Nm_Ayah_Sis']; ?></td>    
                        <td><?= $row['Nm_Ibu_Sis']; ?></td>    
                        <td><?= $row['Al_Ortu_Sis']; ?></td>    
                        <td><?= $row['No_HP_Sis']; ?></td>    
                        <td><?= $row['Nm_Wali']; ?></td>    
                        <td><?= $row['Al_Wali']; ?></td>    
                        <td><?= $row['No_Daftar']; ?></td>    
                        <td><?= $row['Kd_Karyawan']; ?></td>    
                        <td><a href="<?= base_url();?>siswa/edit?id=<?php echo $row['Nis']; ?>" class="btn btn-warning">Edit</a> | <a href="<?php echo base_url();?>siswa/delete?id=<?php echo $row['Nis']; ?>" class="btn btn-danger">Delete</a> | <a href="<?php echo base_url();?>kwitansi/print?id=<?php echo $row['Nis']; ?>" class="btn btn-primary">Proses</a></td>    
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Nis</th>
                    <th>No Daftar</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Daftar</th>
                    <th>Asal Sekolah</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Alamat Ortu</th>
                    <th>No Handphone Siswa</th>
                    <th>Nama Wali</th>
                    <th>Alamat Wali</th>
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