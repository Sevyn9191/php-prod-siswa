<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>pendaftaran">
            <div class="small-box bg-info">
              <div class="inner jox">
                <h3><?php echo $count; ?></h3>

                <p>Pendaftaran</p>
              </div>
              
              <div class="icon">
              <i class="ion ion-person-add"></i>
                
              </div>
              <a href="<?php echo base_url(); ?>pendaftaran" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>siswa">
            <div class="small-box bg-success">
              <div class="inner jox">
                <h3><?php echo $count2; ?></h3>

                <p>Siswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url(); ?>siswa" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>biaya">
            <div class="small-box bg-warning">
              <div class="inner jox">
                <h3><?php echo $count3; ?></h3>

                <p>Biaya</p>
              </div>
              <div class="icon">
              <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url(); ?>biaya" class="small-box-footer">Info Lebih Lanjut<i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>pembayaran">
            <div class="small-box bg-danger">
              <div class="inner jox">
                <h3>%</h3>

                <p>Pembayaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url(); ?>pembayaran" class="small-box-footer">Info Lebih Lanjut<i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </a>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->