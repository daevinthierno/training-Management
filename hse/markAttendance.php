<?php

include '../include/function.php';
require '../include/config.php';

//  Verify if user is logged in or not
user_logged();

try {
    if (isset($_POST['validate'])) {
        $trainer1 = $_POST['trainer1'];
        $trainer2 = $_POST['trainer2'];
        $trainer3 = $_POST['trainer3'];
        $type = $_POST['type'];
        $theme = $_POST['theme'];
        $location = $_POST['location'];
        $department = $_POST['department'];

        $viewDate = $_POST['date'];
        $date = DateTime::createFromFormat('m/d/Y', $viewDate);
        $date = $date->format('Y-m-d');

        $training = mysqli_query($conn, /** @lang text */ "SELECT * FROM training WHERE (trainingType = '{$type}' AND date_and_time = '{$date}' AND deptID = {$department})");
        if (mysqli_num_rows($training) === 0) {
            $train = mysqli_query($conn, /** @lang text */ "INSERT INTO training (trainer1, trainer2, trainer3, trainingType, siteID, theme, date_and_time, deptID)
                                                                VALUES ('{$trainer1}', '{$trainer2}', '{$trainer3}', '{$type}', {$location}, '{$theme}', '{$date}', {$department})");
            if (isset($_POST['attendances'])) {
                $attendances = $_POST['attendances'];
                $trainingID = mysqli_insert_id($conn);
                foreach ($attendances as $attendance) {
                    $empID = (int)filter_var($attendance, FILTER_SANITIZE_NUMBER_INT);
                    $status = preg_replace('!\d+!', '', $attendance);
                    $attend = mysqli_query($conn, /** @lang text */ "INSERT INTO attendance (trainingID, empID, status) VALUES ({$trainingID}, {$empID}, '{$status}')");
                }
                echo 'Welldone Attendance Successfully Marked';
            } else {
                echo 'Please Mark the Attendances';
            }
        } else {
            echo 'Attendance Already Marked for this Department';
        }
    }
} catch (Exception $ex) {
    echo 'Error' . $e->getMessage();
}
