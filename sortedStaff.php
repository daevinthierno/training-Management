<?php

include 'include/config.php';

$departments = $enterprises = $depname= $entname =  array();

//store various departments in the array department
$sql_dep = "SELECT * from department ";
$res_dep = mysqli_query($conn,$sql_dep);
if($res_dep){
    while ($dep = mysqli_fetch_array($res_dep)) {
        # code...
        array_push($departments,$dep['depID']);
        array_push($depname,$dep['depname']);
    }
}

//stor various enterprises in the array entrprises
$sql_ent = "SELECT * from enterprise";
$res_ent = mysqli_query($conn,$sql_ent);
if($res_ent){
    while($ent = mysqli_fetch_array($res_ent)){
        array_push($enterprises,$ent['enterpriseID']);
        array_push($entname, $ent['enterprisename']);
    }
}

for ($i=1; $i < count($departments)+1 ; $i++)  {
    # code...
      for ($j=1; $j <count($enterprises)+1 ; $j++) {
        $sql_employee = "SELECT * from employee where depID = $i and enterpriseID = $j";
        $res_emp = mysqli_query($conn,$sql_employee);
        if($res_emp){
            $count[$i][$j] = mysqli_num_rows($res_emp);
            //
            
        }
    }
}



echo '<table id="dtable" class="table table-striped table-responsive-xl">';
?>
  <thead>
      <tr>
          <td>Departments</td>
          <?php
          for ($i=0; $i <count($enterprises) ; $i++) { 
              # code...
            echo '<td>'.$entname[$i].'</td>';
          }
          ?>
          <td>Total</td>
      </tr>
  </thead>
<?php
 $Total = 0;
for ($i=1; $i < count($departments)+1 ; $i++)  {
    # code...
    
    echo "<tr>";
    echo "<td>".$depname[$i-1]."</td>";

 
    for ($j=1; $j < count($enterprises)+1 ; $j++){
        echo "<td>".$count[$i][$j]."</td>";
            

    }
   
    $Total += array_sum($count[$i]); 
    echo "<td><b>".array_sum($count[$i])."</b></td>";
        
        # code...
     echo "</tr>";
}
?>
<tr><td><b>Total</b></td>
<?php

 for ($j=1; $j < count($enterprises)+1; $j++) { 
      # code...
    $ent  = "SELECT * from employee where enterpriseID = $j";
    $result = mysqli_query($conn,$ent);
    if ($result) {
        # code...
        $ctotal = mysqli_num_rows($result);
         echo "<td><b>".$ctotal."</b></td>";
    }
  
   
  }
  echo '<td><b style = "color:red;">'.$Total.'</b></td>';
?>
</tr>
<?php
echo "</table>";

?>