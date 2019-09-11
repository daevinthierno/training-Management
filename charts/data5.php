

<div id="month"></div>
<?php //echo displayTable5($conn);?>
<div id="do"></div>
<?php 
if(isset($_POST['submit']))
                  {
  # code...
       
       $year = $_POST['year'];
       echo '<h3>For Year: '.$year;
}else{
  echo '<h3> For Year: '.date('Y',$_SERVER['REQUEST_TIME']).'</h3>';
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
  ['Months', 'Health Talk', 'Safety training','Toolbox']
  <?php echo displayTable5($conn);?>
]);
<?php
$date = (isset($_POST['submit']))? $_POST['year'] : date('Y',$_SERVER['REQUEST_TIME']);?>
  // Optional; add a title and set the width and height of the chart
  var options = {'title':'HSE TRAINING REPORT For the Year <?php echo $date;?>', 'width':1200, 'height':800,
                  width: 1200,
          scales: {
            xAxes: [{
                barThickness: 14,  // number (pixels) or 'flex'
                maxBarThickness: 15 // number (pixels)
            }]
        },
        bar: {groupWidth: "100%"},
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
  var chart = new google.visualization.ColumnChart(document.getElementById('month'));
  chart.draw(data, options);
}

</script>