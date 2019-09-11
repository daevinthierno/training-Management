<?php
include 'include/config.php';
include 'include/function.php';
$empname ='';
   
        $empID = intval($_GET['q']);
        $sql = "SELECT * FROM employee WHERE empID = $empID";
        $res = mysqli_query($conn,$sql);
        if($res){
          while ($ro = mysqli_fetch_array($res)) {
            # code...
            $empname = $ro['empname'];
          }
        }
        //echo '<h2> Records For :'.$empname.'</h2><br><br>';
        $sql_h = "SELECT t.trainingType,t.theme, t.date_and_time as dates ,t.trainer1,t.trainer2,t.trainer3 from attendance as a, training as t where empID = $empID  and t.trainingID = a.trainingID and a.status like '%present%'";
        $result = mysqli_query($conn,$sql_h);
        if($result){
            
                $i = 0;
              while ($row = mysqli_fetch_array($result)) {
                # code...
                    echo '<tr><td>'.++$i.'</td><td>'.$row['trainingType'].'</td><td>'.$row['theme'].'</td><td>'.$row['trainer1'].', '.$row['trainer2'].' and '.$row['trainer3'].'</td><td>'.$row['dates'].'</td></tr>';
                     }

             echo "</table>";
        }else{
            var_dump($sql_h);
          }
