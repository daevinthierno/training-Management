<?php
include '../include/function.php';
include '../include/config.php';

//  Verify if user is logged in or not
user_logged();

//  Get the present user's session
global $_SESSION;
$user = $_SESSION['user'];

/**
 * Queries to fill the Department and Location Select Option
 */
$departments = mysqli_query($conn, /** @lang text */ 'SELECT * FROM department');
$sites = mysqli_query($conn, /** @lang text */ 'SELECT * FROM site');

include '../include/header.php';
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title text-center text-bold"><i class="fa fa-first-order"></i> HEALTH TALK AWARENESS
            <input type="hidden" name="type" id="type" value="HEALTH TALK AWARENESS">
        </h3>
    </div>

    <form action="" method="GET" role="form">
        <div class="box-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="trainer1">FIRST TRAINER</label>
                            <input type="text" class="form-control" name="trainer1" id="trainer1"
                                   placeholder="Enter the First Trainer's Name" required="required">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="trainer2">SECOND TRAINER</label>
                            <input type="text" class="form-control" name="trainer2" id="trainer2"
                                   placeholder="Enter the Second Trainer's Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="trainer3">THIRD TRAINER</label>
                            <input type="text" class="form-control" name="trainer3" id="trainer3"
                                   placeholder="Enter the Third Trainer's Name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="theme">THEME</label>
                            <input type="text" class="form-control" name="theme" id="theme"
                                   placeholder="Enter the Theme" required="required">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="location">LOCATION</label>
                            <select name="location" id="location" class="form-control select2" required="required" style="width: 100%;">
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
                            <select name="department" id="department" class="form-control select2" style="width: 100%;">
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
                        <input type="text" class="form-control" name="date" id="date" required="date required" placeholder="Enter the Date">
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
        <div class="box-body" id=data>
            <table class="table table-striped table-responsive-xl" id="dataTable">
                <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Full Names</th>
                    <th>Enterprise</th>
                    <th>Attendance</th>
                </tr>
                </thead>
                
            </table>
        </div><br>
        <button type="submit" class="btn btn-primary btn-raised pull-right" name="validate"
                    id="validate">VALIDATE
        </button>
    </div>
</div>
</form>
</div>

<?php include '../include/footer.php'; ?>
