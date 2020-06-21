<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/jpg" href="<?php echo base_url(); ?>asset/images/icon.png">
  <title>SMK SUMPAH PEMUDA</title>
</head>
<body>
    

    <div class="login">
        <form action="" method="post">
            <?php form_open('login');?>
            <h2>Sign</h2>
            <br>
            <?php echo $this->session->flashdata('message'); ?>
            <?php echo $this->session->flashdata('regis_suc'); ?>

            <!--  -->
            <input type="text" name="username" id="username" placeholder="Your Name">
            <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            <br>
            <input type="password" name="password" id="password" placeholder="password">
            <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
            <br>
            <button type="submit">Login</button>
        </form>
        <a href="<?php echo base_url(); ?>register">register</a>
    </div>
    </body>
</html>