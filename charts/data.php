<?php
include 'include/config.php';
     function displayTabl0($conn){
     $sql_dep = "SELECT * FROM department";
     $res_dep = mysqli_query($conn,$sql_dep);
     $num = mysqli_num_rows($res_dep);
     $departments = array();
     while($row = mysqli_fetch_array($res_dep)) {
         $departments[] = $row['depID'];
    
     }

$hnum = 0;
$num = array();
$trainingType = ['Health Talk Awareness','Safety Training','Toolbox'];
     //select the
         foreach ($departments as $department ) {
          # code...
         //display depname
          $sql = "SELECT depname FROM department WHERE depID = $department";
          $dep = mysqli_query($conn,$sql);
         //count the number of employees per department
         $sql_numEmp = "SELECT * FROM employee WHERE depID = $department";
         $result = mysqli_query($conn,$sql_numEmp);
         if($result){
          $empnum = mysqli_num_rows($result);
         }
         //var_dump($sql_numEmp);
           if(isset($_POST['submit'])){
  # code...
                $month = $_POST['months'];
                $year = $_POST['year'];
               for ($i=0; $i <3 ; $i++) { 
               
              //count number of employee that took part in heath talk for each department
              $sql_health = "SELECT DISTINCT e.matricule,e.empname FROM attendance AS a, employee AS e, department AS d, training AS t  WHERE MONTH(t.date_and_time) = $month AND YEAR(t.date_and_time) = $year AND t.trainingID = a.trainingID AND t.trainingType like '%$trainingType[$i]%' AND a.status LIKE '%present%'   AND e.empID = a.empID AND e.depID = ".$department."  ";
              $res_health = mysqli_query($conn, $sql_health);
                if ($res_health) {
                      # code...
                       $hnum = mysqli_num_rows($res_health);
                       
                           }
                     $num[$i] = round(($hnum * 100/$empnum));
                  }


            }
            else{
                  for ($i=0; $i <3 ; $i++) { 
                           //count number of employee that took part in heath talk for each department
                    $sql_health[$i] = "SELECT DISTINCT e.matricule,e.empname FROM attendance AS a, employee AS e, department AS d, training AS t  WHERE t.date_and_time >= CURDATE() - INTERVAL DAY(CURDATE())-1 DAY AND t.trainingID = a.trainingID AND t.trainingType like '%$trainingType[$i]%'  AND a.status LIKE '%present%'   AND e.empID = a.empID AND e.depID = ".$department;
                    $res_health = mysqli_query($conn, $sql_health[$i]);

                        if ($res_health) {
                      # code...
                       $hnum = mysqli_num_rows($res_health);
                       
                           }
                     $num[$i] = round(($hnum * 100/$empnum));
                  }

            }
            
              	while($row = mysqli_fetch_array($dep)) {
                     $depname =   $row['depname'];
    
                   } 
          
        
         
          echo ",['".$depname."',".$num[0].",".$num[1].",".$num[2]."]";
         
       }

    }



?>
<div id="barchart"></div>
<?php //echo "this is the chart";?>
  <?php //echo displayTabl0($conn);
    echo '<br>';?>

<div id="do"></div>
<?php
if(isset($_POST['submit']))
                  {
  # code...
       $month = $_POST['months'];
       $year = $_POST['year'];
       echo '<h3>'.date("F", mktime(0, 0, 0,intval($month), 10)).', '.$year;
}else{
  echo '<h3>'.date('F',$_SERVER['REQUEST_TIME']).', '.date('Y',$_SERVER['REQUEST_TIME']).'</h3>';
}
  

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Departments', 'Health Talk', 'Safety training','Toolbox']
  <?php echo displayTabl0($conn);?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'HSE TRAINING REPORT', 'width':1200, 'height':800,
                  width: 1200,
          scales: {
            xAxes: [{
                barThickness: 14,  // number (pixels) or 'flex'
                maxBarThickness: 15 // number (pixels)
            }]
        },
        bar: {groupWidth: "80%"},
          series: {
            5: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            3: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'parsecs'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));
  chart.draw(data, options);
}

</script>
