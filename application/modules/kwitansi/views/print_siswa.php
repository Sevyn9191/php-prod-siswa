

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Invoice Siswa</li>
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
              <h5><i class="fas fa-info"></i></h5>
              <!-- Halaman ini telah ditingkatkan untuk dicetak. Klik tombol cetak di bagian bawah faktur. -->
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
                    <strong><?php echo $row['Nm_Sis'] ?></strong>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>No Induk Siswa</b><br>
                  <address>
                    <strong><?php echo $row['Nis']; ?></strong>
                  </address>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
          
              <!-- Table row -->
              <div class="row mt-5">
              <div class="col-6">
                <table>
                    <tr>
                    <th>Nama Siswa</th>
                        <td></td>
                        <td>:</td>
                        <td><?= $row['Nm_Sis']; ?></td> 
                    </tr>
                
                   
                    <tr>
                    <th>Asal Sekolah</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['As_Sek']; ?></td> 
                    </tr>
                   
                    <tr>
                    <th>Tempat Lahir</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['Tmpt_Lahir']; ?></td>  
                    </tr>
                   
                    <tr>
                    <th>Tanggal Lahir</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['Tgl_Lhr_Sis']; ?></td>  
                    </tr>
                   
                    <tr>
                    <th>Jenis Kelamin</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['Jen_Kel']; ?></td> 
                    </tr>
                   
                    <tr>
                    <th>Agama</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['Agama_Sis']; ?></td>   
                    </tr>
                   
                    <tr>
                    <th>Alamat</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['Almt_Sis']; ?></td> 
                    </tr>
                   
                    <tr>
                    <th>Nama Ayah</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['Nm_Ayah_Sis']; ?></td> 
                    </tr>
                   
                    <tr>
                        <th>Nama Ibu</th>
                        <td></td>
                        <td>:</td>
                        <td><?= $row['Nm_Ibu_Sis']; ?></td>  
                    </tr>
                   
                    <tr>
                        <th>Alamat Ortu</th>
                        <td></td>
                        <td>:</td>
                        <td><?= $row['Al_Ortu_Sis']; ?></td>
                    </tr>
                   
                    <tr>
                    <th>No Handphone Siswa</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['No_HP_Sis']; ?></td>  
                    </tr>
                   
                    <tr>
                    <th>Nama Wali</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['Nm_Wali']; ?></td>    
                    </tr>
                   
                    <tr>
                    <th>Alamat Wali</th>
                    <td></td>
                        <td>:</td>
                        <td><?= $row['Al_Wali']; ?></td> 

                    </tr>
                </table>

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 40px; text-align:center; margin-left:57%; width:100%;">
                    Jl. Joglo Raya No.36, RT.5/RW.8, Joglo, Kec. Kembangan, Kota Jakarta Barat
                    Daerah Khusus Ibukota Jakarta 11640
                  </p>
                </div>
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
                  <!-- <p class="lead">Tanggal <?php echo $row['Tgl_Daftar']; ?></p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <!-- <th style="width:50%">Subtotal:</th> -->
                        <!-- <td>Rp.<?php echo number_format($row['Besar_Biaya'],2,',','.'); ?></td> -->
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