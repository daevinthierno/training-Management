<?php
try {
    $conn = mysqli_connect('localhost', 'root', '', 'dangote');
} catch (Exception $ex) {
    die('Error' . mysqli_connect_error());
}
