<?php

include 'include/function.php';
include 'include/config.php';

function displayTable5($conn){
     $months = ['January','Febuary','March','April','May','June','Jully','August','September','October','November','December'];
     

      $hnum  = $snum = $tnum = array();
     //select the
         foreach ($months as $month ) {
          # code...
       $sql_health = "SELECT DISTINCT a.empID FROM attendance AS a, employee AS e, training as t WHERE  MONTHNAME(t.date_and_time) like '%$month%'  AND e.empID = a.empID AND t.trainingType like '%Health Talk Awareness%'  AND a.status LIKE '%present%' AND t.trainingID = a.trainingID  ";
           
            
          //count number of employee that took part in heath talk for each month
             $sql_toolbox = "SELECT DISTINCT e.empID FROM attendance AS a, employee AS e, training as t WHERE MONTHNAME(t.date_and_time)  like '%$month%' AND t.trainingType like '%Toolbox%'  AND a.status LIKE '%present%' AND e.empID = a.empID AND t.trainingID = a.trainingID ";
            
             
              //count number of employee that took part in heath talk for each month
             $sql_safety = "SELECT DISTINCT e.empID FROM attendance AS a, employee AS e, training as t WHERE a.status LIKE '%present%'  AND MONTHNAME(t.date_and_time)  like '%$month%' AND t.trainingType like '%Safety training%' AND  e.empID = a.empID AND t.trainingID = a.trainingID " ;
             
       if(isset($_POST['submit']))
          {
             $sql_health.="  ";
                $sql_safety .="  ";
                $sql_toolbox.="  ";
                $year = $_POST['year'];  
                $sql_health.="  AND YEAR(t.date_and_time) = $year";
                $sql_safety .="  AND YEAR(t.date_and_time) = $year";
                $sql_toolbox.="  AND YEAR(t.date_and_time) = $year";
             //count number of employee that took part in heath talk for each month
             
          }  
            $res_health = mysqli_query($conn, $sql_health);
             $res_toolbox = mysqli_query($conn, $sql_toolbox);
             $res_safety = mysqli_query($conn, $sql_safety);
            
          if ($res_health) {
              # code...
               
               array_push($hnum,mysqli_num_rows($res_health));
               
             }
            
             
           
             if ($res_safety) {
              # code...
              
               array_push($snum,mysqli_num_rows($res_safety));
             } 
             
              
            
            if ($res_toolbox) {
              # code...
               
              array_push($tnum, mysqli_num_rows($res_toolbox));
             }
             
            }
           for($i= 0; $i<12; ++$i){   
          echo ",['".$months[$i]."',".$hnum[$i].",".$snum[$i].",".$tnum[$i]."]";
           }
         
}

?>
<?php include 'header1.php'; ?>
  <div class="box">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Annual Training Report</h3>
          <form action="index3.php" method="POST"> 
          <div class="row">
          <div class="col-md-6">                        
    &nbsp;&nbsp;<select class="select2" name="year" style="width:100%;">
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
      }?>
    </select>
    </div>
    <button type="submit" name="submit" class="btn btn-sm bg-blue btn-raised">validate</button>
  </form>
  </div>
  </div> 
      <div class="box-body">
        <?php //echo displayTable5($conn); ?>
        <button onclick="printDiv('depchart')" class="btn btn-alert bg-blue btn-sm btn-raised"><i class="fa fa-print"></i>&nbsp;Print</button>
      <div id="depchart">
          <?php  include 'charts/data5.php';?>
      </div>
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>
        <h3 class="box-title">Employees in Each Department Per Enterprise</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div> 
      </div>
      <div class="box-body">
        <div id="staff">
          <?php  include 'sortedStaff.php';?>
        </div>
      </div>
    </div>
  </div>
</div>
    <?php include 'footer1.php'; ?>
