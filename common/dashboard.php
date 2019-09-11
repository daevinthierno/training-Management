<?php
include '../include/function.php';

//  Verify if user is logged in or not
user_logged();

//  Get the present user's session
global $_SESSION;
$user = $_SESSION['user'];

include '../include/header.php'
?>

<?php include '../include/footer.php' ?>
