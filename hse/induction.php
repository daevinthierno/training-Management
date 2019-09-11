<?php
include '../include/function.php';
include '../include/config.php';

//  Verify if user is logged in or not
user_logged();

//  Get the present user's session
global $_SESSION;
$user = $_SESSION['user'];

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $department = $_POST['department'];
        $enterprise = $_POST['enterprise'];
        $mark = $_POST['mark'];
        $viewDate = $_POST['date'];
        $date = DateTime::createFromFormat('d/m/Y', $viewDate);
        $date = $date->format('Y-m-d');
        $status = $_POST['status'];
      
        try {
            $result = '';
            if (!empty($_POST['id']))  {
                $id = $_POST['id'];
                $result = mysqli_query($conn, /** @lang text */ "UPDATE `induction` SET `names` = '{$name}', `depID` = '{$department}', `enterpriseID` = '{$enterprise}', `Personel_status` = '{$status}', `Marks` = '{$mark}', `Date` = '{$date}'  WHERE `ID` = '{$id}' "); 
            } else {
                $result = mysqli_query($conn, /** @lang text */ "INSERT INTO `induction`( `names`, `depID`, `enterpriseID`, `Personel_status`, `Marks`, `Date`) VALUES  ('$name',$department,$enterprise,'$status',$mark,'$date')");
            }
            
            if ($result) {
                $_SESSION['flash']['success'] = 'Induction Successfully Saved';
            }
            else {
                $_SESSION['flash']['danger'] = 'Induction Not Saved';
            }
        } catch (Exception $ex) {
            die('Error' . $ex->getMessage());
        }
    }

     function loadDepartments($conn)
    {
      $output0 = '';
      $sql = "SELECT * FROM  department";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $output0 .='<option value="'.$row['depID'].'">'.$row['depname'].'</option>';
      }
      return $output0;
    }
     function loadEnterprise($conn)
    {
      $output0 = '';
      $sql = "SELECT * FROM  enterprise";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $output0 .='<option value="'.$row['enterpriseID'].'">'.$row['enterprisename'].'</option>';
      }
      return $output0;
    }

include '../include/header.php';
?>
<div class="box">
    <div id="newForm" style="display: none">
            <div class="box-header with-border">
                <h3 class="box-title text-center text-bold"><i class="fa fa-building-o"></i> <span id="title">New</span>
                    Induction</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-alert bg-red btn-sm pull-right" id="exitForm">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
            </div>
        <div class="box-body">
            <form action="" method="post" role="form">
                <div class="container-fluid">
                <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">FULL NAME</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter the Intern Full Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="department">DEPARTMENT</label>
                                <select class="form-control" name="department" id="department"
                                    placeholder="Enter Department">
                                    <option>SELECT DEPARTMENT</option>
                                    <?php echo loadDepartments($conn); ?>
                                </select> 
                            </div>
                        </div> 
                    </div>           
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="enterprise">ENTERPRISE</label>
                                <select name="enterprise" id="enterprise" class="form-control">
                                    <option>SELECT ENTERPRISE</option>
                                    <?php echo loadEnterprise($conn); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">PERSONEL'S STATUS</label>
                                <select name="status" id="status" class="form-control">
                                    <option>SELECT PERSONEL'S STATUS</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Intern">Intern</option>
                                </select>
                            </div>
                        </div>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mark">MARK</label>
                                <input type="text" class="form-control" name="mark" id="mark"
                                placeholder="Enter the Mark">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">DATE</label>
                                <input type="text" class="form-control" name="date" id="date" 
                                placeholder="Enter the Date">
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-raised pull-right" name="submit" id="submit">SAVE
                            </button>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>
    
    <div class="box-footer">
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title text-center text-bold"><i class="fa fa-book"></i> INDUCTION</h3>
            <div class="box-tools pull-right">
                    <button type="button" class="btn btn-success bg-green btn-sm pull-right" id="insertForm">
                        <i class="oin ion-plus"></i>&nbsp; New induction
                    </button>
            </div>
        </div>
            <div class="box-body">
                <table id="table" class="table table-striped table-responsive-xl">
                    <thead>
                        <tr>
                            <th>N<sup>0</sup></th>
                            <th>Full Names</th>
                            <th>Department</th>
                            <th>Enterprise</th>
                            <th>Personel's Status</th>
                            <th>Marks</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // function to fill table with data
                            function fillEmployeeInformation($conn){
                                $output = '';
                                $i = 1;
                                $sql = "SELECT i.ID, i.names, d.depname, i.depID, i.enterpriseID, e.enterprisename, i.Personel_status, i.Marks, i.Date FROM induction AS i, department AS d, enterprise AS e  WHERE d.depID = i.depID AND i.enterpriseID = e.enterpriseID ";
                                $result = mysqli_query($conn, $sql);
            
                                while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td> <?php echo $i++; ?></td>
                                    <td><?php echo $row['names']; ?></td>
                                    <td><?php echo $row['depname']; ?></td> 
                                    <td><?php echo $row['enterprisename']; ?></td>
                                    <td><?php echo $row['Personel_status']; ?></td>
                                    <td><?php echo $row['Marks']; ?></td>
                                    <td><?php 
                                        $viewDate = $row['Date'];
                                        $date = DateTime::createFromFormat('Y-m-d', $viewDate);
                                        $date = $date->format('d/m/Y');
                                        echo $date ; ?>
                                    </td>
                                    <td>
                                         <button class="btn btn-info bg-aqua btn-sm" id="updateForm"
                                    onclick="updateInd('<?php echo $row['ID'] ?>', '<?php echo $row['names'] ?>',
                                            '<?php echo $row['depID'] ?>', '<?php echo $row['enterpriseID'] ?>', 
                                            '<?php echo $row['Personel_status'] ?>', '<?php echo $row['Marks'] ?>', '<?php echo $date ?>')">
                                             <i class="ion ion-edit"></i>&nbsp; Edit
                                         </button>
                                         <button class="btn bg-red btn-sm" data-toggle="modal" data-target="#delete"
                                          onclick="setData('induction', '<?php echo $row['ID'] ?>')">
                                            <i class="ion ion-trash-b"></i>&nbsp; Delete
                                         </button>
                                    </td>
                                </tr>
                            <?php } } ?>
                            <!-- Loading employee info onchange department - JoeDigital -->
                            <?php echo fillEmployeeInformation($conn);?>
                    </tbody>
                </table>
            </div>      
        </div>        
    </div>
</div>
<?php include '../include/footer.php'; ?>
