<?php
include '../include/function.php';
include '../include/config.php';

//  Verify if user is logged in or not
user_logged();

//  Get the Path and filter to get the Table and the ID
$table = preg_replace('!\d+!', '', $_GET['infos']);
$id = (int)filter_var($_GET['infos'], FILTER_SANITIZE_NUMBER_INT);

//  Deleting Operation
try {
    
    $delete = mysqli_query($conn, /** @lang text */ "DELETE FROM {$table} WHERE ID = '{$id}'");
    
    if ($delete) {
        $_SESSION['flash']['success'] = ucfirst($table) . ' was deleted';
    } else {
        $_SESSION['flash']['danger'] = ucfirst($table) . ' not deleted';
    }
} catch (Exception $e) {
    die('Error ' . $e->getMessage());
}
mysqli_close($conn);

header('Location: ' . $table . '.php');
exit();
