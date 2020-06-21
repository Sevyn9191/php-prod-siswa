
    <h2>Daftar Pendaftar</h2>
    <!-- <h2>Daftar Siswa</h2> -->
    <div class="col-sm-4">
        <div class="form-group form-inline">
            <label>Keyword</label>
            <input type="text" name="s_keyword" id="s_keyword" class="form-control">
        </div>
    </div>
    <div class="col-sm-4">
        <button id="search" name="search" class="btn btn-warning"><i class="fa fa-search"></i> Cari</button>
    </div>
<br>

    <?php echo $this->session->flashdata('success'); ?>

    <a href="<?php echo base_url(); ?>daftar/tambah">Tambah Data</a>
    <br>
    <br>
    <div class="gol">
    <table border='1'>
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
                <td><a href="<?= base_url();?>daftar/edit?id=<?php echo $row['NoDaftar']; ?>">Edit</a> | <a href="<?php echo base_url();?>daftar/delete?id=<?php echo $row['NoDaftar']; ?>">Delete</a></td>    
            </tr>
            <?php } ?>
        </tbody>
    </table>
            </div>