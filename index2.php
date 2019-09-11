<?php
include 'include/config.php';
include 'include/function.php';
$sql = "SELECT * FROM employee ;";
$employees = mysqli_query($conn,$sql);
?>
<?php include 'header1.php'; ?>
   

<div class="box">
    <div id="newForm" style="display: none">
        <div class="box-header with-border">
            <h3 class="box-title text-center text-bold"><i class="fa fa-building-o"></i> <span id="title">FILTER</span>
                TABLE</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-alert bg-red btn-sm pull-right" id="exitForm">
                    <i class="fa fa-close"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="container-fluid">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="trainingType">Training Type</label>
                                <select name="trainingType" id="trainingType" class="form-control select2" data-placeholder="Select Training Type" style= "width:70%;">
                                    <option>Select the Training Type</option> 
                                    <option value="Health Talk Awareness">Health Talk Awareness</option>
                                    <option value="Safety Training">Safety Training</option>
                                    <option value="Toolbox">Toolbox</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="box-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="topic">Topic</label>
                                            <input type="text" class="form-control" name="topic" id="topic"
                                                placeholder="Enter the topic">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="trainer">TRAINER</label>
                                            <input type="text" class="form-control" name="trainer" id="trainer"
                                                placeholder="Enter the Trainer's Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <!-- Date -->
                                        <div class="form-group">
                                          <label>Date:</label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar">&nbsp;FROM</i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="date1" name="date1">
                                          </div>
                                          <!-- /.input group -->
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar">&nbsp;TO</i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="date2" name="date2">
                                          </div>
                                          <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <select name="department" id="department" class="form-control select2" data-placeholder="Select department">
                                                <option value="">Select Department</option>
                                                <?php loadDep($conn) ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="enterprise">Enterprise</label>
                                            <select name="enterprise" id="enterprise" class="form-control select2" data-placeholder="Select enterprise">
                                                <option  value="">Select Enterprise</option>
                                                <?php loadEnt($conn) ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="site">location</label>
                                            <select name="site" id="site" class="form-control select2" data-placeholder="Select location">
                                                <option value="">Select location</option>
                                                <?php loadSite($conn) ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    <!-- <div class="row"> -->
                    <button type="submit" class="btn btn-circle btn-primary btn-raised pull-right btn-raised" name="validate"
                            id="save"><i class="fa fa-save"></i>&nbsp; Apply Filter
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> 


<div class="box-footer">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title text-bold"><i class="fa fa-table"></i>&nbsp;GENERAL TABLE</h3>
            <div class="box-tools">
                <div class="col-md-6">
                    <button type="button" class="btn btn-info bg-info pull-right btn-raised" data-toggle="modal"  data-target="#column">
                        <i class="fa fa-th"></i>&nbsp; COLUMNS
                    </button> 
                </div>    
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary bg-green pull-right btn-raised" id="insertForm">
                        <i class="fa fa-filter"></i>&nbsp; filter
                    </button>
                </div>
            </div>
        </div>
        <div class="box-body" id="data">
            <table id="table" class="table table-striped table-responsive-xl">
                <thead>
                        <tr>
                            <th>N<sup>o</sup></th>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Enterprise</th>
                            <th>Location</th>
                            <th>Topic</th>
                            <th>Trainers</th>
                            <th>Training Type</th>
                            <th>Date</th>
                        </tr>
                </thead>
                <tbody>
                <?php displayTables($conn); ?>
                </tbody>
            </table>
        </div>
    </div>        
</div>

 <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title text-center text-bold"><i class="fa fa-user"></i> <span id="title">Attendance Per Employee</h3>
        </div> 
        <div class="box-body">
            <div class="container-fluid">   
              <form action="index2.php" method="post">
                    <div class="form-group">
                    <label for="employee">EMPLOYEE</label>
                    <select name="employee" id="employee" class="form-control select2" data-placeholder="Select the Employee" style="width: 50%;" onchange="showUser(this.value)">
                        <option>Select the Employee</option>
                        <?php while ($employee = mysqli_fetch_array($employees)) { ?>
                        <option value="<?php echo $employee['empID'] ?>"><?php echo $employee['empname'] ?></option> <?php  }?>
                    </select>
                    </div>
                </form>
             <button onclick="printDiv('data')" class="btn btn-alert bg-green btn-sm btn-raised pull-right"><i class="fa fa-print"></i>&nbsp;Print</button>
                     
                <br><br>
                <div id="display"></div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="PrintContent.js"></script>
<?php include 'footer1.php'; ?>

