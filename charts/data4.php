<?php
include 'C:\xampp\htdocs\dangote\include\config.php';
$sql = "SELECT * FROM employee ;";
$employees = mysqli_query($conn,$sql);
?>
          
 <?php
 $health = $safety = $toolbox = $empID ='';
 if(isset($_POST['button'])){
  $empID = $_POST['employee'];
  $emp = "SELECT  * from employee where empID = $empID ";
  $result = mysqli_query($conn,$emp);
  if($result){
  while($row = mysqli_fetch_array($result)){
     $empname = $row['empname']; 
     
  }
}else{
  var_dump($emp);
}
  $sql_report = "SELECT DISTINCT * from attendance as a, training as t where a.empID = $empID and t.trainingType like '%Health Talk Awareness%' and a.trainingID = t.trainingID";
  $hres = mysqli_query($conn,$sql_report);
  if($hres){
      $health = mysqli_num_rows($hres);
  }else{
      var_dump($sql_report);
  }
  $sql_report1 = "SELECT DISTINCT * from attendance as a, training as t where a.empID = $empID and t.trainingType like '%Safety training%' and a.trainingID = t.trainingID";
  $sres = mysqli_query($conn,$sql_report1);
  if($sres){
      $safety = mysqli_num_rows($sres);
  }
  $sql_report2 = "SELECT DISTINCT * from attendance as a, training as t where a.empID = $empID and t.trainingType like '%Toolbox%'and a.trainingID = t.trainingID";
  $tres = mysqli_query($conn,$sql_report2);
  if($tres){
      $toolbox = mysqli_num_rows($tres);
  }
 }

 ?>
<div id="do"></div>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  <?php echo "['Trainings', 'Number of trainings attended'],";
        echo "['Health Talk',".$health."],";
        echo "['Safety Training',".$safety."],";
        echo "['ToolBox',".$toolbox."]";
  ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'HSE TRAINING REPORT For <?php echo $empname;?>', 'width':800, 'height':800,
                  width: 700,
          scales: {
            xAxes: [{
                barThickness: 14,  // number (pixels) or 'flex'
                maxBarThickness: 15 // number (pixels)
            }]
        },
        bar: {groupWidth: "50%"},
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