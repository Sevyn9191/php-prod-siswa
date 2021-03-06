

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kwitansi</h1>
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
    <?php foreach($lumia as $row) { ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              Halaman ini telah ditingkatkan untuk dicetak. Klik tombol cetak di bagian bawah faktur.
            </div>
          

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Smk Sumpah Pemuda
                    <small class="float-right"><?php echo date('Y-m-d'); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                  <address>
                    <strong><?php echo $this->session->userdata('username'); ?></strong>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $row['Nm_CaSis'] ?></strong>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Kwitansi Number</b><br>
                  <address>
                    <strong><?php echo date('Y-m-d'); ?></strong>
                  </address>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
          
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Daftar</th>
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
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <?php $no =1; ?>
                      <td><?php echo $no++; ?></td>
                      <td><?= $row['Tgl_Daftar']; ?></td>    
                        <td><?= $row['Nm_CaSis']; ?></td>    
                        <td><?= $row['As_Sek']; ?></td>    
                        <td><?= $row['Tmpt_Lahir']; ?></td>    
                        <td><?= $row['Tgl_Lahir']; ?></td>    
                        <td><?= $row['Jen_Kel']; ?></td>    
                        <td><?= $row['Agama_Sis']; ?></td>    
                        <td><?= $row['Almt_Sis']; ?></td>    
                        <td><?= $row['Nm_Ayah_Sis']; ?></td>    
                        <td><?= $row['Nm_Ibu_Sis']; ?></td>    
                        <td><?= $row['Al_Ortu_Sis']; ?></td>    
                        <td><?= $row['No_HP_Sis']; ?></td>    
                        <td><?= $row['Nm_Wali']; ?></td>    
                        <td><?= $row['Al_Wali']; ?></td>      
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <!-- <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p> -->
                </div>
                <!-- /.col -->
                <div class="col-6 ">
                  <p class="lead">Tanggal <?php echo date('Y-m-d'); ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <!-- <th style="width:50%">Subtotal:</th>
                        <td>Rp.<?php echo number_format($row['Besar_Biaya'],2,',','.'); ?></td> -->
                      </tr>
                     
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
             
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                  <!-- <a href="<?php echo base_url(); ?>kwitansi/print_ok?id=<?php echo $row['No_Kwitansi']; ?>" type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Print -->
                 </a>
                  <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"> -->
                    <!-- <i class="fas fa-download"></i> Generate PDF -->
                  </button>
                </div>
              </div>
            </div>
           
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <?php } ?>
    <!-- /.content -->
  
  </div>
  <script>
		window.print();
	</script>