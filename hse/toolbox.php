<?hp 
include '../include/config.php';

if ($_GET['ajax']) {
    $department =  $_GET['department'];
 
        $employees = mysqli_query($conn, "SELECT DISTINCT E.empID , E.matricule, E.empname, S.enterprisename FROM Employee E, Enterprise S WHERE E.depID = '$department' AND E.enterpriseID = S.enterpriseID");

        $json = [];

        while ($employee = mysqli_fetch_array($employees)) {
            $json[] = [
                'id' => $employee['empID'],
                'matricule' => $employee['matricule'],  
                'employee' => $employee['empname'],
                'enterprise' => $employee['enterprisename']
            ];
        }
    
    echo json_encode($json);
}

?>

<?php
include '../include/function.php';
include '../include/config.php';

session();
global $_SESSION;
$user = $_SESSION['user'];

$departments = mysqli_query($conn, "SELECT * FROM department");
$sites = mysqli_query($conn, "SELECT * FROM site");

include '../include/header.php';

?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title text-bold">TOOLBOX</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-alert bg-red btn-sm pull-right" id="exitForm">
                <i class="fa fa-close"></i>
            </button>
        </div>
    </div>
    <form action="" method="post" role="form">
        <div class="box-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="trainer">TRAINER</label>
                            <input type="text" class="form-control" name="trainer1" id="trainer"
                                   placeholder="Enter the First Trainer's Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="trainer">TRAINER</label>
                            <input type="text" class="form-control" name="trainer2" id="trainer"
                                   placeholder="Enter the Second Trainer's Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="trainer">TRAINER</label>
                            <input type="text" class="form-control" name="trainer3" id="trainer"
                                   placeholder="Enter the Third Trainer's Name">
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="theme">THEME</label>
                            <input type="text" class="form-control" name="theme" id="theme"
                                   placeholder="Enter the Theme">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="location">LOCATION</label>
                            <select name="location" id="location" class="form-control">
                                <option>Select a Location</option>
                                <?php while ($site = mysqli_fetch_array($sites)) { ?>
                                    <option value="<?php echo $site['siteID'] ?>"><?php echo $site['sitename'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="department">DEPARTMENT</label>
                            <select name="department" id="department" class="form-control">
                                <option>Select a Department</option>
                                <?php while ($department = mysqli_fetch_array($departments)) { ?>
                                    <option value="<?php echo $department['depID'] ?>"><?php echo $department['depname'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
               <!-- <div class="row"> -->
                    <div class="col-md-4 pull-right">
                        <div class="form-group">
                            <label for="date">DATE</label>
                            <input type="text" class="form-control" name="date" id="date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title text-bold">Attendance</h3>
                    <div class="box-tools pull-right">
        
                        <div class="form-group">
                                <label for="search" class="col-md-4 control-label">Search</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="search" id="search">
                                </div>
                            </div>    
                
                    </div>
                </div>
                <div class="box-body" id="data">
                    <table id="dataTable" class="table table-striped table-responsive-xl">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Full Names</th>
                            <th>Enterprise</th>
                            <th>Attendance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($employees as $employee) { ?>
                        <tr>
                        <td><?php echo $employee ?></td>
                        <td><?php echo $employee ?></td>
                        <td><?php echo $employee ?></td>
                        <td>Action</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary btn-raised pull-right" name="validate" id="validate">VALIDATE</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include '../include/footer.php'; ?>
