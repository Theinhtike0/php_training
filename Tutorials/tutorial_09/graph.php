<!DOCTYPE html>
<html>
	<title>Graph</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
//var data = google.visualization.arrayToDataTable([
//  ['language', 'student'],
//  ['PHP',99],
//  ['Python',80],
//  ['Java',65],
//  ['C#',57],
//  ['Javascript',40]
//]);
var data = google.visualization.arrayToDataTable([
            ['Language', 'Student'],
                <?php
								include "db.php";
                $query = "select * from tutorial.survey";
                $res = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($res)) {
                    $language = $data['language'];
                    $studentlist = $data['studentlist'];
                ?>['<?php echo $language; ?>', <?php echo $studentlist; ?>],
                <?php
                }
                ?>
        ]);

var options = {
  title:'Choosing Language'
};

var chart = new google.visualization.BarChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>

</body>
</html>



