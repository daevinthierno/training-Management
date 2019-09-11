<?php

global $_SESSION;
setcookie('user', null);
unset($_SESSION['user']);
header('Location: login.php');
