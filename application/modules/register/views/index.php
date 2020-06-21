<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <form action="" method="post">
            <?php form_open('register');?>
            <h2>Register</h2>
            <br>
            <?php echo $this->session->flashdata('message'); ?>

            <!--  -->
            <input type="text" name="username" id="username" placeholder="Your Name">
            <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            <br>
            <input type="password" name="password" id="password" placeholder="password">
            <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
            <br>
            <button type="submit">Register</button>
        </form>
        <a href="">Have Account ? Please Login</a>
    </div>
</body>
</html>