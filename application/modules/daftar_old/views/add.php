
<!-- <div class="container"> -->
<h3>Form Pendaftaran</h3>
<form action="" method="post">
<?php form_open('daftar');?>
    <div class="row">
            <div class="col-2">
            <div class="form-group">
    <!-- <input type="text" name="id" id="" value="<?php echo $data; ?>" placeholder="" class="form-control" readonly> -->
    </div>
                <div class="form-group">
                    <!-- <label>Tanggal Daftar</label> -->
                    <input type="text" id="" class="form-control datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker" name="date_daftar" placeholder="tanggal Daftar" autocomplete="off">
                    <?= form_error('date_daftar','<small class="text-danger pl-3">','</small>'); ?>
                </div>

                <div class="form-group">
                     <input type="text" name="nama" id="nama" placeholder="nama" class="form-control">
                     <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                </div>
           
           <div class="form-group">
    <input type="text" name="asal_sekolah" id="" placeholder="asal sekolah" class="form-control">
    <?= form_error('asal_sekolah','<small class="text-danger pl-3">','</small>'); ?>
           </div>
           <div class="form-group">
    <input type="text" name="tempat_lahir" id="" placeholder="tempat lahir" class="form-control">
    <?= form_error('tempat_lahir','<small class="text-danger pl-3">','</small>'); ?>
           </div>
    <div class="form-group">
                    <!-- <label>Tanggal Lahir</label> -->
                    <input type="text" name="tgl_lahir" class="form-control datepicker2 datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker2" placeholder="tanggal lahir" autocomplete="off">
                    <?= form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
                </div>

                <div class="form-group">
    <select name="kelamin" id="" class="form-control" >
        <option value="pria">Pria</option>
        <option value="wanita">Wanita</option>
    </select>
  
    </div>

    <div class="form-group">
    <select name="agama" id="" class="form-control">
        <option value="islam">Islam</option>
        <option value="kristen">Kristen</option>
    </select>
    
    </div>
    </div>
            
            </div>
            <input type="submit" value="oke" class="btn btn-primary">
            </form>
            <!-- </div> -->
            </div>