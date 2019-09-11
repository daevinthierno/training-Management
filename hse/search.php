<?php
require '../include/config.php';

try {
    $department =  $_POST['department'];
    $search =  $_POST['search'];
 
    $employees = mysqli_query($conn, "SELECT DISTINCT E.empID , E.matricule, E.empname, S.enterprisename FROM Employee E, Enterprise S WHERE (E.matricule LIKE '%$search%' OR E.empname LIKE '%$search%' OR S.enterprisename LIKE '%$search%') AND E.depID = '$department' AND E.enterpriseID = S.enterpriseID");
    
    $json = [];
    
    while ($employee = mysqli_fetch_array($employees)) {
        $json[] = [
            'id' => $employee['empID'],
            'matricule' => $employee['matricule'],  
            'employee' => $employee['empname'],
            'enterprise' => $employee['enterprisename']
        ];
    }
    $json['success'] = true;
    echo json_encode($json);
} catch (Exception $e) {
    die("Error" . $e->getMessage());
}
        