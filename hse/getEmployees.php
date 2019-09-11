<?php
include '../include/function.php';
require '../include/config.php';

//  Verify if user is logged in or not
user_logged();

try {
    $employees = [];
    if (isset($_GET['department'])) {
        $department = $_GET['department'];

        $employees = mysqli_query($conn, /** @lang text */ "SELECT DISTINCT E.empID , E.matricule, E.empname, S.enterprisename FROM Employee E, Enterprise S WHERE E.depID = '$department' AND E.enterpriseID = S.enterpriseID ORDER BY E.empname");
    }

    if (isset($_GET['search']) && isset($_GET['department'])) {
        $department = $_GET['department'];
        $search = $_GET['search'];

        $employees = mysqli_query($conn, /** @lang text */ "SELECT DISTINCT E.empID , E.matricule, E.empname, S.enterprisename FROM Employee E, Enterprise S WHERE (E.matricule LIKE '%$search%' OR E.empname LIKE '%$search%' OR S.enterprisename LIKE '%$search%') AND E.depID = '$department' AND E.enterpriseID = S.enterpriseID");
    }

} catch (Exception $e) {
    die('Error' . $e->getMessage());
}
?>
<table class="table table-striped table-responsive-xl" id="dataTable">
                <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Full Names</th>
                    <th>Enterprise</th>
                    <th>Attendance</th>
                </tr>
                </thead>
                <tbody  id="data">
<?php while ($employee = mysqli_fetch_array($employees)) { ?>
    <tr>
        <td>
            <?php echo $employee['matricule'] ?>
        </td>
        <td><?php echo $employee['empname'] ?></td>
        <td><?php echo $employee['enterprisename'] ?></td>
        <td>
            <div class="row">
                <div class="col-md-6">
                    <label class="text-green" for="present<?php echo $employee['empID'] ?>">
                        <input type="radio" value="present<?php echo $employee['empID'] ?>"
                               name="attendance<?php echo $employee['empID'] ?>"
                               id="present<?php echo $employee['empID'] ?>" class="attendance flat-green">&nbsp; Present
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="text-red" for="absent<?php echo $employee['empID'] ?>">
                        <input type="radio" value="absent<?php echo $employee['empID'] ?>"
                               name="attendance<?php echo $employee['empID'] ?>"
                               id="absent<?php echo $employee['empID'] ?>" class="attendance flat-red">&nbsp; Absent
                    </label>
                </div>
            </div>
        </td>
    </tr>
<?php } ?>
</tbody>
