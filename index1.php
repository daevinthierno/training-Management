<?php
include 'include/config.php';
include 'include/function.php';
try {
    $trainings = mysqli_query($conn, /** @lang text */ 'SELECT * FROM attendance');
} catch (Exception $ex) {
    die('Error ' . $ex->getMessage());
}
  function displayTable($conn){
    $sql_dep = "SELECT * FROM department";
    $res_dep = mysqli_query($conn,$sql_dep);
    $num = mysqli_num_rows($res_dep);
    $departments = array();
    while($row = mysqli_fetch_array($res_dep)) {
        $departments[] = $row['depID'];
   
    }
   
$tnum = $snum = $hnum = $ttnum = $ssnum = $hhnum = 0;
    //select the
        foreach ($departments as $department ) {
         # code...
        //display depname
               $sql = "SELECT depname FROM department WHERE depID = $department";
               $dep = mysqli_query($conn,$sql);
              //count the number of employees per department
              $sql_numEmp = "SELECT * FROM employee WHERE depID = $department";
              $result = mysqli_query($conn,$sql_numEmp);
         if(isset($_POST['submit'])){
  # code...
                $month = $_POST['months'];
                $year = $_POST['year'];
          //count number of employee that took part in heath talk for each department
              $sql_health = "SELECT DISTINCT e.matricule,e.empname FROM attendance AS a, employee AS e, department AS d, training AS t  WHERE MONTH(t.date_and_time) = $month AND YEAR(t.date_and_time) = $year AND t.trainingID = a.trainingID AND t.trainingType like '%Health Talk Awareness%'  AND a.status LIKE '%present%'   AND e.empID = a.empID AND e.depID = ".$department."  ";
              $res_health = mysqli_query($conn, $sql_health);
             
           //count number of employee that took part in heath talk for each department
              $sql_toolbox = "SELECT DISTINCT e.matricule,e.empname FROM attendance AS a, employee AS e, department AS d, training AS t WHERE MONTH(t.date_and_time) = $month AND YEAR(t.date_and_time) = $year AND t.trainingID = a.trainingID AND t.trainingType like '%Toolbox%' AND a.status LIKE '%present%' AND e.empID = a.empID AND e.depID = ".$department."";
              $res_toolbox = mysqli_query($conn, $sql_toolbox);
              
               //count number of employee that took part in heath talk for each department
              $sql_safety = "SELECT DISTINCT e.matricule,e.empname FROM attendance AS a, employee AS e, department AS d,  training AS t WHERE MONTH(t.date_and_time) = $month AND YEAR(t.date_and_time) = $year AND t.trainingID = a.trainingID AND t.trainingType like '%Safety Training%' AND a.status LIKE '%present%' AND e.empID = a.empID AND e.depID = ".$department."";
              $res_safety = mysqli_query($conn, $sql_safety);
            }else{
              //count number of employee that took part in heath talk for each department
            $sql_health = "SELECT DISTINCT e.matricule,e.empname FROM attendance AS a, employee AS e, department AS d, training AS t  WHERE t.date_and_time >= CURDATE() - INTERVAL DAY(CURDATE())-1 DAY AND t.trainingID = a.trainingID AND t.trainingType like '%Health Talk Awareness%'  AND a.status LIKE '%present%'   AND e.empID = a.empID AND e.depID = ".$department."  ";
            $res_health = mysqli_query($conn, $sql_health);
           
         //count number of employee that took part in heath talk for each department
            $sql_toolbox = "SELECT DISTINCT e.matricule,e.empname FROM attendance AS a, employee AS e, department AS d, training AS t WHERE t.date_and_time >= CURDATE() - INTERVAL DAY(CURDATE())-1 DAY AND t.trainingID = a.trainingID AND t.trainingType like '%Toolbox%' AND a.status LIKE '%present%' AND e.empID = a.empID AND e.depID = ".$department."";
            $res_toolbox = mysqli_query($conn, $sql_toolbox);
            
             //count number of employee that took part in heath talk for each department
            $sql_safety = "SELECT DISTINCT e.matricule,e.empname FROM attendance AS a, employee AS e, department AS d,  training AS t WHERE t.date_and_time >= CURDATE() - INTERVAL DAY(CURDATE())-1 DAY AND t.trainingID = a.trainingID AND t.trainingType like '%Safety Training%' AND a.status LIKE '%present%' AND e.empID = a.empID AND e.depID = ".$department."";
            $res_safety = mysqli_query($conn, $sql_safety);

            }

            ?>
             <tr>
               <td><?php 
               while($row = mysqli_fetch_array($dep)) {
                    echo  $row['depname'];
   
                  }   ?></td>
               <td>
                <?php if($result){
         $empnum = mysqli_num_rows($result);
         echo $empnum;
        }?></td>
               <td><?php  if ($res_health) {
             # code...
              $hnum = mysqli_num_rows($res_health);
               echo $hnum;
            }?></td><td><?php
             $hhnum = (($hnum *100/$empnum));
             echo "".round($hhnum)."%";?> </td>
             <td><?php if ($res_safety) {
             # code...
              $snum = mysqli_num_rows($res_safety);
               echo $snum;
            } ?></td><td><?php
             $ssnum = (($snum *100/$empnum));
             echo "".round($ssnum)."%";?></td>
               <td><?php if ($res_toolbox) {
             # code...
              $tnum = mysqli_num_rows($res_toolbox);
               echo $tnum;
            }?></td><td><?php
             $ttnum = (($tnum *100/$empnum));
             echo "".round($ttnum)."%";?></td>
            
             </tr>
       <?php     
        }

}

