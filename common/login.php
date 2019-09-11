<?php
include '../include/function.php';
require '../include/config.php';

session();

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = mysqli_query($conn, /** @lang text */ "SELECT * FROM users 
                                                        WHERE username = '$username' AND password = '$password' LIMIT 1");

    if ($user) {
        $user = $user->fetch_assoc();
        $_SESSION['user'] = $user;
        $remember = str_random(60);
        setcookie('user', $remember);

        header('Location: dashboard.php');
    } else {
        $_SESSION['flash']['danger'] = 'Invalid Username or Password';
    }
}
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dangote | Login</title>

    <link rel="apple-touch-icon" href="<?php echo assets('image/favicon.png') ?>"/>
    <link rel="shortcut icon" href="<?php echo assets('image/favicon.png') ?>"/>
    <link rel="icon" href="<?php echo assets('image/favicon.png') ?>"/>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo assets('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo assets('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo assets('css/sb-admin.css') ?>" rel="stylesheet">
    <!-- attendance css-->

    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .logo {
            margin-bottom: 5px;
            max-width: 270px;
            margin-left: 45px;
        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo assets('image/cementplant.jpg') ?>);
            background-size: cover;
        }
    </style>
</head>
<body>
<form method="POST" enctype="multipart/form-data" action="">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-body">
                <?php if (isset($_SESSION["flash"])): ?><!-- To generate a message-->
                <?php foreach ($_SESSION["flash"] as $type => $message): ?>
                    <div class="alert alert-<?= $type; ?> alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="true">&times;</button>
                        <h4><i class="icon fa fas-warning"></i><?php $type; ?></h4>
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION["flash"]); ?>
                <?php endif; ?>
                <img src="<?php echo assets('image/logo3.jpg') ?>" class="logo" alt="">
                <div class="form-group">
                    <label for="firstName"
                           style="font-family: lucida bright, serif; font-size: 18px; font-weight: bolder">USERNAME</label>
                    <input type="text" id="firstName" name="username" class="form-control" placeholder="Username"
                           required="required" autofocus="autofocus">
                </div>
                <div class="form-group">
                    <label for="inputPassword"
                           style="font-family: lucida bright, serif; font-size: 18px; font-weight: bolder">PASSWORD</label>
                    <input type="password" id="inputPassword" name="password" class="form-control"
                           placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <label for="check">
                        <input type="checkbox" onclick="myFunction()" id="check">&nbsp;View Password
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-raised btn-block"> LOGIN
                    </button>
                </div>
                <div class="form-group">
                    <a href="../index.php" class="text-secondary" style="float: right"><i class="fa fa-home"></i> Home
                        Page</a>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo assets('vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo assets('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo assets('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<script type="text/javascript">
    function myFunction() {
        let x = document.getElementById("inputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    // Automatic Alert Dismissal after 5 Seconds
    $(function () {
        setTimeout(function () {
            $(".alert").alert('close');
        }, 5000);
    });
</script>

</body>
</html>