?>
<?php include 'header1.php'; ?>
  <section>     
    <!-- Line chart -->
    <div class="box box-primary">
      <div class="box-body">
      <div id="months">
    <form action="index1.php" method="POST">
    <div class="row">
            <div class="col-md-6">
          <select class="select2" name="months" id="months" style=" width:100%;" onchange="depChart(this.value)">
            <option value="">SELECT A MONTH</option>
            <?php 
              $months = ['January','Febuary','March','April','May','June','July','August','September','November','December'];
              $i = 0;
              foreach ($months as $month) {
                # code...
                
                ?>
                  <option value="<?php echo ++$i; ?>"><?php echo $month; ?></option>
                <?php
              }
              ?>
          </select>
          </div>
            <div class="col-md-6">
          <select class="select2" name="year" style=" width:100%;">
            
            <?php
              // set start and end year range
            $yearArray = range(2016, intval(date('Y',$_SERVER['REQUEST_TIME']))+2);
            ?>
            <!-- displaying the dropdown list -->

                <option value="">Select Year</option>
                <?php
                foreach ($yearArray as $year) {
                    // if you want to select a particular year
                    $selected = ($year == intval(date('Y',$_SERVER['REQUEST_TIME']))) ? 'selected' : '';
                    echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                }
            ?>
          </select>
          </div>        
          </div>
          <button type="submit" name="submit" class="btn btn-sm bg-green btn-raised pull-right">validate</button>
        </form>
      </div>      
      </div>
    </div>
  </section>
    <div class="content">
      <div class="box">
        <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>

                  <h3 class="box-title">TRAINING PER DEPARTMENTS</h3>
                     <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div> 
                </div>
                <div class="box-body">
                
                  <button onclick="printDiv('depchart')" class="btn btn-alert bg-red btn-sm btn-raised"><i class="fa fa-print"></i>&nbsp;Print</button>
                      <div id="depchart">
                        
                        </div>  
                    <?php include 'charts/data.php';?>
                      </div>
                 
                </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title text-bold"><i class="fa fa-users"></i>Training Report Per Department</h3>   
          </div>
          <div class="box-body">
            <table id="table" class="table table-striped table-responsive-xl">
              <thead>
                    <tr>
                        <th colspan="8"></th>
                    </tr>
                    <tr>
                        <th>DEPARTMENTS</th>
                        <th>NUMBER</th>
                        <th>HEALTH TALK AWARENESS</th>
                        <th>HTA&nbsp;&nbsp;%</th>
                        <th>SAFETY TRAINING</th>
                        <th>ST&nbsp;&nbsp;%</th>
                        <th>TOOLBOX</th>
                        <th>TB&nbsp;&nbsp;%</th>
                    </tr>
                    

              </thead>
              <tbody>
                    <?php echo displayTable($conn);?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
    
    <?php include 'footer1.php'; ?>
  